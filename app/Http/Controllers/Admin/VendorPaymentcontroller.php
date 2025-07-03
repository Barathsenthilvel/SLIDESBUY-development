<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Vendor;
use App\Models\Storeconfiguration;
use App\Models\VendorPayment;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
use Auth;
use DataTables;


class VendorPaymentcontroller extends Controller
{
    public  function index(){
        return view('admin.vendorPay.index',['vendor'=>vendor::where('status',1)->get()]);
    }

    public function datatable(){
        $help = new Help();
        $help->Storeconfiguration = Storeconfiguration::where('id',1)->first();

        $VendorPayment = VendorPayment::orderBy('id','desc')->get();
        return DataTables::of($VendorPayment)
        ->addIndexColumn()
        ->addColumn('TID', function($data) use ($help) {
            return 'SKVP'.sprintf('%03d',$data->id);
        })
        ->addColumn('PaymentDate', function($data) use ($help) {
            return $data->created_at->format('Y-m-d');
        })
        ->addColumn('VendorName&ID', function($data) use ($help) {
            return $help->vendor($data);
        })
        ->addColumn('CompanyType', function($data) use ($help) {
            return $help->vendor($data);
        })
        ->addColumn('CompanyType', function($data) use ($help) {
            return $help->CompanyType($data);
        })
        ->addColumn('GST', function($data) use ($help) {
            return $help->GST($data);
        })
        ->addColumn('RefNo', function($data) use ($help) {
            return $data->TID;
        })
        ->addColumn('Receipt', function($data) use ($help) {
            return "<a href='".route('admin-VendorPayment-invoice',$data->id)."'>Invoice</a>";
        })
        ->addColumn('Action', function($data) use ($help) {
                        return "<button type='button' onclick=editpayment('".route('admin-VendorPayment-edit',$data->id)."','".route('admin-VendorPayment-editdata',$data->id)."') class='btn btn-success mr-2'>Edit</button><button type='button' onclick=deletepayment('".route('admin-VendorPayment-delete',$data->id)."','".route('admin-VendorPayment-delete',$data->id)."') class='btn btn-success mr-2'>Delete</button>";
        })
        ->rawColumns(['PaymentDate','VendorName&ID','CompanyType','CompanyType','GST','Action','TID','RefNo','Receipt'])
        ->toJson();
    }

    public function paydatatable(Request $request){
        $Order = $this->vendororder($request);
        $Help2 = new Help2($Order);

        $request->session()->put('VendorPay', $Help2);

        return DataTables::of($Help2->Order)
        ->addIndexColumn()
        ->addColumn('Order_id', function(Order $data) use ($Help2) {
            $Help2->getStore($data);
            return $Help2->Storeconfiguration->OrderIDPrefix.''.sprintf('%03d',$data->map_id);
        })
        ->addColumn('ProductSKU', function(Order $data) use ($Help2) {
            return $Help2->getReportProductSKU($data);
        })
        ->addColumn('VendorSKU', function(Order $data) use ($Help2) {
            return $Help2->getReportvendorSKU($data);
        })
        ->addColumn('VendorNameID', function(Order $data) use ($Help2) {
            return $Help2->vendor($data);
        })
        ->addColumn('CompanyType', function($data) use ($Help2) {
            return $Help2->CompanyType($data);
        })
        ->addColumn('ProductName', function($data) use ($Help2) {
            return $data->vendorPay->product_title;
        })
        ->addColumn('CostPrice', function($data) use ($Help2) {
            return $data->vendorPay->manufacturerPrice;
        })
        ->addColumn('Discount', function($data) use ($Help2) {
            return $Help2->Discount($data);
        })
        ->addColumn('Value', function($data) use ($Help2) {
            return $Help2->Value($data);
        })
        ->addColumn('TotalCost', function($data) use ($Help2) {
            return $Help2->TotalCost($data);
        })
        
        ->addColumn('seller_price', function( $data) use ($Help2) { 
            return $Help2->ourprice($data);
          })
          ->addColumn('Discount_price', function( $data) use ($Help2) { 
            return $Help2->Discount_price($data);
          })
          ->addColumn('special_discount_price', function( $data) use ($Help2) { 
            return $Help2->special_discount_price($data);
          })
          ->addColumn('Coupon_price', function( $data) use ($Help2) { 
            return $Help2->Coupon_price($data);
          })
          ->addColumn('Taxable_amount', function($data) use ($Help2) { 
            return $Help2->Taxable_amount($data);
          })
          ->addColumn('mrp', function($data) use ($Help2) { 
            return $Help2->mrp($data);
          })
        ->addColumn('manufacturerPrice', function($data) use ($Help2) { 
            return $Help2->manufacturerPrice($data);
        })
        ->addColumn('shipping_charge', function($data) use ($Help2) { 
            return $Help2->shipping_charge($data);
        })
        ->addColumn('GST', function($data) use ($Help2) {
            return $Help2->GST($data);
        })
        ->addColumn('TaxAmount', function($data) use ($Help2) {
            return $Help2->TaxAmount($data);
        })
        ->addColumn('Amount', function($data) use ($Help2) {
            return $Help2->Amount($data);
        })
        ->addColumn('FinalPrice', function($data) use ($Help2) {
            return $Help2->FinalPrice($data);
        })
        ->addColumn('Quantity', function($data) use ($Help2) {
            return $Help2->Quantity($data);
        })
        ->addColumn('Total', function($data) use ($Help2) {
            return $Help2->Total($data);
        })
        ->addColumn('Status', function($data) use ($Help2) {
            return $Help2->Status($data);
        })
        ->addColumn('PaymentStatus', function($data) use ($Help2) {
            return $Help2->PaymentStatus($data);
        })
        ->addColumn('order_status', function($data) use ($Help2) {
            return $Help2->order_status($data);
        })
        ->addColumn('Choose', function($data) use ($Help2) {
           
            return $Help2->Choose($data);
        })
        ->rawColumns(['Order_id','ProductSKU','VendorSKU','VendorNameID','CompanyType','ProductName','CostPrice','Discount','Value','TotalCost','GST','TaxAmount','Quantity','FinalPrice','Total','Status','PaymentStatus','Choose'])
        ->toJson();
    }

