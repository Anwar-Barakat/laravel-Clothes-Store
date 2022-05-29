<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use App\Models\Section;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with(['section', 'parentCategory'])->latest()->get();
        return view('admin.categories.index', ['categories'  => $categories]);
    }


    public function create()
    {
        $sections = Section::all();
        return view('admin.categories.add', ['sections'  => $sections]);
    }

    public function store(StoreCategoryRequest $request)
    {
        $data                   = $request->only(['name', 'section_id', 'parent_id', 'discount', 'description', 'status', 'meta_title', 'meta_description', 'meta_keywords', 'image']);
        $data['url']            = SlugService::createSlug(Category::class, 'url', $data['name']);

        $category = Category::create($data);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $category->addMediaFromRequest('image')->toMediaCollection('categories');
        }
        Session::flash('message', __('msgs.added', ['name' => __('translation.category')]));
        return redirect()->route('admin.categories.index');
    }


    public function edit(Category $category)
    {
        $sections = Section::all();
        $categories = Category::with('subCategories')->where(['parent_id' => 0, 'section_id' => $category->section_id])->get();

        return view('admin.categories.edit', [
            'category'          => $category,
            'sections'          => $sections,
            'categories'        => $categories,
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->only(['name', 'section_id', 'parent_id', 'discount', 'description', 'status', 'meta_title', 'meta_description', 'meta_keywords', 'image']);
        $category->update($data);
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $category->clearMediaCollection('categories');
            $category->addMediaFromRequest('image')->toMediaCollection('categories');
        }
        Session::flash('message', __('msgs.updated', ['name' => __('translation.category')]));
        return redirect()->route('admin.categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        Media::where(['model_id' => $category->id, 'collection_name' => 'categories'])->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', __('msgs.deleted', ['name' => __('translation.category')]));
        return redirect()->route('admin.categories.index');
    }


    public function updateStatus(Request $request)
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
                'categories'    => $categories
            ]);
        }
    }
}
