<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with('orderProduct')->latest()->get();
        return view('admin.orders.index', ['orders' => $orders]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $orderDetails   = Order::with([
            'orderProduct',
            'user'
        ])->where('id', $order->id)->first();
        return view('admin.orders.show', ['orderDetails' => $orderDetails]);
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
    public function update(Request $request)
    {
        if ($request->isMethod('post')) {
            $data   = $request->only(['status', 'order_id']);
            Order::where('id', $data['order_id'])->update([
                'status'    => $data['status']
            ]);
            $message = 'Dear customer, your order #' . $data['order_id'] . ' status has been updated to ' . $data['status'];
            $orderDetails       = Order::with(['orderProduct', 'user'])->where('id', $data['order_id'])->first();
            $email              = $orderDetails->user->email;
            $messageData = [
                'orderDetails'  => $orderDetails,
                'status'        => $data['status']
            ];
            Mail::send('frontend.emails.order_status', $messageData, function ($message) use ($email) {
                $message->to($email)->subject('Order Placed - Laravel eCommerce Webiste');
            });
            Session::flash('message', __('msgs.order_status'));
            return redirect()->back();
        }
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
}