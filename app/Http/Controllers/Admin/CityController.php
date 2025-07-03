<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Auth;
use Validator;

use DataTables;

class CityController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    {

         $datas = City::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
							->addColumn('Country_id', function(City $data) {
                				$getName=$data->country_id;
                				$city_name=Country::where('id',$getName)->first();
                				if(empty($city_name)){
                				    return "Not Found";
                				}
                				return $city_name->country_name;
                  				})
                			->addColumn('state_id', function(City $data) {
                				$getName=$data->state_id;
                				$state_name=State::where('id',$getName)->first();
                				if(empty($state_name)){
                				    return "Not Found";
                				}
                				return $state_name->state_name;
                				
                  				})
                			->addColumn('status', function(City $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-city-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-city-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(City $data) {
                                return '<div class="action-list"><a href="' . route('admin-city-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-city-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['Country_id','state_id','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.city.index');
	}

	public function create(){
		$country=Country::where('status','1')->get();
		$data=State::where('status','1')->get();
		return view('admin.city.create',compact('data','country'));
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'countryName' => 'required',
			'stateName' => 'required',
			'cityName' => 'required|unique:cities,city_name,NULL,id,state_id,'.$request->input('stateName'),

		];

		$customs=[
			'countryName.required'  => 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
			'cityName.required'  	=> 'City Name should be filled',
			'cityName.unique'      	=> 'City Name already taken for this state',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new City;

        $data->country_id=$requestedData['countryName'];
        $data->state_id=$requestedData['stateName'];
        $data->city_name=$requestedData['cityName'];
        $data->save();

		$data1['msg'] = 'New City Added Successfully.';
        return response()->json($data1);

	}


	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'countryName' => 'required',
			'stateName' => 'required',
			'cityName' => 'required|unique:cities,city_name,NULL,id,state_id,'.$id,

		];

		$customs=[
			'countryName.required'  	=> 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
			'cityName.required'  	=> 'City Name should be filled',
			'cityName.unique'      	=> 'City Name already taken for this state',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = City::findOrFail($id);

        $data->country_id=$requestedData['countryName'];
        $data->state_id=$requestedData['stateName'];
        $data->city_name=$requestedData['cityName'];
        $data->save();

		$data1['msg'] = 'City Updated Successfully.';
        return response()->json($data1);
	}

	public function status($id1,$id2)
      {
          $data = City::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=City::findOrFail($id);
		$country=Country::where('status','1')->get();
		$data1=State::where('status','1')->get();
		return view('admin.city.edit',compact('data','data1','country'));
	}


    public function destroy($id)
    {
        $data = City::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }

}
