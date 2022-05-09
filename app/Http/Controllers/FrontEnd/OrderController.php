<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $orders     = Order::with('orderProduct')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.orders.index', ['orders' => $orders]);
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
    public function show($id)
    {
        $orderDetails   = Order::with('orderProduct')->where('id', $id)->first();
        return view('frontend.orders.show', ['orderDetails' => $orderDetails]);
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
        $userIdAuth     = Auth::user()->id;
        $userIdOrder    = Order::where('id', $id)->first();

        if ($userIdAuth == $userIdOrder->user_id) {
            Order::where('id', $id)->update(['status' => 'cancelled']);

            OrderLog::create([
                'order_id'          => $id,
                'order_status'      => 'cancelled'
            ]);

            Session::flash('alert-type', 'info');
            Session::flash('message', __('msgs.order_cancel'));
            return redirect()->route('frontend.orders.index');
        } else {
            Session::flash('alert-type', 'error');
            Session::flash('message', __('msgs.order_cancel_invalid'));
            return redirect()->route('frontend.orders.index');
        }
    }
}