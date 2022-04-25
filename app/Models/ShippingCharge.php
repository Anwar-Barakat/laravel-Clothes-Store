<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'country_id',
        'shipping_charges',
        'status'
    ];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
    }

    public static function getShippingCharges($country_id)
    {
        $shippingDetails    = ShippingCharge::where('country_id', $country_id)->first();
        $shippingCharges    = $shippingDetails->shipping_charges;
        return $shippingCharges;
    }


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}