<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Homeslider extends Authenticatable
{
    use HasFactory;
    protected $table = 'homeslideres';
    protected $fillable = ['title','type','product','Position','status'];
    
    public function CatName(){
        if($this->type != 'All'){
            $cat = Category::findOrFail($this->type);
        if($cat != ""){
            return $cat->category_name;
        }else{
            return "All";
        }
        }else{
            return 'All';
        }
        
    }
    public function CateCount(){
        $array = explode("|",$this->product);
        return count($array);
    }
}