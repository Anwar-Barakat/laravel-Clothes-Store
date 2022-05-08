<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
    ];

    public static function countWishlist($product_id = null)
    {
        $countWishlist      = 0;
        if (Auth::check())
            $countWishlist  = Wishlist::where(['user_id' => Auth::user()->id, 'product_id' => $product_id])->count();

        return $countWishlist;
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}