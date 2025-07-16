<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Admin\Input;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Homecat;
use DB;
use Auth;
use Validator;
use DataTables;


class HomecatController extends Controller
{
 
    public function datatables()
    {
         $datas = Homecat::orderBy('id','desc')->get();
         return DataTables::of($datas)
                			->addIndexColumn()
                            ->addColumn('title', function(Homecat $data) {
                                return $data->title;
                            })
                			->addColumn('status', function(Homecat $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'.route('admin-homecat-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-homecat-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Homecat $data) {
                                return '<div class="action-list"><a href="' . route('admin-homecat-edit',$data->id) . '"><i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-homecat-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['title','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){
		return view('admin.homecat.index');
	}
    public function create(){
        $data = Category::where('status','1')->get();
		return view('admin.homecat.create',compact('data'));
	}
    public function edit($id){
		$data = Homecat::findOrFail($id);
        $data1 = Category::where('status','1')->get();
        $product2 = explode("|",$data->category);
        foreach($product2 as $item){
            $item = explode(",",$item);
            if(count($item)==2){
                $ppp[$item[0]] = $item[1];
            }
        }
        $product2 = $ppp;
        
		return view('admin.homecat.edit',compact('data','data1','product2'));
	}
    public function store(Request $request){
        // dd('sdsdsdsd');
        // dd($request->all());
        $input = $request->all();
        $rules=[
            'title' => 'required|unique:homecats,title,'.$input['title'],
            'radios5'=>'required'
        ];
        $customs=[
            'title.required'  => 'Title Name should be unique',
            'radios5.required' => 'Style should be selected'
         ];
         $validator = Validator::make($request->all(), $rules,$customs);
         if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          
          
          $input['styles']=$input['radios5'];
          
          $data = "";
          foreach($request->category as $key=>$value){
              $data .= $value.','.$request->sort[$key].'|';
          }
          $input['category'] = $data;
        $Homecat = new Homecat();
        $Homecat->fill($input)->save();
       $data1['msg'] = 'Caregory Add Successfully.';
       return response()->json($data1);
    }
    public function update(Request $request,$id){

        $input = $request->all();
        $rules=[
            'title' => 'required|unique:homecats,title,'.$id,
            'radios5'=>'required'
        ];
        $customs=[
            'title.required'  => 'Title Name should be unique',
            'radios5.required' => 'Style should be selected'
         ];
         $validator = Validator::make(Input::all(), $rules,$customs);
         if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
          
          $data = "";
          foreach($request->category as $key=>$value){
              $data .= $value.','.$request->sort[$key].'|';
          }
          $input['category'] = $data;
          $input['styles']=$input['radios5'];
          $Homecat = Homecat::findOrFail($id);
          $Homecat->fill($input)->save();
         $data1['msg'] = 'Caregory Update Successfully.';
         return response()->json($data1);
    }
    public function status($id1,$id2)
    {
        $data = Homecat::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

    public function destroy($id)
    {
        $data = Homecat::findOrFail($id);
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
            $datas = Category::wherein('id',$array)->get();
            return view('admin.homecat.loadTable', compact('datas'))->render();
        }else{
            return "";
        }
    }

    public function gethomeCategory(){
        $Homecat = Homecat::where('status','1')->where('styles',1)->get();
        $data = [];
        foreach ($Homecat as $key => $value) {
            $array1;$array2 = [];
            $array = explode('|',$value['category']);
            foreach ($array as $key1 => $value1) {
                $A = explode(',',$value1);
                if(!empty($A[0])){ 
                    $array1[] = $A[0];
                    $array2[]=$A;
                }
            }
            $sort = $this->sort($array2);
            $Category = Category::wherein('id',$array1)->limit(8)->get();
            
            $Category = $this->Sortproduct($Category,$sort);
            $data[] = ['category'=>$Category,'Homecat'=>$value];
            $array2 = [];$array1 = [];
        }
        return $data;
    }
    
        public function gethomeCategory2(){
        $Homecat = Homecat::where('status','1')->where('styles',2)->get();
        $data = [];
        foreach ($Homecat as $key => $value) {
            $array1;$array2 = [];
            $array = explode('|',$value['category']);
            foreach ($array as $key1 => $value1) {
                $A = explode(',',$value1);
                if(!empty($A[0])){ 
                    $array1[] = $A[0];
                    $array2[]=$A;
                }
            }
            $sort = $this->sort($array2);
            $Category = Category::wherein('id',$array1)->limit(8)->get();
            
            $Category = $this->Sortproduct($Category,$sort);
            $data[] = ['category'=>$Category,'Homecat'=>$value];
            $array2 = [];$array1 = [];
        }
        return $data;
    }
    
        public function gethomeCategory3(){
        $Homecat = Homecat::where('status','1')->where('styles',3)->get();
        $data = [];
        foreach ($Homecat as $key => $value) {
            $array1;$array2 = [];
            $array = explode('|',$value['category']);
            foreach ($array as $key1 => $value1) {
                $A = explode(',',$value1);
                if(!empty($A[0])){ 
                    $array1[] = $A[0];
                    $array2[]=$A;
                }
            }
            $sort = $this->sort($array2);
            $Category = Category::wherein('id',$array1)->limit(8)->get();
            
            $Category = $this->Sortproduct($Category,$sort);
            $data[] = ['category'=>$Category,'Homecat'=>$value];
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

    function Sortproduct($Category,$sort){
        $temp = [];
        foreach ($sort as $key => $value) {
            foreach ($Category as $key1 => $value1) {
                if($value[0] == $value1->id){
                    $temp[] = $value1;
                }
            }
        }
        return $temp;
    }
}