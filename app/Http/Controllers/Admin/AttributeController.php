<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeType;
use Auth;
use Validator;

use DataTables;

class AttributeController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    {

         $datas = Attribute::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('attribute_type', function(Attribute $data) {
                				$getName=$data->attribute_type;
                				$attribute_type=AttributeType::where('id',$getName)->first();
                				return $attribute_type->attribute_type;
                				
                  				})
                			->addColumn('status', function(Attribute $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-attribute-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-attribute-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Attribute $data) {
                                return '<div class="action-list"><a href="' . route('admin-attribute-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-attribute-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['attribute_type','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.attribute.index');
	}

	public function create(){
		$data=AttributeType::where('status','1')->get();
		return view('admin.attribute.create',compact('data'));
	}

	public function store(Request $request){
		$requestedData=$request->all();
		$attributeValue=$requestedData['attributeValue'];
		$attributeUnit=$requestedData['attributeUnit'];
		$attributeIcons=$requestedData['attributeIcons'];
		$attributeSort=$requestedData['attributeSort'];
		
		$attributeValue = array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeValue);
		$attributeUnit = array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeUnit);
		$attributeIcons = array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeIcons);
		$attributeSort = array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeSort);
		$attributeValue=implode(",",$attributeValue);
		$attributeUnit=implode(",",$attributeUnit);
		$attributeIcons=implode(",",$attributeIcons);
		$attributeSort=implode(",",$attributeSort);

		$rules=[

			'attributeName' => 'required|unique:attributes,attribute_name,'.$request->input('attributeName'),
			'attributeType' => 'required',

		];

		$customs=[
			'attributeName.required'  => 'Attribute Name should be filled',
			'attributeName.unique'    => 'Attribute Name already taken',
			'attributeType.required'  => 'Mail Bcc should be filled'
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new Attribute;

        $data->attribute_name=$requestedData['attributeName'];
        $data->attribute_type=$requestedData['attributeType'];
        $data->data_type=$requestedData['dataType'];
        $data->attribute_values=$attributeValue;
        $data->attribute_units=$attributeUnit;
        $data->attribute_icons=$attributeIcons;
        $data->attribute_sort=$attributeSort;
        $data->units_display=(array_key_exists("unitDisplay", $requestedData))? $requestedData['unitDisplay']:0;
        $data->icons_display=(array_key_exists("iconDisplay", $requestedData))? $requestedData['iconDisplay']:0;
    	$data->save();
		$data1['msg'] = 'New Attribute Added Successfully.';
        return response()->json($data1);

	}

	public function update(Request $request,$id){
		$requestedData=$request->all();
		$attributeValue=$requestedData['attributeValue'];
		$attributeUnit=$requestedData['attributeUnit'];
		$attributeIcons=$requestedData['attributeIcons'];
		$attributeSort=$requestedData['attributeSort'];
		
		$attributeValue = array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeValue);
		$attributeUnit = array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeUnit);
		$attributeIcons = array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeIcons);
		$attributeSort = array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeSort);
		$attributeValue=implode(",",$attributeValue);
		$attributeUnit=implode(",",$attributeUnit);
		$attributeIcons=implode(",",$attributeIcons);
		$attributeSort=implode(",",$attributeSort);

		$rules=[

			'attributeName' => 'required|unique:attributes,attribute_name,'.$id,
			'attributeType' => 'required',

		];

		$customs=[
			'attributeName.required'  => 'Attribute Name should be filled',
			'attributeName.unique'    => 'Attribute Name already taken',
			'attributeType.required'  => 'Mail Bcc should be filled'
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Attribute::findOrFail($id);

        $data->attribute_name=$requestedData['attributeName'];
        $data->attribute_type=$requestedData['attributeType'];
        $data->data_type=$requestedData['dataType'];
        $data->attribute_values=$attributeValue;
        $data->attribute_units=$attributeUnit;
        $data->attribute_icons=$attributeIcons;
        $data->attribute_sort=$attributeSort;
        $data->units_display=(array_key_exists("unitDisplay", $requestedData))? $requestedData['unitDisplay']:0;
        $data->icons_display=(array_key_exists("iconDisplay", $requestedData))? $requestedData['iconDisplay']:0;
    	$data->save();
		$data1['msg'] = 'Attribute Updated Successfully.';
        return response()->json($data1);
	}

	public function status($id1,$id2)
      {
          $data = Attribute::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=Attribute::findOrFail($id);
		$data1=AttributeType::where('status','1')->get();
		return view('admin.attribute.edit',compact('data','data1'));
	}


    public function destroy($id)
    {
        $data = Attribute::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }
}
