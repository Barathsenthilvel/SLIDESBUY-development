<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Returnproduct;
use App\Models\ReturnProductItem;
use Session;
use Auth;
use Redirect;
use App\Mail\ReturnMails;
use App\Models\MailTemplate;
use Illuminate\Support\Facades\Mail;


class CartController extends Controller
{
    public $user = 0;
    public $Cart;

	public function __construct()
    {

    }
    public function cart(Request $request){
        $this->checkCart($request);
        $Cart  =$this->Cart;
        if(count($Cart->items)<=0){
            return redirect()->route('front.index');
        }
        $Cart->deliverycharge = 0;
        $Cart->coupen = 0;
        $Cart->CouponClass = null;
        $Cart->total();
        Session::put('cart',$Cart);
        return view('front.cart',compact('Cart'));
    }
    public function addtocard(Request $request,$id=null){
        $p;
        if($id){ $p = $id;}else{ $p = $request->id;}
        $Product = Product::findOrFail($p);
        if($Product->status == 0){
            return $this->remove($request);
        }
        $this->checkCart($request);
        $this->Cart->add($p,$Product,$request->quantity);
        $request->session()->put('cart',$this->Cart);
        return response()->json($this->generate_response_cart($this->Cart));
    }
    public function reducecard(Request $request,$id=null){
        $p;
        if($id){ $p = $id;}else{ $p = $request->id;}
        $Product = Product::findOrFail($p);
        if($Product->status == 0){
            return $this->remove($request);
        }
        $this->checkCart($request);
        $this->Cart->reduce($p,$Product,$request->quantity);
        Session::put('cart',$this->Cart);
        return response()->json($this->generate_response_cart($this->Cart));
    }
    public function remove(Request $request,$id=null){
        $p;
        if($id){ $p = $id;}else{ $p = $request->id;}
        $Product = Product::findOrFail($p);
        $this->checkCart($request);
        $this->Cart->remove($p);
        Session::put('cart',$this->Cart);
        return response()->json($this->generate_response_cart($this->Cart));
    }

