<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Section;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{
    public function index()
    {
        $sections =  Section::with('categories')->get();
        return view('frontend.index', ['sections'    => $sections]);
    }

    public function about()
    {
        $sections =  Section::with('categories')->get();
        return view('frontend.shop', ['sections'    => $sections]);
    }

    public function cart()
    {
        $sections =  Section::with('categories')->get();
        return view('frontend.cart', ['sections'    => $sections]);
    }
}