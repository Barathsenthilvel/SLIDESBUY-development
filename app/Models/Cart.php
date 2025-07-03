<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\Storeconfiguration;
use App\Models\Product;
use App\Models\Tax;
class Cart extends Model
{
    use HasFactory;

    public $items = array();
    public $SoldoutItems = array();
    public $ReturnItems = array();
    public $vendorPay = array();
    public $totalmrp = 0;
    public $specialdiscount = 0;
    public $discountmrp = 0;
    public $OrderId = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public $totalitem = 0;
    public $tax = 0;
    public $CouponClass = null;
    public $coupen = 0;
    public $deliverycharge = 0;
    public $grandTotal = 0;
    public $weight = 0;
    Public $deliverytype = null;
    public $storeConfig=null;
    public $return = false;
    public $CODAmount = 0;
    public $deliveryextra = false;
    public $ReturnItemsTemp = array();
    public $singleorder = array();

    public function oldcard($oldCart)
    {
            $this->items = $oldCart->items;
            $this->SoldoutItems = $oldCart->SoldoutItems;
            $this->ReturnItems = $oldCart->ReturnItems;
            $this->vendorPay = $oldCart->vendorPay;
            $this->OrderId = $oldCart->OrderId;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice; 
            $this->totalitem = $oldCart->totalitem;
            $this->tax = $oldCart->tax;
            $this->coupen = $oldCart->coupen;
            $this->deliverycharge = $oldCart->deliverycharge;
            $this->grandTotal = $oldCart->grandTotal;
            $this->weight = $oldCart->weight;
            $this->deliverytype = $oldCart->deliverytype;
            $this->storeConfig = $oldCart->storeConfig;
            $this->return = $oldCart->return;
            $this->CODAmount = $oldCart->CODAmount;
            $this->deliveryextra = $oldCart->deliveryextra;
    }

    public function add($key,$value,$quantity){
        if (array_key_exists($key,$this->items)){
            if($quantity <= 1 ){ if($this->items[$key]['quantity'] < $value->quantity) $this->items[$key]['quantity'] += 1; 
                else $this->items[$key]['quantity'] = $value->quantity; }
            else{ $this->items[$key]['quantity'] = $quantity;}
        }else{
            $this->items[$key] = $value;
            if($quantity == null){ $this->items[$key]['quantity'] = 1; }
            else{ $this->items[$key]['Maxquantity'] = $value->quantity ;$this->items[$key]['quantity'] = $quantity;}
        }
        return $this->total();
    }
    public function remove($key){
        if (array_key_exists($key,$this->items)){
            unset($this->items[$key]);
            return $this->total();
        }
    }
    public function reduce($key,$value,$quantity){
        if (array_key_exists($key,$this->items)){
            if($this->items[$key]['quantity']<=1 || ($this->items[$key]['quantity'] <= $quantity)){
                $this->remove($key);
            }else{
                $this->items[$key]['quantity'] = $quantity;
            }
            return $this->total();
        }
    }
    
    // Reduce
    public function addReduce($key,$quantity){
        $this->removeduplicate($key);
        for($i = 0; $i<$quantity; $i++){
            $value = clone $this->items[$key];
            $this->ReturnItemsTemp[] = $value;
        }
        return true;
    }
    public function removeReduce($key){
        if (array_key_exists($key,$this->ReturnItemsTemp)){
            unset($this->ReturnItemsTemp[$key]);
        }
        $rearrange = [];
        foreach ($this->ReturnItemsTemp as $key => $value) {
            $rearrange[] = clone $value;
        }
        $this->ReturnItemsTemp = $rearrange;
        return true;
    }

    public function removeduplicate($kes){
        foreach($this->ReturnItemsTemp as $key => $remove){
            if($remove->id == $this->items[$kes]->id){
                unset($this->ReturnItemsTemp[$key]);
            }
        }
        $rearrange = [];
        foreach ($this->ReturnItemsTemp as $key => $value) {
            $rearrange[] = clone $value;
        }
        $this->ReturnItemsTemp = $rearrange;
    }

