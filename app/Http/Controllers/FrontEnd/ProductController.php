<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $url = null)
    {

        if ($request->ajax()) {
            $data = $request->only(['url', 'sort']);

            $url = $data['url'];

            $categoryCount = Category::where('url', $url)->count();
            if ($categoryCount > 0) {
                $categoryDetails    = (object)Category::catDetails($url);


                $categoryProducts   = (object)Product::with([
                    'brand' => function ($q) {
                        $q->select('id', 'name');
                    }
                ])->whereIn('category_id', $categoryDetails->categoryIds)
                    ->where('status', 1);

                // sorting :
                if (isset($data['sort']) && !empty($data['sort'])) {
                    if ($data['sort'] == 'date')
                        $categoryProducts =  $categoryProducts->orderBy('created_at', 'DESC');

                    elseif ($data['sort'] == 'name_a_z')
                        $categoryProducts =  $categoryProducts->orderBy('name', 'ASC');

                    elseif ($data['sort'] == 'name_z_a')
                        $categoryProducts =  $categoryProducts->orderBy('name', 'DESC');

                    elseif ($data['sort'] == 'price_asc')
                        $categoryProducts =  $categoryProducts->orderBy('price', 'ASC');

                    elseif ($data['sort'] == 'price_desc')
                        $categoryProducts =  $categoryProducts->orderBy('price', 'DESC');
                } else
                    $categoryProducts =  $categoryProducts->orderBy('id', 'DESC');

                $categoryProducts = $categoryProducts->paginate(3);
                $categoryImageId = Category::findOrFail($categoryDetails->catDetails['id']);

                return view('frontend.partials.ajax_products', [
                    'categoryDetails'   => $categoryDetails,
                    'categoryProducts'  => $categoryProducts,
                    'categoryImageId'   => $categoryImageId,
                    'url'               => $url
                ]);
            }
        } else {
            $categoryCount = Category::where('url', $url)->count();
            if ($categoryCount > 0) {
                $categoryDetails    = (object)Category::catDetails($url);
                $categoryProducts   = (object)Product::with([
                    'brand' => function ($q) {
                        $q->select('id', 'name');
                    }
                ])->whereIn('category_id', $categoryDetails->categoryIds)
                    ->where('status', 1);
                $categoryProducts = $categoryProducts->paginate(3);
                $categoryImageId = Category::findOrFail($categoryDetails->catDetails['id']);
            }

            return view('frontend.shop', [
                'categoryDetails'   => $categoryDetails,
                'categoryProducts'  => $categoryProducts,
                'categoryImageId'   => $categoryImageId,
                'url'               => $url
            ]);
        }
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