    public function edit(VendorPayment $Vendor){

       $data =  unserialize(bzdecompress(utf8_decode($Vendor->paymentObject)));
       $Help2 = new Edit($Vendor);
        
       return DataTables::of($data->Product)
        ->addIndexColumn()
        ->addColumn('Order_id', function($data) use ($Help2) {
            $Help2->getStore($data);
            return $Help2->Storeconfiguration->OrderIDPrefix.''.$Help2->Order->map_id;
        })
        ->addColumn('ProductSKU', function($data) use ($Help2) {
            return $Help2->getReportProductSKU($data);
        })
        ->addColumn('VendorSKU', function($data) use ($Help2) {
            return $Help2->getReportvendorSKU($data);
        })
        ->addColumn('VendorNameID', function($data) use ($Help2) {
            return $Help2->vendor($data);
        })
        ->addColumn('CompanyType', function($data) use ($Help2) {
            return $Help2->CompanyType($data);
        })
        ->addColumn('ProductName', function($data) use ($Help2) {
            return $data->product_title;
        })
        ->addColumn('CostPrice', function($data) use ($Help2) {
            return $data->manufacturerPrice;
        })
        ->addColumn('Discount', function($data) use ($Help2) {
            return $Help2->Discount($data);
        })
        ->addColumn('Value', function($data) use ($Help2) {
            return $Help2->Value($data);
        })
        ->addColumn('TotalCost', function($data) use ($Help2) {
            return $Help2->TotalCost($data);
        })
        
        ->addColumn('seller_price', function($data) use ($Help2) { 
            return $Help2->ourprice($data);
          })
          ->addColumn('Discount_price', function( $data) use ($Help2) { 
            return $Help2->Discount_price($data);
          })
          ->addColumn('special_discount_price', function( $data) use ($Help2) { 
            return $Help2->special_discount_price($data);
          })
          ->addColumn('Coupon_price', function( $data) use ($Help2) { 
            return $Help2->Coupon_price($data);
          })
          ->addColumn('Taxable_amount', function($data) use ($Help2) { 
            return $Help2->Taxable_amount($data);
          })
          ->addColumn('mrp', function($data) use ($Help2) { 
            return $Help2->mrp($data);
          })
        ->addColumn('manufacturerPrice', function($data) use ($Help2) { 
            return $Help2->manufacturerPrice($data);
        })
        ->addColumn('shipping_charge', function($data) use ($Help2) { 
            return $Help2->shipping_charge($data);
        })
        ->addColumn('Amount', function($data) use ($Help2) {
            return $Help2->Amount($data);
        })
        ->addColumn('GST', function($data) use ($Help2) {
            return $Help2->GST($data);
        })
        ->addColumn('TaxAmount', function($data) use ($Help2) {
            return $Help2->TaxAmount($data);
        })
        ->addColumn('FinalPrice', function($data) use ($Help2) {
            return $Help2->FinalPrice($data);
        })
        ->addColumn('Quantity', function($data) use ($Help2) {
            return $Help2->Quantity($data);
        })
        ->addColumn('Total', function($data) use ($Help2) {
            return $Help2->Total($data);
        })
        ->addColumn('Status', function($data) use ($Help2) {
            return $Help2->Status($data);
        })
        ->addColumn('PaymentStatus', function($data) use ($Help2) {
            return $Help2->PaymentStatus($data);
        })
         ->addColumn('order_status', function($data) use ($Help2) {
            return $Help2->order_status($data);
        })
        ->addColumn('Choose', function($data) use ($Help2) {
            return $Help2->Choose($data);
        })
        ->rawColumns(['Order_id','ProductSKU','VendorSKU','VendorNameID','CompanyType','ProductName','CostPrice','Discount','Value','TotalCost','GST','TaxAmount','Quantity','FinalPrice','Total','Status','PaymentStatus','Choose'])
        ->toJson();
    }
    
