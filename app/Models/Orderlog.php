<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\Order;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Orderlog extends Model
{
    protected $fillable = [];
    
    public function getProductnameAttribute(){
        $Order = Order::where('id',$this->order_id)->first();
        $items = unserialize(bzdecompress(utf8_decode($Order->card)));
        return $items->singleorder[0] ?? null;
    }
}

