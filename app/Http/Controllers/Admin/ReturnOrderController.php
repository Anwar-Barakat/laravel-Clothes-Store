<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReturnOrder;
use App\Http\Requests\StoreReturnOrderRequest;
use App\Http\Requests\UpdateReturnOrderRequest;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
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
        $returnOrders  = ReturnOrder::latest()->paginate(10);
        return view('admin.orders.return.index', ['returnOrders' => $returnOrders]);
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
    public function store(StoreReturnOrderRequest $request)
    {
        //
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
        if ($request->isMethod('post')) {
            $data   = $request->only(['status']);

            // update status in return_orders table:
            $returnOrder->update(['status' => $data['status']]);


            // update status in order_products table:
            OrderProduct::where([
                'order_id'      => $returnOrder->order_id,
                'product_code'  => $returnOrder->product_code,
                'product_size'  => $returnOrder->product_size
            ])->update(['product_status' => 'return ' . $data['status']]);


            // Send Email:
            $email          = $returnOrder->user->email;
            $returnStatus   = $data['status'];
            $messageData    = ['returnOrder' => $returnOrder];

            Mail::send('admin.emails.return_order', $messageData, function ($message) use ($email, $returnStatus) {
                $message->to($email)->subject("Return Order $returnStatus");
            });

            Session::flash('message', __('msgs.return_order_status_update'));
            return redirect()->route('admin.return.orders.index');
        }
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