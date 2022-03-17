<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', ['categories'  => $categories]);
    }

    public function updateCategoryStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'category_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            Category::where('id', $data['category_id'])->update([
                'status'    => $status
            ]);
            return response()->json([
                'status'        => $status,
                'category_id'   => $data['category_id']
            ]);
        }
    }
}
