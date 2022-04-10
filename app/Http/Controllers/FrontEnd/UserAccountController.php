<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserAccountController extends Controller
{
    public function account()
    {
        return view('frontend.auth.account');
    }

    public function updateAccount(){

    }
}
