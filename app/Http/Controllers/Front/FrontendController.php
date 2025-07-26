<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Homeslider;
use App\Models\Category;
use App\Models\Product;
use App\Models\Discount;
use App\Models\Homecat;
use App\Models\Attribute;
use App\Http\Controllers\Admin\HomecatController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\HomesliderController;
use Illuminate\Support\Collection;
use App\Models\MailTemplate;
use App\Mail\ContactMails;
use App\Models\Storeconfiguration;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Subscribes;
use Validator;

use App\Models\User;
use App\Models\Order;
use App\Mail\OrderMail;

class FrontendController extends Controller
{
    public function index(){
        //  $store = Storeconfiguration::where('id',1)->first();
        // $SavedOreder = Order::where('order_id','1673698831136020675')->get();
        // $ordersID = [];
        //             foreach($SavedOreder as $Order){
        //                 $ordersID[] = $store->OrderIDPrefix.sprintf('%03d',$Order->id);
        //             }
        //             foreach($SavedOreder as $Order){
        //                 $error = "";
        //                 try{
        //                     $card = unserialize(bzdecompress(utf8_decode($Order->card)));
        //                      $mailTemplates = MailTemplate::where('template_name',4)->where('status','1')->first();
        //                         $mailContents=[
        //                             'title'=>$mailTemplates->subject_mail,
        //                             'body'=>$mailTemplates->content_mail,
        //                             'footer'=>$mailTemplates->footer_mail];
        //                     Mail::to($Order->email)->bcc($mailTemplates->bcc_mail)->send(new OrderMail($Order,$card,$mailContents,$ordersID));
        //                 } catch(\Exception $e){
        //                     $error = $e;
        //                     dd($e);
        //                 }
        //                 break;
        //             }

        $store = Storeconfiguration::where('id',1)->first();

        $discountProducts=[];
        $HomecatController = new HomecatController();
        $Homecat = $HomecatController->gethomeCategory();
        $Homecat2 = $HomecatController->gethomeCategory2();
        $Homecat3 = $HomecatController->gethomeCategory3();
        $HomesliderController = new HomesliderController();
        $homeProduct = $HomesliderController->gethomeslider();
        $DiscountController = new DiscountController();
        $discount = $DiscountController->getDiscountProduct();
        $Homeslider = Homeslider::where('status','1')->get();
        if($store->out_of_stock == 0){
          $Product = Product::where('status','1')->where('soldout','off')->get();
          $trending = Product::where('status','1')->where('trending','on')->where('soldout','off')->orderBy('id','desc')->limit('4')->get();
        }else{
          $Product = Product::where('status','1')->get();
          $trending = Product::where('status','1')->where('trending','on')->orderBy('id','desc')->limit('4')->get();
        }
        // dd($Homecat);
        $fronCategory= Category::where('status',1)->where('parent_category_id',0)->get();
        return view('front.front',compact('Homeslider','Homecat','homeProduct','Product','trending','fronCategory','discount','Homecat2','Homecat3'));
    }

    public function product($id){
      $relatedProducts=[];
        $product = Product::where('status','1')->where('id',$id)->get();
        $fronCategory= Category::with('subs')->where('status',1)->where('parent_category_id',0)->get();
        $related_products=explode(",",$product[0]->related_products);
          if(count($related_products) > 0){
          foreach($related_products as $related_products){
          $relatedProducts[] = Product::where('id',$related_products)->where('status',1)->get();
        }
        }
      return view('front.shop-detail',compact('product','relatedProducts','fronCategory'));
    }

