<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Blog;
use Auth;
use Validator;

use DataTables;

class BlogController extends Controller
{
    public function __construct() 
		{
		  $this->middleware('auth:webadmin');
		}



	public function datatables()
    {

         $datas = Blog::orderBy('id','desc')->get();
         //--- Integrating This Collection Into Datatables
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('status', function(Blog $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-blog-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-blog-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                            ->addColumn('action', function(Blog $data) {
                                return '<div class="action-list"><a href="' . route('admin-blog-edit',$data->id) . '"> <i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-blog-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            }) 
                            ->rawColumns(['position','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }



	public function index(){

		return view('admin.blog.index');
	}

	public function create(){

		return view('admin.blog.create');
	}

	public function store(Request $request){
		$requestedData=$request->all(); 
		if(array_key_exists("home_flag",$requestedData)){
		    $requestedData['home_flag']=1;
		}else{
		    $requestedData['home_flag']=0;
		}
		$rules=[

			'blog_url' => 'required',
			'blog_type' => 'required',
			'blog_content' => 'required'

		];

		$customs=[
			'blog_url.required'  => 'Blog Url should be filled',
			'blog_type.required'    => 'Blog Type should be filled',
			'blog_content.required' => 'Blog Content should be filled'
		];

		$validator = Validator::make($request->all(), $rules,$customs);
        
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = new Blog;

        $data->blog_url=$requestedData['blog_url'];
        $data->blog_type=$requestedData['blog_type'];
        $data->blog_image=$requestedData['blog_image'];
        $data->blog_video=$requestedData['blog_video'];
        $data->blog_content=$requestedData['blog_content'];
        $data->home_flag=$requestedData['home_flag'];
        $data->save();

		$data1['msg'] = 'New Blog Added Successfully.';
        return response()->json($data1);

	}


	public function update(Request $request,$id){
		$requestedData=$request->all(); 
		if(array_key_exists("home_flag",$requestedData)){
		    $requestedData['home_flag']=1;
		}else{
		    $requestedData['home_flag']=0;
		}
		
		$rules=[

			'blog_url' => 'required',
			'blog_type' => 'required',
			'blog_content' => 'required'

		];

		$customs=[
			'blog_url.required'  => 'Blog Url should be filled',
			'blog_type.required'    => 'Blog Type should be filled',
			'blog_content.required' => 'Blog Content should be filled'
		];
		$validator = Validator::make($request->all(), $rules,$customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
          }
        $data = Blog::findOrFail($id);

        $data->blog_url=$requestedData['blog_url'];
        $data->blog_type=$requestedData['blog_type'];
        $data->blog_image=$requestedData['blog_image'];
        $data->blog_video=$requestedData['blog_video'];
        $data->blog_content=$requestedData['blog_content'];
        $data->home_flag=$requestedData['home_flag'];
        $data->save();

		$data1['msg'] = 'Banner Updated Successfully.';
        return response()->json($data1);

	}

	public function status($id1,$id2)
      {
          $data = Blog::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }


    public function edit($id){
		$data=Blog::findOrFail($id);
		return view('admin.blog.edit',compact('data'));
	}


    public function destroy($id)
    {
        $data = Blog::findOrFail($id);

        $data->delete();
        //--- Redirect Section
        $data['msg'] = 'Data Deleted Successfully.';
        return response()->json($data);
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
        $Blog = Blog::findOrFail($request->id);
        if($request->table_colum === 'blog_image'){
            if($Blog->blog_image != null){ 
                if (file_exists(public_path().'/assets/media/banner/'.$Blog->blog_image)) {
                    unlink(public_path().'/assets/media/banner/'.$Blog->blog_image);
                }
            }
            $Blog->blog_image = $imageName;
            $Blog->update();
        
      }
      }
      return ['Name'=>$imageName];
    }


}
