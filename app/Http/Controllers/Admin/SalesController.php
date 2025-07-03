<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Auth;
use DataTables;


class SalesController extends Controller
{
    public $Orders = null;

    public  function index(){
      return view('admin.sales.salesReport');
    }
    public  function order(){
      return view('admin.sales.orderReport');
    }
    public  function product(){
      return view('admin.sales.productReport');
    }
    public function orderReport(Request $request){
      $help = new Helper();
    
    $this->Orders = Order::orderBy('id','desc')->whereDate('created_at','>=',$request->FromDate)->whereDate('created_at','<=',$request->ToDate)->get()->unique('order_id');
      if(Auth::user()->is_vendor != null){
        $this->Orders = $this->VendoeOrder($Orders);
      }
      //Convert to productWise
      $this->Orders = $this->ConvertToProduct($this->Orders);

      return DataTables::of($this->Orders)
      ->addIndexColumn()
      ->addColumn('Order_id', function(Order $data) use ($help) { 
        $help->getStore($data);
        return $help->storeConfig->OrderIDPrefix.''.sprintf('%03d',$data->map_id);
      })
      ->addColumn('Order_date', function(Order $data){ 
        return date('d-m-Y', strtotime($data->created_at));;
      })
      ->addColumn('total_mrp', function(Order $data) use ($help){ 
        return $help->total_mrp();
      })
      ->addColumn('discountmrp', function(Order $data) use ($help){ 
        return $help->discountmrp();
      })
      ->addColumn('specialdiscount_total', function(Order $data) use ($help){ 
        return $help->specialdiscount_total();
      })
      ->addColumn('coupen', function(Order $data) use ($help){ 
        return $help->coupen();
      })
      ->addColumn('totalPrice', function(Order $data) use ($help){ 
        return $help->totalPrice();
      })
      ->addColumn('totaltax', function(Order $data) use ($help){ 
        return $help->totaltax();
      })
      ->addColumn('deliverycharge', function(Order $data) use ($help){ 
        return $help->deliverycharge();
      })
      ->addColumn('grandTotal', function(Order $data) use ($help){ 
        return $help->grandTotal();
      })
      ->addColumn('total_items',function(Order $data){
            return $data->totalitemsorders;
        })
      ->addColumn('order_status', function(Order $data){ 
        return $data->orderstatus;
      })
      ->rawColumns([])
    //   ->rawColumns(['Order_id','Product_sku','vendorsku','Product_name','vendorIDName','Cost','markup','markupprice','PriceOne','Customer','CustomerPrice','PriceTwo','dscount','DiscountPrice','PriceThree','Coupon','CouponPrice','Amount','ProductTax','ProductTaxAmount','Total','Quantity','TotalAmount','CustomerPay','ProfitLoss','status'])
    
      ->toJson();
    }
    public function productReport(Request $request){
      $help = new Helper();
    
    $this->Orders = Order::orderBy('id','desc')->whereDate('created_at','>=',$request->FromDate)->whereDate('created_at','<=',$request->ToDate)->get();
      if(Auth::user()->is_vendor != null){
        $this->Orders = $this->VendoeOrder($Orders);
      }
      //Convert to productWise
      $this->Orders = $this->ConvertToProduct($this->Orders);

      return DataTables::of($this->Orders)
      ->addIndexColumn()
      ->addColumn('Order_id', function(Order $data) use ($help) { 
        $help->getStore($data);
        return $help->storeConfig->OrderIDPrefix.''.sprintf('%03d',$data->map_id);
      })
      ->addColumn('Order_date', function(Order $data){ 
        return date('d-m-Y', strtotime($data->created_at));;
      })
      ->addColumn('Product_sku', function(Order $data) use ($help) { 
        return $help->getReportProductSKU($data);
      })
      ->addColumn('Product_name', function(Order $data) use ($help) { 
        return $data->ReportItem->product_title;
      })
      ->addColumn('CustomerDetails', function(Order $data) use ($help) { 
        return $help->CustomerDetails($data);
      })
      ->addColumn('vendorIDName', function(Order $data) use ($help) { 
        return $help->vendor($data);
      })
      ->addColumn('mrp', function(Order $data) use ($help) { 
        return $help->mrp($data);
      })
      ->addColumn('seller_price', function(Order $data) use ($help) { 
        return $help->ourprice($data);
      })
      ->addColumn('Discount_price', function(Order $data) use ($help) { 
        return $help->Discount_price($data);
      })
      ->addColumn('special_discount_price', function(Order $data) use ($help) { 
        return $help->special_discount_price($data);
      })
      ->addColumn('Coupon_price', function(Order $data) use ($help) { 
        return $help->Coupon_price($data);
      })
      ->addColumn('Taxable_amount', function(Order $data) use ($help) { 
        return $help->Taxable_amount($data);
      })
      
      
      ->addColumn('Quantity', function(Order $data) use ($help) { 
        return $help->Quantity($data);
      })
      
      ->addColumn('ProductTaxAmount', function(Order $data) use ($help) { 
          
        return $help->ProductTaxAmount($data);
      })
      ->addColumn('Charge', function(Order $data) use ($help) { 
        return $help->Charge($data);
      })
      ->addColumn('Final', function(Order $data) use ($help) {
        return $help->Final($data);
      })
      ->addColumn('ProfitLoss', function(Order $data) use ($help) { 
          
        return $help->ProfitLoss($data);
      })
      ->addColumn('manufacturerPrice', function(Order $data) use ($help) { 
          
        return $help->manufacturerPrice($data);
      })
      
    //   ->addColumn('vendorsku', function(Order $data) use ($help) { 
    //     return $help->getReportvendorSKU($data);
    //   })
    //   ->addColumn('Cost', function(Order $data) use ($help) { 
    //     return $data->ReportItem->manufacturerPrice;
    //   })
    //   ->addColumn('markup', function(Order $data) use ($help) { 
    //     return $help->markup($data);
    //   })
    //   ->addColumn('markupprice', function(Order $data) use ($help) { 
    //     return $help->markupprice($data);
    //   })
    //   ->addColumn('PriceOne', function(Order $data) use ($help) { 
    //     return $help->PriceOne($data);
    //   })
    //   ->addColumn('Customer', function(Order $data) use ($help) { 
    //     return $help->Customer($data);
    //   })
    //   ->addColumn('CustomerPrice', function(Order $data) use ($help) { 
    //     return $help->CustomerPrice($data);
    //   })
    //   ->addColumn('PriceTwo', function(Order $data) use ($help) { 
    //     return $help->PriceTwo($data);
    //   })
    //   ->addColumn('discount', function(Order $data) use ($help) { 
    //     return $help->discount($data);
    //   })
    //   ->addColumn('DiscountPrice', function(Order $data) use ($help) { 
    //     return $help->DiscountPrice($data);
    //   })
    //   ->addColumn('PriceThree', function(Order $data) use ($help) { 
    //     return $help->PriceThree($data);
    //   })
    //   ->addColumn('Coupon', function(Order $data) use ($help) { 
    //     return $help->Coupon($data);
    //   })
    //   ->addColumn('CouponPrice', function(Order $data) use ($help) { 
    //     return $help->CouponPrice($data);
    //   })
    //   ->addColumn('Amount', function(Order $data) use ($help) { 
    //     return $help->PriceThree;
    //   })
    //   ->addColumn('ProductTax', function(Order $data) use ($help) { 
    //     return $help->ProductTax($data);
    //   })
    //   ->addColumn('Total', function(Order $data) use ($help) { 
    //     return $help->Total($data);
    //   })
    //   ->addColumn('TotalAmount', function(Order $data) use ($help) { 
    //     return $help->TotalAmount($data);
    //   })
    //   ->addColumn('CustomerPay', function(Order $data) use ($help) { 
    //     return $help->TotalAmount($data);
    //   })
    //   ->addColumn('ProfitLoss', function(Order $data) use ($help) { 
    //     return $help->ProfitLoss($data);
    //   })
    //   ->addColumn('status', function(Order $data) use ($help) { 
    //     return $help->status($data);
    //   })
      ->rawColumns(['Order_id','Order_date','Product_sku','Product_name','vendorIDName','Quantity','seller_price','ProductTaxAmount','Charge','Final','ProfitLoss'])
    //   ->rawColumns(['Order_id','Product_sku','vendorsku','Product_name','vendorIDName','Cost','markup','markupprice','PriceOne','Customer','CustomerPrice','PriceTwo','dscount','DiscountPrice','PriceThree','Coupon','CouponPrice','Amount','ProductTax','ProductTaxAmount','Total','Quantity','TotalAmount','CustomerPay','ProfitLoss','status'])
    
      ->toJson();
    }
    public function salesReport(Request $request){
      $help = new Helper();
    //   $this->Orders = Order::orderBy('id','desc')->whereBetween('Deliverydate',[$request->FromDate, $request->ToDate])->get();
    $this->Orders = Order::orderBy('id','desc')->whereDate('Deliverydate','>=',$request->FromDate)->whereDate('Deliverydate','<=',$request->ToDate)->get();
      if(Auth::user()->is_vendor != null){
        $this->Orders = $this->VendoeOrder($Orders);
      }
      //Convert to productWise
      $this->Orders = $this->ConvertToProduct($this->Orders);

      return DataTables::of($this->Orders)
      ->addIndexColumn()
      ->addColumn('Order_id', function(Order $data) use ($help) { 
        $help->getStore($data);
        return $help->storeConfig->OrderIDPrefix.''.sprintf('%03d',$data->map_id);
      })
      ->addColumn('Order_date', function(Order $data){ 
        return date('d-m-Y', strtotime($data->created_at));;
      })
      ->addColumn('Product_sku', function(Order $data) use ($help) { 
        return $help->getReportProductSKU($data);
      })
      ->addColumn('Product_name', function(Order $data) use ($help) { 
        return $data->ReportItem->product_title;
      })
      ->addColumn('vendorIDName', function(Order $data) use ($help) { 
        return $help->vendor($data);
      })
      ->addColumn('Quantity', function(Order $data) use ($help) { 
        return $help->Quantity($data);
      })
      ->addColumn('seller_price', function(Order $data) use ($help) { 
        return $help->seller_price($data);
      })
      ->addColumn('VendorPrice', function(Order $data) use ($help) { 
        return $help->VendorPrice($data);
      })
      ->addColumn('ProductTaxAmount', function(Order $data) use ($help) { 
          
        return $help->ProductTaxAmount($data);
      })
      ->addColumn('Charge', function(Order $data) use ($help) { 
        return $help->Charge($data);
      })
      ->addColumn('Final', function(Order $data) use ($help) {
        return $help->Final($data);
      })
      ->addColumn('ProfitLoss', function(Order $data) use ($help) { 
          
        return $help->ProfitLoss($data);
      })
      ->addColumn('manufacturerPrice', function(Order $data) use ($help) { 
          
        return $help->manufacturerPrice($data);
      })
      
    //   ->addColumn('vendorsku', function(Order $data) use ($help) { 
    //     return $help->getReportvendorSKU($data);
    //   })
    //   ->addColumn('Cost', function(Order $data) use ($help) { 
    //     return $data->ReportItem->manufacturerPrice;
    //   })
    //   ->addColumn('markup', function(Order $data) use ($help) { 
    //     return $help->markup($data);
    //   })
    //   ->addColumn('markupprice', function(Order $data) use ($help) { 
    //     return $help->markupprice($data);
    //   })
    //   ->addColumn('PriceOne', function(Order $data) use ($help) { 
    //     return $help->PriceOne($data);
    //   })
    //   ->addColumn('Customer', function(Order $data) use ($help) { 
    //     return $help->Customer($data);
    //   })
    //   ->addColumn('CustomerPrice', function(Order $data) use ($help) { 
    //     return $help->CustomerPrice($data);
    //   })
    //   ->addColumn('PriceTwo', function(Order $data) use ($help) { 
    //     return $help->PriceTwo($data);
    //   })
    //   ->addColumn('discount', function(Order $data) use ($help) { 
    //     return $help->discount($data);
    //   })
    //   ->addColumn('DiscountPrice', function(Order $data) use ($help) { 
    //     return $help->DiscountPrice($data);
    //   })
    //   ->addColumn('PriceThree', function(Order $data) use ($help) { 
    //     return $help->PriceThree($data);
    //   })
    //   ->addColumn('Coupon', function(Order $data) use ($help) { 
    //     return $help->Coupon($data);
    //   })
    //   ->addColumn('CouponPrice', function(Order $data) use ($help) { 
    //     return $help->CouponPrice($data);
    //   })
    //   ->addColumn('Amount', function(Order $data) use ($help) { 
    //     return $help->PriceThree;
    //   })
    //   ->addColumn('ProductTax', function(Order $data) use ($help) { 
    //     return $help->ProductTax($data);
    //   })
    //   ->addColumn('Total', function(Order $data) use ($help) { 
    //     return $help->Total($data);
    //   })
    //   ->addColumn('TotalAmount', function(Order $data) use ($help) { 
    //     return $help->TotalAmount($data);
    //   })
    //   ->addColumn('CustomerPay', function(Order $data) use ($help) { 
    //     return $help->TotalAmount($data);
    //   })
    //   ->addColumn('ProfitLoss', function(Order $data) use ($help) { 
    //     return $help->ProfitLoss($data);
    //   })
    //   ->addColumn('status', function(Order $data) use ($help) { 
    //     return $help->status($data);
    //   })
      ->rawColumns(['Order_id','Order_date','Product_sku','Product_name','vendorIDName','Quantity','seller_price','ProductTaxAmount','Charge','Final','ProfitLoss'])
    //   ->rawColumns(['Order_id','Product_sku','vendorsku','Product_name','vendorIDName','Cost','markup','markupprice','PriceOne','Customer','CustomerPrice','PriceTwo','dscount','DiscountPrice','PriceThree','Coupon','CouponPrice','Amount','ProductTax','ProductTaxAmount','Total','Quantity','TotalAmount','CustomerPay','ProfitLoss','status'])
    
      ->toJson();
    }

    
    function ConvertToProduct($Order){
      $newOrder = [];
      foreach ($Order as $key => $value) {
        $cartitem = unserialize(bzdecompress(utf8_decode($value->card)));
        
        foreach ($cartitem->singleorder as $key1 => $value1) {
          if(array_key_exists($value1->id,$cartitem->ReturnItems)){
              
              $clone = clone $value;
              $sold = clone $value1;
              $sold['mainquantity'] = $sold->quantity;
              $sq = $sold->quantity - $cartitem->ReturnItems[$value1->id]->Returnquantity;
              $sold->quantity = $sq;
              $sold['status'] = 'Sold';
              if($sold->quantity > 0){ $clone['ReportItem'] = $sold; array_push($newOrder,$clone); }
              
              $clone = clone $value;
              $return = clone $value1;
              $return['mainquantity'] = $return->quantity;
              $return->quantity = $cartitem->ReturnItems[$value1->id]->Returnquantity;
              $return['status'] = 'Return';
              if($return->quantity > 0){ $clone['ReportItem'] =  $return; array_push($newOrder,$clone); }
              
          }else{
            $clone = clone $value;
            $value1 = clone $value1;
            $value1['status'] = 'Sold';
            $value1['mainquantity'] = $value1->quantity;
            $clone['ReportItem'] = $value1;
            array_push($newOrder,$clone);
          }
          
        }
      }
      return $newOrder;
    }

