<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\Pincode;
use Auth;
use Validator;

use DataTables;

class PincodeController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    {

         $datas = Pincode::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
							->addColumn('Country_id', function(Pincode $data) {
                				$getName=$data->country_id;
                				$city_name=Country::where('id',$getName)->first();
                				if(empty($city_name)){
                				    return 'Not Found';
                				}
                				return $city_name->country_name;
                  				})
							->addColumn('State_id', function(Pincode $data) {
								$getName=$data->state_id;
								$city_name=State::where('id',$getName)->first();
								if(empty($city_name)){
                				    return 'Not Found';
                				}
								return $city_name->state_name;
								})
                			->addColumn('city_id', function(Pincode $data) {
                				$getName=$data->city_id;
                				$city_name=City::where('id',$getName)->first();
                				if(empty($city_name)){
                				    return 'Not Found';
                				}
                				return $city_name->city_name;
                  				})
                			->addColumn('status', function(Pincode $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-pincode-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-pincode-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Pincode $data) {
                                return '<div class="action-list"><a href="' . route('admin-pincode-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-pincode-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['Country_id','State_id','city_id','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.pincode.index');
	}

	public function create(){
		$country=Country::where('status','1')->get();
		$state=State::where('status','1')->get();
		return view('admin.pincode.create',compact('state','country'));
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'countryName' => 'required',
			'stateName' => 'required',
			'cityName' => 'required',
			'pincode' => 'required|unique:pincodes,pincode,NULL,id,city_id,'.$request->input('cityName'),

		];

		$customs=[
			'countryName.required'  => 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
			'cityName.required'  	=> 'City Name should be filled',
			'pincode.required'  	=> 'Pincode should be filled',
			'pincode.unique'      	=> 'Pincode already taken for this city',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new Pincode;

        $data->country_id=$requestedData['countryName'];
        $data->state_id=$requestedData['stateName'];
        $data->city_id=$requestedData['cityName'];
        $data->pincode=$requestedData['pincode'];
        $data->save();

		$data1['msg'] = 'New Pincode Added Successfully.';
        return response()->json($data1);

	}


	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'countryName' => 'required',
			'stateName' => 'required',
			'cityName' => 'required',
			'pincode' => 'required|unique:pincodes,pincode,NULL,id,city_id,'.$id,

		];

		$customs=[
			'countryName.required'  => 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
			'cityName.required'  	=> 'City Name should be filled',
			'pincode.required'  	=> 'Pincode should be filled',
			'pincode.unique'      	=> 'Pincode already taken for this city',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Pincode::findOrFail($id);

        $data->country_id=$requestedData['countryName'];
        $data->state_id=$requestedData['stateName'];
        $data->city_id=$requestedData['cityName'];
        $data->pincode=$requestedData['pincode'];
        $data->save();

		$data1['msg'] = 'Pincode Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = Pincode::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=Pincode::findOrFail($id);
		$country=Country::where('status','1')->get();
		$data1=State::where('status','1')->get();
		$city=City::where('status','1')->get();
		return view('admin.pincode.edit',compact('data','data1','country','city'));
	}


    public function destroy($id)
    {
        $data = Pincode::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }

}
