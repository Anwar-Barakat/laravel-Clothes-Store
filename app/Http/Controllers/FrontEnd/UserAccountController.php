<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserDetailRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class UserAccountController extends Controller
{
    public function account()
    {
        $countries = Country::where('status', 1)->get();
        return view('frontend.auth.account', ['countries' => $countries]);
    }

    public function updateAccountDetails(UpdateUserDetailRequest $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['name', 'country_id', 'city', 'state', 'mobile', 'address', 'pincode']);
            User::where('id', Auth::user()->id)->update($data);
            Session::flash('message', __('msgs.update_user_details'));
            return redirect()->back();
        }
    }

    public function updateAccountPassword(UpdateUserPasswordRequest $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['current_password', 'password', 'password_confirmation']);
            if (Hash::check($data['current_password'], Auth::user()->password)) {
                User::where('id', Auth::user()->id)->update([
                    'password'  => bcrypt($data['password']),
                ]);
                Session::flash('message', __('msgs.update_admin_password'));
            } else {
                Session::flash('alert-type', 'error');
                Session::flash('message', __('translation.currnet_pwd_false'));
            }
            return redirect()->back();
        }
    }

    public function checkCurrentPassword(Request $request)
    {
        $data = $request->only(['current_password']);
        if (Hash::check($data['current_password'], Auth::user()->password))
            echo "true";
        else
            echo 'false';
    }

    public function addCouponOnCart(Request $request)
    {
        if ($request->isMethod('post')) {
            $data           = $request->only(['code']);
            $couponCount    = Coupon::where('code', $data['code'])->count();
            if ($couponCount  == 0) {
                $userCartProducts   = Cart::userCartProducts();
                $totalCartProducts  = totalProducts();
                return response()->json([
                    'status'            => false,
                    'totalCartProducts' => $totalCartProducts,
                    'view'              => (string)View::make('frontend.partials.cart_products')->with(compact('userCartProducts'))
                ]);
            } else {
                return response()->json([
                    'status'    => true,
                ]);
            }
        }
    }
}