    function VendoeOrder($Orders){
        $Orders = $Orders->filter(function($Order){
            $Amount = 0;
            $true = false;
            $cartitem = unserialize(bzdecompress(utf8_decode($Order->card)));
            $array = [];
            foreach ($cartitem->items as $key => $items) {
              if($items->vendor == Auth::user()->is_vendor){
                $true = true;
                $Amount += $items->total;
                $array[] = $items;
              }
            }
            if($true){
              $Order['amount'] = $Amount;
              $Order['vendorItems'] = $array;
              $array = [];
              return $Order;
            }
        });
        return $Orders;
    }
}

//  HELPER Class


class Helper {

  public $OrderID = null;
  public $Cart = null;
  public $storeConfig = null;
  public $vendor = null;
  public $OrderData = null;
  public $PriceOne = 0;
  public $PriceTwo = 0;
  public $PriceThree = 0;
  
  public $charge = 0;
  public $TAX = 0;
  public $FINAL = 0;

  public function getStore(Order $Order){
    $this->OrderData = $Order;
    $this->PriceOne = 0;
    $this->PriceTwo = 0;
    $this->PriceThree = 0;
    if($Order->id == $this->OrderID){
      $this->OrderData = $Order;
      return $storeConfig;
    }else{
      $this->Cart = unserialize(bzdecompress(utf8_decode($Order->card)));
      $this->storeConfig = $this->Cart->storeConfig;
    }
  }

public function total_mrp(){
    return $this->Cart->totalmrp ?? 0;
}
public function discountmrp(){
    return $this->Cart->discountmrp ?? 0;
}
public function specialdiscount_total(){
    return $this->Cart->specialdiscount ?? 0;
}
public function coupen(){
    return $this->Cart->coupen ?? 0;
}
public function totalPrice(){
    return $this->Cart->totalPrice ?? 0;
}
public function totaltax(){
    return $this->Cart->tax ?? 0;
}
public function deliverycharge(){
    return $this->Cart->deliverycharge ?? 0;
}
public function grandTotal(){
    return $this->Cart->grandTotal ?? 0;
}


