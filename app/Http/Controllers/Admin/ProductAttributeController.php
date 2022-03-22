<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductAttributeRequest;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductAttributeController extends Controller
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
    public function create(Product $product)
    {
        $productData = Product::with('attributes')->select('id', 'name', 'color', 'code')->findOrFail($product->id);
        return view('admin.products.attributes.add', ['product' => $productData]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->id;
        $data = $request->only(['size', 'sku', 'price', 'stock']);

        foreach ($data['sku'] as $key => $value) {
            if (!empty($value)) {

                // SKU Must Be Unique :
                $skuCount = ProductAttribute::where('sku', $value)->count();
                if ($skuCount > 0) {
                    Session::flash('alert-type', 'info');
                    Session::flash('message', __('msgs.sku_already_exists'));
                    return redirect()->route('admin.attributes.create', $product_id);
                }
                // Size of Product Must Be Unique :
                $sizeCount = ProductAttribute::where(['size' => $data['size'][$key], 'product_id' => $product_id])->count();
                if ($sizeCount > 0) {
                    Session::flash('alert-type', 'info');
                    Session::flash('message', __('msgs.size_already_exists'));
                    return redirect()->route('admin.attributes.create', $product_id);
                }


                ProductAttribute::create([
                    'product_id'    => $product_id,
                    'sku'           => $value,
                    'size'          => $data['size'][$key],
                    'price'          => $data['price'][$key],
                    'stock'          => $data['stock'][$key],
                    'status'        => 1,
                ]);
            }
        }
        Session::flash('message', __('msgs.attributes_add'));
        return redirect()->route('admin.attributes.create', $product_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $productAttribute)
    {
        //

    }
}