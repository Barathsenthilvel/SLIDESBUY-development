<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Orderlog;
use App\Models\Order;
use App\Models\Review;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Order extends Model
{
    protected $fillable = ['shipping_street','vendor_id','shipping_country','delivery_status','payment_status','order_id','stripe_object','id','user_id' ,'card','first_name' ,'last_name' ,'apparment' ,'street' ,'city','state' ,'post_code' ,'phone' ,'email','reason' ,'shipping_first_name' ,'shipping_last_name' ,'shipping_address' ,'shipping_apparments' ,'shipping_city' ,'shipping_state' ,'shipping_post_code' ,'shipping_phone' ,'payment_method' ,'tax' ,'totalPrice','grandTotal','delivery_notes','country','Deliverydate'];
    
    public function getbillingaddress(){
         $address = [];
        $return = '';
        if($this->shipping_city) $address[] = $this->shipping_city;
        if($this->shipping_state) $address[] = $this->shipping_state;
        if($this->shipping_country) $address[] = $this->shipping_country;
        $return = \implode(',',$address);
        if($this->shipping_address) { $return = $this->shipping_address."<br>".$return;}
        if($this->shipping_post_code) { $return = $return."<br>".$this->shipping_post_code;}
        return $return;
    }
    
    public function getdialing(){
        $Country = Country::where('country_name',$this->shipping_country)->first();
        return str_replace('+','',$Country->dialing).''.$this->phone;
    }
    public function getorderlogAttribute(){
        return Orderlog::where('order_id',$this->id)->orderBy('id', 'desc')->get();
    }
    public function getratingAttribute(){
        return Review::where('order_id',$this->id)->first();
        // return $this->belongsTo(Review::class);
    }
    public function gettotalitemsordersAttribute(){
        $orders = Order::where('order_id',$this->order_id)->get();
        return count($orders);
    }
    public function getvendororderdataAttribute(){
        $is_vendor = auth()->user()->is_vendor ?? null;
        if(!$is_vendor){
            return ['count'=>0,'total'=>0];
        }
        $orders = Order::when($is_vendor,function($query,$search){
            return $query->where('vendor_id',$search);
        })
        ->where('order_id',$this->order_id)->get();
        $Total = 0;
        foreach($orders as $order){
            $items = unserialize(bzdecompress(utf8_decode($order->card)));
            $item = $items->singleorder[0];
            $Total += round((float)$item['total']+(float)$item['producttaaAmount']-(float)$item['coupon_amount'],2);
        }
        return ['count'=>count($orders),'total'=>$Total];
    }
    public function getorderstatusAttribute(){
        $is_vendor = auth()->user()->is_vendor ?? null;
        
        $orders = Order::when($is_vendor,function($query,$search){
            return $query->where('vendor_id',$search);
        })
        ->where('order_id',$this->order_id)->get()->pluck('delivery_status')->toArray();
        // dd($orders);
        $Status = ['Order Placed','Order In process','Order Completed','Order Cancelled'];
        
        if(array_unique($orders) === array('placed')) return ['Order Placed','placed',0,$this->overallstatus($orders)];
        // if(array_unique($orders) === array('Confirmed')) return ['Order Placed','Confirmed',0];
        
        if(in_array('Shipped', $orders) || in_array('Confirmed', $orders)) return ['Order In process','Shipped',1,$this->overallstatus($orders)];
        
        if(array_unique($orders) === array('Delivered')) return ['Order Completed','Delivered',2,$this->overallstatus($orders)];
        if(array_unique($orders) === array('Canceled')) return ['Order Cancelled','Canceled',3,$this->overallstatus($orders)];
        
        if(!in_array('Shipped', $orders) && in_array('Delivered', $orders) && in_array('Canceled', $orders)) return ['Order Completed','Delivered',2,$this->overallstatus($orders)];
        return ['Order In process','Shipped',1,$this->overallstatus($orders)];
        
    }
    function overallstatus($orders){
        $obj = new \stdClass();
        foreach($orders as $statu){
            if(isset($obj->{$statu})) $obj->{$statu} = $obj->{$statu} + 1;
            else $obj->{$statu} = 1;
        }
        return $obj;
    }
    protected static function boot(){
        parent::boot();
        static::created(function ($model) {
            $Orderlog = new Orderlog;
            $Orderlog->order_id = $model->id;
            $Orderlog->commands = 'Order Placed';
            $Orderlog->save();
        });
        
        static::updated(function($model) { 
            if ($model->isDirty('delivery_status')){
                $Orderlog = new Orderlog;
                $Orderlog->order_id = $model->id;
                $Orderlog->commands = $model->delivery_status;
                $Orderlog->save();
            }
        });
    }
}

