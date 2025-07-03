<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\MapGroup;
use Auth;
use Validator;
use DataTables;

class MapGroupController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}

	public function datatables()
    {

         $datas = MapGroup::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('group_name', function(MapGroup $data) {
                				$getName=$data->group_name;
                				$group_name=AttributeGroup::where('id',$getName)->first();
                				if($group_name) return $group_name->attribute_group_name;
                				return "";
                				
                  				})
                			->addColumn('status', function(MapGroup $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-mapgroup-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-mapgroup-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(MapGroup $data) {
                                return '<div class="action-list"><a href="' . route('admin-mapgroup-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-mapgroup-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['group_name','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }


	public function index(){
		return view('admin.mapgroup.index');
	}

	public function create(){
	    $ids = MapGroup::pluck('group_name')->toArray();
	   // dd($ids);
		$groupName=AttributeGroup::where('status','1')->whereNotIn('id', $ids)->get();
		
		$attribute=Attribute::where('status','1')->get();
		return view('admin.mapgroup.create',compact('groupName','attribute'));
	}

	public function store(Request $request){
		$requestedData=$request->all();
		$attributeName=(array_key_exists('attributeName', $requestedData) ? $requestedData['attributeName']:'');
		$attributeFilter=(array_key_exists('attributeFilter',$requestedData) ? $requestedData['attributeFilter']:'');
		$attributeFront=(array_key_exists('attributeFront', $requestedData) ? $requestedData['attributeFront']:'');
		$attributePrice=(array_key_exists('attributePrice', $requestedData) ? $requestedData['attributePrice']:'');
		$attributeSort=(array_key_exists('attributeSort', $requestedData) ? array_filter($requestedData['attributeSort'],'is_numeric'):'');
		
		$attributeName = (array_key_exists('attributeName', $requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeName):'');
		$attributeFilter = (array_key_exists('attributeFilter',$requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeFilter):'');
		$attributeFront = (array_key_exists('attributeFront', $requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeFront):'');
		$attributePrice = (array_key_exists('attributePrice', $requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributePrice):'');
		$attributeSort = (array_key_exists('attributeSort', $requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeSort):'');

		$attributeName=(array_key_exists('attributeName', $requestedData) ? implode(",",$attributeName):'');
		$attributeFilter=(array_key_exists('attributeFilter',$requestedData) ? implode(",",$attributeFilter):'');
		$attributeFront=(array_key_exists('attributeFront', $requestedData) ? implode(",",$attributeFront):'');
		$attributePrice=(array_key_exists('attributePrice', $requestedData) ? implode(",",$attributePrice):'');
		$attributeSort=(array_key_exists('attributeSort', $requestedData) ? implode(",",$attributeSort):'');

		$rules=[

			'groupName' 	=> 'required|unique:map_groups,group_name',
			'attributeName'	=> 'required|array'

		];

		$customs=[
			'groupName.required'  		=> 'Group Name should be filled',
			'groupName.unique'     		=> 'Group Name already taken',
			'attributeName.required'  	=> 'Attribute should be filled',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }


        $data = new MapGroup;
        $data->group_name=$requestedData['groupName'];
        $data->attribute=$attributeName;
        $data->filter= $attributeFilter;
        $data->front=$attributeFront;
        $data->combined_price=$attributePrice;
        $data->sort_order=$attributeSort;
        $data->save();
    	

		$data1['msg'] = 'New Map Group Added Successfully.';
        return response()->json($data1);

	}


	public function update(Request $request,$id){
		$requestedData=$request->all();
		$attributeName=(array_key_exists('attributeName', $requestedData) ? $requestedData['attributeName']:'');
		$attributeFilter=(array_key_exists('attributeFilter',$requestedData) ? $requestedData['attributeFilter']:'');
		$attributeFront=(array_key_exists('attributeFront', $requestedData) ? $requestedData['attributeFront']:'');
		$attributePrice=(array_key_exists('attributePrice', $requestedData) ? $requestedData['attributePrice']:'');
		$attributeSort=(array_key_exists('attributeSort', $requestedData) ? array_filter($requestedData['attributeSort'],'is_numeric'):'');
		
		$attributeName = (array_key_exists('attributeName', $requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeName):'');
		$attributeFilter = (array_key_exists('attributeFilter',$requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeFilter):'');
		$attributeFront = (array_key_exists('attributeFront', $requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeFront):'');
		$attributePrice = (array_key_exists('attributePrice', $requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributePrice):'');
		$attributeSort = (array_key_exists('attributeSort', $requestedData) ? array_map(function($v){
    		return (is_null($v)) ? "" : $v;},$attributeSort):'');

		$attributeName=(array_key_exists('attributeName', $requestedData) ? implode(",",$attributeName):'');
		$attributeFilter=(array_key_exists('attributeFilter',$requestedData) ? implode(",",$attributeFilter):'');
		$attributeFront=(array_key_exists('attributeFront', $requestedData) ? implode(",",$attributeFront):'');
		$attributePrice=(array_key_exists('attributePrice', $requestedData) ? implode(",",$attributePrice):'');
		$attributeSort=(array_key_exists('attributeSort', $requestedData) ? implode(",",$attributeSort):'');

		$rules=[

			'groupName' 	=> 'required|unique:map_groups,group_name,'.$id,
			'attributeName'	=> 'required|array'

		];

		$customs=[
			'groupName.required'  		=> 'Group Name should be filled',
			'groupName.unique'     		=> 'Group Name already taken',
			'attributeName.required'  	=> 'Attribute should be filled',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = MapGroup::findOrFail($id);
		$data->group_name=$requestedData['groupName'];
        $data->attribute=$attributeName;
        $data->filter= $attributeFilter;
        $data->front=$attributeFront;
        $data->combined_price=$attributePrice;
        $data->sort_order=$attributeSort;
        $data->save();

		$data1['msg'] = 'Map Group Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = MapGroup::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id)
      {
		$data=MapGroup::findOrFail($id);
		$ids = MapGroup::where('id','!=',$id)->pluck('group_name')->toArray();
		$groupName=AttributeGroup::where('status','1')->whereNotIn('id', $ids)->get();
		$attribute=Attribute::where('status','1')->get();
		return view('admin.mapgroup.edit',compact('groupName','attribute','data'));
	  }


    public function destroy($id)
    {
        $data = MapGroup::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }

}
