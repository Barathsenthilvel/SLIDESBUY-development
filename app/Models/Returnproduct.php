<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Storeconfiguration;
class Returnproduct extends Model
{
    use HasFactory;
    protected $table = 'returnproducts';
    protected $fillable  =['Order_ID','Return_Date','Docket_No','status','user_id','others'];

    public function total(){
        $total = 0;
        $ReturnProductItem = ReturnProductItem::where('returnproduct_id',$this->id)->get();
        foreach ($ReturnProductItem as $key => $value) {

            if($value->Return_Status != null && $value->Return_Status != 'Return Declined'){
                $total += $value->Total;
            }
        }
        return $total + (float)($this->others);
    }

    public function getdata(){
        $product = 0;
        $total = 0;
        $discount = 0;
        $tax = 0;
        $ReturnProductItem = ReturnProductItem::where('returnproduct_id',$this->id)->get();
        foreach ($ReturnProductItem as $key => $value) {

            if($value->Return_Status != null && $value->Return_Status != 'Return Declined'){
                $productobj = unserialize(bzdecompress(utf8_decode($value->productobj)));
                $total += $value->Total;
                $product += $productobj->VendorPrice;
                $tax += $productobj['producttaaAmount']/$productobj->quantity;
                $discount += ($productobj['total']/$productobj->quantity) - ($productobj['producttaaAmount']/$productobj->quantity);
            }
        }
        return ['product'=>$product,'total'=>$total,'discount'=>$discount,'tax'=>$tax,'Others'=>$this->others];
    }
}
