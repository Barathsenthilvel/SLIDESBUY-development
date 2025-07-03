<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerGroup;
use Auth;
use Validator;
use DataTables;
use DB;

class CustomerGroupController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    {

         $datas = CustomerGroup::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('rate', function(CustomerGroup $data) {
                                return ($data->type == 1)?$data->amount.' % ':$data->amount.' ₹';
                            })
                			->addColumn('status', function(CustomerGroup $data) {
                			    if($data->id > 2){
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-customergroup-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-customergroup-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                			    }
                            })
                            ->addColumn('action', function(CustomerGroup $data) {
                                if($data->id < 3){
                                    return '<div class="action-list"><a href="' . route('admin-customergroup-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a></div>';
                                }else{
                                    return '<div class="action-list"><a href="' . route('admin-customergroup-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-customergroup-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                                }
                            }) 
                            ->rawColumns(['rate','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.customergroup.index');
	}

	public function create(){
		return view('admin.customergroup.create');
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'title' => 'required|unique:customer_groups,title,'.$request->input('title'),
			'type' => 'required',
			'amount' => 'required',

		];

		$customs=[
			'title.required'  		=> 'Title should be filled',
			'title.unique'    		=> 'Title already taken',
			'type.required'  		=> 'Type should be filled',
			'amount.required'  		=> 'Amount should be filled',
		];

		$validator = Validator::make(Input::all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new CustomerGroup;
        $data->title=$requestedData['title'];
        $data->type=$requestedData['type'];
        $data->amount=$requestedData['amount'];
    	$data->save();
		$data1['msg'] = 'New Customer Group Added Successfully.';
        return response()->json($data1);

	}

	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'title' => 'required|unique:customer_groups,title,'.$id,
			'type' => 'required',
			'amount' => 'required',

		];

		$customs=[
			'title.required'  		=> 'Title should be filled',
			'title.unique'    		=> 'Title already taken',
			'type.required'  		=> 'Type should be filled',
			'amount.required'  		=> 'Amount should be filled',
		];
		$validator = Validator::make(Input::all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = CustomerGroup::findOrFail($id);
        $data->title=$requestedData['title'];
        $data->type=$requestedData['type'];
        $data->amount=$requestedData['amount'];
    	$data->save();
		$data1['msg'] = 'Customer Group Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = CustomerGroup::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=CustomerGroup::findOrFail($id);
		return view('admin.customergroup.edit',compact('data'));
	}


    public function destroy($id)
    {
        $data = CustomerGroup::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }
}