    public function printinvoice($Vendor){
        $Store = Storeconfiguration::where('id',1)->first();
        $VendorPayment = VendorPayment::where('id',$Vendor)->first();
        $vendor  = unserialize(bzdecompress(utf8_decode($VendorPayment->vendor)));
        $data =  unserialize(bzdecompress(utf8_decode($VendorPayment->paymentObject)));
        $Help2 = new Edit($VendorPayment);
        $Product = [];
        foreach($data->Product as $item){
            $item['ProductDiscount'] = $this->ProductDiscount($item);
            $item['ProductTax'] = $this->ProductTax($item,$item['ProductDiscount']);
            $Product[] = $item;
        }
        return view('admin.vendorPay.invoice',compact('VendorPayment','data','Product','Store','vendor'));
    }
    
    public function ProductDiscount($Product){
        if(!$Product->discount){ return $Product->manufacturerPrice; }
        if($Product->discount->type == 'RS'){
            return $Product->manufacturerPrice - (float)$Product->discount->number;
        }else{
            return $Product->manufacturerPrice - (($Product->manufacturerPrice/100)*$Product->discount->number);
        }
    }
    public function ProductTax($Product,$amount){
        if($Product->producttax->tax_type == 1){
            return ($amount/100)* $Product->producttax->tax_rate;
         }else{
           return $Product->producttax->tax_rate . 'Rs';
         }
    }
    
