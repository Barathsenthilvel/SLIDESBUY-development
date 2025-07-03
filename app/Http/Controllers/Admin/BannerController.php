<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Banner;
use Auth;
use Validator;

use DataTables;

class BannerController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}



	public function datatables()
    {

         $datas = Banner::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('position', function(Banner $data) {
                				$getPosition=$data->position;
                				switch ($getPosition) {
                					case "1":
                					return 'Main Position';
                					break;
                				}
                  				})
                			->addColumn('status', function(Banner $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-banner-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-banner-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Banner $data) {
                                return '<div class="action-list"><a href="' . route('admin-banner-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-banner-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['position','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }



	public function index(){

		return view('admin.banner.index');
	}

	public function create(){

		return view('admin.banner.create');
	}

	public function store(Request $request){
	    	    
		$requestedData=$request->all(); 
		$rules=[

			'bannerName' => 'required|unique:banners,banner_name,'.$request->input('bannerName'),
			'position' => 'required',
			'bannerImage' => 'required|max:1024',
			'mobileImage' => 'required|max:1024',

		];

		$customs=[
			'bannerName.required'  => 'Banner Name should be filled',
			'bannerName.unique'    => 'Banner Name already taken',
			'position.required'    => 'Position should be filled',
			'bannerImage.required' => 'Banner Image should be filled',
			'mobileImage.required' => 'Mobile Image should be filled',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        
        
        if ($file = $request->file('bannerImage')) 
        {      
          $bannerFile = time().$file->getClientOriginalName();
          $file->move(public_path().'/assets/media/banner',$bannerFile);
          $bannerImage = $bannerFile; 
      }
        
        if ($file = $request->file('mobileImage')) 
        {      
          $mobileFile = time().$file->getClientOriginalName();
          $file->move(public_path().'/assets/media/banner',$mobileFile);
          $mobileImage = $mobileFile; 
      }

        $data = new Banner;

        $data->banner_name=$requestedData['bannerName'];
        $data->position=$requestedData['position'];
        $data->web_image=$bannerImage;
        $data->mobile_image=$mobileImage;
        $data->banner_title=$requestedData['bannerTitle'];
        $data->banner_link=$requestedData['bannerLink'];
        $data->sorting_order=$requestedData['sortOrder'];
        $data->save();

		$data1['msg'] = 'New Banner Added Successfully.';
        return response()->json($data1);

	}


	public function update(Request $request,$id){
		$requestedData=$request->all();
		$rules=[

			'bannerName' => 'required|unique:banners,banner_name,'.$id,
			'position' => 'required',
			'bannerImage' => 'sometimes|required|max:1024',
			'mobileImage' => 'sometimes|required|max:1024',

		];

		$customs=[
			'bannerName.required'  => 'Banner Name should be filled',
			'bannerName.unique'    => 'Banner Name already taken',
			'position.required'    => 'Position should be filled',
			'bannerImage.required' => 'Banner Image should be filled',
			'bannerImage.max' 	   => 'Banner Image max size 1 mb',
			'mobileImage.required' => 'Mobile Image should be filled',
			'mobileImage.max' 	   => 'Mobile Image max size 1 mb',
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
        
        $data = Banner::findOrFail($id);
        
         if ($file = $request->file('bannerImage')) 
        {      
          $bannerFile = time().$file->getClientOriginalName();
          $file->move(public_path().'/assets/media/banner',$bannerFile);
          $bannerImage = $bannerFile; 
      }else{
          $bannerImage = $data['web_image'];
          
      }
        
        if ($file = $request->file('mobileImage')) 
        {      
          $mobileFile = time().$file->getClientOriginalName();
          $file->move(public_path().'/assets/media/banner',$mobileFile);
          $mobileImage = $mobileFile; 
      }else{
          $mobileImage=$data['mobile_image'];
      }
        $data->banner_name=$requestedData['bannerName'];
        $data->position=$requestedData['position'];
        $data->web_image=$bannerImage;
        $data->mobile_image=$mobileImage;
        $data->banner_title=$requestedData['bannerTitle'];
        $data->banner_link=$requestedData['bannerLink'];
        $data->sorting_order=$requestedData['sortOrder'];
        $data->save();

		$data1['msg'] = 'Banner Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = Banner::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=Banner::findOrFail($id);
		return view('admin.banner.edit',compact('data'));
	}


    public function destroy($id)
    {
        $data = Banner::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data1['msg'] = 'Data Deleted Successfully.';
        return response()->json($data1);
        //--- Redirect Section Ends
    }


    public function cropimage(Request $request){
        $data = $request->image;
        $image_array_1 = explode(";", $data);
        $image_array_2 = explode(",", $image_array_1[1]);
        $data = base64_decode($image_array_2[1]);
        $imageName = time() . '.png';
        file_put_contents(public_path().'/assets/media/banner/'.$imageName, $data);
    if($request->id !== "0"){
        $Banner = Banner::findOrFail($request->id);
        if($request->table_colum === 'bannerImage'){
            if($Banner->web_image != null){ 
                if (file_exists(public_path().'/assets/media/banner/'.$Banner->web_image)) {
                    unlink(public_path().'/assets/media/banner/'.$Banner->web_image);
                }
            }
            $Banner->web_image = $imageName;
            $Banner->update();
        }elseif($request->table_colum === 'mobileImage'){
            if($Banner->mobile_image != null){ 
                if (file_exists(public_path().'/assets/media/banner/'.$Banner->mobile_image)) {
                    unlink(public_path().'/assets/media/banner/'.$Banner->mobile_image);
                }
            }
            $Banner->mobile_image = $imageName;
            $Banner->update();
        }
      }
    return ['Name'=>$imageName];
  }


}
