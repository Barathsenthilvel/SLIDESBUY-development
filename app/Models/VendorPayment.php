<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Storeconfiguration;

class VendorPayment extends Authenticatable
{
    use HasFactory;

    protected $table = 'vendorpayments';
    protected $fillable = ['PaymentDate','TID','vendor','vendor_id','ProductCount','CompanyType','AfterDiscountPrice','GST','TaxAmount','FinalPrice','PaymentMode','RefNo','Receipt','Less','paymentObject','vendor_id'];
}
