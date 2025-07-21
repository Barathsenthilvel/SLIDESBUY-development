<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Storeconfiguration;
use App\Models\Attribute;
use App\Models\Tax;
use App\Models\CustomerGroup;
use App\Models\Vendor;
use Auth;
class Product extends Model
{
    use HasFactory;

    private $price = 0;
    private $offer = 0;
    private $isoffer = false;
    private $Tax = null;
    private $discount  = null;
    private $CustomerGroup  = null;
    Private $vendorobj = null;
    Private $VendorPrice = 0;
    private $specialOffer = 0;

    public function getCategory(){
        $return = "";
        $array = explode('|',$this->category);
        $datas = Category::wherein('id',$array)->get();
        foreach($datas as $data){
            $return .= $data->category_name.' , ';
        }
        return $return;
    }
    public function getStoredAttribute(){
        return ['offer'=>$this->offer];
    }


    public function productVendors(){
    	return $this->belongsTo('App\Models\Vendor','vendor')->where('status','1');
    }


    // public function getOurpriceAttribute(){
    //     if($this->mark_type == 0) return $this->manufacturerPrice + $this->markup;
    //     return $this->manufacturerPrice + ($this->manufacturerPrice/100)*$this->markup;
    // }
    public function getDiscountmrpAttribute(){
        return $this->mrp-$this->ourprice;
    }
    public function getSaveingsAttribute(){
        return ['%'=>round(($this->mrp-$this->ourprice)/($this->mrp/100),2)." %",'save_amount'=>round($this->mrp - $this->ourprice,2)];
    }

    public function getproductPrice(){
        if($this->vendor != null){
            $this->vendorobj = Vendor::where('id',$this->vendor)->first();
        }
        $this->store = Storeconfiguration::where('id',1)->first();
        $this->Tax = Tax::where('id',$this->tax)->where('status',1)->first();
        $this->price = $this->ourprice;
        // $this->price = $this->vendortax();
        // $this->discount();
        $this->VendorPrice = $this->price;
        $this->price =  $this->CustomerGroup();
        $producttaaAmount =  $this->producttaaAmount();
        if($this->store->include_tax != "Exclusive"){
            $this->producttax($this->Tax);
        }

        return  (object)['specialOffer'=>$this->specialOffer,'VendorPrice'=>$this->VendorPrice,'producttaaAmount'=>round($producttaaAmount,2),'price'=>round($this->price,2),'offer'=>round($this->offer,2),'isoffer'=>$this->isoffer,'tax'=>$this->Tax,'discount'=>$this->discount,'CustomerGroup'=>$this->CustomerGroup,'Vendor'=>$this->vendorobj];
    }

    function VendorPrice(){
        if($this->store->include_tax != "Exclusive"){
        if(!empty($this->Tax)){
            if($this->Tax->tax_type == 1){
               return ((float)($this->price/100)*$this->Tax->tax_rate)+(float)$this->price;
            }else{
               return (float)$this->Tax->tax_rate+(float)$this->price;
            }
        }
        }else{
            return $this->price;
        }
    }

    function discount(){
        $date = today()->format('Y-m-d');
        $Discount = Discount::where('status',1)->where('product','LIKE',"%{$this->id}%")->where('expiry_date', '>=', $date)->first();

        if(!empty($Discount)){
            $this->isoffer = true;
            $this->discount = $Discount;
           if($this->mark_type == 1){
               $markup = ($this->manufacturerPrice/100)*$this->markup;
           }else{
               $markup = $this->markup;
           }

            if($Discount->type == 'RS'){
                $this->offer = (float)$markup -(float)$Discount->number;
                $this->specialOffer = $this->price - $this->offer;
            }else{

                $this->offer = ((float)$markup/100)*(float)$Discount->number;
                $this->specialOffer = $this->price -$this->offer;
            }

            $this->price = $this->price - $this->offer;
            $this->offer = number_format($this->offer, 2, '.', '');
        }
    }

