<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\State;
use Auth;
use Validator;

use DataTables;

class StateController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    {

         $datas = State::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('country_id', function(State $data) {
                				$getName=$data->country_id;
                				$country_name=Country::where('id',$getName)->first();
                				if(empty($country_name)){
                				    return 'Not Found';
                				}
                				return $country_name->country_name;
                				
                  				})
                			->addColumn('status', function(State $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-state-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-state-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(State $data) {
                                return '<div class="action-list"><a href="' . route('admin-state-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-state-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['country_id','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

	public function datatables1()
    {

         $datas = Country::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('country_name', function(Country $data) {
                				return $data->country_name;
                  				})
							->addColumn('country_code ', function(Country $data) {
                				return $data->country_code;
                  				})
                			->addColumn('status', function(Country $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-state-country',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-state-country',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->rawColumns(['country_name','country_code','status',])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.state.index');
	}
	public function index1(){
		return view('admin.state.index1');
	}

	public function create(){
		$data=Country::where('status','1')->get();
		return view('admin.state.create',compact('data'));
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'countryName' => 'required',
			'stateName' => 'required|unique:states,state_name,NULL,id,country_id,'.$request->input('countryName'),

		];

		$customs=[
			'countryName.required'  => 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
			'stateName.unique'      => 'State Name already taken for this country',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new State;

        $data->country_id=$requestedData['countryName'];
        $data->state_name=$requestedData['stateName'];
        $data->save();

		$data1['msg'] = 'New State Added Successfully.';
        return response()->json($data1);

	}


	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'countryName' => 'required',
			'stateName' => 'required|unique:states,state_name,NULL,id,country_id,'.$id,

		];

		$customs=[
			'countryName.required'  => 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
			'stateName.unique'      => 'State Name already taken for this country',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = State::findOrFail($id);

        $data->country_id=$requestedData['countryName'];
        $data->state_name=$requestedData['stateName'];
        $data->save();

		$data1['msg'] = 'State Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = State::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }
	  public function status1($id1,$id2)
      {
          $data = Country::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=State::findOrFail($id);
		$data1=Country::where('status','1')->get();
		return view('admin.state.edit',compact('data','data1'));
	}


    public function destroy($id)
    {
        $data = State::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }

}
