<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Address;
use App\Models\CustomerGroup;
use App\Models\Country;
use App\Models\Pincode;
use App\Models\State;
use App\Models\City;
use Auth;
use Validator;

use DataTables;
use App\Models\Storeconfiguration;
use DB;

class CustomerController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

		// public function datatables()
  //   {

  //        $datas = User::orderBy('id','desc')->get();
  //        //--- Integrating This Collection Into Datatables
  //        return DataTables::of($datas)
  //               			->addIndexColumn()
  //               			->addColumn('status', function(User $data) {
  //                               $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
  //                               $s = $data->status == 1 ? 'selected' : '';
  //                               $ns = $data->status == 0 ? 'selected' : '';
  //                               return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-customer-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-customer-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
  //                           })
  //                           ->addColumn('action', function(User $data) {
  //                               return '<div class="action-list"><a href="' . route('admin-customer-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-customer-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
  //                           }) 
  //                           ->rawColumns(['status','action'])
  //                           ->toJson(); //--- Returning Json Data To Client Side
  //   }

		public function datatables(Request $request){
		    
        $search=[];
        $columns=$request->columns;
        $store = Storeconfiguration::where('id',1)->first();
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }
        // dd($search);
		if(!empty($search[0])){
            $search[0] = str_replace($store->CustomerIDPrefix,'',$search[0]);
        }	
        
        //user
        $data = User::with('addresses')->when($search[0],function($query,$search){
            return $query->where('id',$search);  
        })
        ->when($search[1],function($query,$search){
            return $query->where('name','LIKE',"%{$search}%");
        })
        ->when($search[2],function($query,$search){
            return $query->where('email','LIKE',"%{$search}%");
        })
        ->when($search[3],function($query,$search){
            return $query->where('Phone','LIKE',"%{$search}%");
        })
        ->when($search[4],function($query,$search){
            $date = explode("|",$search);
            $date[0] = date('y-m-d',strtotime($date[0]." -1 days"));
            $date[1] = date('y-m-d',strtotime($date[1]." +1 days"));
            return $query->whereBetween('created_at',$date);
        })
        ->when($search[5],function($query,$search){
            return $query->where('customer_type','LIKE',"%{$search}%");
        })
        ->when($search[6],function($query,$search){
            return $query->where('city','LIKE',"%{$search}%");
        })
        ->when($search[7],function($query,$search){
            return $query->where('state','LIKE',"%{$search}%");
        })
        ->when($search[8],function($query,$search){
            return $query->where('country','LIKE',"%{$search}%");
        })
        ->when($search[9],function($query,$search){
            return $query->where('pincode','LIKE',"%{$search}%");
        })->orderBy('id','desc')->get();

        // foreach ($data as $key => $value) {
        // 	$data[$key]->city = City::where('id',$value->city)->first();
        // 	$data[$key]->customer_type = CustomerGroup::where('id',$value->customer_type)->first();
        // 	$data[$key]->state = State::where('id',$value->state)->first();
        // 	$data[$key]->country = Country::where('id',$value->country)->first();
        // 	$data[$key]->pincode = Pincode::where('id',$value->pincode)->first();
        // 	$data[$key]->id = sprintf('%03d',$value->id);
        // }
        
        return DataTables::of($data)
        ->addColumn('city', function(User $value) {
            return City::where('id',$value->city)->first();
        })
        ->addColumn('customer_type', function(User $value) {
            return CustomerGroup::where('id',$value->customer_type)->first();
        })
        ->addColumn('state', function(User $value) {
            return State::where('id',$value->state)->first();
        })
        ->addColumn('country', function(User $value) {
            return Country::where('id',$value->country)->first();
        })
        ->addColumn('pincode', function(User $value) {
            return Pincode::where('id',$value->pincode)->first();
        })
        ->addColumn('id_modefy', function(User $value) {
            return sprintf('%03d',$value->id);
        })
        ->toJson();
        
        
        
        
        $data1 = User::with('addresses')->when($search[0],function($query,$search){
            return $query->where('id',$search);  
        })
        ->when($search[1],function($query,$search){
            return $query->where('name','LIKE',"%{$search}%");
        })
        ->when($search[2],function($query,$search){
            return $query->where('email','LIKE',"%{$search}%");
        })
        ->when($search[3],function($query,$search){
            return $query->where('Phone','LIKE',"%{$search}%");
        })
        ->when($search[4],function($query,$search){
            $date = explode("|",$search);
            $date[0] = date('y-m-d',strtotime($date[0]." -1 days"));
            $date[1] = date('y-m-d',strtotime($date[1]." +1 days"));
            return $query->whereBetween('created_at',$date);
        })
        ->when($search[5],function($query,$search){
            return $query->where('customer_type','LIKE',"%{$search}%");
        })
        ->when($search[6],function($query,$search){
            return $query->where('city','LIKE',"%{$search}%");
        })
        ->when($search[7],function($query,$search){
            return $query->where('state','LIKE',"%{$search}%");
        })
        ->when($search[8],function($query,$search){
            return $query->where('country','LIKE',"%{$search}%");
        })
        ->when($search[9],function($query,$search){
            return $query->where('pincode','LIKE',"%{$search}%");
        })->orderBy('id','desc')->get();
        
        $recordsFiltered = count($data1);
        $recordsTotal = User::count();
        return response()->json(['data'=>$data,'recordsFiltered'=>$recordsFiltered,'recordsTotal'=>$recordsTotal]);
    }

    public function index(){

		$customerGroup=CustomerGroup::where('status',1)->get();
		$country=Country::where('status',1)->get();
		$pincode=Pincode::where('status',1)->get();
		$city=City::where('status',1)->get();
		$state=State::where('status',1)->get();
		return view('admin.customer.index',compact('customerGroup','country','pincode','city','state'));
	}

	public function status($id1,$id2)
      {
          $data = User::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=User::with('addresses')->findOrFail($id);
		$customerGroup=CustomerGroup::where('status',1)->get();
		$country=Country::where('status',1)->get();
		$pincode=Pincode::where('status',1)->get();
		$city=City::where('status',1)->get();
		$state=State::where('status',1)->get();
		return view('admin.customer.edit',compact('data','customerGroup','country','pincode','city','state'));
	}

	public function postcode(Request $request){
		$pincodeData=$request->all();
		$pincode=$pincodeData['postcode'];
		$pincodeSql=Pincode::findOrFail($pincode);
		$data=$pincodeSql;
			return response()->json($data);
	}

	public function update(Request $request,$id){
		$data=$request->all();
		$customer=User::findOrFail($id);
		$customer->customer_type=$data['customerGroup'];
		$customer->save();
		$data1['msg'] = 'Customer Updated Successfully.';
        return response()->json($data1);
		

	}
	public function editCus($id){
		$address=Address::findOrFail($id);
		$edit = true;
		$country=Country::where('status',1)->get();
		$pincode=Pincode::where('status',1)->where('country_id',$address->country_id)->where('state_id',$address->state_id)->where('city_id',$address->city_id)->get();
		$city=City::where('status',1)->where('country_id',$address->country_id)->where('state_id',$address->state_id)->get();
		$state=State::where('status',1)->where('country_id',$address->country_id)->get();
		return view('admin.customer.address',compact('address','edit','country','pincode','city','state'))->render();
	}
	public function updateCus(Request $request,$id){
		$data=$request->all();
		$pincode=$data["pincode_id"];
		$country=$data["country"];
		$state=$data["state_id"];
		$city=$data["city_id"];

			$address=Address::findOrFail($id);
      $user_id=$address->user_id;
      $addressType=$address->address_type;
      if($addressType == 1){
        $user=User::findOrFail($user_id);

      $user->pincode=$pincode;
      $user->country=$country;
      $user->state=$state;
      $user->city=$city;
      $user->save();

      }
		$shipAddress=(array_key_exists("shipAddress", $data))?$data["shipAddress"]:"0";
		$defaultAddress=(array_key_exists("defaultAddress", $data))?$data["defaultAddress"]:"0";

			$address->pincode_id=$pincode;
			$address->country_id=$country;
			$address->state_id=$state;
			$address->city_id=$city;
			$address->ship_as=$shipAddress;
			$address->default_address=$defaultAddress;
			$address->save();
			return response()->json(['msg'=>'Updated ']);

	}
	public function refresh($id){

		
		$data=User::with('addresses')->findOrFail($id);
		$customerGroup=CustomerGroup::where('status',1)->get();
		$country=Country::where('status',1)->get();
		$pincode=Pincode::where('status',1)->get();
		$city=City::where('status',1)->get();
		$state=State::where('status',1)->get();
		return view('admin.customer.address',compact('data','country','pincode','city','state','customerGroup'))->render();

	}


	public function getState(Request $request){
    $state = State::where('status','=',1)->where('country_id',$request->country_name)->get();
      return response()->json($state);
	}

  public function getCities(Request $request){
        $State  = State::where('id',$request->state_name)->where('country_id',$request->country)->first();
        if(empty($State)){
          $State = new State();
          $State->country_id = $request->country;
          $State->state_name = $request->state_name;
          $State->save();
          return response()->json(['new'=>true,'data'=>$State]);
        }else{
          $city = City::where('status','=',1)->where('country_id',$request->country)->where('state_id',$request->state_name)->get();
          return response()->json(['new'=>false,'data'=>$city]);
        }

  }

  public function getPincodes(Request $request){
    $City = City::where('country_id',$request->country)->where('state_id',$request->state)->where('id',$request->city_name)->first();
    if(empty($City)){
      $City = new City();
        $City->country_id = $request->country;
        $City->state_id = $request->state;
        $City->city_name = $request->city_name;
        $City->save();
        return response()->json(['new'=>true,'data'=>$City]);
    }else{
        $Pincode = Pincode::where('status','=',1)->where('country_id',$request->country)->where('state_id',$request->state)->where('city_id',$request->city_name)->get();
        return response()->json(['new'=>false,'data'=>$Pincode]);
      }

  }

  public function addPincodes(Request $request){
    $Pincode = Pincode::where('country_id',$request->country)->where('state_id',$request->state)->where('city_id',$request->city)->where('id',$request->pincode)->first();

    if(empty($Pincode)){
      $Pincode = new Pincode();
      $Pincode->country_id = $request->country;
      $Pincode->state_id = $request->state;
      $Pincode->city_id = $request->city;
      $Pincode->pincode = $request->pincode;
      $Pincode->save();
      return response()->json(['new'=>true,'data'=>$Pincode]);
    }
    
  }

public function destroy(Request $request)
    {
        $data = User::findOrFail($request->id);
        $data->delete();
        //--- Redirect Section
        $data1['msg']  = 'Data Deleted Successfully.';
         return response()->json($data1);
        //--- Redirect Section Ends
    }

	public function getCity(Request $request){
		$city = City::findOrFail($request->id);
		return response()->json($city);
	}
}
