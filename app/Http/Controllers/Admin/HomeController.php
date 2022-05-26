<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productsCount                  = Product::all()->count();
        $womenProducts                  = (Product::where('section_id', 1)->count() / $productsCount) * 100 ?? 0;
        $menProductsPercentage          = (Product::where('section_id', 2)->count() / $productsCount) * 100 ?? 0;
        $childrenProducts               = (Product::where('section_id', 3)->count() / $productsCount) * 100 ?? 0;
        $products                       =  app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 400, 'height' => 137])
            ->labels([__('translation.men'), __('translation.women'), __('translation.children')])
            ->datasets([
                [
                    "label" => __('translation.products'),
                    'backgroundColor' => ['#ffe0e6', '#e2e0ff', '#e0ffe6'],
                    'data' => [round($menProductsPercentage, 2), round($womenProducts, 2), round($childrenProducts, 2)]
                ],

            ]);


        $totalInvoices                  = Order::count();
        $newInvoicesPercentage          = (Order::where('status', 'new')->count() / $totalInvoices) * 100;
        $cancelledInvoicesPercentage    = (Order::where('status', 'cancelled')->count() / $totalInvoices) * 100;
        $deliveredInvoicesPercentage    = (Order::where('status', 'delivered')->count() / $totalInvoices) * 100;

        $invoices = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels([__('translation.new_invoices'), __('translation.cancelled_invoices'), __('translation.delivered_invoices')])
            ->datasets([
                [
                    'backgroundColor' => ['#0984e375', '#ff57228c', '#00b894'],
                    'hoverBackgroundColor' => ['#0984e340', '#ff572252', '#55efc4'],
                    'data' => [round($newInvoicesPercentage, 2), round($cancelledInvoicesPercentage, 2), round($deliveredInvoicesPercentage, 2)]
                ]
            ])
            ->options([]);
        return view('index', ['products' => $products, 'invoices' => $invoices]);
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
        //
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
        //
    }
}