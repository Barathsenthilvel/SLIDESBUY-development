<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Role;
use App\Models\Permission;
use App\Models\AdminMenu;
use App\Models\Module;
use Auth;
use Validator;

use DataTables;

class PermissionController extends Controller
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
                                return '<div class="action-list"><a href="' . route('admin-permission-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-permission-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){

        return view('admin.permission.index');
    }

    public function edit($id){
        $data=Role::findOrFail($id);
        $menuAttributes=AdminMenu::with('menuModule')->where('status','1')->orderBy('sort_order','ASC')->get();
        return view('admin.permission.edit',compact('data','menuAttributes'));
    }

    public function update(Request $request,$id){
        $data = Role::findOrFail($id);
        $input = $request->all();
        $data->user_permission=implode(',',$input['attributes']);
        $data->save();
        $msg = 'Permission Updated Successfully.';
        return redirect()->back()->with('msg',$msg);
    }


    public function destroy($id)
    {
        $data = Role::findOrFail($id);
        $data->user_permission='';
        $data->save();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return redirect()->back()->with('msg',$msg);
        //--- Redirect Section Ends
    }

}