  public function getReportProductSKU(Order $order){
    //   return $order->ReportItem->vendorObject;
    return $this->storeConfig->productIdprefix."".sprintf('%03d',$order->ReportItem->product_sku);
  }
    public function mrp(Order $order){ 
        return $order->ReportItem->mrp;
    }
  public function getReportvendorSKU(Order $order){
    //   return $order->ReportItem->vendor;
    if($order->ReportItem->vendor != ""){
      $this->Vendor = Vendor::where('id',$order->ReportItem->vendor)->first();
      if(empty($this->Vendor)){
        return "vendor Not Found";
      }else{
        return $this->storeConfig->VendorIDPrefix.''.$this->Vendor->manufacturerID;
      }
    }else{
      return "Admin";
    }
  }
public function ourprice(Order $order){
    return $order->ReportItem->product_base_price;
}
    public function specialDiscount(Order $order){
        dd($order->ReportItem);
    }
  public function vendor(Order $order){
    if($order->ReportItem->vendor != ""){
        $this->Vendor = Vendor::where('id',$order->ReportItem->vendor)->first();
      if(empty($this->Vendor)){
        return "vendor Not Found";
      }else{
        return $this->Vendor->name.'<br>'.$this->storeConfig->VendorIDPrefix.''.$this->Vendor->id;
      }
    }else{
      return "Admin";
    }
  }
  public function Final(Order $order){
      if($this->storeConfig->include_tax == "Exclusive"){
          return round((float)$order->ReportItem['total']+(float)$order->ReportItem['producttaaAmount']-(float)$order->ReportItem['coupon_amount'],2);
      }else{
          return round($order->ReportItem['total']+$order->ReportItem['producttaaAmount']-$order->ReportItem['coupon_amount'],2);
      }
  }
   public function ProductTaxAmount(Order $order){
       $this->TAX = round((float)$order->ReportItem['producttaaAmount'],2);
        return $this->TAX;
  }
  
