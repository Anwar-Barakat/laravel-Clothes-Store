<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartRequest;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CartController extends Controller
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

        return view('frontend.cart', [
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
    public function store(StoreCartRequest $request)
    {
        $data = $request->only(['product_id', 'size', 'product-quatity']);

        // Check product stock is available :
        $getProductStock = ProductAttribute::where(['product_id' => $data['product_id'], 'size'  => $data['size']])->first();
        if ($getProductStock->stock < $data['product-quatity']) {
            Session::flash('alert-type', 'info');
            Session::flash('message', __('msgs.not_available', ['name' => __('translation.quantity')]));
            return redirect()->back();
        }

        // generate session id if not exists :
        $session_id = Session::get('session_id');
        if (empty($session_id)) {
            $session_id = Session::getId();
            Session::put('session_id', $session_id);
        }

        // check if the product is already exists in cart :
        if (Auth::check()) {
            // if user is auth :
            $productCount = Cart::where([
                'product_id'    => $data['product_id'],
                'size'          => $data['size'],
                'user_id'       => Auth::user()->id
            ])->count();
        } else {
            // user not login :
            $productCount = Cart::where([
                'product_id'    => $data['product_id'],
                'size'          => $data['size'],
                'session_id'    => Session::get('session_id')
            ])->count();
        }

        if ($productCount > 0) {
            Session::flash('alert-type', 'info');
            Session::flash('message', __('msgs.is_existed', ['name' => __('translation.product')]));
            return redirect()->back();
        }


        // if user is logged in :
        if (Auth::check())
            $user_id = Auth::user()->id;
        else
            $user_id = null;



        // Inserting :
        Cart::create([
            'session_id'    => $session_id,
            'product_id'    => $data['product_id'],
            'user_id'       => $user_id,
            'size'          => $data['size'],
            'quantity'      => $data['product-quatity']
        ]);

        Session::flash('message', __('msgs.added', ['name' => __('translation.product')]));
        return redirect()->back();
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
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['cartId']);
            $userCartProducts   = Cart::userCartProducts();

            Cart::where('id', $data['cartId'])->delete();
            return response()->json([
                'status'    => true
            ]);
        }
    }

    public function updateProductQuantity(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['cartId', 'newQuantity']);
            $userCartProducts   = Cart::userCartProducts();

            // Checking if the quantity available in stock or not :
            $cartDetail         = Cart::findOrFail($data['cartId']);
            $availableInStock   = ProductAttribute::select('stock')->where([
                'product_id'    => $cartDetail['product_id'],
                'size'          => $cartDetail['size']
            ])->first();
            if ($data['newQuantity'] > $availableInStock->stock) {
                return response()->json([
                    'status'    => false,
                    'view'      => (string)View::make('frontend.partials.cart_products')->with(compact('userCartProducts'))
                ]);
            }

            Cart::where('id', $data['cartId'])->update([
                'quantity'  => $data['newQuantity']
            ]);

            $userCartProducts   = Cart::userCartProducts();

            $totalCartProducts = totalProducts();
            return response()->json([
                'status'            => true,
                'totalCartProducts' => $totalCartProducts,
                'view'              => (string)View::make('frontend.partials.cart_products')->with(compact('userCartProducts'))
            ]);
        }
    }
}