        // Return Product
    public function addtocardReturn(Request $request,$id=null){
        $p;
        if($id){ $p = $id;}else{ $p = $request->id;}
        $this->Cart = $request->session()->get('cart_return');
        $this->Cart->addReduce($p,$request->quantity);
        $request->session()->put('cart_return',$this->Cart);
        return response()->json($this->generate_response_cart($this->Cart));
    }
    public function removeReturn(Request $request,$id=null){
        $p;
        if($id){ $p = $id;}else{ $p = $request->id;}
        $this->Cart = $request->session()->get('cart_return');
        $this->Cart->removeReduce($p);
        Session::put('cart_return',$this->Cart);
        return response()->json($this->generate_response_cart($this->Cart));
    }
    public function submitReduce(Request $request,Order $Order){
        $date =  date('y-m-d',strtotime('now'));
        $updated_at3 = date('y-m-d',strtotime($Order->Deliverydate.'+3 days'));
        if($updated_at3 < $date){
            return response()->json(['msg'=>'Return product apply with in delivery 3 days ','url'=>route('order')]);
        }
        if(!$request->session()->has('cart_return')){ return response()->json(['error'=>'Session Error']); }
        $Cart = $request->session()->get('cart_return');
        $ReturnItems =  $Cart->ReturnItemsTemp;
        $Cart->ReturnItems = $this->removeduplicate($ReturnItems,$Cart->ReturnItems);
        // $Cart->ReturnItems = array();
        // $Cart->ReturnItemsTemp = array();

        $Cart->return = false;
        $Order->card = utf8_encode(bzcompress(serialize($Cart), 9));

        $Returnproduct = $this->returnproducts($request,$ReturnItems,$Order,$Cart);


        if($Order->update()){
            $ReturnProductItem = ReturnProductItem::where('returnproduct_id',$Returnproduct->id)->get();
                try {
                        $order_no = $Store->OrderIDPrefix.sprintf('%03d',$Order->id);
                        $return_id = $Store->OrderIDPrefix.sprintf('%03d',$Returnproduct->id);
                        $data = ['flow_id'=>'Return_Booked','mobile'=>$order->phone,'data'=>['order_no'=>$order_no,'return_id'=>$return_id]];
                        $this->sentsms($data);
                    } catch (\Throwable $th) {
                        //throw $th;
                    }
            try{
                $mailTemplates = MailTemplate::where('template_name',11)->where('status','1')->first();
                $mailContents=[
                    'title'=>$mailTemplates->subject_mail,
                    'body'=>$mailTemplates->content_mail,
                    'footer'=>$mailTemplates->footer_mail, 'Returnproduct'=>$Returnproduct,'ReturnProductItem'=>$ReturnProductItem];
                    Mail::to($Order->email)->bcc($mailTemplates->bcc_mail)->send(new ReturnMails($mailContents));
            } catch(\Exception $e){
            echo $e;
            $error = $e;
        }
            return response()->json(['msg'=>'Return Request Raised','url'=>route('order')]);
        }
    }
    public function returnproducts($request,$ReturnItems,$Order,$cart){

        $storeConfig = $cart->storeConfig;
        $Returnproduct = new Returnproduct();
        $Returnproduct->Order_ID = $Order->id;
        // $Returnproduct->Return_Date = now()->timestamp;
        $Returnproduct->Docket_No = $request->Docket_No;
        $Returnproduct->Charges = $Order->Charges;
        $Returnproduct->user_id = Auth::user()->id;
        if($Returnproduct->save()){
            foreach($ReturnItems as $key => $value){
                if($storeConfig->include_tax == 'Exclusive'){
                    $Price = round($value->total/$value->quantity,2);
                    $Total = round(($value->total/$value->quantity) + ($value->producttaaAmount/$value->quantity),2);
                }else{
                    $Price = round(($value->total/$value->quantity) - ($value->producttaaAmount/$value->quantity),2);
                    $Total = $value->total/$value->quantity;
                }
                $ReturnProductItem = new ReturnProductItem();
                $ReturnProductItem->productobj = utf8_encode(bzcompress(serialize($value), 9));
                $ReturnProductItem->returnproduct_id = $Returnproduct->id;
                $ReturnProductItem->Product = $value->product_title;
                $ReturnProductItem->Price = $Price;
                $ReturnProductItem->GST = round($value->producttaaAmount/$value->quantity,2);
                $ReturnProductItem->Total = $Total;
                $ReturnProductItem->Reason = $request->Reason[$key];
                if($_FILES['photo']['name'][$key] != ""){
                    $uploaddir = public_path().'/assets/media/returnproduct/';
                    $imageName = time().'.'.$_FILES['photo']['name'][$key];
                    $uploadfile = $uploaddir . $imageName;
                    $filenameArray = pathinfo($uploadfile);
                    $ext = array("jpeg","jpg","gif");
                    if(in_array($filenameArray['extension'],$ext)){
                        move_uploaded_file($_FILES['photo']['tmp_name'][$key], $uploadfile);
                        $ReturnProductItem->Photo = $imageName;
                    }
                }
                // $ReturnProductItem->Photo = $request->video[$key];
                $ReturnProductItem->Video = $request->video[$key];
                $ReturnProductItem->save();
            }
        }
        return $Returnproduct;
    }
    public function removeduplicate($ReturnItems,$array){

        foreach($ReturnItems as $key => $value){
            if (!array_key_exists($value->id,$array)){
                $array[$value->id] = $value;
                $array[$value->id]->quantity = 1;
            }else{
                $array[$value->id]->quantity = $array[$value->id]->quantity +1;
            }
        }

        return $array;
    }


    public function emptycard(Request $request){
        $this->Cart = new Cart();
        Session::put('cart',$this->Cart);
        return response()->json($this->generate_response_cart($this->Cart));
    }
    function checkCart(Request $request){
        if($request->session()->has('cart')){
            $this->Cart = $request->session()->get('cart');
        }else{
            $this->Cart = new Cart();
        }
    }
    public function render(){
        return view('front.includes.card');
    }
    public function rendercart(){
        return view('front.includes.shippingcart');
    }
    public function rendercartReturn(Request $request){
        $card = session()->get('cart_return');
        $Order = Order::findOrFail($card->OrderId);
        return view('front.includes.returnProduct',compact('card','Order'));
    }
        function generate_response_cart($cart){
        $data = array();
        $data['items'] = $cart->items;
        $data['totalQty'] = $cart->totalQty;
        $data['totalPrice'] = $cart->totalPrice;
        $data['totalitem'] = $cart->totalitem;
        $data['tax'] = $cart->tax;
        $data['coupen'] = $cart->coupen;
        $data['deliverycharge'] = $cart->deliverycharge;
        $data['grandTotal'] = $cart->grandTotal;

        return $data;
    }
    public function generateOTP(Request $request){
        $myobj = new \stdClass();
        $r = rand ( 100000 , 999999 );
        $myobj->{'otp'} = $r;
        Session::put('otp', $myobj);
        try {
            $data = ['flow_id'=>'One_Time_Password','mobile'=>$request->phone,'data'=>['OTP'=>$r,'name'=>'']];
            $this->sentsms($data);
        } catch (\Throwable $th) {
            return response()->json(['status'=>false]);
            //throw $th;
        }
        return response()->json(['status'=>true,'otp'=>$r]);

    }

    public function Otpverify(Request $request){

        $otp = $request->session()->get('otp');
        if($request->otp == $otp->otp){
            return response()->json(['status'=>true]);
        }
        return response()->json(['status'=>false]);
    }
}
