<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Pincode;
use App\Models\Role;
use App\Models\Admin;
use App\Models\MailTemplate;
use App\Mail\AdminMails;
use Illuminate\Support\Facades\Mail;

use DB;
use Auth;
use Validator;
use Illuminate\Support\Str;

use DataTables;


class VendorController extends Controller
{
    public function datatables()
    {

         $datas = Vendor::orderBy('id','desc')->get();
         return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('title', function(Vendor $data) {
                                return $data->name;
                            })
                            ->addColumn('vendor_code', function(Vendor $data) {
                                return $data->vendor_id();
                            })
                            ->addColumn('type', function(Vendor $data) {
                                return $data->type;
                            })
                            ->addColumn('username', function(Vendor $data) {
                                return $data->username;
                            })
                            ->addColumn('manufacturerID',function(Vendor $data){
                                return $data->manufacturerID;
                            })
                            ->addColumn('country',function(Vendor $data){
                                return $data->getcountry();
                            })
                            ->addColumn('state',function(Vendor $data){
                                return $data->getstate();
                            })
                			->addColumn('status', function(Vendor $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'.route('admin-vendor-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-vendor-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Vendor $data) {
                                return '<div class="action-list"><a href="' . route('admin-vendor-edit',$data->id) . '"><i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-vendor-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['title','type','username','manufacturerID','country','state','status','action','vendor_code'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }
    public function index(){
		return view('admin.vendor.index');
	}
    public function create(){
        $country=Country::where('status',1)->get();
		$pincode=Pincode::where('status',1)->get();
		$city=City::where('status',1)->get();
		$state=State::where('status',1)->get();
        $Role  = Role::where('status','1')->get();
		return view('admin.vendor.create',compact('country','pincode','city','state','Role'));
	}
    public function edit($id){
		$data = Vendor::findOrFail($id);
        $Role  = Role::where('status','1')->get();
        $country=Country::where('status',1)->get();
		$pincode=Pincode::where('status',1)->where('country_id',$data->billingCountry)->where('state_id',$data->billingState)->where('city_id',$data->billingCity)->get();
		$city=City::where('status',1)->where('country_id',$data->billingCountry)->where('state_id',$data->billingState)->get();
		$state=State::where('status',1)->where('country_id',$data->billingCountry)->get();
		return view('admin.vendor.edit',compact('data','country','Role','state','city','pincode'));
	}
    public function store(Request $request){
        
        $rules=[
            'username' => 'required|unique:admins,Username,'.$request->username,
            'email' => 'required|unique:admins,admin_email,'.$request->email,
            'manufacturerID'=> 'required|unique:Vendors,manufacturerID,'.$request->manufacturerID,
        ];
        $customs=[
            'username.unique'  => 'username Name should be unique',
            'email.unique'  => 'Email Name should be uniqu',
            'manufacturerID.unique' => 'product Prefix Taken',
         ];
         $validator = Validator::make($request->all(), $rules,$customs);
         if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            // return redirect()->back()->withErrors($validator->getMessageBag()->toArray());
          }
        $random = Str::random(10);
        $email = $request->email;
        $Vendor = new Vendor();
        
        $Vendor->fill($request->all())->save();
        $Admin = new Admin();
        $Admin->admin_name = $request->name;
        $Admin->admin_email  = $request->email;
        $Admin->Username  = $request->username;
        $Admin->password = Hash::make($random); 
        $Admin->role_id = $request->role_id;
        $Admin->is_vendor = $Vendor->id;
        $Admin->save();
        $mailTemplates = MailTemplate::where('template_name','6')->where('status','1')->first();
      $mailContents=[
          'title'=>$mailTemplates->subject_mail,
          'body'=>$mailTemplates->content_mail,
          'password'=>$random,
          'username'=>$Admin->Username,
          'footer'=>$mailTemplates->footer_mail,
      ];
      
      Mail::to($email)->bcc($mailTemplates->bcc_mail)->send(new AdminMails($mailContents));
        $data['msg'] = 'Vendor Add Successfully.';
        return response()->json($data);
	}
    public function update(Request $request,$id){
       
        $Vendor = Vendor::findOrFail($id);
        $Admin =Admin::where('is_vendor','=',$Vendor->id)->firstOrFail();
        $rules=[
            'username' => 'required|unique:admins,Username,'.$Admin->id,
            'email' => 'required|unique:admins,admin_email,'.$Admin->id,
            'manufacturerID'=> 'required|unique:Vendors,manufacturerID,'.$id,
        ];
        $customs=[
            'username.unique'  => 'username Name should be unique',
            'email.unique'  => 'Email Name should be uniqu',
            'manufacturerID.unique' => 'product Prefix Taken'
         ];
         $validator = Validator::make($request->all(), $rules,$customs);
        if ($validator->fails()) { 
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        
        $Vendor->update($request->all());
        
        $Admin->admin_name = $request->name;
         $Admin->admin_email  = $request->email;
        $Admin->Username  = $request->username;
        $Admin->role_id = $request->role_id;
        $Admin->update();
        $data['msg'] = 'Vendor Update Successfully.';
        return response()->json($data);
    }
    public function status($id1,$id2)
    {
        $data = Vendor::findOrFail($id1);
        $Admin = Admin::where('is_vendor','=',$data->id)->firstOrFail();
        $data->status = $id2;
        $Admin->status = $id2;
        $Admin->update();
        $data->update();
    }

    public function destroy($id)
    {
        $data = Vendor::findOrFail($id);
        $Admin = Admin::where('is_vendor','=',$data->id)->firstOrFail();
        $data->delete();
        $Admin->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
    }

    public function getstate(Request $request){
        $State = City::where('state_id',$request->id)->where('status','1')->get();
        return response()->json($State);
    }
    public function getTemplate(Request $request){
        $Country  = Country::findOrFail($request->id);
        $State = State::where('country_id',$request->id)->where('status','1')->get();
        return view('admin.vendor.template',compact('State','Country'))->render();
    }
}