  public function Charge(Order $order){
      $this->charge = (($this->Cart->grandTotal/100)*2)/count($this->Cart->items);
    return $this->charge;
  }
  public function seller_price(Order $order){
    
     if($this->storeConfig->include_tax == "Exclusive"){
          return round((float)$order->ReportItem['total']+$order->ReportItem['producttaaAmount']-(float)$order->ReportItem['coupon_amount'],2);
      }else{
        return round($order->ReportItem['total']-$order->ReportItem['coupon_amount'],2);
      }
  }
  public function VendorPrice(Order $order){
      return $order->ReportItem->VendorPrice;
  }
  public function ProfitLoss(Order $order){
    
    // return round($order->ReportItem['total'] - ($order->ReportItem->manufacturerPrice*$order->ReportItem->quantity) - $order->ReportItem->producttaaAmount - $this->charge,2);
    
    if($this->storeConfig->include_tax == 'Exclusive'){
        return round($order->ReportItem->total  - ($order->ReportItem->VendorPrice*$order->ReportItem->quantity) - $this->charge,2);
      }else{
         return round($order->ReportItem->total - ($order->ReportItem->VendorPrice*$order->ReportItem->quantity) - $this->charge,2);
      }
  }
  
  public function manufacturerPrice(Order $order){
      return $order->ReportItem->manufacturerPrice*$order->ReportItem->quantity;
  }
  
  
  
  
  
  
  
