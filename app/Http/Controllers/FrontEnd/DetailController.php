<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $product            = Product::with([
            'category', 'brand', 'attributes' => function ($query) {
                $query->where('status', 1);
            }
        ])->findOrFail($id);
        $totalStock         = ProductAttribute::where('product_id', $id)->sum('stock');

        $groupProducts      = Product::select('id', 'name')
            ->where('id', '!=', $id)
            ->where('group_code', $product->group_code)
            ->where('group_code', '!=', '')
            ->where('status', 1)
            ->limit(4)
            ->get();


        $relatedProducts = Product::where('category_id', $product->category->id)->where('id', '!=', $product->id)->limit(5)->inRandomOrder()->get();
        return view('frontend.detail', [
            'product'           => $product,
            'totalStock'        => $totalStock,
            'relatedProducts'   => $relatedProducts,
            'groupProducts'     => $groupProducts,
        ]);
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

    public function getProductPrice(Request $request)
    {
        if ($request->ajax()) {
            $data                       = $request->only(['size', 'productId']);

            $discountedAttribtePrice    = Product::getDiscountedAttributePrice($data['productId'], $data['size']);

            return $discountedAttribtePrice;
        }
    }
}