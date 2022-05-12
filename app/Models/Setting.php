<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'min_cart_value',
        'max_cart_value',
        'email',
        'mobile',
        'location',
    ];
}