<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\ReturnOrder;
use App\Http\Requests\StoreReturnOrderRequest;
use App\Http\Requests\UpdateReturnOrderRequest;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
     * @param  \App\Http\Requests\StoreReturnOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReturnOrderRequest $request, Order $order)
    {
        if ($request->isMethod('post')) {
            $data                       = $request->only(['product_info', 'reason', 'comment']);
            $data['user_id']            = Auth::user()->id;
            $data['order_id']           = $order->id;

            if ($data['order_id'] == $data['order_id']) {

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

                Session::flash('alert-type', __('msgs.order_return'));
                return redirect()->route('frontend.orders.index');
            } else {
                Session::flash('alert-type', 'error');
                Session::flash('alert-type', __('msgs.order_return_invalid'));
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
}