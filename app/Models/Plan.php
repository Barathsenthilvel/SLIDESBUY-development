<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'discount',
        'discount_type',
        'download_limit',
        'validity',
    ];

    public $timestamps = true;

    public function subscription()
    {
        return $this->hasOne('App\Models\Subscription');
    }
}
