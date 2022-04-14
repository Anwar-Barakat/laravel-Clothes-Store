<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'user_id',
        'product_id',
        'size',
        'quantity',
    ];


    public static function userCartProducts()
    {
        if (Auth::check())
            $userCartProducts = Cart::with(['product' => function ($query) {
                $query->select('id', 'name', 'price', 'code', 'color', 'category_id');
            }])->where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        else
            $userCartProducts = Cart::with(['product' => function ($query) {
                $query->select('id', 'name', 'price', 'code', 'color');
            }])->where('session_id', Session::get('session_id'))->orderBy('id', 'DESC')->get();
        return $userCartProducts;
    }


    public static function getProductAttributePrice($product_id, $size)
    {
        $price = ProductAttribute::select('price')
            ->where([
                'product_id'        => $product_id,
                'size'              => $size
            ])->first();
        return $price;
    }


    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}