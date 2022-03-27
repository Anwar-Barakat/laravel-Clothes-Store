<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        $sections =  Section::with('categories')->get();
        return view('frontend.shop', ['sections'    => $sections]);
    }

    public function cart()
    {
        $featuredPorductsCount  = Product::where('is_feature', 'Yes')->count();
        $featuredPorducts       = Product::where('is_feature', 'Yes')->get();
        return view('frontend.cart', [
            'featuredPorductsCount'     => $featuredPorductsCount,
            'featuredPorducts'          => $featuredPorducts,
        ]);
    }
}