  public function markupprice(Order $order){
    if($order->ReportItem->vendor != ""){
      if(empty($this->Vendor)){
        return "vendor Not Found";
      }else{
        return ($order->ReportItem->manufacturerPrice/100)*$this->Vendor->vendorperscent;
      }
    }else{
      return 0;
    }
  }

  public function markup(Order $order){
    if($order->ReportItem->vendor != ""){
      if(empty($this->Vendor)){
        return "vendor Not Found";
      }else{
        return $this->Vendor->vendorperscent.'%';
      }
    }else{
      return '0%';
    }
  }

  public function PriceOne(Order $order){
    if($order->ReportItem->vendor != ""){
      if(empty($this->Vendor)){
        return "vendor Not Found";
      }else{
        $this->PriceOne = (($order->ReportItem->manufacturerPrice/100)*$this->Vendor->vendorperscent)+$order->ReportItem->manufacturerPrice;
        return $this->PriceOne;
      }
    }else{
      $this->PriceOne = 0+$order->ReportItem->manufacturerPrice;
      return $this->PriceOne;
    }
  }

  public function CustomerDetails(Order $order){
      return $order->first_name.' '.$order->last_name;
      return '';
  }
  public function Customer(Order $order){
    if($order->ReportItem->CustomerGroup->type == 1){
      $this->PriceTwo = $order->ReportItem->CustomerGroup->amount;
      return $this->PriceTwo.' %';
    }else{
      $this->PriceTwo = (float)$order->ReportItem->CustomerGroup->amount;
      return  $this->PriceTwo.' RS';
    }
  }
  
