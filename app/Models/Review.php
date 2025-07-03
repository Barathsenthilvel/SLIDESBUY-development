<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Storeconfiguration;
class Review extends Model
{
    use HasFactory;
    protected $fillable  =['product_id','rating','command','user_id','order_id','vendor_id'];

    public function vendor(){
        return $this->belongsToMany('App\Models\Product', 'product_id');
    }
    public function getproduct(){
        $store = Storeconfiguration::where('id',1)->first();
        $Product = Product::where('id',$this->product_id)->first();
        if(!empty($Product)){
            $Product->product_sku =$store->productIdprefix.' '.$Product->product_sku;
            return $Product;
        }else{
            return "";
        }
    }

    public function getuser(){
        $User = User::where('id',$this->product_id)->first();
        if(!empty($User)){
            return $User;
        }else{
            return "";
        }
    }

    public function getorder(){
        $Order = Order::where('id',$this->product_id)->first();
        if(!empty($Order)){
            return $Order;
        }else{
            return "";
        }
    }
}
