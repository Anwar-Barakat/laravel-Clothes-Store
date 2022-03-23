<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductImageController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Product $product)
    {
        $productData = Product::select('id', 'name', 'color', 'code')->find($product->id);
        return view('admin.products.attachments.add', ['product' => $productData]);
    }


    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $product    = Product::findOrFail($request->product_id);

            if ($request->hasFile('image')) {
                $images = $product->addMultipleMediaFromRequest(['image'])->each(function ($image) {
                    $image->toMediaCollection('product_attachments');
                });
            }
            Session::flash('message', __('msgs.product_attachments_add'));
            return redirect()->back();
        }
    }
}