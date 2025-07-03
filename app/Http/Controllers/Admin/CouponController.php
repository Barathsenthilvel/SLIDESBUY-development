<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Validator;

use DataTables;
use App\Models\Storeconfiguration;
use App\Models\User;
use App\Models\CustomerGroup;
use App\Models\Coupon;
use App\Models\CouponUsage;

class CouponController extends Controller
{

    public function datatables(){
        $datas = Coupon::orderBy('id','desc')->get();
        return DataTables::of($datas)
            ->addIndexColumn()
            ->addColumn('title', function(Coupon $data) {
                return $data->title;
            })
            ->addColumn('user', function(Coupon $data) {
                return ($data->user == 0)?'All User':'Existing User';
            })
            ->addColumn('type', function(Coupon $data) {
                return ($data->type == 0)?'Flat':'%';
            })
            ->addColumn('expirydate', function(Coupon $data) {
                return $data->expirydate;
            })
            ->addColumn('result', function(Coupon $data) {
                return '<a href="' . route('admin-coupon-view',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>View</a>';
            })
            ->addColumn('status', function(Coupon $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'.route('admin-coupon-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-coupon-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
            })
            ->addColumn('action', function(Coupon $data) {
                return '<div class="action-list"><a href="' . route('admin-coupon-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
            })
            ->rawColumns(['title','number','status','action','user','type','result'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){
        return view('admin.coupon.index');
	}
    public function create(){
		return view('admin.coupon.create');
	}
    public function views(Coupon $id){
        $CouponUsage = CouponUsage::where('coupenid',$id->id)->get();
        foreach($CouponUsage as $key => $value){
            $User = User::where('id',$value->userid)->first();
            if(!empty($User)){
                $CouponUsage[$key]['useremail'] = $User->email;
            }else{
                $CouponUsage[$key]['useremail'] = 'Not found';
            }
        }
        return view('admin.coupon.view',compact('id','CouponUsage'));
    }
    public function getuser(){

        $users = User::where('status',1)->get();
        foreach ($users as $key => $value) {
            $users[$key]['Code'] = 'SKC'.sprintf('%03d',$value->id).'';
            $CustomerGroup = CustomerGroup::where('id',$value->customer_type)->first();
            if(empty($CustomerGroup)){
                $users[$key]['Customer'] = "Group Not Found";
            }else{
                $users[$key]['Customer'] = $CustomerGroup->title;
            }
        }

        return $users;
    }

    public function store(Request $Request){
        
        $rules=[
            'code' => 'unique:coupons,code,'.$Request->code
            ];
        
        $customs=[
            'code.unique' => 'Coupon already taken'
            ];
        
        $validator = Validator::make($Request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        

        $Coupon = new Coupon();
        $Coupon->title = $Request->title;
        $Coupon->code = $Request->code;
        $Coupon->user = $Request->user;
        $Coupon->type = $Request->type;
        $Coupon->value = $Request->value;
        $Coupon->count = $Request->count;
        $Coupon->OrderValue = $Request->OrderValue;
        $Coupon->expirydate = $Request->expirydate;
        $Coupon->status = (isset($Request->status))?$Request->status:null;
        $Coupon->userid = $Request->userid;
        $Coupon->save();

        $data1['msg'] = 'Added Successfully.';
        return response()->json($data1);
    }

    public function destroy($id)
    {
        $data = Coupon::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }
    public function status($id1,$id2)
    {
        $data = Coupon::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }
}
