<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\ReturnOrder;
use App\Http\Requests\StoreReturnExchangeOrderRequest;
use App\Http\Requests\UpdateReturnOrderRequest;
use App\Models\ExchangeOrder;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class ReturnOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreReturnExchangeOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReturnExchangeOrderRequest $request, Order $order)
    {
        if ($request->isMethod('post')) {
            $data                           = $request->only(['return_exchange', 'product_info', 'reason', 'comment']);
            $data['user_id']                = Auth::user()->id;
            $data['order_id']               = $order->id;


            if ($data['order_id'] == $data['order_id']) {

                if ($data['return_exchange'] == 'return') {

                    $productAttr    = explode(' ', $data['product_info']);
                    $data['product_code']   = $productAttr[0];
                    $data['product_size']   = $productAttr[1];


                    OrderProduct::where([
                        'order_id'          => $data['order_id'],
                        'product_code'      => $data['product_code'],
                        'product_size'      => $data['product_size']
                    ])->update([
                        'product_status'    => 'return initiated'
                    ]);

                    ReturnOrder::create($data);

                    Session::flash('message', __('msgs.order_return'));
                    return redirect()->route('frontend.orders.index');
                } elseif ($data['return_exchange'] == 'exchange') {
                    $data['required_size'] = $request->required_size;

                    $productAttr    = explode(' ', $data['product_info']);
                    $data['product_code']   = $productAttr[0];
                    $data['product_size']   = $productAttr[1];



                    OrderProduct::where([
                        'order_id'          => $data['order_id'],
                        'product_code'      => $data['product_code'],
                        'product_size'      => $data['product_size']
                    ])->update([
                        'product_status'    => 'exchange initiated'
                    ]);

                    ExchangeOrder::create($data);

                    Session::flash('message', __('msgs.order_exhange'));
                    return redirect()->route('frontend.orders.index');
                } else {
                    Session::flash('alert-type', 'error');
                    Session::flash('message', __('msgs.order_return_exchange_invalid'));
                    return redirect()->route('frontend.orders.index');
                }
            } else {
                Session::flash('alert-type', 'error');
                Session::flash('message', __('msgs.order_return_exchange_invalid'));
                return redirect()->route('frontend.orders.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ReturnOrder  $returnOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnOrder $returnOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnOrder  $returnOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnOrder $returnOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReturnOrderRequest  $request
     * @param  \App\Models\ReturnOrder  $returnOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReturnOrderRequest $request, ReturnOrder $returnOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnOrder  $returnOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnOrder $returnOrder)
    {
        //
    }

    public function getProductSizes(Request $request)
    {
        if ($request->isMethod('post')) {
            $data                   = $request->only(['product_info']);

            $productAttr            = explode(' ', $data['product_info']);
            $data['product_code']   = $productAttr[0];
            $data['product_size']   = $productAttr[1];





            $productDetails         = Product::where(['code' => $data['product_code']])->first();


            $productSizes           = ProductAttribute::select('size')
                ->where('product_id', $productDetails->id)
                ->where('size', '!=', $data['product_size'])
                ->where('stock', '>', 0)
                ->get();

            return response()->json([
                'status'            => true,
                'view'              => (string)View::make('frontend.partials.append_sizes')->with(compact('productSizes'))
            ]);
        }
    }
}