    public function editdata(VendorPayment $Vendor){

        session()->put("editsubmitpay",$Vendor);
        $data =  unserialize(bzdecompress(utf8_decode($Vendor->paymentObject)));
        return response()->json($data);
    }
    public function vendororder($request){
        
        $Order = Order::orderBy('id','desc')->whereDate('Deliverydate','>=',$request->FromDate)->whereDate('Deliverydate','<=',$request->ToDate)->get()->filter(function($Order) use ($request){
            $true = false;
            $cartitem = unserialize(bzdecompress(utf8_decode($Order->card)));
            $array = [];
            foreach ($cartitem->singleorder as $key => $items) {
              if($items->vendor == $request->vendor){
                $true = true;
                $items = clone $items;
                $array = $this->checkreturn($array,$cartitem,$items);
              }
            }
            if($true){
              $Order['vendorItems'] = $array;
              $array = [];
              return $Order;
            }
        });
        // dd(Order::orderBy('id','desc')->whereDate('Deliverydate','>=',$request->FromDate)->whereDate('Deliverydate','<=',$request->ToDate)->get());
        return $Order;
    }
    function checkreturn($array,$cartitem,$items){

        if(empty($cartitem->ReturnItems)){  $array[] = $items; return $array;}
        if(array_key_exists($items->id,$cartitem->ReturnItems)){
           
            $Clone = clone $items;
            $Clone->quantity = $items->quantity - $cartitem->ReturnItems[$items->id]->Returnquantity;
            if($Clone->quantity > 0 ){ $Clone['status']="Sold"; $array[] = $Clone; }
            
            $Clone = clone $items;
            $Clone->quantity = $cartitem->ReturnItems[$items->id]->Returnquantity;
            if($Clone->quantity > 0 ){ $Clone['status']="Return"; $array[] = $Clone; }
            
            return $array;
        }
        $items['status'] = 'Sold';
        $array[] = $items;
        return $array;

    }
    public function submitpay(Request $request){

        $order = null;
        $cart = null;
        $id= 0;
        $vendor = null;
        $AfterDiscountPrice = 0;
        $TaxAmount = 0;
        $VendorObject = new VendorObject();
        $Help2 = $request->session()->get('VendorPay');
        $VendorObject->PaymentDate = $request->PaymentDate;
        $VendorObject->Mode = $request->Mode;
        $VendorObject->TID = $request->TID;
        $VendorObject->quantity = $Help2->quantity;
        $VendorObject->ProductCount = count($request->Pay);
        $VendorObject->CostPrice = $request->CostPrice;
        $VendorObject->Less = $request->Less;
        $VendorObject->TotalCost = $request->TotalCost;
        $VendorObject->CGST = $request->CGST;
        $VendorObject->SGST = $request->SGST;
        $VendorObject->IGST = $request->IGST;
        $VendorObject->TaxAmount = $request->TaxAmount;
        $VendorObject->FinalPrice = $request->FinalPrice;

        foreach ($request->Pay as $key => $value) {
            $data = \explode(",",$value);
            if($id != $data[0]){
                if($order && $cart){
                   $order->card =  utf8_encode(bzcompress(serialize($cart), 9));
                   $order->update();
                   $AfterDiscountPrice += $this->getvendorpayDiscount($cart->vendorPay);
                }
                $id = $data[0];
                $order = Order::findOrFail($data[0]);
                $cart = unserialize(bzdecompress(utf8_decode($order->card)));
            }
            $product = $this->getObject($data[1],$cart);
            // dd($product->vendorObject);
            $product['OrderID'] = $order->id;
            $VendorObject->Product[] = $product;
            $TaxAmount += $product->producttaaAmount;
            $vendor = $product->vendorObject;
            $cart->vendorPay[] = $product;
        }

        $order->card =  utf8_encode(bzcompress(serialize($cart), 9));
        $order->update();
        $AfterDiscountPrice += $this->getvendorpayDiscount($cart->vendorPay);

        $VendorPayment = new VendorPayment();
        $VendorPayment->PaymentDate = $request->PaymentDate;
        $VendorPayment->Mode = $request->Mode;
        $VendorPayment->TID = $request->TID;
        $VendorPayment->ProductCount = $VendorObject->ProductCount;
        $VendorPayment->CompanyType = $Help2->Vendor->type;
        $VendorPayment->AfterDiscountPrice = $AfterDiscountPrice;
        $VendorPayment->TaxAmount = $TaxAmount;
        $VendorPayment->FinalPrice = $request->FinalPrice;
        $VendorPayment->PaymentMode = $request->PaymentMode;
        $VendorPayment->Less = $request->Less;
        $VendorPayment->paymentObject = utf8_encode(bzcompress(serialize($VendorObject), 9));
        $VendorPayment->vendor = utf8_encode(bzcompress(serialize($vendor), 9));
        $VendorPayment->vendor_id = $vendor->id;
        $VendorPayment->save();

        return response()->json(['msg'=>'Payment Updated...']);

    }
    public function valueexist($id,$orderid,$payed){
        foreach($payed as $value){
            if($value[1] == $id && $value[0] == $orderid){ return true;}
        }
        return false;
    }
    public function unsetvendorPay($cart,$id){
        $empty = [];
        $vendorPayarray = $cart->vendorPay;
        foreach ($vendorPayarray as $key => $value){
            if($value->id != $id){
                $empty[] = $value;
            }
        }
        $cart->vendorPay = $empty;
        return $cart;
    }
    public function editsubmitpay(Request $request){

        $data = session()->get('editsubmitpay');
        $order = null;
        $cart = null;
        $id= 0;
        $vendor = null;
        $AfterDiscountPrice = 0;
        $TaxAmount = 0;

        $VendorObject = unserialize(bzdecompress(utf8_decode($data->paymentObject)));

        $VendorObject->PaymentDate = $request->PaymentDate;
        $VendorObject->Mode = $request->Mode;
        $VendorObject->TID = $request->TID;
        $VendorObject->quantity = count($request->Payed);
        $VendorObject->ProductCount = count($request->Payed);
        $VendorObject->CostPrice = $request->CostPrice;
        $VendorObject->Less = $request->Less;
        $VendorObject->TotalCost = $request->TotalCost;
        $VendorObject->CGST = $request->CGST;
        $VendorObject->SGST = $request->SGST;
        $VendorObject->IGST = $request->IGST;
        $VendorObject->TaxAmount = $request->TaxAmount;
        $VendorObject->FinalPrice = $request->FinalPrice;
        $Payed = [];
        foreach ($request->Payed as $key => $value){
            $Payed[] = \explode(",",$value);
        }
        $Product = [];
        foreach($VendorObject->Product as $key => $value){

            if(!$this->valueexist($value->id,$value->OrderID,$Payed)){
                $order = Order::findOrFail($value->OrderID);
                $cart = unserialize(bzdecompress(utf8_decode($order->card)));
                $cart = $this->unsetvendorPay($cart,$value->id);
                $AfterDiscountPrice += $this->getvendorpayDiscount($cart->vendorPay);
                $order->card =  utf8_encode(bzcompress(serialize($cart), 9));
                $order->update();
            }else{
                $Product[] = $value;
                $order = Order::findOrFail($value->OrderID);
                $cart = unserialize(bzdecompress(utf8_decode($order->card)));
                $AfterDiscountPrice += $this->getvendorpayDiscount($cart->vendorPay);
            }
        }

        $VendorObject->Product = $Product;

        $VendorPayment = $data;
        $VendorPayment->PaymentDate = $request->PaymentDate;
        $VendorPayment->Mode = $request->Mode;
        $VendorPayment->TID = $request->TID;
        $VendorPayment->ProductCount = $VendorObject->ProductCount;
        $VendorPayment->AfterDiscountPrice = $AfterDiscountPrice;
        $VendorPayment->TaxAmount = $TaxAmount;
        $VendorPayment->FinalPrice = $request->FinalPrice;
        $VendorPayment->PaymentMode = $request->PaymentMode;
        $VendorPayment->Less = $request->Less;
        $VendorPayment->paymentObject = utf8_encode(bzcompress(serialize($VendorObject), 9));
        $VendorPayment->update();

        return response()->json(['msg'=>'Payment Updated...']);

    }

