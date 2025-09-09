<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Homeslider;
use App\Models\Product;
use DB;
use Auth;
use Validator;

use DataTables;
use App\Models\Storeconfiguration;


class HomesliderController extends Controller
{

    public function datatables()
    {
         $datas = Homeslider::orderBy('id','desc')->get();
         return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('title', function(Homeslider $data) {
                                return $data->title;
                            })
                            ->addColumn('type', function(Homeslider $data) {
                                return $data->CateCount()-1;
                            })
                			->addColumn('status', function(Homeslider $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'.route('admin-homeslider-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-homeslider-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Homeslider $data) {
                                return '<div class="action-list"><a href="' . route('admin-homeslider-edit',$data->id) . '"><i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-homeslider-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            })
                            ->rawColumns(['title','type','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){
		return view('admin.homepageslider.index');
	}
    public function create(){
        $data = Category::where('status','1')->get();
		return view('admin.homepageslider.create',compact('data'));
	}
    public function edit($id){
		$data = Homeslider::findOrFail($id);
        $data1 = Category::where('status','1')->get();
        if($data->type == 'All'){
            $product = Product::where('status','1')->get();
        }else{
            $product = Product::where('status','1')->where('category',$data->type)->get();
        }
        $product2 = explode("|",$data->product);
        foreach($product2 as $item){
            $item = explode(",",$item);
            if(count($item)==2){
                $ppp[$item[0]] = $item[1];
            }
        }
        $product2 = $ppp;
		return view('admin.homepageslider.edit',compact('data','data1','product','product2'));
	}
    public function store(Request $request){
        $input = $request->all();
        $rules=[
            'title' => 'required|unique:homeslideres,title,'.$input['title'],
        ];
        $customs=[
            'title.required'  => 'Title Name should be uniqu',
         ];
         $validator = Validator::make($request->all(), $rules,$customs);
         if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          if($input['type'] == 1){
              $input['type'] = $input['parentcategory'];
          }else{
            $input['type']='All';
          }
          $data = "";
          foreach($request->product as $key=>$value){
              $data .= $value.','.$request->sort[$key].'|';
          }
          $input['product'] = $data;
        $Homeslider = new Homeslider();
        $Homeslider->fill($input)->save();
       $data1['msg'] = 'Homeslider Add Successfully.';
       return response()->json($data1);
    }

    public function update(Request $request,$id){

        $input = $request->all();
        $rules=[
            'title' => 'required|unique:homeslideres,title,'.$id,
        ];
        $customs=[
            'title.required'  => 'Title Name should be uniqu',
         ];
         $validator = Validator::make($request->all(), $rules,$customs);
         if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          if($input['type'] == 1){
              $input['type'] = $input['parentcategory'];
          }else{
            $input['type']='All';
          }
          $data = "";
          foreach($request->product as $key=>$value){
              $data .= $value.','.$request->sort[$key].'|';
          }
          $input['product'] = $data;
          $Homeslider = Homeslider::findOrFail($id);
          $Homeslider->update($input);
         $data1['msg'] = 'Homeslider Update Successfully.';
         return response()->json($data1);
    }

    public function status($id1,$id2)
    {
        $data = Homeslider::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

    public function destroy($id)
    {
        $data = Homeslider::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }
    public function product(Request $request){
        $re = $request->data;
        if($re == "All"){
            $product = Product::where('status','1')->get();
            return response()->json($product);
        }
        if($re != "All"){
            $product = Product::where('status','1')->where('category',$re)->get();
            return response()->json($product);
        }
    }
    public function load(Request $request){
        $array = (array)$request->data;
        if(!empty($array)){
            $datas = Product::wherein('id',$array)->get();
            return view('admin.homepageslider.loadTable', compact('datas'))->render();
        }else{
            return "";
        }
    }

    public function gethomeslider(){
              $store = Storeconfiguration::where('id',1)->first();

        $data=[];$sort = [];
        $Homeslider = Homeslider::where('status','1')->get();
        foreach($Homeslider as $key=>$value){
            $array1;$array2 = [];
            $array = explode('|',$value['product']);
            foreach ($array as $key1 => $value1) {
                $A = explode(',',$value1);
                if(!empty($A[0])){
                    $array1[] = $A[0];
                    $array2[]=$A;
                }
            }
            $sort = $this->sort($array2);
            if($store->out_of_stock == 0){
            $product = Product::wherein('id',$array1)->where('soldout','off')->get();
            }else{
            $product = Product::wherein('id',$array1)->get();
            }
            $product = $this->Sortproduct($product,$sort);
            $data[] = ['product'=>$product,'Homeslider'=>$value];
            $array2 = [];$array1 = [];
        }
        return $data;
    }

    function Sort($value){
        $array =$value;
        $temp;
        for($i=0;$i<count($array);$i++){
            for($j=$i+1;$j<count($array);$j++){
                if($array[$i][1]>$array[$j][1]){
                    $temp = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $temp;
                }
            }
        }
        return $array;
    }

    function Sortproduct($product,$sort){
        $temp = [];
        foreach ($sort as $key => $value) {
            foreach ($product as $key1 => $value1) {
                if($value[0] == $value1->id){
                    $temp[] = $value1;
                }
            }
        }
        return $temp;
    }
}
