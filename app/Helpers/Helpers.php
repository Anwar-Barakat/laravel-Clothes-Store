<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

function totalProducts()
{
    if (Auth::check()) {
        $user_id            = Auth::user()->id;
        $totalCartProducts  = Cart::where('user_id', $user_id)->sum('quantity');
    } else {
        $session_id         = Session::get('session_id');
        $totalCartProducts  = Cart::where('session_id', $session_id)->sum('quantity');
    }
    return $totalCartProducts;
}