    public function getObject($productid,$cart){
        if(!array_key_exists($productid,$cart->ReturnItems)){ return clone $cart->items[$productid];}
        $qua = $cart->items[$productid]->quantity - $cart->ReturnItems[$productid]->quantity;
        $item = clone $cart->items[$productid];
        $item->quantity = $qua;
        return $item;
    }

    public function delete(VendorPayment $VendorPayment){

        $VendorObject = unserialize(bzdecompress(utf8_decode($VendorPayment->paymentObject)));
        foreach($VendorObject->Product as $key => $value){
            if(isset($value->OrderID)){
                $order = Order::findOrFail($value->OrderID);
                $cart = unserialize(bzdecompress(utf8_decode($order->card)));
                $cart = $this->unsetvendorPay($cart,$value->id);
                $order->card =  utf8_encode(bzcompress(serialize($cart), 9));
                $order->update();
            }
        }

        $VendorPayment->delete();

        return response()->json(['msg'=>'Payment Deleted...']);
    }
    
    public function getvendorpayDiscount($product){
        $an = 0;
        foreach ($product as $key => $value) {
            if(!$value->discount){ $an += 0; }
            elseif($value->discount->type == 'RS'){
                 $an += (float)$value->discount->number;
            }else{
                 $an += ($value->manufacturerPrice/100)*(float)$value->discount->number;
            }
        }
        return $an;
    }
}

class Help {

    public $Storeconfiguration;
    public $Vendor;

    public function vendor($data){
        $this->Vendor = unserialize(bzdecompress(utf8_decode($data->vendor)));
        return  $this->Vendor->name.'<br>'.$this->Storeconfiguration->VendorIDPrefix.'-'.sprintf("%'03d", $this->Vendor->id);
    }

    public function CompanyType(){
        return $this->Vendor->type;
    }

    public function GST(){
        return $this->Vendor->vendorperscent.' %';
    }

}

class Help2 {

    public $Storeconfiguration;
    public $Vendor = null;
    Public $Order = null;
    public $quantity = 0;
    public $ReturnItems = array();
    public $vendorPay = array();
    public $AfterDiscountPrice = 0;
    public $TaxAmount = 0;

    function __construct($Order) {
        $this->Order = $this->ConvertToProduct($Order);
    }

