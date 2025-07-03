<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Category extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['category_name','parent_category_id','Category_url','hns_code','category_banner','mobile_image','short_description','meta_title','meta_description',
                            'meta_keywords','sort_order','status','featured_category','featured_collection','sub_category','style_1','style_3'];


    public function products(){
    	return $this->hasMany('App\Models\Product','category')->where('status','1');
    }

    public function subs(){
    	return $this->hasMany('App\Models\Category','parent_category_id')->where('status','1')->where('sub_category','0');
    }

    public function child(){
    	return $this->hasMany('App\Models\Category','parent_category_id')->where('status','1')->where('sub_category','!=','0');
    }

   
}