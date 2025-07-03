<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Pincode;
use App\Models\Shipping;
use Session;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';

    protected $fillable = [
        'user_id',
        'address_type',
        'address1',
        'address2',
        'country_id',
        'state_id',
        'city_id',
        'pincode_id',
        'name',
        'phone',
        'email',
        'last',
    ];
    public function getContry(){
        return Country::where('id',$this->country_id)->first()->country_name;
    }
    public function getState(){
        $State =  State::where('id',$this->state_id)->first();
        if(!empty($State)){
            return $State ->state_name;
        }else{
            return '';
        }
    }
    public function getcity(){
        $City =  City::where('id',$this->city_id)->first();
        if(!empty($City)){
            return $City ->city_name;
        }else{
            return '';
        }
    }
    public function getpincode(){
        $Pincode =  Pincode::where('id',$this->pincode_id)->first();
        if(!empty($Pincode)){
            return $Pincode ->pincode;
        }else{
            return '';
        }
    }
    public function delivery_charge($weight){
        $shipping = null;
        $weight = $weight/1000;
        $shippTemp = null;
        $normalDElivery = null;
        $fastdelivery = null;
        $collection = ['fastdelivery'=>null,'normalDElivery'=>null];
        
        if($shipping == null && $this->pincode_id ){
            $shipping = Shipping::whereRaw("FIND_IN_SET($this->pincode_id,pincode_id)")->where('status',1)->get();
            if($shipping->isEmpty() && $this->city_id ){
                $shipping = Shipping::whereRaw("FIND_IN_SET($this->city_id,city_id)")->where('status',1)->get();
                if($shipping->isEmpty() && $this->state_id){
                    $shipping = Shipping::whereRaw("FIND_IN_SET($this->state_id,state_id)")->where('status',1)->get();
                    if($shipping->isEmpty() && $this->country_id){
                        $shipping = Shipping::whereRaw("FIND_IN_SET($this->country_id,country_id)")->where('status',1)->get();
                    }
                }
            }    
        }
        
        
        if($shipping->isEmpty()){
            return (object)['delivery'=>null,'msg'=>'Out of service','fastdelivery'=>$collection['fastdelivery']];
        }else{
            foreach ($shipping as $key => $value) {
                $temp = \explode('|',$value->weight);
                if($temp[0] <= $weight && $temp[1] >= $weight){
                    $shippTemp[] = $value;
                }
            }
            if($shippTemp == null){ return (object)['delivery'=>null,'msg'=>'Out of service','fastdelivery'=>$collection['fastdelivery']]; }
            foreach ($shippTemp as $key => $value) {
                if($value->type == 0){
                    $price = (empty($collection['normalDElivery'])?0:$collection['normalDElivery']->price);
                    if($value->price < $price || $price == 0 ){
                        $collection['normalDElivery'] = $value;
                    }
                }else{
                    $price = (empty($collection['fastdelivery'])?0:$collection['normalDElivery']->price);
                    if($value->price < $price || $price == 0){
                        $collection['fastdelivery'] = $value;
                    }
                }
            }
            return (object)['delivery'=>$collection['normalDElivery'],'msg'=>'service','fastdelivery'=>$collection['fastdelivery']];
        }
    }
}
