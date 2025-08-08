<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Attribute;
use App\Models\AttributeGroup;
use App\Models\MapGroup;
use App\Models\Category;
use App\Models\Vendor;
use App\Models\Tax;
use App\Models\Storeconfiguration;
use DB;
use Auth;
use Validator;

use Illuminate\Support\Str;
use DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:webadmin');
    }

    public function datatables(Request $request)
    {
        $search=[];
        $columns=$request->columns;
        $order  = $request->order;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }
        if(Auth::user()->is_vendor != null){
            $datas = Product::where('vendor',Auth::user()->is_vendor);
        }else{
            $datas = Product::where('vendor','=',null);
        }
        $recordsTotal = $datas->get()->count();

        $datas1 = $datas->when($search[1],function($query,$search){
            return $query->where('product_title','LIKE',"%{$search}%");
        })
        ->when($search[3],function($query,$search){
            return $query->whereRaw("FIND_IN_SET('$search',REPLACE(`category`,'|',','))");
        })
        ->when($search[4],function($query,$search){
            return $query->whereBetween('manufacturerPrice',$search);
        })
        ->when($search[5],function($query,$search){
            $search = \explode('-',$search);
            $search = (empty($search[1]))?$search[0]:$search[1];
            return $query->where('product_sku','like',"%{$search}%");
        })
        ->when($search[6],function($query,$search){
            $search = \explode('-',$search);
            $search = (empty($search[1]))?$search[0]:$search[1];
            return $query->where('manufacturerCode','like',"%{$search}%");
        })
        ->when($search[7],function($query,$search){
            return $query->where('vendor','=',$search);
        })
        ->when($search[8],function($query,$search){
            return $query->where('soldout','=',$search);
        })
        ->when($search[10],function($query,$search){
            return $query->where('status','=',$search);
        })
        ->when($order,function($query,$order){
            if($order[0]['column'] == 0){
                return $query->orderBy('id',$order[0]['dir']);
            }elseif($order[0]['column'] == 1){
                return $query->orderBy('product_title',$order[0]['dir']);
            }elseif($order[0]['column'] == 4){
                return $query->orderBy('manufacturerPrice',$order[0]['dir']);
            }elseif($order[0]['column'] == 5){
                return $query->orderBy('product_sku',$order[0]['dir']);
            }elseif($order[0]['column'] == 6){
                return $query->orderBy('manufacturerCode',$order[0]['dir']);
            }elseif($order[0]['column'] == 7){
                return $query->orderBy('vendor',$order[0]['dir']);
            }elseif($order[0]['column'] == 8){
                return $query->orderBy('soldout',$order[0]['dir']);
            }elseif($order[0]['column'] == 9){
                return $query->orderBy('quantity',$order[0]['dir']);
            }elseif($order[0]['column'] == 10){
                return $query->orderBy('status',$order[0]['dir']);
            }
        })->get();
        $recordsFiltered = count($datas1);

        $datas = $datas->when($search[1],function($query,$search){
            return $query->where('product_title','LIKE',"%{$search}%");
        })
        ->when($search[3],function($query,$search){
            return $query->whereRaw("FIND_IN_SET('$search',REPLACE(`category`,'|',','))");
        })
        ->when($search[4],function($query,$search){
            return $query->whereBetween('manufacturerPrice',$search);
        })
        ->when($search[5],function($query,$search){
            $search = \explode('-',$search);
            $search = (empty($search[1]))?$search[0]:$search[1];
            return $query->where('product_sku','like',"%{$search}%");
        })
        ->when($search[6],function($query,$search){
            $search = \explode('-',$search);
            $search = (empty($search[1]))?$search[0]:$search[1];
            return $query->where('manufacturerCode','like',"%{$search}%");
        })
        ->when($search[7],function($query,$search){
            return $query->where('vendor','=',$search);
        })
        ->when($search[8],function($query,$search){
            return $query->where('soldout','=',$search);
        })
        ->when($search[10],function($query,$search){

            return $query->where('status','=',$search);
        })
        ->when($order,function($query,$order){
            if($order[0]['column'] == 0){
                return $query->orderBy('id',$order[0]['dir']);
            }elseif($order[0]['column'] == 1){
                return $query->orderBy('product_title',$order[0]['dir']);
            }elseif($order[0]['column'] == 4){
                return $query->orderBy('manufacturerPrice',$order[0]['dir']);
            }elseif($order[0]['column'] == 5){
                return $query->orderBy('product_sku',$order[0]['dir']);
            }elseif($order[0]['column'] == 6){
                return $query->orderBy('manufacturerCode',$order[0]['dir']);
            }elseif($order[0]['column'] == 7){
                return $query->orderBy('vendor',$order[0]['dir']);
            }elseif($order[0]['column'] == 8){
                return $query->orderBy('soldout',$order[0]['dir']);
            }elseif($order[0]['column'] == 9){
                return $query->orderBy('quantity',$order[0]['dir']);
            }elseif($order[0]['column'] == 10){
                return $query->orderBy('status',$order[0]['dir']);
            }
        })->skip($request->start)->take($request->length)->get();
        foreach ($datas as $key => $value) {
            $datas[$key]->edit = route('admin-product-edit',$value->id);
            $datas[$key]->delete = route('admin-product-delete',$value->id);
            $datas[$key]->img_src = asset('/assets/media/products/'.$value->image1);
            $datas[$key]->manufacturerCode = $value->Manufacturer();
            $datas[$key]->vendor = $value->vendor();
            $datas[$key]->category = $value->getcategorys();
            $datas[$key]->temp_status = ['1'=>route('admin-product-status',['id1' => $value->id, 'id2' => 1]),'0'=>route('admin-product-status',['id1' => $value->id, 'id2' => 0])];
        }
        return response()->json(['data'=>$datas,'recordsFiltered'=>$recordsFiltered,'recordsTotal'=>$recordsTotal]);

    }
    public function datatables2(Request $request)
    {
        $search=[];
        $columns=$request->columns;
        $order  = $request->order;
        foreach($columns as $colum){
            $search[] = $colum['search']['value'];
        }
        if(Auth::user()->is_vendor != null){
            $datas = Product::where('vendor',Auth::user()->is_vendor);
        }else{
            $datas = Product::where('vendor','!=',null);
        }
        // $datas = Product::where('vendor','!=',null);
        $recordsTotal = $datas->get()->count();

        $datas1 = $datas->when($search[1],function($query,$search){
            return $query->where('product_title','LIKE',"%{$search}%");
        })
        ->when($search[3],function($query,$search){
            return $query->whereRaw("FIND_IN_SET('$search',REPLACE(`category`,'|',','))");
        })
        ->when($search[4],function($query,$search){
            return $query->whereBetween('manufacturerPrice',$search);
        })
        ->when($search[5],function($query,$search){
            $search = \explode('-',$search);
            $search = (empty($search[1]))?$search[0]:$search[1];
            return $query->where('product_sku','like',"%{$search}%");
        })
        ->when($search[6],function($query,$search){
            $search = \explode('-',$search);
            $search = (empty($search[1]))?$search[0]:$search[1];
            return $query->where('manufacturerCode','like',"%{$search}%");
        })
        ->when($search[7],function($query,$search){
            return $query->where('vendor','=',$search);
        })
        ->when($search[8],function($query,$search){
            return $query->where('soldout','=',$search);
        })
        ->when($search[10],function($query,$search){
            return $query->where('status','=',$search);
        })
        ->when($order,function($query,$order){
            if($order[0]['column'] == 0){
                return $query->orderBy('id',$order[0]['dir']);
            }elseif($order[0]['column'] == 1){
                return $query->orderBy('product_title',$order[0]['dir']);
            }elseif($order[0]['column'] == 4){
                return $query->orderBy('manufacturerPrice',$order[0]['dir']);
            }elseif($order[0]['column'] == 5){
                return $query->orderBy('product_sku',$order[0]['dir']);
            }elseif($order[0]['column'] == 6){
                return $query->orderBy('manufacturerCode',$order[0]['dir']);
            }elseif($order[0]['column'] == 7){
                return $query->orderBy('vendor',$order[0]['dir']);
            }elseif($order[0]['column'] == 8){
                return $query->orderBy('soldout',$order[0]['dir']);
            }elseif($order[0]['column'] == 9){
                return $query->orderBy('quantity',$order[0]['dir']);
            }elseif($order[0]['column'] == 10){
                return $query->orderBy('status',$order[0]['dir']);
            }
        })->get();
        $recordsFiltered = count($datas1);

        $datas = $datas->when($search[1],function($query,$search){
            return $query->where('product_title','LIKE',"%{$search}%");
        })
        ->when($search[3],function($query,$search){
            return $query->whereRaw("FIND_IN_SET('$search',REPLACE(`category`,'|',','))");
        })
        ->when($search[4],function($query,$search){
            return $query->whereBetween('manufacturerPrice',$search);
        })
        ->when($search[5],function($query,$search){
            $search = \explode('-',$search);
            $search = (empty($search[1]))?$search[0]:$search[1];
            return $query->where('product_sku','like',"%{$search}%");
        })
        ->when($search[6],function($query,$search){
            $search = \explode('-',$search);
            $search = (empty($search[1]))?$search[0]:$search[1];
            return $query->where('manufacturerCode','like',"%{$search}%");
        })
        ->when($search[7],function($query,$search){
            return $query->where('vendor','=',$search);
        })
        ->when($search[8],function($query,$search){
            return $query->where('soldout','=',$search);
        })
        ->when($search[10],function($query,$search){
            $search = ($search == "D")?0:1;
            return $query->where('status','=',$search);
        })
        ->when($order,function($query,$order){
            if($order[0]['column'] == 0){
                return $query->orderBy('id',$order[0]['dir']);
            }elseif($order[0]['column'] == 1){
                return $query->orderBy('product_title',$order[0]['dir']);
            }elseif($order[0]['column'] == 4){
                return $query->orderBy('manufacturerPrice',$order[0]['dir']);
            }elseif($order[0]['column'] == 5){
                return $query->orderBy('product_sku',$order[0]['dir']);
            }elseif($order[0]['column'] == 6){
                return $query->orderBy('manufacturerCode',$order[0]['dir']);
            }elseif($order[0]['column'] == 7){
                return $query->orderBy('vendor',$order[0]['dir']);
            }elseif($order[0]['column'] == 8){
                return $query->orderBy('soldout',$order[0]['dir']);
            }elseif($order[0]['column'] == 9){
                return $query->orderBy('quantity',$order[0]['dir']);
            }elseif($order[0]['column'] == 10){
                return $query->orderBy('status',$order[0]['dir']);
            }
        })->skip($request->start)->take($request->length)->get();
        foreach ($datas as $key => $value) {
            $datas[$key]->edit = route('admin-productv-edit',$value->id);
            $datas[$key]->delete = route('admin-productv-delete',$value->id);
            $datas[$key]->img_src = asset('/assets/media/products/'.$value->image1);
            $datas[$key]->manufacturerCode = $value->Manufacturer();
            $datas[$key]->vendor = $value->vendor();
            $datas[$key]->category = $value->getcategorys();
            $datas[$key]->temp_status = ['1'=>route('admin-productv-status',['id1' => $value->id, 'id2' => 1]),'0'=>route('admin-productv-status',['id1' => $value->id, 'id2' => 0])];
        }
        return response()->json(['data'=>$datas,'recordsFiltered'=>$recordsFiltered,'recordsTotal'=>$recordsTotal]);
    }

    public function index(){
        $cate=Category::all();
		return view('admin.product.index',compact('cate'));
       }
       public function index2(){
        $cate=Category::all();
        $vendor = Vendor::all();
		return view('admin.product.index2',compact('cate','vendor'));
       }

    public function attributeGroup(Request $request){
        $getName = $request->route()->getName();
        if($getName == 'admin-product-group'){ $list = 'admin-product'; $list2 = 'admin-product-create'; }
        else { $list = 'admin-productv2'; $list2 = 'admin-productv-create'; }
    	$attributeGroup = AttributeGroup::where('status','1')->get();
		return view('admin.product.attribute',compact('attributeGroup','list','list2'));
       }

     public function create(Request $request){
        $getName = $request->route()->getName();
        $pricing_type = Storeconfiguration::orderBy('id','desc')->pluck('pricing_type')->first();
        if($getName == 'admin-product-create') $list = 'admin-product';
        else $list = 'admin-productv2';
        $Product_last = Product::orderBy('id', 'DESC')->first();
     	$attributeTemplate=$request['radios2'];
     	$processGroup=[];
        $rules=[
            'radios2'     => 'required',
        ];
        $customs=[
            'radios2.required'      => 'Product Type should be filled',
        ];

        $validator = Validator::make($request->all(), $rules,$customs);

        if ($validator->fails()) {
          return redirect()->back()->withErrors($validator->getMessageBag()->toArray());
        }

    	$attributeGroup = Attribute::where('status','1')->get();
    	$tax = Tax::where('status','1')->get();
    	$category = Category::where('status','1')->where('parent_category_id','0')->get();
        $data=Category::where('status','1')->where('parent_category_id','!=','0')->get();
        $similarProduct=Product::where('status','1')->get();
        $relatedProduct=Product::where('status','1')->get();
        $vendor = Vendor::where('status','1')->get();

        if($attributeTemplate > 0){
     	$mapGroup=MapGroup::where('status','1')->where('group_name',$attributeTemplate)->get();

     	if(count($mapGroup) > 0){
     	$attribute=explode(",",$mapGroup[0]->attribute);
     	foreach($attribute as $attribute){
     		$processGroup[$attribute]=Attribute::where('status','1')->where('id',$attribute)->get();
     	}
     	}

		return view('admin.product.create',compact('attributeGroup','processGroup','category','attributeTemplate','tax','data','similarProduct','relatedProduct','vendor','Product_last','list','pricing_type'));
        }

        return view('admin.product.create',compact('attributeGroup','category','attributeTemplate','tax','data','similarProduct','relatedProduct','vendor','Product_last','list','pricing_type'));

       }

    //  public function store(Request $request){

    //     dd($request->all());

    //     $attributeValues=[];
    //     $requestData=$request->all();
    //     $attributeTemplate=$requestData['attributeTemplate'] ?? 0;
    //  	$rules=[
    //  		'category'     => 'required',
    //  		'basePrice'     => 'nullable',
    //  		'skuCode'     => 'required|unique:products,product_sku,'.$request->input('skuCode'),
	// 		'productTitle' => 'required|unique:products,product_title,'.$request->input('productTitle'),
    //         'image1' => 'required',
    //         'productDescription' =>'required',
    //         'attributeTemplate'   => 'required|numeric',
	// 	];

	// 	$customs=[
	// 		'category.required' 	         => 'Category should be filled',
	// 		'basePrice.required' 	         => 'Base Price should be filled',
	// 		'skuCode.required' 	 	         => 'SKU  Code should be filled',
	// 		'skuCode.unique'               => 'SKU  Code should be unique',
    //         'productTitle.required'          => 'Product Name should be filled',
	// 		'productTitle.unique'            => 'Product Name already taken',
	// 		'image1.required'                => 'Image 1 should be filled',
    //         'productDescription.required'    => 'Product Description should be filled',
	// 	];

	// 	$validator = Validator::make($request->all(), $rules,$customs);

    //     if ($validator->fails()) {
    //         $subCategory=Category::where('parent_category_id',$request->input('category'))->where('status','1')->get();
    //       return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
    //     }
    //     $image1 = $request->image1;
    //     $image2 = $request->image2;
    //     $image3 = $request->image3;
    //     $image4 = $request->image4;
    //     $image5 = $request->image5;

    //    if($attributeTemplate > 0){
    //         $attributes = $request['attributes'];
    //         $attributeValues = [];

    //         if(is_array($attributes)){
    //         foreach($attributes as $key =>$value){
    //             if(is_array($value)){
    //                 $attributeValues[]=$key.'-'.implode(',',$value);
    //             }else{
    //                 $getType=Attribute::findOrFail($key);
    //                 $getAttri=$getType->attribute_values;
    //                 if($getType->attribute_type == 2){
    //                     if(empty($getAttri)){
    //                         $getType->attribute_values=strip_tags($value);
    //                         $getType->save();
    //                     }else{
    //                     if(in_array(strip_tags($value),explode(',',$getAttri))){

    //                     }else{
    //                         $getType->attribute_values=$getAttri.','.strip_tags($value);
    //                         $getType->save();
    //                     }
    //                     $attributeValues[]=$key.'-'.$value;

    //                 }}else{
    //                     if(empty($getAttri)){
    //                         $getType->attribute_values=$value;
    //                         $getType->save();
    //                     }else{
    //                     if(in_array($value,explode(',',$getAttri))){

    //                     }else{
    //                         $getType->attribute_values=$getAttri.','.$value;
    //                         $getType->save();
    //                     }
    //                     $attributeValues[]=$key.'-'.$value;
    //                 }

    //                 }
    //             }
    //         }
    //         }
    //         $attribute_value=implode('|',$attributeValues);
    //          }
    //     $data=new Product;
    //     $data->category=(empty($requestData['category']))?'':implode('|',(array)$requestData['category']);
    //     $data->product_title=$requestData['productTitle'];
    //     $data->slug = Str::slug($data->product_title,'-');
    //     $data->product_base_price=$requestData['basePrice'];
    //     $data->product_sku=$requestData['skuCode'];
    //     $data->attribute_values=($attributeTemplate >0)?$attribute_value:'';
    //     $data->tax=$requestData['tax'];
    //     $data->weight=$requestData['weight'];
    //     $data->weight_unit=$requestData['weightUnit'];
    //     $data->product_description=$requestData['productDescription'];
    //     $data->trending=(isset($requestData['trending']))?'on':'off';
    //     $data->metadescription=$requestData['metadescription'];
    //     $data->metakeyword=$requestData['metakeyword'];
    //     $data->quantity=($requestData['quantity'] == "")?'unlimited':$requestData['quantity'];
    //     $data->minquantity=$requestData['minquantity'];
    //     $data->soldout=(isset($requestData['soldout'])?'on':'off');
    //     $data->metaname=$requestData['metaname'];
    //     $data->delivery_date=$requestData['deliveryDate'];
    //     $data->image1=$image1;
    //     $data->image2=$image2;
    //     $data->image3=$image3;
    //     $data->image4=$image4;
    //     $data->image5=$image5;
    //     $data->similar_products=(empty($requestData['similarProducts']))?'':implode(',',(array)$requestData['similarProducts']);
    //     $data->related_products=(empty($requestData['relatedProducts']))?'':implode(',',(array)$requestData['relatedProducts']);
    //     $data->user_id=Auth::user()->id;
    //     $data->attribute_map=$requestData['attributeTemplate'];
    //     $data->vendor = $requestData['vendor'];
    //     $data->manufacturerPrice = $requestData['manufacturerPrice'];
    //     $data->manufacturerCode = $requestData['manufacturerCode'];
    //     $data->markup = $requestData['markup'];
    //     $data->mrp = $requestData['mrp'];
    //     $data->mark_type = $requestData['mark_type'];
    //     $data->shipping_price = $requestData['shipping_price'];
    //     $data->save();

    //     $data1['msg'] = 'New product Added Successfully.';
    // return response()->json($data1);
    //   }

    public function download(Product $product)
    {
        dd($product);
        // Check if the user is authorized to download (e.g., based on ownership or purchase)
        if (!Auth::check() || !$this->authorizeDownload($product)) {
            abort(403, 'Unauthorized');
        }

        // Check if the file exists
        $filePath = $product->document; // e.g., 'documents/filename.pdf'
        if (!Storage::disk('public')->exists($filePath)) {
            abort(404, 'File not found');
        }

        // Serve the file for download
        return Storage::disk('public')->download($filePath, $product->product_title . '.' . pathinfo($filePath, PATHINFO_EXTENSION));
    }
    public function store(Request $request){
        \Log::info('Product Attributes:', [
            'all_request' => $request->all(),
            'attributes' => $request->input('attributes', [])
        ]);
    $attributeValues = [];
    $requestData = $request->all();

    // COMMENTED: Attribute template logic
    // $attributeTemplate = $requestData['attributeTemplate'];

    $rules = [
        'category'         => 'required',
        'basePrice'        => 'nulable',
        'skuCode'          => 'required|unique:products,product_sku,' . $request->input('skuCode'),
        'productTitle'     => 'required|unique:products,product_title,' . $request->input('productTitle'),
        'image1'           => 'required',
        'document' => 'required|file|mimes:pdf,ppt,pptx|max:10240',
        'productDescription' => 'required'
    ];

    $customs = [
        'category.required'         => 'Category should be filled',
        'basePrice.required'        => 'Base Price should be filled',
        'skuCode.required'          => 'SKU  Code should be filled',
        'skuCode.unique'            => 'SKU  Code should be unique',
        'productTitle.required'     => 'Product Name should be filled',
        'productTitle.unique'       => 'Product Name already taken',
        'document.required' => 'Document should be uploaded',
            'document.mimes' => 'Document must be a PDF or PPT/PPTX file',
            'document.max' => 'Document size must not exceed 10MB',
        'image1.required'           => 'Image 1 should be filled',
        'productDescription.required' => 'Product Description should be filled',
    ];

    $validator = Validator::make($request->all(), $rules, $customs);

    if ($validator->fails()) {
        $subCategory = Category::where('parent_category_id', $request->input('category'))
                               ->where('status', '1')
                               ->get();
        return response()->json(['errors' => $validator->getMessageBag()->toArray()]);
    }

    // Handle document upload
        $documentPath = null;
        if ($request->hasFile('document')) {
            $file = $request->file('document');
            $documentPath = $file->store('documents', 'public'); // Store in storage/app/public/documents
        }



    $image1 = $request->image1;
    $image2 = $request->image2;
    $image3 = $request->image3;
    $image4 = $request->image4;
    $image5 = $request->image5;

    // Process attributes
    $attributes = $request['attributes'] ?? [];
    $attributeValues = [];

    if (is_array($attributes)) {
        foreach ($attributes as $key => $value) {
            $getType = Attribute::find($key);
            if (!$getType) continue;

            if (is_array($value)) {
                // Handle multiple values (e.g. tags)
                $cleanValues = array_map('trim', $value);
                $attributeValues[] = $key . '-' . implode(',', $cleanValues);

                // Update attribute's available values if needed
                $existingValues = array_filter(explode(',', $getType->attribute_values ?? ''));
                $newValues = array_diff($cleanValues, $existingValues);
                if (!empty($newValues)) {
                    $allValues = array_merge($existingValues, $newValues);
                    $getType->attribute_values = implode(',', array_unique($allValues));
                    $getType->save();
                }
            } else {
                // Handle single value
                $cleanValue = trim($value);
                if (!empty($cleanValue)) {
                    $attributeValues[] = $key . '-' . $cleanValue;

                    // Update attribute's available values if needed
                    $existingValues = array_filter(explode(',', $getType->attribute_values ?? ''));
                    if (!in_array($cleanValue, $existingValues)) {
                        $existingValues[] = $cleanValue;
                        $getType->attribute_values = implode(',', array_unique($existingValues));
                        $getType->save();
                    }
                }
            }
        }
    }

    $attribute_value = !empty($attributeValues) ? implode('|', $attributeValues) : '';

    // Process attributes first
    $attributeValues = [];
    if (isset($requestData['attributes']) && is_array($requestData['attributes'])) {
        foreach ($requestData['attributes'] as $attrId => $value) {
            if (is_array($value)) {
                // Handle multiple values (checkboxes, multiselect)
                $attributeValues[] = $attrId . '-' . implode(',', $value);
            } else {
                // Handle single values
                if (!empty($value)) {
                    $attributeValues[] = $attrId . '-' . $value;
                }
            }
        }
    }

    $data = new Product;
    $data->category = (empty($requestData['category'])) ? '' : implode('|', (array)$requestData['category']);
    $data->product_title = $requestData['productTitle'];
    $data->slug = Str::slug($data->product_title, '-');
    $data->product_base_price = '';
    $data->product_sku = $requestData['skuCode'];
    $data->attribute_values = !empty($attributeValues) ? implode('|', $attributeValues) : '';
    $data->tax = '';
    $data->weight = '';
    $data->weight_unit = $requestData['weightUnit'];
    $data->product_description = $requestData['productDescription'];
    $data->trending = (isset($requestData['trending'])) ? 'on' : 'off';
    $data->metadescription = $requestData['metadescription'];
    $data->metakeyword = $requestData['metakeyword'];
    $data->quantity ='';
    $data->minquantity = '';
    $data->soldout = (isset($requestData['soldout'])) ? 'on' : 'off';
    $data->metaname = $requestData['metaname'];
    $data->delivery_date = '';
    $data->image1 = $image1;
    $data->image2 = $image2;
    $data->image3 = $image3;
    $data->image4 = $image4;
    $data->image5 = $image5;
    $data->document = $documentPath;
    $data->similar_products = (empty($requestData['similarProducts'])) ? '' : implode(',', (array)$requestData['similarProducts']);
    $data->related_products = (empty($requestData['relatedProducts'])) ? '' : implode(',', (array)$requestData['relatedProducts']);
    $data->user_id = Auth::user()->id;
    $data->attribute_map = ''; // Removed template map
    $data->vendor = $requestData['vendor'];
    $data->manufacturerPrice = '';
    $data->manufacturerCode ='';
    $data->markup = '';
    $data->mrp = '';
    $data->mark_type = '';
    $data->shipping_price = '';
    $data->save();

    return response()->json(['msg' => 'New product Added Successfully.']);
}



      public function edit($id,Request $request){
        $getName = $request->route()->getName();
        if($getName == 'admin-product-edit') $list = 'admin-product';
        else $list = 'admin-productv2';
        $attributeValues=[];
        $attributeValues1=[];
        $product=Product::findOrFail($id);
        $product->category = explode("|",$product->category);
        $attributeTemplate=$product->attribute_map;
        $subCategory=$product->category;
        $processGroup=[];
        $attributeGroup = Attribute::where('status','1')->get();
        $tax = Tax::where('status','1')->get();
        $data=Category::where('status','1')->where('parent_category_id',$subCategory)->get();
        $category = Category::where('status','1')->where('parent_category_id','0')->get();
        $similarProduct=Product::where('status','1')->where('id','!=',$id)->get();
        $relatedProduct=Product::where('status','1')->where('id','!=',$id)->get();
        $vendor = Vendor::where('status','1')->get();


        if($attributeTemplate > 0){
        $mapGroup=MapGroup::where('status','1')->where('group_name',$attributeTemplate)->first();
            if($mapGroup){
            $attribute=explode(",",$mapGroup->attribute);
                foreach($attribute as $attribute){
                    $processGroup[$attribute]=Attribute::where('status','1')->where('id',$attribute)->get();
                }
            }
        $attriputesCombined=explode('|',$product->attribute_values);
        foreach($attriputesCombined as $key => $attriputesCombined){
            $attributeValues[]=explode('-',$attriputesCombined);
            $attributeValues1[]=$attributeValues[$key][0];
            // array_shift($attributeValues[$key]);
            // $attributeValues2[]=explode(',',$attributeValues[$key][0]);
        }
        $attributeValues3=array_combine($attributeValues1, $attributeValues);
        // dd($attributeValues3);
        return view('admin.product.edit',compact('attributeGroup','processGroup','category','attributeTemplate','tax','attributeTemplate','data','product','attributeValues3','similarProduct','relatedProduct','vendor','list'));

        }

        return view('admin.product.edit',compact('attributeGroup','category','attributeTemplate','tax','attributeTemplate','data','product','similarProduct','relatedProduct','vendor','list'));

       }

       public function update(Request $request,$id){
        $attributeValues=[];
        $requestData=$request->all();
        // $attributeTemplate=$requestData['attributeTemplate'];
        $rules=[
            'category'     => 'required',
            'basePrice'     => 'nullable',
            'skuCode'     => 'required|unique:products,product_sku,'.$id,
            'productTitle' => 'required|unique:products,product_title,'.$id,
            'image1' => 'required',
            'productDescription' =>'required'
        ];

        $customs=[
            'category.required'              => 'Category should be filled',
            'basePrice.required'             => 'Base Price should be filled',
            'skuCode.required'               => 'SKU  Code should be filled',
            'skuCode.unique'               => 'SKU  Code should be unique',
            'productTitle.required'          => 'Product Name should be filled',
            'productTitle.unique'            => 'Product Name already taken',
            'image1.required'                => 'Image 1 should be filled',
            'productDescription.required'    => 'Product Description should be filled',
        ];


        $validator = Validator::make($request->all(), $rules,$customs);

        if ($validator->fails()) {
            $subCategory=Category::where('parent_category_id',$request->input('category'))->where('status','1')->get();
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data=Product::findOrFail($id);

        $image1 = $request->image1;
        $image2 = $request->image2;
        $image3 = $request->image3;
        $image4 = $request->image4;
        $image5 = $request->image5;
/*
       if($attributeTemplate > 0){
            $attributes = $request['attributes'];
            $attributeValues = [];
            if(is_array($attributes)){
                foreach($attributes as $key =>$value){
                    if(is_array($value)){
                        $attributeValues[]=$key.'-'.implode(',',$value);
                    }else{
                        $getType=Attribute::findOrFail($key);
                        $getAttri=$getType->attribute_values;
                        if($getType->attribute_type == 2){
                            if(empty($getAttri)){
                                $getType->attribute_values=strip_tags($value);
                                $getType->save();
                            }else{
                            if(in_array(strip_tags($value),explode(',',$getAttri))){

                            }else{
                                $getType->attribute_values=$getAttri.','.strip_tags($value);
                                $getType->save();
                            }
                            $attributeValues[]=$key.'-'.$value;

                        }}else{
                            if(empty($getAttri)){
                                $getType->attribute_values=$value;
                                $getType->save();
                            }else{
                            if(in_array($value,explode(',',$getAttri))){

                            }else{
                                $getType->attribute_values=$getAttri.','.$value;
                                $getType->save();
                            }
                            $attributeValues[]=$key.'-'.$value;
                        }

                        }
                    }
                }
            }
            $attribute_value=implode('|',$attributeValues);
        }
        */
        $data->category=(empty($requestData['category']))?'':implode('|',(array)$requestData['category']);
        $data->product_title=$requestData['productTitle'];
        $data->slug = Str::slug($data->product_title,'-');
        $data->product_base_price=$requestData['basePrice'];
        $data->product_sku=$requestData['skuCode'];
        $data->attribute_values=($attributeTemplate > 0)?$attribute_value:'';
        $data->tax=$requestData['tax'];
        $data->weight=$requestData['weight'];
        $data->weight_unit=$requestData['weightUnit'];
        $data->product_description=$requestData['productDescription'];
        $data->trending = (isset($requestData['trending']))?$requestData['trending']:'off';
        $data->metadescription=$requestData['metadescription'];
        $data->metakeyword=$requestData['metakeyword'];
        $data->quantity=($requestData['quantity'] == "")?'unlimited':$requestData['quantity'];
        $data->minquantity=$requestData['minquantity'];
        $data->soldout=(isset($requestData['soldout'])?$requestData['soldout']:'off');
        $data->delivery_date=$requestData['deliveryDate'];
        $data->metaname=$requestData['metaname'];
        $data->image1=$image1;
        $data->image2=$image2;
        $data->image3=$image3;
        $data->image4=$image4;
        $data->image5=$image5;
        $data->similar_products=(empty($requestData['similarProducts']))?'':implode(',',(array)$requestData['similarProducts']);
        $data->related_products=(empty($requestData['relatedProducts']))?'':implode(',',(array)$requestData['relatedProducts']);
        $data->user_id=Auth::user()->id;
        // $data->attribute_map=$requestData['attributeTemplate'];
        $data->attribute_map = '';
        $data->vendor = $requestData['vendor'];
        $data->manufacturerPrice = $requestData['manufacturerPrice'];
        $data->manufacturerCode = $requestData['manufacturerCode'];
        $data->markup = $requestData['markup'];
        $data->mrp = $requestData['mrp'];
        $data->mark_type = $requestData['mark_type'];
        $data->shipping_price = $requestData['shipping_price'];
        $data->update();

        $data1['msg'] = 'Product Updated Successfully.';
        return response()->json($data1);
      }


      public function status($id1,$id2)
      {
          $data = Product::findOrFail($id1);
          $data->status = $id2;
          $data->update();
      }

      public function destroy($id)
    {
        $data = Product::findOrFail($id);

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
            file_put_contents(public_path().'/assets/media/products/'.$imageName, $data);
        if($request->id !== "0"){
            $Product = Product::findOrFail($request->id);
            if($request->table_colum === 'image1'){
                if($Product->image1 != null){
                    if (file_exists(public_path().'/assets/media/products/'.$Product->image1)) {
                        unlink(public_path().'/assets/media/products/'.$Product->image1);
                    }
                }
                $Product->image1 = $imageName;
                $Product->update();
            }elseif($request->table_colum === 'image2'){
                if($Product->image2 != null){
                    if (file_exists(public_path().'/assets/media/products/'.$Product->image2)) {
                        unlink(public_path().'/assets/media/products/'.$Product->image2);
                    }
                }
                $Product->image2 = $imageName;
                $Product->update();
            }elseif($request->table_colum === 'image3'){
                if($Product->image3 != null){
                    if (file_exists(public_path().'/assets/media/products/'.$Product->image3)) {
                        unlink(public_path().'/assets/media/products/'.$Product->image3);
                    }
                }
                $Product->image3 = $imageName;
                $Product->update();
            }elseif($request->table_colum === 'image4'){
                if($Product->image4 != null){
                    if (file_exists(public_path().'/assets/media/products/'.$Product->image4)) {
                        unlink(public_path().'/assets/media/products/'.$Product->image4);
                    }
                }
                $Product->image4 = $imageName;
                $Product->update();

            }elseif($request->table_colum === 'image5'){
                if($Product->image5 != null){
                    if (file_exists(public_path().'/assets/media/products/'.$Product->image5)) {
                        unlink(public_path().'/assets/media/products/'.$Product->image5);
                    }
                }
                $Product->image5 = $imageName;
                $Product->update();
            }
        }
        return ['Name'=>$imageName];
    }

}
