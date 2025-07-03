<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Module;
use Auth;
use Validator;
use DataTables;
use DB;

class ModuleController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    		{

         $datas = Module::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('status', function(Module $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-module-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-module-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Module $data) {
                                return '<div class="action-list"><a href="' . route('admin-module-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-module-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.modules.index');
	}

	public function create(){
		return view('admin.modules.create');
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'moduleName' => 'required|unique:modules,module_name',
			'modulePath' => 'required|unique:modules,module_path',

		];

		$customs=[
			'moduleName.required'  	=> 'Module Name should be filled',
			'moduleName.unique'    	=> 'Module Name already taken',
			'modulePath.required'  	=> 'Module Path should be filled',
			'modulePath.unique'    	=> 'Module Path already taken',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new Module;

        $data->module_name=$requestedData['moduleName'];
        $data->module_path=$requestedData['modulePath'];
    	$data->save();
		$data1['msg'] = 'New Module Added Successfully.';
        return response()->json($data1);

	}

	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'moduleName' => 'required|unique:modules,module_name,'.$id,
			'modulePath' => 'required|unique:modules,module_path,'.$id,

		];

		$customs=[
			'moduleName.required'  	=> 'Module Name should be filled',
			'moduleName.unique'    	=> 'Module Name already taken',
			'modulePath.required'  	=> 'Module Path should be filled',
			'modulePath.unique'    	=> 'Module Path already taken',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Module::findOrFail($id);

        $data->module_name=$requestedData['moduleName'];
        $data->module_path=$requestedData['modulePath'];
    	$data->save();
		$data1['msg'] = 'Module Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = Module::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=Module::findOrFail($id);
		return view('admin.modules.edit',compact('data'));
	}


    public function destroy($id)
    {
        $data = Module::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }
}
