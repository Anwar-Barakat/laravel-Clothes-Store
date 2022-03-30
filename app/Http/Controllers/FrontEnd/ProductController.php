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
    public function index($url = 'asus')
    {
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
            if (isset($_GET['orderby']) && !empty($_GET['orderby'])) {
                if ($_GET['orderby'] == 'date')
                    $categoryProducts =  $categoryProducts->orderBy('created_at', 'DESC');

                elseif ($_GET['orderby'] == 'name_a_z')
                    $categoryProducts =  $categoryProducts->orderBy('name', 'ASC');

                elseif ($_GET['orderby'] == 'name_z_a')
                    $categoryProducts =  $categoryProducts->orderBy('name', 'DESC');

                elseif ($_GET['orderby'] == 'price_asc')
                    $categoryProducts =  $categoryProducts->orderBy('price', 'ASC');

                elseif ($_GET['orderby'] == 'price_desc')
                    $categoryProducts =  $categoryProducts->orderBy('price', 'DESC');
            }

            $categoryProducts = $categoryProducts->paginate(3);


            $categoryImageId = Category::findOrFail($categoryDetails->catDetails['id']);
        } else {
        }

        return view('frontend.shop', [
            'categoryDetails'   => $categoryDetails,
            'categoryProducts'  => $categoryProducts,
            'categoryImageId'   => $categoryImageId
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
}