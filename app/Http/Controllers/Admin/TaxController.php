<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tax;
use App\Models\Country;
use App\Models\State;
use Auth;
use Validator;

use App\Models\Product;
use DataTables;
use DB;

class TaxController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    {

         $datas = Tax::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('status', function(Tax $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-tax-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-tax-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('rate', function(Tax $data) {
                                if($data->tax_type ==1){
									return $data->tax_rate.' %';
								}else{
									return $data->tax_rate.' ₹';
								}
                            })
                            ->addColumn('action', function(Tax $data) {
                                return '<div class="action-list"><a href="' . route('admin-tax-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-tax-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.tax.index');
	}

	public function create(){
		$country=Country::where('status',1)->get();
		return view('admin.tax.create',compact('country'));
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'taxName' => 'required|unique:taxes,tax_name,'.$request->input('taxName'),
			'taxType' => 'required',
			'taxRate' => 'required',
			'countryName' => 'required',
			'stateName' => 'required',

		];

		$customs=[
			'taxName.required'  	=> 'Tax Name should be filled',
			'taxName.unique'    	=> 'Tax Name already taken',
			'taxType.required'  	=> 'Tax Type should be filled',
			'taxRate.required'  	=> 'Tax Rate should be filled',
			'countryName.required'  => 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new Tax;

        $data->tax_name=$requestedData['taxName'];
        $data->tax_description=$requestedData['taxDescription'];
        $data->tax_type=$requestedData['taxType'];
        $data->tax_rate=$requestedData['taxRate'];
        $data->tax_country=$requestedData['countryName'];
        $data->tax_states=$requestedData['stateName'];
    	$data->save();
		$data1['msg'] = 'New Tax Added Successfully.';
        return response()->json($data1);

	}

	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'taxName' => 'required|unique:taxes,tax_name,'.$id,
			'taxType' => 'required',
			'taxRate' => 'required',
			'countryName' => 'required',
			'stateName' => 'required',

		];

		$customs=[
			'taxName.required'  	=> 'Tax Name should be filled',
			'taxName.unique'    	=> 'Tax Name already taken',
			'taxType.required'  	=> 'Tax Type should be filled',
			'taxRate.required'  	=> 'Tax Rate should be filled',
			'countryName.required'  => 'Country Name should be filled',
			'stateName.required'  	=> 'State Name should be filled',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Tax::findOrFail($id);

        $data->tax_name=$requestedData['taxName'];
        $data->tax_description=$requestedData['taxDescription'];
        $data->tax_type=$requestedData['taxType'];
        $data->tax_rate=$requestedData['taxRate'];
        $data->tax_country=$requestedData['countryName'];
        $data->tax_states=$requestedData['stateName'];
    	$data->save();
		$data1['msg'] = 'Tax Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = Tax::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$country=Country::where('status',1)->get();
    	$state=DB::table('states')->where('status',1)->get();
		$data=Tax::findOrFail($id);
		return view('admin.tax.edit',compact('data','country','state'));
	}


    public function destroy($id)
    {
       $Product = Product::where('tax',$id)->get();
		if(!$Product->isEmpty()){
			$data1['msg'] = 'Remove Product first';
        	return response()->json($data1);
		}else{
			$data = Tax::findOrFail($id);
			$data->delete();
			//--- Redirect Section
			$data1['msg'] = 'Data Deleted Successfully.';
			return response()->json($data1);
			//--- Redirect Section Ends
		}
    }
    public function template(Request $request)
    {
		$Country  = Country::findOrFail($request->id);
        $State = State::where('country_id',$request->id)->where('status','1')->get();
        return view('admin.tax.template',compact('State','Country'))->render();
    }
}
