<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Storeconfiguration;

class Vendor extends Authenticatable
{
    use HasFactory;
    
    protected $table  = 'Vendors';
    protected $fillable = ['productPrefix','type','name','manufacturerID','billingCountry','billingCity','billingState','address','pincode','vendorperscent','gstNo','email','contact','username','password','role_id','status'];

    public function getcountry(){
        $country = Country::findOrFail($this->billingCountry);
        return $country->country_name;
    }
    public function getstate(){
        $State = State::where('id',$this->billingState)->first();
        if(empty($State)){
            return "State not found";
        }
        return $State->state_name;
    }
    public function getCity(){
        if($this->billingCountry == 100){
            $City = City::findOrFail($this->billingCity);
            return $City->city_name;
        }else{
            return $this->billingCity;
        }
    }
    
    public function vendor_id(){
        $store = Storeconfiguration::where('id',1)->first();
        return $store->VendorIDPrefix.'-'.sprintf("%'03d", $this->id);
    }
}
