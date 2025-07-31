<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
    'plan_id',
    'razorpay_payment_id',
    'price',
    'discount_price',
    'validity',
    'valid_until',
    'expired_at',
    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User','user','id');
    }

    public function plan()
    {
        return $this->belongsTo('App\Models\Plan', 'plan', 'id');
    }

}
