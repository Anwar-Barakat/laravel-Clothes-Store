<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Cart;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featuredPorducts       = Product::where(['is_feature' => 'Yes', 'status' => 1])->limit(5)->inRandomOrder()->get();
        $userCartProducts       = Cart::userCartProducts();

        return view('frontend.checkout', [
            'featuredPorducts'          => $featuredPorducts,
            'userCartProducts'          => $userCartProducts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCheckoutRequest $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['payment_gateway', 'address_id']);

            if ($data['payment_gateway'] == 'COD')
                $payment_method = 'COD';
            else {
                return "Coming soon,thanks";
                $payment_method = 'Prepaid';
            }

            DB::beginTransaction();

            $deliveryAddress = DeliveryAddress::where('id', $data['address_id'])->first();
            $order          = Order::create([
                'user_id'           => Auth::user()->id,
                'name'              => $deliveryAddress->name,
                'email'             => Auth::user()->email,
                'mobile'            => $deliveryAddress->mobile,
                'address'           => $deliveryAddress->address,
                'city'              => $deliveryAddress->city,
                'state'             => $deliveryAddress->state,
                'country_id'        => $deliveryAddress->country_id,
                'pincode'           => $deliveryAddress->pincode,
                'coupon_code'       => Session::get('couponCode'),
                'coupon_amount'     => Session::get('couponAmount'),
                'status'            => 'new',
                'payment_method'    => $payment_method,
                'payment_gateway'   => $data['payment_gateway'],
                'grand_amount'      => Session::get('grandPrice'),
                'shipping_cart'     => 0,
            ]);

            $order_id           = DB::getPdo()->lastInsertId();



            $cartProducts       = Cart::where('user_id', Auth::user()->id)->get();
            foreach ($cartProducts as $key => $item) {
                $productDetails         = Product::select('name', 'code', 'color')->where('id', $item->id)->first();
                $getDiscountAttrPrice   = Product::getDiscountedAttributePrice($item['product_id'], $item->size);

                OrderProduct::create([
                    'order_id'          => $order_id,
                    'user_id'           => Auth::user()->id,
                    'product_id'        => $item->product_id,
                    'product_code'      => $productDetails->code,
                    'product_name'      => $productDetails->name,
                    'product_color'     => $productDetails->color,
                    'product_size'      => $item->size,
                    'product_quantity'  => $item->quantity,
                    'product_price'     => $getDiscountAttrPrice['finalPrice'],
                ]);
            }
            Session::put('order_id', $order_id);

            DB::commit();

            if ($payment_method == 'COD') {
                $orderDetails       = Order::with(['orderProduct', 'user'])->where('id', $order_id)->first();
                $email              = Auth::user()->email;
                $messageData = [
                    'orderDetails'  => $orderDetails
                ];
                Mail::send('frontend.emails.order', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('Order Placed - Laravel eCommerce Webiste');
                });

                return redirect()->route('frontend.checkout.thanks');
            } else {
                return "prepaid coming soon!!";
            }


            Session::flash('message', __('msgs.order_place_add'));
            return redirect()->route('frontend.cart');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function thanks()
    {
        if (Session::has('order_id')) {
            Cart::where('user_id', Auth::user()->id)->delete();
            return view('frontend.thanks');
        } else {
            return redirect()->route('frontend.cart');
        }
    }
}
