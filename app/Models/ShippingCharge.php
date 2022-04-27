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
        'zero_500g',
        '_501_1000g',
        '_1001_2000g',
        '_2001_5000g',
        'above_5000g',
        'status',
    ];

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($this->attributes['created_at'])->format('Y-m-d');
    }

    public static function getShippingCharges($totalWeight, $country_id)
    {
        $shippingDetails    = ShippingCharge::where('country_id', $country_id)->first();

        if ($totalWeight > 0) {
            if ($totalWeight > 0 && $totalWeight <= 500)
                $shippinSharges = $shippingDetails->zero_500g;

            elseif ($totalWeight > 500 && $totalWeight <= 1000)
                $shippinSharges = $shippingDetails->_501_1000g;

            elseif ($totalWeight > 1000 && $totalWeight <= 2000)
                $shippinSharges = $shippingDetails->_1001_2000g;

            elseif ($totalWeight > 2000 && $totalWeight <= 5000)
                $shippinSharges = $shippingDetails->_2001_5000g;

            elseif ($totalWeight > 5000)
                $shippinSharges = $shippingDetails->above_5000g;
        } else
            $shippinSharges     = 0;


        return $shippinSharges;
    }


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}