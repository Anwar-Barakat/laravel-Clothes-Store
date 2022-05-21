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
        $latestProducts         = Product::limit(5)->inRandomOrder()->get();
        $categpryProducts       = Category::with('products')->limit(5)->inRandomOrder()->get();
        return view('frontend.index', [
            'latestProducts'        => $latestProducts,
            'categpryProducts'      => $categpryProducts,
        ]);
    }
}