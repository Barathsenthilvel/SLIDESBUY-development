<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdminMenu;
use Auth;
use Validator;
use Illuminate\Support\Facades\Request as Input;
use DataTables;
use DB;

class AdminMenuController extends Controller
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
                                return '<div class="action-list"><a href="' . route('admin-menu-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-menu-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.adminMenu.index');
	}

	public function create(){
		return view('admin.adminMenu.create');
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'menuName' => 'required|unique:admin_menus,menu_name',
			'sortOrder' => 'required|unique:admin_menus,sort_order',

		];

		$customs=[
			'menuName.required'  	=> 'Menu Name should be filled',
			'menuName.unique'    	=> 'Menu Name already taken',
			'sortOrder.required'  	=> 'Sort Order should be filled',
			'sortOrder.unique'    	=> 'Sort Order already taken',
		];

		$validator = Validator::make($request->all(), $rules,$customs);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new AdminMenu;

        $data->menu_name=$requestedData['menuName'];
        $data->sort_order=$requestedData['sortOrder'];
    	$data->save();
		$data1['msg'] = 'New Menu Added Successfully.';
        return response()->json($data1);

	}

	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'menuName' => 'required|unique:admin_menus,menu_name,'.$id,
			'sortOrder' => 'required|unique:admin_menus,sort_order,'.$id,

		];

		$customs=[
			'menuName.required'  	=> 'Menu Name should be filled',
			'menuName.unique'    	=> 'Menu Name already taken',
			'sortOrder.required'  	=> 'Sort Order should be filled',
			'sortOrder.unique'    	=> 'Sort Order already taken',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = AdminMenu::findOrFail($id);

        $data->menu_name=$requestedData['menuName'];
        $data->sort_order=$requestedData['sortOrder'];
    	$data->save();
		$data1['msg'] = 'Menu Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = AdminMenu::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=AdminMenu::findOrFail($id);
		return view('admin.adminMenu.edit',compact('data'));
	}


    public function destroy($id)
    {
        $data = AdminMenu::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }
}
