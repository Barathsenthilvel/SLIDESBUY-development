<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AttributeGroup;
use Auth;
use Validator;

use DataTables;

class AttributeGroupController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    {

         $datas = AttributeGroup::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('status', function(AttributeGroup $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-attributegroup-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-attributegroup-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(AttributeGroup $data) {
                                return '<div class="action-list"><a href="' . route('admin-attributegroup-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-attributegroup-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.attributegroup.index');
	}

	public function create(){
		return view('admin.attributegroup.create');
	}

	public function store(Request $request){
		$requestedData=$request->all();

		$rules=[

			'attributeGroupName' => 'required|unique:attribute_groups,attribute_group_name,'.$request->input('attributeGroupName'),

		];

		$customs=[
			'attributeGroupName.required'  => 'Attribute Group Name should be filled',
			'attributeGroupName.unique'    => 'Attribute Group Name already taken',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->getMessageBag()->toArray());
        }

        $data = new AttributeGroup;

        $data->attribute_group_name =$requestedData['attributeGroupName'];
        $data->attribute_description=$requestedData['descriptionGroup'];
        $data->attribute_sorting=$requestedData['attributeGroupSort'];
    	$data->save();
		$data1['msg'] = 'New Attribute Group Added Successfully.';
        return response()->json($data1);

	}

	public function update(Request $request,$id){
		$requestedData=$request->all();

		$rules=[

			'attributeGroupName' => 'required|unique:attribute_groups,attribute_group_name,'.$id,

		];

		$customs=[
			'attributeGroupName.required'  => 'Attribute Group Name should be filled',
			'attributeGroupName.unique'    => 'Attribute Group Name already taken',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->getMessageBag()->toArray());
        }

        $data = AttributeGroup::findOrFail($id);

        $data->attribute_group_name =$requestedData['attributeGroupName'];
        $data->attribute_description=$requestedData['descriptionGroup'];
        $data->attribute_sorting=$requestedData['attributeGroupSort'];
    	$data->save();
		$data1['msg'] = 'Attribute Group Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = AttributeGroup::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=AttributeGroup::findOrFail($id);
		return view('admin.attributegroup.edit',compact('data'));
	}


    public function destroy($id)
    {
        $data = AttributeGroup::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }
}
