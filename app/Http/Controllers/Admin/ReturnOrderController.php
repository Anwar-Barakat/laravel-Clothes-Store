<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReturnOrder;
use App\Http\Requests\StoreReturnOrderRequest;
use App\Http\Requests\UpdateReturnOrderRequest;

class ReturnOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $return_orders  = ReturnOrder::latest()->paginate(10);
        return view('admin.orders.return.index', ['return_orders' => $return_orders]);
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
