<?php

namespace App\Models;

use Carbon\Carbon;
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

    public static function getOrderStatus($order_id)
    {
        $getOrderStatus     = Order::where('id', $order_id)->pluck('status');
        return $getOrderStatus;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->diffForHumans();
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderProduct()
    {
        return $this->hasMany(OrderProduct::class, 'order_id');
    }
}
