<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExchangeOrder;
use App\Http\Requests\StoreExchangeOrderRequest;
use App\Http\Requests\UpdateExchangeOrderRequest;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ExchangeOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exchangeOrders  = ExchangeOrder::latest()->get();
        return view('admin.orders.exchange.index', ['exchangeOrders' => $exchangeOrders]);
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
     * @param  \App\Http\Requests\StoreExchangeOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExchangeOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExchangeOrder  $exchangeOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ExchangeOrder $exchangeOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExchangeOrder  $exchangeOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ExchangeOrder $exchangeOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExchangeOrderRequest  $request
     * @param  \App\Models\ExchangeOrder  $exchangeOrder
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateExchangeOrderRequest $request, ExchangeOrder $exchangeOrder)
    {
        if ($request->isMethod('post')) {
            $data   = $request->only(['status']);

            // update status in return_orders table:
            $exchangeOrder->update(['status' => $data['status']]);


            // update status in order_products table:
            OrderProduct::where([
                'order_id'      => $exchangeOrder->order_id,
                'product_code'  => $exchangeOrder->product_code,
                'product_size'  => $exchangeOrder->product_size
            ])->update(['product_status' => 'exchange ' . $data['status']]);


            // Send Email:
            $email              = $exchangeOrder->user->email;
            $exchangeStatus     = $data['status'];
            $messageData        = ['exchangeOrder' => $exchangeOrder];

            Mail::send('admin.emails.exchange_order', $messageData, function ($message) use ($email, $exchangeStatus) {
                $message->to($email)->subject("Return Order $exchangeStatus");
            });

            Session::flash('message', __('msgs.exchange_order_status_update'));
            return redirect()->route('admin.exchange.orders.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExchangeOrder  $exchangeOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExchangeOrder $exchangeOrder)
    {
        //
    }
}
