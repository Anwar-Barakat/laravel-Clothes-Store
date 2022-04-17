<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'mobile',
        'address',
        'city',
        'state',
        'country_id',
        'pincode',
        'shipping_cart',
        'coupon_code',
        'coupon_amount',
        'status',
        'payment_method',
        'payment_gateway',
        'grand_amount',
    ];
}