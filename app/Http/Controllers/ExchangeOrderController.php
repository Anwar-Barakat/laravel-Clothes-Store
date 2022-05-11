<?php

namespace App\Http\Controllers;

use App\Models\ExchangeOrder;
use App\Http\Requests\StoreExchangeOrderRequest;
use App\Http\Requests\UpdateExchangeOrderRequest;

class ExchangeOrderController extends Controller
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
        //
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
