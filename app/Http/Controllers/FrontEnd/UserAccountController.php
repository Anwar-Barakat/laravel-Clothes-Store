<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserDetailRequest;
use App\Http\Requests\UpdateUserPasswordRequest;
use App\Models\Cart;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
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
        $countries  = Country::where('status', 1)->get();
        return view('frontend.auth.account', ['countries' => $countries]);
    }

    public function updateAccountDetails(UpdateUserDetailRequest $request)
    {
        if ($request->isMethod('post')) {
            $data   = $request->only(['name', 'country_id', 'city', 'state', 'mobile', 'address', 'pincode']);
            User::where('id', Auth::user()->id)->update($data);
            Session::flash('message', __('msgs.update_user_details'));
            return redirect()->back();
        }
    }

    public function updateAccountPassword(UpdateUserPasswordRequest $request)
    {
        if ($request->isMethod('post')) {
            $data   = $request->only(['current_password', 'password', 'password_confirmation']);
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
        $data       = $request->only(['current_password']);
        if (Hash::check($data['current_password'], Auth::user()->password))
            echo "true";
        else
            echo 'false';
    }

    public function addCouponOnCart(Request $request)
    {
        $statusType = '';
        if ($request->isMethod('post')) {
            $data               = $request->only(['code']);
            $couponCount        = Coupon::where('code', $data['code'])->count();
            $userCartProducts   = Cart::userCartProducts();
            $totalCartProducts  = totalProducts();


            if ($couponCount  == 0) {
                $statusType     = 'not valid';
                Session::forget(['couponCode', 'couponAmount']);
                Session::save();
            } else {
                $codeDetails    = Coupon::where('code', $data['code'])->first();
                if ($codeDetails->status == 0)
                    $statusType = 'not active';


                $expirationDate = $codeDetails->expiration_date;
                if ($expirationDate < date('Y-m-d'))
                    $statusType = 'is expire';

                if ($codeDetails->type == 'Single Times') {
                    $couponCount    = Order::where(['coupon_code' => $data['code'], 'user_id' => Auth::user()->id])->count();
                    if ($couponCount == 1)
                        $statusType = 'code already availated';
                }

                if (!empty($codeDetails->categories))
                    $selectedCats   = explode(',', $codeDetails->categories);

                if (!empty($codeDetails->users))
                    $selectedUsers  = explode(',', $codeDetails->users);

                foreach ($selectedUsers as $key => $email)
                    $usersId = collect(User::where('email', $email)->get()->modelKeys())->toArray();


                $totalAmount = 0;
                foreach ($userCartProducts as $key => $item) {
                    // if users field is empty will exeption error:
                    if (!empty($codeDetails->users)) {
                        if (!in_array($item->user_id, $usersId))
                            $statusType = 'user not found here';
                    }
                    if (!empty($codeDetails->categories)) {
                        if (!in_array($item->product->category_id, $selectedCats))
                            $statusType = 'cat not found here';
                    }

                    // calculate the final amount for all selected products :
                    $attrPrice      = Product::getDiscountedAttributePrice($item['product_id'], $item['size']);
                    $totalAmount    = $totalAmount + ($attrPrice['finalPrice'] * $item['quantity']);
                }
            }
            if (!empty($statusType))
                return response()->json([
                    'status'            => $statusType,
                    'totalCartProducts' => $totalCartProducts,
                    'couponAmount'      => 00,
                    'view'              => (string)View::make('frontend.partials.cart_products')->with(compact('userCartProducts'))
                ]);
            else {
                if ($codeDetails->amount_type == 'Fixed')
                    $couponAmount = ((int)$codeDetails->amount);
                else
                    $couponAmount = ($totalAmount * (int)$codeDetails->amount / 100);

                $lastTotalPrice   = ((int)$totalAmount - (int)$couponAmount);

                Session::put('couponAmount', $couponAmount);
                Session::put('couponCode', $data['code']);



                return response()->json([
                    'status'            => true,
                    'totalCartProducts' => $totalCartProducts,
                    'couponAmount'      => $couponAmount,
                    'lastTotalPrice'    => $lastTotalPrice,
                    'view'              => (string)View::make('frontend.partials.cart_products')->with(compact('userCartProducts'))
                ]);
            }
        }
    }
}