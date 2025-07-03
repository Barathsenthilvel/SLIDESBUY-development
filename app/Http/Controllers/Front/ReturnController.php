<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\MailTemplate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request as Input;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Address;
use App\Models\Product;
use App\Models\Returnproduct;
use App\Models\ReturnProductItem;
use App\Models\Storeconfiguration;
use App\Models\History;

use Illuminate\Support\Facades\Redirect;

class ReturnController extends Controller {

    public $product = array();

    public function __construct()
    {
      $this->middleware('auth',['except'=>[]]);
    }

    public function return(Order $Order){
        if($Order->user_id != Auth::user()->id){  return Redirect::back(); }

        $Returnproduct = Returnproduct::where('Order_ID',$Order->id)->orderBy('id','desc')->get();

        $card = unserialize(bzdecompress(utf8_decode($Order->card)));
        // dd($card->ReturnItems);
        $card->OrderId = $Order->id;
        $card->ReturnItemsTemp = array();
        session()->put('cart_return',$card);
        return view('front.returnorder',compact('Order','card','Returnproduct'));
    }

    public function cancel(Returnproduct $id){
        $id->status = 'cancel';
        $id->update();
        return Redirect::back();
    }

    public function view(Returnproduct $id){
        $order = Order::findOrFail($id->Order_ID);
        $items = unserialize(bzdecompress(utf8_decode($order->card)));
        $Store = $items->storeConfig;
        $ReturnProductItem = ReturnProductItem::where('returnproduct_id',$id->id)->get();
        return view('front.includes.return_product_item',compact('order','ReturnProductItem','id','Store'));
    }

    public function history($id){
        $History = History::where('tableid',$id)->get();
        $P = "";
        if(count($History) == 0){
            return '<h3>No history found</h3>';
        }
        foreach ($History as $key => $value) {
            $P =$P.'<p> Message : '.$value->message.', Date :'.$value->created_at.'</p>';
        }
        return $P;
    }
    
        public function invoice(Returnproduct $id){
        $order = Order::findOrFail($id->Order_ID);
        $items = unserialize(bzdecompress(utf8_decode($order->card)));
        $Store = $items->storeConfig;
        $ReturnProductItem = ReturnProductItem::where('returnproduct_id',$id->id)->get();
        return view('front.returninvoioce',compact('order','items','Store','id','ReturnProductItem'));
    }
}