    public function total(){
        $t=0;$q=0;$i=0;$SoldoutItems = [];$producttaaAmount=0;$this->totalmrp = 0;$this->specialdiscount = 0;$this->discountmrp = 0;
        $this->storeConfig = Storeconfiguration::where('id',1)->first();
        $this->tax = 0;
        
        foreach ($this->items as $Key => $value) {
            $Product = Product::where('id',$value['id'])->where('status',1)->where('soldout','=','off')->first();
            if(empty($Product)){ 
                $this->SoldoutItems[$Key] = $this->items[$Key];
                unset($this->items[$Key]);
                continue;
            }
            if($Product->quantity < $Product->minquantity && $Product->quantity != 'unlimited'){
                if (array_key_exists($Key,$this->items)){
                    $this->SoldoutItems[$Key] = $this->items[$Key];
                    unset($this->items[$Key]);
                    continue;
               }
            }else{
                if (array_key_exists($Key, $this->SoldoutItems)){ unset($this->SoldoutItems[$Key]); }
                $ProductData = $Product->getproductPrice();
                $producttaaAmount = $ProductData->producttaaAmount*$value['quantity'];
                $this->items[$Key]['total'] = $ProductData->price*$value['quantity'];
                
                
                $this->items[$Key]['CustomerGroup'] = $ProductData->CustomerGroup;
                $this->items[$Key]['discount'] = $ProductData->discount;
                $this->items[$Key]['vendorObject'] = $ProductData->Vendor;
                $this->items[$Key]['VendorPrice'] = $ProductData->VendorPrice;
                $this->items[$Key]['coupon_amount'] = 0;
                $this->items[$Key]['offer'] = $ProductData->offer;
                $t += $this->items[$Key]['total'];
                $q += $value['quantity'];
                $this->totalmrp += $Product->mrp*$value['quantity'];
                $this->discountmrp += $Product->discountmrp*$value['quantity'];
                $this->specialdiscount = ($this->specialdiscount) + $ProductData->offer * $value['quantity'];
                $i++;
            }
            $this->producttax($Product,$this->items[$Key],$producttaaAmount,$this->storeConfig->include_tax);
        }
        $this->totalPrice = $t;
        $this->totalQty = $q;
        $this->totalitem = $i;
        
        if($this->CouponClass){
            $tttt = 0;
            $this->tax = 0;
            foreach ($this->items as $Key => $value) { 
                $this->items[$Key]['coupon_amount'] = ($value->total/$this->totalPrice)*$this->coupen;
                $this->Calculate_coupon_tax($this->items[$Key]);
            }
           
            $this->totalPrice -= $this->coupen;
        }
        
        
        $this->grandTotal = $this->totalPrice;
        $this->grandTotal += $this->deliverycharge;
        if($this->storeConfig->include_tax == "Exclusive"){
            $this->tax = round($this->tax,2);
            $this->grandTotal += $this->tax;
        }
        
        $this->weight = $this->get_weight();
    }
    function producttax($Product,$price,$producttaaAmount,$include_tax){
        $Tax = Tax::where('id',$Product->tax)->where('status',1)->first();
        // dd($price);
        $this->items[$Product->id]['producttax'] = $Tax;
        
        $this->items[$Product->id]['producttaaAmount'] = $producttaaAmount;
        $this->tax += $producttaaAmount;
    }
    
    function Calculate_coupon_tax($value){
       
        if(!empty($value->producttax)){
            if($value->producttax->tax_type == 1){
                 $TAX = ((float)(($value->total-$value['coupon_amount'])/100)*$value->producttax->tax_rate);
            }else{
                $TAX = (float)$value->producttax->tax_rate;
            }
            
            $this->items[$value->id]['producttaaAmount'] = $TAX;
            $this->tax += $TAX;
        }
    }
    
    public function checkout(){
        $return = [];
        foreach ($this->items as $key => $value) {
            $Product = Product::where('id',$value->id)->where('status',1)->first();
            if(!empty($Product)){
                if($Product->quantity != "unlimited"){
                    if($Product->quantity < $value['quantity']){
                        $return[] = $Product->product_title.' (only '.$Product->quantity.' quantity available)';
                    }
                }
            }
        }
        return $return;
    }
    
    public function productreducr(){
        foreach ($this->items as $key => $value) {
            $Product = Product::where('id',$value->id)->first();
            if($Product->quantity != 'unlimited'){
                $Product->quantity = (int)$Product->quantity - $value['quantity'];
                if((int)$Product->quantity < (int)$Product->minquantity){
                    $Product->soldout = 'on';
                    }
                    $Product->update();
                }
            }
        }
    public function get_weight(){
        $weight = 0;
        foreach ($this->items as $key => $value) {
            if($value->weight_unit == '1'){
                $weight += $value['quantity']*(float)$value->weight;
            }else{
                $weight += $value['quantity']*(float)$value->weight*1000;
            }
        }
        return $weight;
    }
    
    public function addextecharge(){
        $this->deliveryextra = true;
        $this->deliverycharge += $this->CODAmount;
        $this->grandTotal += $this->CODAmount;
    }
    public function reduceextecharge(){

        if($this->deliveryextra){
            $this->deliverycharge -= $this->CODAmount;
            $this->grandTotal -= $this->CODAmount;
        }
        $this->deliveryextra = false;
    }
}