    public function ConvertToProduct($Order){
        $newOrder = [];
        foreach ($Order as $key => $value) {
          foreach ($value->vendorItems as $key1 => $value1) {
            $value = clone $value;
            $value['vendorPay'] = $value1;
            array_push($this->vendorPay,$value1->id);
            array_push($newOrder,$value);
          }
        }
        return $newOrder;
    }
    public function order_status(Order $order){
        return $order->delivery_status;
    }
    public function getStore(Order $Order){
        $this->Cart = unserialize(bzdecompress(utf8_decode($Order->card)));
        $this->Storeconfiguration = $this->Cart->storeConfig;
        $this->vendorPay = $this->Cart->vendorPay;
        $this->ReturnItems = $this->Cart->ReturnItems;
    }

    public function getReportProductSKU(Order $order){
        return $this->Storeconfiguration->productIdprefix."".sprintf('%03d',$order->vendorPay->product_sku);
    }

    public function getReportvendorSKU(Order $order){
        if($order->vendorPay->vendor && $order->vendorPay->vendor != ""){
          $this->Vendor = $order->vendorPay->vendorObject;
          if($this->Vendor == null){ $vend = Vendor::where('id', $order->vendorPay->vendor)->first(); $this->Vendor = $vend; }
          if(empty($this->Vendor)){
            return "vendor Not Found";
          }else{
            return $this->Storeconfiguration->VendorIDPrefix.''.sprintf('%03d',$this->Vendor->id);
          }
        }else{
          return "Admin";
        }
    }

    public function vendor(Order $order){
        if($order->vendorPay->vendor && $order->vendorPay->vendor != ""){
          if(empty($this->Vendor)){
            return "vendor Not Found";
          }else{
            return $this->Vendor->name.'<br>'.$this->Storeconfiguration->VendorIDPrefix.''.sprintf('%03d',$this->Vendor->id);
          }
        }else{
          return "Admin";
        }
    }

    public function CompanyType(){
        if(isset($this->Vendor->type)){
            return $this->Vendor->type;
        }
        return "not found";
    }

    public function Discount(Order $order){
        if(!$order->vendorPay->discount){ return 0; }
        if($order->vendorPay->discount->type == 'RS'){
            return (float)$order->vendorPay->discount->number.' RS';
        }else{
            return (float)$order->vendorPay->discount->number.' %';
        }
    }

    public function Value(Order $order){
        if(!$order->vendorPay->discount){ return 0; }
        if($order->vendorPay->discount->type == 'RS'){
            $this->AfterDiscountPrice += (float)$order->vendorPay->discount->number;
            return (float)$order->vendorPay->discount->number;
        }else{
            $this->AfterDiscountPrice += ($order->vendorPay->manufacturerPrice/100)*(float)$order->vendorPay->discount->number;
            return ($order->vendorPay->manufacturerPrice/100)*(float)$order->vendorPay->discount->number;
        }
    }
    public function TotalCost(Order $order){
        $this->price1 = 0;
        if(!$order->vendorPay->discount){ $this->price1 = $order->vendorPay->manufacturerPrice; return $this->price1; }
        if($order->vendorPay->discount->type == 'RS'){
            $this->price1 = round($order->vendorPay->manufacturerPrice - (float)$order->vendorPay->discount->number,2);
            return $this->price1;
        }else{
            $this->price1 = round($order->vendorPay->manufacturerPrice - ($order->vendorPay->manufacturerPrice/100)*(float)$order->vendorPay->discount->number,2);
            return $this->price1;
        }
    }
    
