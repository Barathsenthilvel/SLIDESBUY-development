<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Storeconfiguration;
class ReturnProductItem extends Model
{
    use HasFactory;
    protected $table = 'returnproductitems';
    protected $fillable  =['Product','Price','GST','Total','Reason','Photo','Video','Return_Status','Payment_Status','productobj'];

}
