<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use Auth;
use Validator;

use DataTables;

class RoleController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}



	public function datatables()
    {

         $datas = Role::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('status', function(Role $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-role-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-role-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Role $data) {
                                return '<div class="action-list"><a href="' . route('admin-role-edit',$data->id) . '"> <i class="fas fa-edit"></i>Manage Permission</a><a href="' . route('admin-role-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){

		return view('admin.role.index');
	}

	public function create(){

		return view('admin.role.create');
	}

	public function store(Request $request){
        

		$rules = [
                  'roleName'   => 'required|unique:roles,role_name,'.$request->input('roleName')
                ];

        $customs = [
        			'roleName.required'    => 'Role field should be filled.',
            		'roleName.unique'      => 'Given role already taken',
        ];

        $validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new Role;
        $input = $request->all();
        $data->role_name=$input['roleName'];
        $data->save();

		$data1['msg'] = 'New Role Added Successfully.';
        return response()->json($data1);
	}

	public function edit($id){
		$data=Role::findOrFail($id);
		return view('admin.role.edit',compact('data'));
	}


	public function status($id1,$id2)
      {
          $data = Role::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


      public function update(Request $request,$id){
        

		$rules = [
                  'roleName'   => 'required|unique:roles,role_name,'.$id
                ];

        $customs = [
        			'roleName.required'    => 'Role field should be filled.',
            		'roleName.unique'      => 'Given role already taken',
        ];

        $validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Role::findOrFail($id);
        $input = $request->all();
        $data->role_name=$input['roleName'];
        $data->save();

		$data1['msg'] = 'Role Updated Successfully.';
        return response()->json($data1);
	}

  public function destroy($id)
    {
        $Admin = Admin::where('role_id',$id)->get();
        if(!$Admin->isEmpty()){
			$data1['msg'] = 'Change Vendor Roles first ';
        	return response()->json($data1);
		}else{
        $data = Role::findOrFail($id);
        // $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
		}
    }

}
