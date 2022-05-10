<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'user_id',
        'product_size',
        'product_code',
        'return_reason',
        'status',
    ];
}