    public function getCategory(Request $request,$slug=null,$slug1=null){

      $cat = null;
      $subcat = null;
      $minprice = $request->min;
      $maxprice = $request->max;
      $cate = $request->cate;
      $search = $request->search;

      $store = Storeconfiguration::where('id',1)->first();
      $categorys=Category::with(['subs','child'])->where('parent_category_id','0')->where('sub_category','0')->where('status','1')->get();

      if (!empty($slug)) {
        $cat = Category::where('Category_url', $slug)->firstOrFail();
        $data['cat'] = $cat;

          if (!empty($slug1) && !empty($cat)) {
          $subcat = Category::where('id', $slug1)->where('parent_category_id',$cat->id)->firstOrFail();
          $data['subcat'] = $subcat;
        }
      }

      if($search){
        $fil = Category::where('category_name','LIKE',"%{$search}%")->pluck('id')->toArray();
        $product = Product::when($fil,function($query, $fil){
          foreach ($fil as $key => $value) {
            return $query->orwhere('category','LIKE',"%{$value}%");
          }
        })
        ->when($search, function ($query, $search) {
          return $query->orwhere('product_title','like' ,"%{$search}%");
        });
      }else{
      $product = Product::when($cat,function($query, $cat){
        return $query->where('category','LIKE', "%{$cat->id}%");
      })
      ->when($subcat, function ($query, $subcat) {
            return $query->where('category','LIKE', "%{$subcat->id}%");
       })
    //   ->when($minprice, function ($query, $minprice) {
    //     return $query->where('product_base_price','>=',$minprice);
    //   })
    //   ->when($maxprice, function ($query,$maxprice) {
    //     return $query->where('product_base_price','<=',$maxprice);
    //   })
      ->when($search, function ($query, $search) {
        return $query->where('product_title','like' ,'%'. $search.'%');
        })
      ->when($cate, function ($query,$cate) {
        return $query->where('category',$cate);
      });
    }
      $attributes=$this->sorts($product);
        if($store->out_of_stock == 0){
            $allProduct = $product->where('status', 1)->where('soldout','off');
            $allProduct =  $allProduct->orderBy('id', 'DESC')->get();
            $temp = $product->where('status', 1)->where('soldout','off')->orderBy('id', 'DESC')->get();
      }else{
            $allProduct = $product->where('status', 1);
            $allProduct = $allProduct->orderBy('id', 'DESC')->get();
            $temp = $product->where('status', 1)->orderBy('id', 'DESC')->get();
      }
            // foreach ($temp as $key => $value) {
            //     $price = $value->getproductPrice();
            //     $temp[$key]->temp_price = ($price->isoffer)?$price->offer:$price->price;
            // }

            $perpage = 24;
            $page = 1;
            if(isset($request->max) && isset($request->min)){
                //  $temp = (new Collection($temp))->filter(function ($item) use($minprice,$maxprice) {
                //     return $item->temp_price >= (double)$minprice && $item->temp_price <= (double)$maxprice;
                // });
            }
            $max = Product::max('manufacturerPrice');
            $min = Product::min('manufacturerPrice');

            // foreach ($temp as $key => $value) {
            //     unset($temp[$key]->temp_price);
            // }
            $offset = ($page - 1)*$perpage;
            $products = new LengthAwarePaginator($temp->slice($offset, $perpage), $temp->count(), $perpage ,$page);


        $attributeValues=Attribute::where('status','1')->get();
        $new_attribute = [];
        foreach ($allProduct as $key => $value) {
          if($value->attribute_values){
          $att = explode("|",$value->attribute_values);
            foreach ($att as $key1 => $value1) {
              $attvalue = explode("-",$value1);
              if(count($attvalue) > 1 ){
                if($attvalue[1]){
                  if(isset($new_attribute[$attvalue[0]])){
                      $exi = explode(",",$new_attribute[$attvalue[0]]);
                    if(in_array($attvalue[1],$exi)){  continue;}
                    else {
                        $new_attribute[$attvalue[0]] = \implode(",",[$attvalue[1],$new_attribute[$attvalue[0]]]); }
                  }else{
                    $new_attribute[$attvalue[0]] = $attvalue[1];
                  }
                }
              }
            }
          }
        }
        $attributeValues = $attributeValues->map(function ($attru, $key) use($new_attribute) {
          if(array_key_exists($attru->id,$new_attribute)){
              $array_unique = array_unique(explode(",",$new_attribute[$attru->id]));
            $attru->attribute_values = \implode(",",$array_unique);
            return $attru;}
            return $attru;
          });

        //   dd($attributeValues);
        $shopCategory=Category::with('products')->where('status','1')->get();
        $fronCategory= Category::with('subs')->where('status',1)->where('parent_category_id',0)->get();

        $trending = Product::where('status','1')->where('trending','on')->orderBy('id','desc')->limit('4')->get();
        if(!empty($request->ajax)){
          return view('front.shop',compact('products','shopCategory','fronCategory','min','max','trending','attributes','attributeValues','cat','subcat'));
        }
      return view('front.shop',compact('products','shopCategory','fronCategory','min','max','trending','categorys','attributes','attributeValues','cat','subcat'));
    }
    public function filter(Request $request,$slug=null,$slug1=null){
        // dd($request->all());
      $store = Storeconfiguration::where('id',1)->first();
      $perpage = 24;
      $cat = null;
      $subcat = null;
      $minprice = $request->min;
      $maxprice = $request->max;
      $sort = ($request->sort)?$request->sort:'new';
      $attribute = $request->attribute;
      $page = ($request->page == null) ? 1:$request->page;
      if (!empty($slug)) {
        $cat = Category::where('id', $slug)->first();
        if (!empty($slug1) && !empty($cat)) {
          $subcat = Category::where('id', $slug1)->where('parent_category_id',$cat->id)->firstOrFail();
          $data['subcat'] = $subcat;
        }
      }
    //   dd($data['subcat']);
      $Product = Product::when($attribute, function ($query, $attribute) {
            $temp = $query;
            $attribute = str_replace('*',' ',$attribute);
         $array = \explode("|",$attribute);
         foreach($array as $word){
           $temp->orwhereRaw("FIND_IN_SET('$word',REPLACE(`attribute_values`,'|',','))");
         }
        return $temp;
       })
       ->when($cat,function($query, $cat){
        return $query->where('category','LIKE', "%{$cat->id}%");
      })
      ->when($subcat, function ($query, $subcat) {
            return $query->orwhere('category','LIKE', "%{$subcat->id}%");
       })
      ->when($sort, function ($query,$sort) {
        if ($sort=='new') {
          return $query->orderBy('id', 'DESC');
        }
        elseif($sort=='top_rated') {
          return $query->orderBy('review', 'DESC');
        }
        elseif($sort=='A-Z') {
          return $query->orderBy('product_title', 'ASC');
        }
        elseif($sort=='Z-A') {
          return $query->orderBy('product_title', 'DESC');
        }
      });

      if($store->out_of_stock == 0){

        $products=$Product->where('status', 1)->where('soldout','off')->get();
      }else{
        $products=$Product->where('status', 1)->get();
      }
    //   $products=$Product->where('status', 1)->get();
        // dd($products);
        // foreach ($products as $key => $value) {
        //     $price = $value->getproductPrice();
        //     $products[$key]->temp_price = ($price->isoffer)?$price->offer:$price->price;
        // }

    //     $products = (new Collection($products))->filter(function ($item) use($minprice,$maxprice) {
    //       return $item->temp_price >= (double)$minprice && $item->temp_price <= (double)$maxprice;
    //   });
        if($sort == 'H-L'){
          $products = (new Collection($products))->sortByDesc("manufacturerPrice");
        }
        if($sort == 'L-H'){
          $products = (new Collection($products))->SortBy('manufacturerPrice');
        }

        $offset = ($page - 1)*$perpage;
            $products = new LengthAwarePaginator($products->slice($offset, $perpage), $products->count(), $perpage ,$page);
      return view('front.product-list',compact('products'));
    }