    function producttaaAmount(){
        $producttaaAmount = round($this->price);
        if(!empty($this->Tax)){
            if($this->Tax->tax_type == 1){
                 return ((float)($producttaaAmount/100)*$this->Tax->tax_rate);
            }else{
                return (float)$this->Tax->tax_rate;
            }
        }

        return 0;
    }
    function producttax($tax){
        $this->Tax = $tax;
        if(!empty($this->Tax)){
            if($this->Tax->tax_type == 1){
                $this->price = ((float)($this->price/100)*$this->Tax->tax_rate)+(float)$this->price;
                $this->offer = ((float)($this->offer/100)*$this->Tax->tax_rate)+(float)$this->offer;
            }else{
                $this->price = (float)$this->Tax->tax_rate+(float)$this->price;
                $this->offer = (float)$this->Tax->tax_rate+(float)$this->offer;
            }
        }
    }
    function vendortax(){
        if($this->vendor != null){
            $this->vendorobj = Vendor::where('id',$this->vendor)->first();
            if(empty($this->vendorobj)){
                // return $this->price;
            }
            // return ((float)($this->price/100)*$this->vendorobj->vendorperscent)+(float)$this->price;
        }else{
            // return $this->price;
        }
        return ((float)($this->price/100)*$this->markup)+(float)$this->price;
    }

    function reviewtotal(){
        $reviewtotal = 0;
        $total = 0;
        $Review = Review::where('product_id',$this->id)->get();
        foreach ($Review as $key => $value) {
            $reviewtotal += $value->rating;
            $total =+1;
        }
        $reviewtotal =  (count($Review)>0?floatval(($reviewtotal/count($Review))*10)*2:0);
        $this->review = $reviewtotal;

        unset($this->store);

        $this->update();
        $reviewtotal=number_format((float)$reviewtotal, 1, '.', '');
        return (object)['reviewtotal'=>$reviewtotal,'total'=>count($Review)];
    }

    function CustomerGroup(){

        if(Auth::check()){
            $user = Auth::user();
            $this->CustomerGroup = CustomerGroup::where('status',1)->where('id',$user->customer_type)->first();
                if($this->CustomerGroup->id == 2){
                    $this->discount();
                    return $this->price;
                }
                if($this->CustomerGroup->type == 1){
                    return (float)$this->price -((float)($this->price/100)*(float)$this->CustomerGroup->amount);
                }else{
                    return  (float)$this->price - (float)$this->CustomerGroup->amount;
                }
        }else{
            $this->CustomerGroup = CustomerGroup::where('status',1)->where('id',1)->first();
            if($this->CustomerGroup->type == 1){
                    return (float)$this->price -((float)($this->price/100)*(float)$this->CustomerGroup->amount);
                }else{
                    return  (float)$this->price - (float)$this->CustomerGroup->amount;
                }
        }
    }

    public function Methodattribute(){
        $array = [];
        $attribute_values  = explode("|",$this->attribute_values);
        foreach($attribute_values as $value){
            $value1 = \explode("-",$value);
            $Att =  Attribute::where('status','1')->where('id',$value1[0])->first();
            if(!empty($Att)){
                $value1[0] = $Att->attribute_name;
                $array[] = $value1;
            }
        }
        return $array;
    }
    public function quantity(){
        return Product::where('id',$this->id)->first()->quantity;
    }
    public function Manufacturer(){
        if($this->vendor != null){
            $vendor = Vendor::where('id',$this->vendor)->first();
            if(empty($vendor)){
                return $this->manufacturerCode;
            }else{
                return $vendor->manufacturerID.'-'.$this->manufacturerCode;
            }
        }else{
            return 'Admin-'.$this->manufacturerCode;
        }
    }
    public function vendor(){
        if($this->vendor != null){
            $vendor = Vendor::where('id',$this->vendor)->first();
            if(empty($vendor)){
                return "Vendor Not Found";
            }else{
                return $vendor->name;
            }
        }else{
            return 'Admin';
        }
    }
    public function product_sku(){
        $store = Storeconfiguration::where('id',1)->first();
        return $store->productIdprefix.''.$this->product_sku;
    }
        public function getcategorys(){
        $return = "";
        $array = \explode('|',$this->category);
        $Category=Category::whereIn('id',$array)->get();
            foreach ($Category as $key => $value) {
                $return .= $value->category_name.'</br>';
            }
        return $return;
    }
        public function getcategort(){
        $return = "";
        $array = \explode('|',$this->category);
        $Category=Category::whereIn('id',$array)->get();
        return $Category;
        foreach ($Category as $key => $value) {
            $return .= $value->category_name.', ';
        }
        return $return;
    }
}
