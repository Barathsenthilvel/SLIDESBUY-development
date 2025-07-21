<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Models\Review;
use App\Models\Discount;
use App\Models\Storeconfiguration;
use App\Models\Order;

class ProductController extends Controller{

    public function __construct()
    {

    }

    public function product(Request $Request,$Category=null,$subcategory=null){

        $Cate=null;
        $subcate=null;
        if(!empty($Category)){
            $Cate = Category::where('id',$Category)->firstOrFail();
        }
        if(!empty($subcategory)){
            $subcate = Category::where('id',$subcategory)->firstOrFail();
        }

        $product = Product::when($Cate, function($query,$Cate){
            return $query->where('category',$Cate->id);
        })
        ->when($subcate,function($query,$subcate){
            return $query->where('sub_category',$subcate->id);
        })->get();
    }

public function item(Request $Request,$slug){
          $store = Storeconfiguration::where('id',1)->first();
        $date = today()->format('Y-m-d');
        $product = Product::where('slug',$slug)->where('status',1)->first();
        // dd($product);
        $Review = Review::where('product_id',$product->id)->orderBy('id','desc')->get();
        if(Auth::check()){
            $reviewed = Review::where('product_id',$product->id)->where('user_id',Auth::user()->id)->get();
        }else{
            $reviewed = Review::where('product_id',$product->id)->get();
        }
        $Discount = Discount::where('status',1)->where('product','LIKE',"%{$product->id}%")->where('expiry_date', '>=', $date)->first();
        if($store->out_of_stock == 0){
        $relateproduct =  Product::where('status',1)->wherein('id',\explode(",",$product->related_products))->where('minquantity','>=','quantity')->orWhere('quantity','unlimited')->get();
        $similarproduct = Product::where('status',1)->wherein('id',\explode(",",$product->similar_products))->where('minquantity','>=','quantity')->orWhere('quantity','unlimited')->get();
        }else{
        $relateproduct =  Product::where('status',1)->wherein('id',\explode(",",$product->related_products))->get();
        $similarproduct = Product::where('status',1)->wherein('id',\explode(",",$product->similar_products))->get();
        }

        return view('front.product',compact('product','Review','Discount','reviewed','relateproduct','similarproduct'));
    }
        public function quickview($id){
        $date = today()->format('Y-m-d');
        $product = Product::where('id',$id)->where('status',1)->first();
        $Review = Review::where('product_id',$id)->get();
        if(Auth::check()){
            $reviewed = Review::where('product_id',$id)->where('user_id',Auth::user()->id)->get();
        }else{
            $reviewed = Review::where('product_id',$id)->get();
        }
        $Discount = Discount::where('status',1)->where('product','LIKE',"%{$id}%")->where('expiry_date', '>=', $date)->first();
        return view('front.includes.quickview',compact('product','Review','Discount','reviewed'));
    }
    public function review(Request $Request){
        $Review = new Review();
        $Review->fill($Request->all())->save();
        return true;
    }
    public function reviewinorder(Request $Request,Order $order){
        $cart = unserialize(bzdecompress(utf8_decode($order->card)));
        $Review = new Review();
        $Review->vendor_id = $cart->singleorder[0]->vendor;
        $Review->fill($Request->all());
        $Review->order_id = $order->id;
        $Review->user_id = Auth::user()->id;
        $Review->save();
        return redirect()->back();
    }
    public function loadreview($id){
        $Review = Review::where('product_id',$id)->get();
        if(Auth::check()){
            $reviewed = Review::where('product_id',$id)->where('user_id',Auth::user()->id)->get();
        }else{
            $reviewed = Review::where('product_id',$id)->get();
        }
        return view('front.includes.review',compact('Review','reviewed'));
    }

    public function likeCount(Request $request){
        $userid=$request['userid'];
        $prodid=$request['prodid'];
        $product=Product::where('id',$prodid)->first();
        $likes=explode(',',$product->product_likes);
        $likes=array_filter($likes);
        $count=count($likes);
        if($count == 0){
            $product->product_likes=$userid;
            $product->save();
            return response()->json(['data'=>'1']);
        }
        if($count > 0){
            if(in_array($userid,$likes)){
            $likes=array_diff($likes,(array)$userid);
            $product->product_likes=implode(',',$likes);
            $product->save();
            $likes=array_filter($likes);
            $dataCount=count($likes);
            return response()->json(['data'=>$dataCount]);
            }else{
            array_push($likes,$userid);
            $product->product_likes=implode(',',$likes);
            $product->save();
            $likes=array_filter($likes);
            $dataCount=count($likes);
            return response()->json(['data'=>$dataCount]);

            }
        }
    }

     public function coffeeproduct(Request $request, $slug)
    {

        $store = Storeconfiguration::where('id', 1)->first();
        $date = today()->format('Y-m-d');

        $product = Product::where('slug',$slug)->where('status',1)->first();

        if (!$product) {
            abort(404, 'Product not found');
        }

        $Review = Review::where('product_id', $product->id)->orderBy('id', 'desc')->get();

        if (Auth::check()) {
            $reviewed = Review::where('product_id', $product->id)
                              ->where('user_id', Auth::id())
                              ->get();
        } else {
            $reviewed = Review::where('product_id', $product->id)->get();
        }

        $Discount = Discount::where('status', 1)
                            ->where('product', 'LIKE', "%{$product->id}%")
                            ->where('expiry_date', '>=', $date)
                            ->first();

        if ($store->out_of_stock == 0) {
            $relateproduct = Product::where('status', 1)
                ->whereIn('id', explode(",", $product->related_products))
                ->where(function ($q) {
                    $q->whereColumn('minquantity', '>=', 'quantity')
                      ->orWhere('quantity', 'unlimited');
                })->get();

            $similarproduct = Product::where('status', 1)
                ->whereIn('id', explode(",", $product->similar_products))
                ->where(function ($q) {
                    $q->whereColumn('minquantity', '>=', 'quantity')
                      ->orWhere('quantity', 'unlimited');
                })->get();
        } else {
            $relateproduct = Product::where('status', 1)
                ->whereIn('id', explode(",", $product->related_products))
                ->get();

            $similarproduct = Product::where('status', 1)
                ->whereIn('id', explode(",", $product->similar_products))
                ->get();
            if(!is_null($product->category))
            {

            $similarproduct = Product::where('status', 1)
                ->whereIn('category', explode(",", $product->category))
                ->get();
            }
        }

        return view('front.coffeeproducts', compact(
            'product',
            'Review',
            'Discount',
            'reviewed',
            'relateproduct',
            'similarproduct'
        ));
    }

}