    function sorts($product){
      $Array=[];
      $data = $product->get();
      foreach ($data as $key => $value) {
        if($value['attribute_values'] != ""){
        $array = explode("|", $value['attribute_values']);
        foreach ($array as $key1 => $value1) {
         $array1 = explode("-", $value1);
            $Array[] = ['id'=>$array1[0],'value'=>$array1[1]];
        }
      }
    }
    return $this->super_unique($Array,'value');
    }
    function super_unique($array,$key)
    {
       $temp_array = [];
       foreach ($array as &$v) {
           if (!isset($temp_array[$v[$key]]))
           $temp_array[$v[$key]] =& $v;
       }
       $array = array_values($temp_array);
       return $array;

    }

    public function contactUs(Request $request){
      $requestData=$request->all();
      $store = Storeconfiguration::where('id',1)->first();
      $Contact_Us_Emails_BCC = $store->Contact_Us_Emails_BCC();
        //   dd($Contact_Us_Emails_BCC);
      $email=$requestData['email'];
      $customerName=$requestData['userName'];
      $customerMessage=$requestData['comment'];
       $customermobile=$requestData['mobile'];
      $mailTemplates = MailTemplate::where('template_name','3')->where('status','1')->first();
       $mailContents=[
          'title'=>$mailTemplates->subject_mail,
          'body'=>$mailTemplates->content_mail,
          'footer'=>$mailTemplates->footer_mail,
          'customerName'=>$customerName,
          'customerMessage'=>$customerMessage,
          'customermobile' => $customermobile
      ];
    if($mailTemplates->bcc_mail){
        $Contact_Us_Emails_BCC[] = $mailTemplates->bcc_mail;
    }

       Mail::to($email)->bcc($Contact_Us_Emails_BCC)->send(new ContactMails($mailContents));

       return redirect()->back()->withSuccess("Mail Sent");


    }
        public function Subscribes(Request $request){
                 	$rules=[
     		'email'     => 'required|unique:subscribes,email,'.$request->email,
		    ];

		$customs=[
			'email.unique' 	         => 'News letter already signed up'
		];

		$validator = Validator::make($request->all(), $rules,$customs);

        if ($validator->fails()) {
            $msg = $validator->getMessageBag()->toArray();
          return response()->json(array('error' => $msg['email'] ));
        }
      $Subscribes = new Subscribes;
      $Subscribes->email = $request->email;
      $Subscribes->save();
      return response()->json(['msg'=>'Thanks for news letter sign up']);
    }

        public function Privacy_Policy(){
      return view('front.Privacy_Policy');
    }
    public function Shipping_Policy(){
      return view('front.Shipping');
    }
        public function TermsConditions(){
      return view('front.term&conduction');
    }
    public function returnandcancle(){
      return view('front.Return&Cancellation');
    }
        public function CustomsTaxes(){
      return view('front.customandtax');
    }
        public function FAQ(){
      return view('front.faq');
    }
    public function About(){
      return view('front.adoutus');
    }
        public function Disclaimer(){
      return view('front.Disclaimer');
    }
        public function Careers(){
      return view('front.Careers');
    }
        public function Contact_Us(){
      return view('front.contactus');
    }
        public function TrackOrder(){
      return view('front.TrackOrder');
    }
       public function Vendor(){
      return view('front.vendoe');
    }

    public function checkemail(Request $request){
        $User = User::where('email',$request->email)->first();
        if($User) return response()->json(['status'=>true]);
        return response()->json(['status'=>false]);
    }
        public function checkphone(Request $request){
        $User = User::where('phone',$request->phone)->first();
        if($User) return response()->json(['status'=>true]);
        return response()->json(['status'=>false]);
    }



    public function subscription(Request $request){

        return view('front.subscription');
    }
}
