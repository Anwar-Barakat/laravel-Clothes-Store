<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with([
            'category' => function ($query) {
                $query->select('id', 'name');
            },
            'section' => function ($query) {
                $query->select('id', 'name');
            }
        ])->orderBy('created_at', 'desc')->get();
        return view('admin.products.index', ['products'  => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Section::with('categories')->get();
        // $categories = json_decode(json_encode($categories), true);
        // echo "<pre>";
        // print_r($categories);
        // die;
        return view('admin.products.add', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        if ($request->isMethod('post')) {
            $data               = $request->only(['category_id', 'name', 'code', 'color', 'price', 'discount', 'weight', 'video', 'description', 'wash_care', 'fabric', 'pattern', 'sleeve', 'fit', 'occasion', 'meta_title', 'meta_description', 'meta_keywords', 'is_feature']);
            $category = Category::find($data['category_id']);
            $data['section_id'] = $category['section_id'];
            $data['status']     = 1;
            $product = Product::create($data);
            if ($request->hasFile('video') && $request->file('video')->isValid()) {
                $product->addMediaFromRequest('video')->toMediaCollection('video_products');
            }
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $product->addMediaFromRequest('image')->toMediaCollection('image_products');
            }
            Session::flash('message', __('msgs.product_add'));
            return redirect()->route('admin.products.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Section::with('categories')->get();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, Product $product)
    {
        if ($request->isMethod('post')) {
            $data               = $request->only(['category_id', 'name', 'code', 'color', 'price', 'discount', 'weight', 'video', 'description', 'wash_care', 'fabric', 'pattern', 'sleeve', 'fit', 'occasion', 'meta_title', 'meta_description', 'meta_keywords', 'is_feature']);
            $category = Category::find($data['category_id']);
            $data['section_id'] = $category['section_id'];
            $data['status']     = 1;
            $product->update($data);
            
            if ($request->hasFile('video') && $request->file('video')->isValid()) {
                $product->clearMediaCollection('video_products');
                $product->addMediaFromRequest('video')->toMediaCollection('video_products');
            }
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $product->clearMediaCollection('image_products');
                $product->addMediaFromRequest('image')->toMediaCollection('image_products');
            }
            Session::flash('message', __('msgs.product_add'));
            return redirect()->route('admin.products.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Session::flash('alert-type', 'error');
        Session::flash('message', __('msgs.product_delete'));
        return redirect()->route('admin.products.index');
    }

    public function updateProductStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'product_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            Product::where('id', $data['product_id'])->update([
                'status'    => $status
            ]);
            return response()->json([
                'status'        => $status,
                'product_id'    => $data['product_id']
            ]);
        }
    }

    public function AddImage(Request $request)
    {
        return $request;
    }
}