  public function CustomerPrice(Order $order){
    if($order->ReportItem->CustomerGroup->type == 1){
      $this->PriceTwo = ((float)($this->PriceOne/100)*(float)$order->ReportItem->CustomerGroup->amount);
      return $this->PriceTwo;
    }else{
      $this->PriceTwo = (float)$order->ReportItem->CustomerGroup->amount;
      return  $this->PriceTwo;
    }
  }


  public function PriceTwo(Order $order){
      $this->PriceTwo = $this->PriceOne - $this->PriceTwo;
      return $this->PriceTwo;
  }

  public function discount(Order $order){
    if(!$order->ReportItem->discount){ return "No Discount"; }
    if($order->ReportItem->discount->type == 'RS'){
        return (float)$order->ReportItem->discount->number.' RS';
    }else{
        return (float)$order->ReportItem->discount->number.' %';
    }
  }

  public function DiscountPrice(Order $order){
    if(!$order->ReportItem->discount){ return "No Discount"; }
    if($order->ReportItem->discount->type == 'RS'){
      $this->PriceThree = (float)$order->ReportItem->discount->number;
      return $this->PriceThree;
    }else{
        $this->PriceThree =$this->PriceTwo - ((float)$this->PriceTwo-((float)$this->PriceTwo/100)*(float)$order->ReportItem->discount->number);
        return $this->PriceThree;
    }
  }

  public function PriceThree(Order $order){
    $this->PriceThree = $this->PriceTwo - $this->PriceThree;
    return $this->PriceThree;
  }

  public function Coupon(Order $order){
    return 0;
  }

  public function CouponPrice(Order $order){
    return 0;
  }
  public function ProductTax(Order $order){
    if($order->ReportItem->producttax->tax_type == 1){
       return $order->ReportItem->producttax->tax_rate. '%';
    }else{
      return $order->ReportItem->producttax->tax_rate . 'Rs';
    }
  }
 public function special_discount_price(Order $order){
     return round(0 - $order->ReportItem->offer,2);
 }
 public function Discount_price(Order $order){
     return round(0 - $order->ReportItem->saveings['save_amount'],2);
 }
 
 public function Coupon_price(Order $order){
     return round(0 - $order->ReportItem['coupon_amount'],2);
 }
 
  public function Total(Order $order){
    return $this->PriceThree*$order->ReportItem->quantity;
  }
  public function Quantity(Order $order){
    return $order->ReportItem->quantity;
  }
  public function Taxable_amount(Order $order){
      if($this->storeConfig->include_tax == "Exclusive"){
    	return round((float)$order->ReportItem['total']-(float)$order->ReportItem['coupon_amount'],2);
      }
    else{
        return round((float)$order->ReportItem['total']-(float)$order->ReportItem['producttaaAmount']-(float)$order->ReportItem['coupon_amount'],2);
    }
  }
  public function TotalAmount(Order $order){
 
      if($this->storeConfig->include_tax == 'Exclusive'){
        return round((($order->ReportItem->total + $order->ReportItem->producttaaAmount)/$order->ReportItem->mainquantity)*$order->ReportItem->quantity,2);   
      }else{
         return round(($order->ReportItem->total/$order->ReportItem->mainquantity)*$order->ReportItem->quantity,2);
      }
  }
//   public function ProfitLoss(Order $order){
//     if($this->storeConfig->include_tax == 'Exclusive'){
//         return round($order->ReportItem->total + $order->ReportItem->producttaaAmount - ($order->ReportItem->manufacturerPrice*$order->ReportItem->quantity),2);
//       }else{
//          return round($order->ReportItem->total - ($order->ReportItem->manufacturerPrice*$order->ReportItem->quantity),2);
//       }
//   }
  public function status(Order $order){
      return $order->ReportItem->status;
  }
  
}


