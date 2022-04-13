<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brands.index', ['brands'  => Brand::latest()->get()]);
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
    public function store(StoreBrandRequest $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['name_ar', 'name_en', 'status']);
            Brand::create([
                'name'      => [
                    'ar'        => $data['name_ar'],
                    'en'        => $data['name_en'],
                ],
                'status'    => $data['status']
            ]);
            Session::flash('message', __('msgs.brand_added'));
            return redirect()->back();
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
    public function update(UpdateBrandRequest $request, Brand $brand)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['name_ar', 'name_en', 'status']);
            $brand->update([
                'name'      => [
                    'ar'        => $data['name_ar'],
                    'en'        => $data['name_en'],
                ],
                'status'    => $data['status']
            ]);
            Session::flash('message', __('msgs.brand_updated'));
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

    public function updateBrandStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'brand_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            Brand::where('id', $data['brand_id'])->update([
                'status'    => $status
            ]);
            return response()->json([
                'status'        => $status,
                'brand_id'    => $data['brand_id']
            ]);
        }
    }
}