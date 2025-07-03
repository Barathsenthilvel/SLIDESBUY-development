<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Discount;
use DB;
use Auth;
use Validator;

use DataTables;
use App\Models\Storeconfiguration;

class DiscountController extends Controller
{
 
    public function datatables()
    {
         $datas = Discount::orderBy('id','desc')->get();
         return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('title', function(Discount $data) {
                                return $data->title;
                            })
                            ->addColumn('number', function(Discount $data) {
                                return ($data->type == '%')?$data->number." %": 'RS '.$data->number;
                            })
                			->addColumn('status', function(Discount $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'.route('admin-discount-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-discount-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Discount $data) {
                                return '<div class="action-list"><a href="' . route('admin-discount-edit',$data->id) . '"><i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-discount-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['title','number','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){
		return view('admin.discount.index');
	}
    public function create(){
        $product = Product::where('status','1')->whereNotIn('id',$this->getexcept(0))->get();
		return view('admin.discount.create',compact('product'));
	}
    public function edit($id){
		$data = Discount::findOrFail($id);
        $product = Product::where('status','1')->whereNotIn('id',$this->getexcept($id))->get();
        $product2 = explode(",",$data->product);
        foreach($product2 as $item){
                $ppp[$item] = $item;
        }
        $product2 = $ppp;
		return view('admin.discount.edit',compact('data','product','product2'));
	}
    public function store(Request $request){
        $input = $request->all();
        $rules=[
            'title' => 'required|unique:discounts,title,'.$input['title'],
        ];
        $customs=[
            'title.required'  => 'Title Name should be uniqu',
         ];
         $validator = Validator::make($request->all(), $rules,$customs);
         if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          $data = "";
          foreach($request->product as $key=>$value){
              $data .= $value.',';
          }
          $input['product'] = implode(',',$request->product);
          $input['show_home'] = (isset($request['show_home'])?$request['show_home']:'off');
        $Discount = new Discount();
        $Discount->fill($input)->save();
       $data1['msg'] = 'Discount Add Successfully.';
       return response()->json($data1);
    }
    public function update(Request $request,$id){

        $input = $request->all();
        $rules=[
            'title' => 'required|unique:discounts,title,'.$id,
        ];
        $customs=[
            'title.required'  => 'Title Name should be unique',
         ];
         $validator = Validator::make($request->all(), $rules,$customs);
         if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          $data = "";
          foreach($request->product as $key=>$value){
              $data .= $value.',';
          }
          $input['product'] = implode(',',$request->product);
          $input['show_home'] = (isset($request['show_home']))?'on':'off';
        $Discount = Discount::findOrFail($id);
        $Discount->fill($input)->save();
         $data1['msg'] = 'Discount Update Successfully.';
         return response()->json($data1);
    }
    public function status($id1,$id2)
    {
        $data = Discount::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

    public function destroy($id)
    {
        $data = Discount::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }
    public function load(Request $request){
        $array = (array)$request->data;
        $number = (int)$request->number;
        $type = $request->type;
        if(!empty($array)){
            $datas = Product::wherein('id',$array)->get();
            return view('admin.discount.loadTable', compact('datas','type','number'))->render();
        }else{
            return "";
        }
    }
    
    function getexcept($data){
        $date = today()->format('Y-m-d');
        if($data == 0){
            $Discount = Discount::where('status','1')->where('expiry_date', '>=', $date)->get();
            $Array = [];
            foreach($Discount as $data){
                $product = explode(",",$data->product);
                $Array = array_merge($Array,$product);
            }
            $Array = array_unique($Array);
            return $Array;
        }else{
            $Discount = Discount::where('status','1')->where('expiry_date', '>=', $date)->where('id','!=',$data)->get();
            $Array = [];
            foreach($Discount as $data){
                $product = explode(",",$data->product);
                $Array = array_merge($Array,$product);
            }
            $Array = array_unique($Array);
            return $Array;
        }
    }

     public function getDiscountProduct(){
        $data=[];
        $store = Storeconfiguration::where('id',1)->first();
        $discount = Discount::where('status',1)->where('show_home','on')->whereDate('expiry_date','>=',date('Y-m-d'))->get();
        foreach ($discount as $key => $value) {
            $arrays=rtrim($value->product,",");
            $array = explode(",", $arrays);
            if($store->out_of_stock == 0){
                $data[] = ['product'=>Product::wherein('id',$array)->where('status','1')->where('soldout','off')->get(),'discount'=>$value];
            }else{
                $data[] = ['product'=>Product::wherein('id',$array)->where('status','1')->get(),'discount'=>$value];
            }
        }
        return $data;
    }
}