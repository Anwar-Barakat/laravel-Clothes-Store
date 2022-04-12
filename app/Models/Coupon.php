<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'option',
        'code',
        'categories',
        'users',
        'type',
        'amount_type',
        'amount',
        'expiration_date',
        'status',
    ];


    public function getAmountAttribute()
    {
        if ($this->attributes['amount_type'] == '0')
            $amount = $this->attributes['amount'] . '%';
        elseif ($this->attributes['amount_type'] == '1')
            $amount = $this->attributes['amount'] . '$';

        return $amount;
    }
}