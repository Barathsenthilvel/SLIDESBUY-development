<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Pincode;
use App\Models\Shipping;
use Auth;
use Validator;

use DataTables;

class ShippingController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    {
         $datas = Shipping::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('title', function(Shipping $data) {
                                return $data->title;
                  			})
                            ->addColumn('price', function(Shipping $data) {
                                return $data->price;
                  			})
                            ->addColumn('weight', function(Shipping $data) {
                                return $data->weight;
                  			})
                            ->addColumn('type', function(Shipping $data) {
                                if($data->type == 1){
                                    return "fast Delivery";
                                }
                                return "Normal Delivery";
                  			})
                			->addColumn('status', function(Shipping $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-shipping-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-shipping-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Shipping $data) {
                                return '<div class="action-list"><a href="' . route('admin-shipping-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-shipping-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['title','price','weight','type','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

	public function index(){
		return view('admin.shipping.index');
	}

	public function create(){
		$data=Country::where('status','1')->get();
		return view('admin.shipping.create',compact('data'));
	}

	public function store(Request $request){
        // dd($request->all());
		$requestedData=$request->all();
		$rules=[
            'title' =>'required|unique:shippings,title,'.$requestedData['title'],
		];
        
		$customs=[
            'title.required' => 'Require Title Name',
            'title.unique' => 'Title name already taken'
		];
        
		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $Shipping = new Shipping();
        $Shipping->title = $requestedData['title'];
        $Shipping->price = $requestedData['price'];
        $Shipping->CODAmount = $requestedData['CODAmount'];
        $Shipping->weight = (empty($requestedData['weight']))?'':implode('|',(array)$requestedData['weight']);
        $Shipping->type = $requestedData['title'];
        $Shipping->country_id = (empty($requestedData['country_id']))?'':implode(',',(array)$requestedData['country_id']);
        $Shipping->state_id = (empty($requestedData['state_id']))?'':implode(',',(array)$requestedData['state_id']);
        
        $Shipping->city_id = (empty($requestedData['city_id']))?'':implode(',',(array)$requestedData['city_id']);
        $Shipping->pincode_id = (empty($requestedData['pincode_id']))?'':implode(',',(array)$requestedData['pincode_id']);
        
        $Shipping->save();
        
		$data1['msg'] = ' Added Successfully.';
		
        return response()->json($data1);
	}
	public function update(Request $request,$id){
        // dd($request->country_id);
		$requestedData=$request->all();
		$rules=[
            'title' =>'required|unique:shippings,title,'.$id,
		];
		$customs=[
            'title.required' => 'Require Title Name',
            'title.unique' => 'Title name already taken'
		];
		$validator = Validator::make($request->all(), $rules,$customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $Shipping = Shipping::findOrFail($id);
        $Shipping->title = $requestedData['title'];
        $Shipping->price = $requestedData['price'];
        $Shipping->CODAmount = $requestedData['CODAmount'];
        $Shipping->weight = (empty($requestedData['weight']))?'':implode('|',(array)$requestedData['weight']);
        $Shipping->type = (empty($requestedData['type']))?'0':'1';
        $Shipping->country_id = (empty($requestedData['country_id']))?'':implode(',',(array)$requestedData['country_id']);
        $Shipping->state_id = (empty($requestedData['state_id']))?'':implode(',',(array)$requestedData['state_id']);
        $Shipping->city_id = (empty($requestedData['city_id']))?'':implode(',',(array)$requestedData['city_id']);
        $Shipping->pincode_id = (empty($requestedData['pincode_id']))?'':implode(',',(array)$requestedData['pincode_id']);
        $Shipping->save();
		$data1['msg'] = 'Updated Successfully.';
        return response()->json($data1);
	}

    public function edit($id){
		$data=Shipping::findOrFail($id);
		$Country=Country::where('status','1')->get();
        $data->weight = (empty($data->weight))?'':explode('|',$data->weight);
        $data->country_id = (empty($data->country_id))?[]:explode(',',$data->country_id);
        $data->state_id = (empty($data->state_id))?[]:explode(',',$data->state_id);
        $data->city_id = (empty($data->city_id))?[]:explode(',',$data->city_id);
        $data->pincode_id = (empty($data->pincode_id))?[]:explode(',',$data->pincode_id);
        
        $state = State::whereIn('country_id',$data->country_id)->where('status','1')->get();
        $city = City::whereIn('state_id',$data->state_id)->where('status','1')->get();
        $Pincode = Pincode::whereIn('city_id',$data->city_id)->where('status','1')->get();
        
		return view('admin.shipping.edit',compact('data','Country','city','state','Pincode'));
	}

    public function destroy($id)
    {
        $data = Shipping::findOrFail($id);
        $data->delete();
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
    }
    public function getstates(Request $request){
        if(!empty($request->country_id)){
            $state = State::whereIn('country_id',$request->country_id)->where('status','1')->get();
            return response()->json($state);
        }else{
            return response()->json([]);
        }
    }
    public function getcity(Request $request){
        if(!empty($request->state_id)){
        $City = City::whereIn('state_id',$request->state_id)->where('status','1')->get();
        return response()->json($City);
    }else{
        return response()->json([]);
    }
    }
    public function getpincode(Request $request){
            if(!empty($request->city_id)){
            $City = Pincode::whereIn('city_id',$request->city_id)->where('status','1')->get();
            return response()->json($City);
        }
    return response()->json([]);
    
    }
    
	public function status($id1,$id2)
    {
        $data = Shipping::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

}
