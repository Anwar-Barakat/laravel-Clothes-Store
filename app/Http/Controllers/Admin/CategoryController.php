<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddEditCategoryRequest;
use App\Models\Category;
use App\Models\Section;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
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

    public function addEditCategory(Request $request, $id = null)
    {
        if (!$id) {
            $title  = __('translation.add_category');
            $cat    = new Category();
        } else {
            $title = __('translation.edit_category');
        }

        if ($request->isMethod('post')) {
            $data = $request->only(['name', 'section_id', 'parent_id', 'discount', 'description', 'status', 'meta_title', 'meta_description', 'meta_keywords', 'image']);
            $validatedData = $request->validate([
                'name'              => 'required|min:3',
                'section_id'        => 'required',
                'parent_id'         => 'required',
                'discount'          => 'required',
                'meta_title'        => 'required',
                'meta_description'  => 'required',
                'meta_keywords'     => 'required',
                'description'       => 'required|min:10',
                'status'            => 'required|in:0,1',
                'image'             => 'nullable|image|mimes:jpeg,png,jpg|max:1048',

            ]);
            $data['url'] = SlugService::createSlug(Category::class, 'url', $data['name']);
            $cat = Category::create($data);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $cat->addMediaFromRequest('image')->toMediaCollection('categories');
            }
            Session::flash('message', __('msgs.category_add'));
            return redirect()->route('admin.categories.index');
        }

        $sections = Section::all();
        return view('admin.categories.add_edit', [
            'title'         => $title,
            'sections'      => $sections,
        ]);
    }

    public function appendCategoriesLevel(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['section_id']);
            $categories = Category::with('subCategories')->where([
                'section_id'    => $data['section_id'],
                'parent_id'     => 0,
                'status'        => 1
            ])->get();
            return view('admin.categories.append__category', [
                'categories'  => $categories
            ]);
        }
    }
}
