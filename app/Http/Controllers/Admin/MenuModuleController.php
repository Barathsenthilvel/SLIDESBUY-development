<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminMenu;
use App\Models\Module;
use Auth;
use Validator;

use DataTables;
use DB;

class MenuModuleController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}
	public function datatables()
    {

         $datas = AdminMenu::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('status', function(AdminMenu $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-menu-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-menu-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(AdminMenu $data) {
                                return '<div class="action-list"><a href="' . route('admin-menu-module-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-menu-module-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){

		return view('admin.menumap.index');
	}

	public function edit($id){
		$data=AdminMenu::findOrFail($id);
		$data1=Module::with('getMenu')->where('status','1')->get();
		return view('admin.menumap.edit',compact('data','data1'));
	}

	public function update(Request $request,$id){

		$requestedData=$request->all();
        $menuId=AdminMenu::where('menu_name', $requestedData['menuName'])->first()->id;
        $getModules=Module::where('admin_menu_id',$menuId)->update(['sort_order'=>"0"]);
        // dd($getModules[0]);
		$moduleName=(array_key_exists('moduleName', $requestedData) ? $requestedData['moduleName']:'');
		$moduleSort=(array_key_exists('moduleSort', $requestedData) ? array_filter($requestedData['moduleSort'],'is_numeric'):'');


		$moduleName = (array_key_exists('moduleName', $requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$moduleName):'');
		$moduleSort = (array_key_exists('moduleSort', $requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$moduleSort):'');
        if(!empty($moduleName)){
        $arrayKey=array_keys($moduleName);
        $combinedSort=array_combine($arrayKey, $moduleSort);
        if(count($combinedSort) != count(array_unique($combinedSort))){
          return response()->json(["msg"=>"Duplicate values in Sort Order"]);

        }

         if(count($combinedSort) != count($moduleName)){
          return response()->json(["msg"=>"Sort Order missing"]);

        }   
        foreach($moduleName as $key =>$value){
		$data = Module::findOrFail($value);
        $data->admin_menu_id=$menuId;
        $data->sort_order=$combinedSort[$key];
        $data->save();
        }
        }
		$data1['msg'] = 'Menu Updated Successfully.';
        return response()->json($data1);
	}


	public function destroy($id)
    {
        $data = AdminMenu::findOrFail($id);
        $data->save();
        //--- Redirect Section
        $data1['msg']  = 'Data Deleted Successfully.';
         return response()->json($data1);
        //--- Redirect Section Ends
    }
}
