<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserAccountController extends Controller
{
    public function account()
    {
        return view('frontend.auth.account');
    }

    public function updateAccountDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['name', 'country', 'city', 'state', 'mobile', 'address', 'pincode']);
            User::where('id', Auth::user()->id)->update($data);
            Session::flash('message', __('msgs.update_user_details'));
            return redirect()->back();
        }
    }
}