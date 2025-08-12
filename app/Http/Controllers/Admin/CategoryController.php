<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use DB;
use Auth;
use Validator;

use DataTables;


class CategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:webadmin');
    }
    public function datatables()
    {
         $datas = Category::orderBy('id','desc')->get();
         return DataTables::of($datas)
                			->addIndexColumn()
                			->addColumn('parent_category_id', function(Category $data) {
                                $parent = $data->parent_category_id;
                                if($parent > 0){
                                  $parentData=Category::where('id',$parent)->first();
                                  return $parentData->category_name;
                                }
                                  return $data->category_name;

                            })
                      ->addColumn('status', function(Category $data) {
                                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->status == 1 ? 'selected' : '';
                                $ns = $data->status == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin-category-status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Activated</option><option data-val="0" value="'. route('admin-category-status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactivated</option>/select></div>';
                            })
                      ->addColumn('action', function(Category $data) {
                                return '<div class="action-list"><a href="' . route('admin-category-edit',$data->id) . '"><i class="fas fa-edit"></i>Edit</a><a href="' . route('admin-category-delete',$data->id) . '"  class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            })
                            ->rawColumns(['category_name','parent_category_id','status','action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    public function index(){
		return view('admin.category.index');
	}
    public function create(){
    $category=Category::with('subs')->where('status','1')->where('parent_category_id','0')->where('sub_category','0')->get();
		return view('admin.category.create',compact('category'));
	}
    public function edit($id){
		$data=Category::findOrFail($id);
    $category=Category::with(['subs'=> function ($query) use($id) {
        $query->where('id','!=',$id);
    }])->where('id','!=',$id)->where('status','1')->get();
		return view('admin.category.edit',compact('data','category'));
	}
    public function store(Request $request){
        $input = $request->all();

        // Validation rules - moved outside the if-else block
        $rules = [
            'category_name' => 'required|unique:categories,category_name',
            'parent_category_id' => 'required',
            'Category_url' => 'required|unique:categories,Category_url',
            'style_1' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'style_3' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hns_code' => 'nullable|string|max:50',
            'short_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'sort_order' => 'nullable|integer'
        ];

        $customs = [
            'category_name.required' => 'Category Name is required',
            'category_name.unique' => 'Category Name already exists',
            'parent_category_id.required' => 'Parent Category is required',
            'Category_url.required' => 'Category URL is required',
            'Category_url.unique' => 'Category URL already exists',
            'style_1.required' => 'Category Style1 image is required',
            'style_1.image' => 'Category Style1 must be an image file',
            'style_1.mimes' => 'Category Style1 must be a valid image format (jpeg, png, jpg, gif)',
            'style_1.max' => 'Category Style1 image size must not exceed 2MB',
            'style_3.required' => 'Category Style3 image is required',
            'style_3.image' => 'Category Style3 must be an image file',
            'style_3.mimes' => 'Category Style3 must be a valid image format (jpeg, png, jpg, gif)',
            'style_3.max' => 'Category Style3 image size must not exceed 2MB',
            'hns_code.max' => 'HSN Code must not exceed 50 characters',
            'meta_title.max' => 'Meta Title must not exceed 255 characters',
            'sort_order.integer' => 'Sorting Order must be a number'
        ];

        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        // Process parent category logic
        if($input['parent_category_id'] > 0){
            $parent = Category::findOrFail($input['parent_category_id']);
            if($parent->parent_category_id > 0){
                $input['parent_category_id'] = $parent->parent_category_id;
                $input['sub_category'] = $parent->id;
            } else {
                $input['parent_category_id'] = $parent->id;
                $input['sub_category'] = '0';
            }
        } else {
            $input['parent_category_id'] = '0';
            $input['sub_category'] = '0';
        }

        // Handle file uploads
        if ($file = $request->file('style_1')) {
            $bannerFile = time() . '_style1_' . $file->getClientOriginalName();
            $file->move(public_path().'/assets/media/banner', $bannerFile);
            $input['style_1'] = $bannerFile;
        }

        if ($file = $request->file('style_3')) {
            $bannerFile = time() . '_style3_' . $file->getClientOriginalName();
            $file->move(public_path().'/assets/media/banner', $bannerFile);
            $input['style_3'] = $bannerFile;
        }

        $input['category_banner'] = $request->category_banner;
        $input['mobile_image'] = $request->mobile_image;

        if(!array_key_exists('featured_collection', $input)){ 
            $input['featured_collection'] = 0; 
        }
        if(!array_key_exists('featured_category', $input)){ 
            $input['featured_category'] = 0; 
        }

        $Category = new Category();
        $Category->fill($input)->save();
        $data1['msg'] = 'Category Added Successfully.';
        return response()->json($data1);
    }

    public function update(Request $request, $id){
        $input = $request->all();

        // Validation rules for update
        $rules = [
            'category_name' => 'required|unique:categories,category_name,'.$id,
            'parent_category_id' => 'required',
            'Category_url' => 'required|unique:categories,Category_url,'.$id,
            'style_1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'style_3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'hns_code' => 'nullable|string|max:50',
            'short_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'sort_order' => 'nullable|integer'
        ];

        $customs = [
            'category_name.required' => 'Category Name is required',
            'category_name.unique' => 'Category Name already exists',
            'parent_category_id.required' => 'Parent Category is required',
            'Category_url.required' => 'Category URL is required',
            'Category_url.unique' => 'Category URL already exists',
            'style_1.image' => 'Category Style1 must be an image file',
            'style_1.mimes' => 'Category Style1 must be a valid image format (jpeg, png, jpg, gif)',
            'style_1.max' => 'Category Style1 image size must not exceed 2MB',
            'style_3.image' => 'Category Style3 must be an image file',
            'style_3.mimes' => 'Category Style3 must be a valid image format (jpeg, png, jpg, gif)',
            'style_3.max' => 'Category Style3 image size must not exceed 2MB',
            'hns_code.max' => 'HSN Code must not exceed 50 characters',
            'meta_title.max' => 'Meta Title must not exceed 255 characters',
            'sort_order.integer' => 'Sorting Order must be a number'
        ];

        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
        }

        // Process parent category logic
        if($input['parent_category_id'] > 0){
            $parent = Category::findOrFail($input['parent_category_id']);
            if($parent->parent_category_id > 0){
                $input['parent_category_id'] = $parent->parent_category_id;
                $input['sub_category'] = $parent->id;
            } else {
                $input['parent_category_id'] = $parent->id;
                $input['sub_category'] = '0';
            }
        } else {
            $input['parent_category_id'] = '0';
            $input['sub_category'] = '0';
        }

        $input['category_banner'] = $request->category_banner;
        $input['mobile_image'] = $request->mobile_image;

        $Category = Category::findOrFail($id);
        
        // Handle file uploads for update
        if ($file = $request->file('style_1')) {
            // Delete old file if exists
            if($Category->style_1 && file_exists(public_path().'/assets/media/banner/'.$Category->style_1)) {
                unlink(public_path().'/assets/media/banner/'.$Category->style_1);
            }
            $bannerFile = time() . '_style1_' . $file->getClientOriginalName();
            $file->move(public_path().'/assets/media/banner', $bannerFile);
            $input['style_1'] = $bannerFile;
        } else {
            $input['style_1'] = $Category['style_1'];
        }
        
        if ($file = $request->file('style_3')) {
            // Delete old file if exists
            if($Category->style_3 && file_exists(public_path().'/assets/media/banner/'.$Category->style_3)) {
                unlink(public_path().'/assets/media/banner/'.$Category->style_3);
            }
            $bannerFile = time() . '_style3_' . $file->getClientOriginalName();
            $file->move(public_path().'/assets/media/banner', $bannerFile);
            $input['style_3'] = $bannerFile;
        } else {
            $input['style_3'] = $Category['style_3'];
        }
        
        if(array_key_exists('featured_collection', $input)){ 
            $input['featured_collection'] = 1; 
        } else {
            $input['featured_collection'] = 0;
        }

        if(array_key_exists('featured_category', $input)){ 
            $input['featured_category'] = 1; 
        } else {
            $input['featured_category'] = 0;
        }
        
        $Category->fill($input)->save();
        $data1['msg'] = 'Category Updated Successfully.';
        return response()->json($data1);
    }
    public function status($id1,$id2)
    {
        $data = Category::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

    public function destroy($id)
    {
        $data = Category::findOrFail($id);

        $subCategory=Category::where('parent_category_id',$id)->count();
        $product=Product::where('category',$id)->orWhere('sub_category',$id)->count();
        if($subCategory > 0){
          $msg = 'Remove the subcategories first !';

          return redirect()->back()->with('msg',$msg);
        }

        if($product > 0){
          $msg = 'Remove the product first !';
          return redirect()->back()->with('msg',$msg);
        }

        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return redirect()->back()->with('msg',$msg);
        //--- Redirect Section Ends
    }

    public function getSubCategory(Request $request){
      $category=Category::where('parent_category_id',$request['id'])->where('status',1)->get();
      return response()->json($category);
    }

    public function cropimage(Request $request){
      $data = $request->image;
      $image_array_1 = explode(";", $data);
      $image_array_2 = explode(",", $image_array_1[1]);
      $data = base64_decode($image_array_2[1]);
      $imageName = time() . '.png';
      file_put_contents(public_path().'/assets/media/banner/'.$imageName, $data);
  if($request->id !== "0"){
      $Category = Category::findOrFail($request->id);
      if($request->table_colum === 'category_banner'){
          if($Category->category_banner != null){
              if (file_exists(public_path().'/assets/media/banner/'.$Category->category_banner)) {
                  unlink(public_path().'/assets/media/banner/'.$Category->category_banner);
              }
          }
          $Category->category_banner = $imageName;
          $Category->update();
      }elseif($request->table_colum === 'mobile_image'){
          if($Category->mobile_image != null){
              if (file_exists(public_path().'/assets/media/banner/'.$Category->mobile_image)) {
                  unlink(public_path().'/assets/media/banner/'.$Category->mobile_image);
              }
          }
          $Category->mobile_image = $imageName;
          $Category->update();
      }
    }
  return ['Name'=>$imageName];
}
}
