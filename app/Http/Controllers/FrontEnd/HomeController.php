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
        $latestProducts         = Product::latest()->take(5)->get();
        return view('frontend.index', [
            'latestProducts'        => $latestProducts,
        ]);
    }
}