    public function ourprice(Order $order){
        if($this->Storeconfiguration->include_tax == "Exclusive"){
          return round(((float)$order->vendorPay['total']-(float)$order->vendorPay['coupon_amount'])/$order->vendorPay->quantity,2);
      }else{
        return round(($order->vendorPay['total']-$order->vendorPay['coupon_amount'])/$order->vendorPay->quantity,2);
      }
    }
    public function special_discount_price(Order $order){
     return round(0 - $order->vendorPay->offer,2);
     }
     public function Discount_price(Order $order){
         return round(0 - $order->vendorPay->saveings['save_amount'],2);
     }
    public function Coupon_price(Order $order){
     return round(0 - $order->vendorPay['coupon_amount'],2);
    }
    public function manufacturerPrice(Order $order){
      return $order->vendorPay->manufacturerPrice;
  }
  public function Amount(Order $order){
      return ((float)$this->shipping_charge($order) + (float)$this->manufacturerPrice($order))*$this->Quantity($order);
  }
    public function Taxable_amount(Order $order){
      if($this->Storeconfiguration->include_tax == "Exclusive"){
    	return round((float)$order->vendorPay['total']-(float)$order->vendorPay['coupon_amount'],2);
      }
    else{
        return round((float)$order->vendorPay['total']-(float)$order->vendorPay['producttaaAmount']-(float)$order->vendorPay['coupon_amount'],2);
    }
  }
  public function shipping_charge($order){
      return (float)$order->vendorPay['shipping_price'];
  }
    public function mrp(Order $order){
        return $order->vendorPay['mrp'];
    }
    public function GST(Order $order){
        if($this->Vendor->type != 'Company'){
            return '---';
        }
        if($order->vendorPay->producttax->tax_type == 1){
            return $order->vendorPay->producttax->tax_rate. '%';
         }else{
           return $order->vendorPay->producttax->tax_rate . 'Rs';
         }
    }
    public function TaxAmount(Order $order){
        if($this->Vendor->type != 'Company'){
            return 0;
        }
        $this->TaxAmount += round($order->vendorPay->producttaaAmount,2);
        return round($order->vendorPay->producttaaAmount,2);
    }
    public function FinalPrice(Order $order){
        $this->price2 = 0;
        if($this->Vendor->type != 'Company'){
            $this->price2 = $this->price1;
            return $this->price2;
        }else{
            $this->price2 = $this->price1 + round($order->vendorPay->producttaaAmount,2);
            return $this->price2;
        }
    }
    public function Quantity(Order $order){
        $this->quantity += $order->vendorPay->quantity;
        return $order->vendorPay->quantity;
    }
    public function Total(Order $order){
        return $this->price2 * $order->vendorPay->quantity;
    }
    public function Status(Order $order){
        return $order->vendorPay->status;
    }
    public function PaymentStatus(Order $order){
        // if($this->checkKeyexist($order->vendorPay->id,$this->ReturnItems)){
        //     return "Nill";
        // }
        if($this->checkKeyexist($order->vendorPay->id,$this->vendorPay)){
            return "Payed";
        }else{
            return 'Pending';
        }
    }
    public function Choose(Order $order){
        if( $order->vendorPay->status == "Return"){ return $order->vendorPay->status; }
        if($this->checkKeyexist($order->vendorPay->id,$this->vendorPay)){ return '<span style="color:green"><i class="fa fa-check" aria-hidden="true"></i></span>'; }
        // if($this->checkKeyexist($order->vendorPay->id,$this->ReturnItems)){ return ""; }
        
        return  '<input  type="checkbox" onclick="paycal()" data-amount='.((float)$this->shipping_charge($order) + (float)$this->manufacturerPrice($order))*$this->Quantity($order).' name="Pay[]" value='.$order->id.','.$order->vendorPay->id.'>';
    }

    function checkKeyexist($id,$ReturnItems){
        if(empty($ReturnItems)){ return false;}
        foreach ($ReturnItems as $key => $value) {
            if($value->id == $id){
                return true;
            }
        }
    }
}

class VendorObject {
    public $Product = array();
    Public $PaymentDate = null;
    public $Mode = null;
    public $ProductCount = 0;
    public $quantity = 0;
    public $TID = null;
    public $CostPrice = null;
    public $Less = 0;
    public $TotalCost = 0;
    public $CGST = 0;
    Public $SGST = 0;
    Public $IGST = 0;
    public $TaxAmount = 0 ;
    public $FinalPrice = 0;
}

class Edit {
    public $Storeconfiguration;
    public $Vendor = null;
    Public $Order = null;
    public $quantity = 0;
    public $ReturnItems = array();
    public $vendorPay = array();
    public $AfterDiscountPrice = 0;
    public $TaxAmount = 0;
    public $Cart = 0;
    public $discount = null;


    public function getStore($product){

        if($this->Order == null || $this->Order->id != $product->OrderID){
            $this->Order = Order::where('id',$product->OrderID)->first();
            $this->Cart = unserialize(bzdecompress(utf8_decode($this->Order->card)));
            $this->Storeconfiguration = $this->Cart->storeConfig;
            $this->Vendor = $product->vendorObject;
            $this->discount = $product->discount;

        }
    }
    public function order_status(Product $Product){
        return $this->Order->delivery_status;
    }
    public function ourprice(Product $Product){
        if($this->Storeconfiguration->include_tax == "Exclusive"){
          return round(((float)$Product['total']-(float)$Product['coupon_amount'])/$Product->quantity,2);
      }else{
        return round(($Product['total']-$Product['coupon_amount'])/$Product->quantity,2);
      }
    }
    
