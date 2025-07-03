<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Blog extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['blog_url','blog_type','blog_image','blog_content','blog_video','home_flag'];


   
}