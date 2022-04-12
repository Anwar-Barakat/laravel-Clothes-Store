<?php

namespace App\Models;

use Carbon\Carbon;
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

    protected $casts = [
        'expiration_date' => 'datetime',
    ];


    public function getAmountAttribute()
    {
        $amount = '';
        if ($this->attributes['amount_type'] == 'Percentage')
            $amount = $this->attributes['amount'] . '%';
        elseif ($this->attributes['amount_type'] == 'Fixed')
            $amount = $this->attributes['amount'] . '$';

        return $amount;
    }
}