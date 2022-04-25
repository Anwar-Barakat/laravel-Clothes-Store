<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateShippingChargeRequest;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;

class ShippingChargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingCharges = ShippingCharge::with('country')->get();
        return view('admin.shipping-charges.index', ['shippingCharges' => $shippingCharges]);
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
     * @param  \App\Models\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingCharge $shippingCharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingCharge $shippingCharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShippingChargeRequest $request, ShippingCharge $shippingCharge)
    {
        if ($request->isMethod('post')) {
            $data   = $request->only('shipping_charges');
            $shippingCharge->update(['shipping_charges' => $data['shipping_charges']]);
            Session::flash('message', __('msgs.shipping_charges_update'));
            return redirect()->route('admin.shipping-charges.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShippingCharge  $shippingCharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShippingCharge $shippingCharge)
    {
        //
    }


    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'shippingCharge_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            ShippingCharge::where('id', $data['shippingCharge_id'])->update([
                'status'                => $status
            ]);
            return response()->json([
                'status'                => $status,
                'shippingCharge_id'     => $data['shippingCharge_id']
            ]);
        }
    }
}