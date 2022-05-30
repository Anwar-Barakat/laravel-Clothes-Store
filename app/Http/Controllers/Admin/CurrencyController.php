<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use App\Http\Requests\StoreCurrencyRequest;
use App\Http\Requests\UpdateCurrencyRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currencies     = Currency::latest()->get();
        return view('admin.currencies.index', ['currencies' => $currencies]);
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
     * @param  \App\Http\Requests\StoreCurrencyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCurrencyRequest $request)
    {
        if ($request->isMethod('post')) {
            $data   = $request->only(['code', 'rate', 'status']);
            Currency::create($data);
            Session::flash('message', __('msgs.added', ['name' => __('translation.currency')]));
            Session::flash('message', __('msgs.currency_add'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCurrencyRequest  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCurrencyRequest $request, Currency $currency)
    {
        if ($request->isMethod('post')) {
            $data   = $request->only(['code', 'rate', 'status']);
            $currency->update($data);
            Session::flash('message', __('msgs.updated', ['name' => __('translation.currency')]));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currency = Currency::findOrFail($id);
        $currency->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', __('msgs.deleted', ['name' => __('translation.currency')]));
        return redirect()->route('admin.currencies.index');
    }


    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'currency_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            Currency::where('id', $data['currency_id'])->update([
                'status'                => $status
            ]);
            return response()->json([
                'status'                => $status,
                'currency_id'           => $data['currency_id']
            ]);
        }
    }
}
