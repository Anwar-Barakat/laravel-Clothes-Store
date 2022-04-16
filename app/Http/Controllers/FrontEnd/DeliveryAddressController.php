<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDeliveryAddressRequest;
use App\Http\Requests\UpdateDeliveryAddressRequest;
use App\Models\Cart;
use App\Models\DeliveryAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DeliveryAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userCartProducts   = Cart::userCartProducts();
        return view('frontend.delivery-address.add', ['userCartProducts' => $userCartProducts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeliveryAddressRequest $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['user_id', 'name', 'mobile', 'address', 'city', 'state', 'country_id', 'pincode', 'status',]);
            DeliveryAddress::create($data);
            Session::flash('message', __('msgs.delivery_address_add'));
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
    public function edit(DeliveryAddress $deliveryAddress)
    {
        return view('frontend.delivery-address.edit', ['deliveryAddress' => $deliveryAddress]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeliveryAddressRequest $request, DeliveryAddress $deliveryAddress)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['user_id', 'name', 'mobile', 'address', 'city', 'state', 'country_id', 'pincode', 'status',]);
            $deliveryAddress->update($data);
            Session::flash('message', __('msgs.delivery_address_update'));
            return redirect()->route('frontend.cart');
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
        $deliveryAddress = DeliveryAddress::findOrFail($id);
        $deliveryAddress->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', __('msgs.delivery_address_delete'));
        return redirect()->route('frontend.cart');
    }

    public function checkout(Request $request)
    {
        return $request;
    }
}