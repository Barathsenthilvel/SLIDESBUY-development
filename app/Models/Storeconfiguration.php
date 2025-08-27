<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Currency;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Storeconfiguration extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['invert_logo','store_name','default_currency','pricing_type','include_tax','product_per_page','default_date_formate','Lazy_Loading','display_stock,','out_of_stock','minium_stock','logo','fav_icon','enable_watermark','Watermark'
    ,'Store_Meta_Title','Store_Meta_Description','Store_Meta_Keywords','order_custom_fields','customer_custom_fields','store_address','store_address_for_pdf','GSTIN','Order_Emails_To','Order_Emails_BCC','Contact_Us_Emails_To',
    'Contact_Us_Emails_BCC','product_list','time_zone','is_configure_product_available','is_quality_increase_decrease','is_attribute_seperate_link','is_manufacture_attribute','is_customer_group_category','is_customer_field_customer_group',
    'Order_Emails_From','billing_address','location_address','ownershiptype','OrderIDPrefix','CustomerIDPrefix','VendorIDPrefix','productIdprefix'
];

public function currencysymbol(){
    $Currency = Currency::find($this->default_currency)->first();
    if(!empty($Currency)){
        return $Currency->currency_symbol;
    }
    return null;
}

    public function Order_Emails_BCC(){
        $email = json_decode($this->Order_Emails_To);
        $Email = [];
        foreach ($email as $key => $value) {
            # code...
            $Email[] = $value->value;
        }
        return $Email;
    }
    public function Contact_Us_Emails_BCC(){
        $email = json_decode($this->Contact_Us_Emails_BCC);
        $Email = [];
        foreach ($email as $key => $value) {
            # code...
            $Email[] = $value->value;
        }
        return $Email;
    }
}