    public function special_discount_price(Product $Product){
     return round(0 - $Product->offer,2);
     }
     public function Discount_price(Product $Product){
         return round(0 - $Product->saveings['save_amount'],2);
     }
    public function Coupon_price(Product $Product){
     return round(0 - $Product['coupon_amount'],2);
    }
    public function manufacturerPrice(Product $Product){
      return $Product->manufacturerPrice;
  }
  public function Amount(Product $Product){
      return ($Product->shipping_price + $Product->manufacturerPrice)*$Product->quantity;
  }
    public function Taxable_amount(Product $Product){
      if($this->Storeconfiguration->include_tax == "Exclusive"){
    	return round((float)$Product['total']-(float)$Product['coupon_amount'],2);
      }
    else{
        return round((float)$Product['total']-(float)$Product['producttaaAmount']-(float)$Product['coupon_amount'],2);
    }
  }
  public function shipping_charge(Product $Product){
      return (float)$Product['shipping_price'] * $Product->quantity;
  } 
    public function mrp(Product $Product){
        return $Product['mrp'];
    }


    public function getReportProductSKU(Product $Product){
        return $this->Storeconfiguration->productIdprefix."-".$Product->product_sku;
    }

    public function getReportvendorSKU(Product $Product){
        if($this->Vendor){
            return $this->Storeconfiguration->VendorIDPrefix.''.$this->Vendor->id;
        }else{
          return "Admin";
        }
    }

    public function vendor(Product $Product){
        if($this->Vendor){
            return $this->Vendor->name.'<br>'.$this->Storeconfiguration->VendorIDPrefix.''.$this->Vendor->id;
        }else{
          return "Admin";
        }
    }

    public function CompanyType(){
        return $this->Vendor->type;
    }

    public function Discount(Product $Product){
        if(!$this->discount){ return 0; }
        if($this->discount->type == 'RS'){
            return (float)$this->discount->number.' RS';
        }else{
            return (float)$this->discount->number.' %';
        }
    }

    public function Value(Product $Product){
        if(!$this->discount){ return 0; }
        if($this->discount->type == 'RS'){
            $this->AfterDiscountPrice += (float)$this->discount->number;
            return (float)$this->discount->number;
        }else{
            $this->AfterDiscountPrice += ($Product->manufacturerPrice/100)*(float)$this->discount->number;
            return ($Product->manufacturerPrice/100)*(float)$this->discount->number;
        }
    }
    public function TotalCost(Product $Product){
        $this->price1 = 0;
        if(!$this->discount){ $this->price1 = $Product->manufacturerPrice;  return $this->price1; }
        if($this->discount->type == 'RS'){
            $this->price1 = round($Product->manufacturerPrice - (float)$this->discount->number,2);
             return $this->price1;
        }else{
            $this->price1 =  round($Product->manufacturerPrice - ($Product->manufacturerPrice/100)*(float)$this->discount->number,2);
            return $this->price1;

        }
    }
    public function GST(Product $Product){
        if($this->Vendor->type != 'Company'){
            return '---';
        }
        if($Product->producttax->tax_type == 1){
            return $Product->producttax->tax_rate. '%';
         }else{
           return $Product->producttax->tax_rate . 'Rs';
         }
    }
    public function TaxAmount(Product $Product){
        if($this->Vendor->type != 'Company'){
            return 0;
        }
        $this->TaxAmount += $Product->producttaaAmount;
        return round($Product->producttaaAmount,2);
    }
    public function FinalPrice(Product $Product){
        $this->price2 = 0;
        if($this->Vendor->type != 'Company'){
            $this->price2 = $this->price1;
            return $this->price2;
        }else{
            $this->price2 = $this->price1 + round($Product->producttaaAmount,2);
            return $this->price2;
        }
    }
    public function Quantity(Product $Product){
        $this->quantity += $Product->quantity;
        return $Product->quantity;
    }
    public function Total(Product $Product){
        return $this->price2 * $Product->quantity;
    }
    public function Status(Product $Product){
        return 'Sold';
    }
    public function PaymentStatus(Product $Product){
        return 'Payed';
    }
    public function Choose(Product $Product){
        return  '<input  type="checkbox" onclick="paycaledit()" checked data-amount='.($Product->manufacturerPrice +$Product->shipping_price)* $Product->quantity.' name="Payed[]" value='.$Product->OrderID.','.$Product->id.'>';
    }

    function checkKeyexist($id,$ReturnItems){
        if(empty($ReturnItems)){ return false;}
        foreach ($ReturnItems as $key => $value) {
            if($value->id == $id){
                return true;
            }
        }
    }

}
