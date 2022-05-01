<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCmsPageRequest;
use App\Http\Requests\UpdateCmsPageRequest;
use App\Models\CmsPage;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CmsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cms_pages      = CmsPage::latest()->get();
        return view('admin.pages.index', ['cms_pages' => $cms_pages]);
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
    public function store(StoreCmsPageRequest $request)
    {
        if ($request->isMethod('post')) {
            $data                   = $request->only(['title', 'description', 'meta_title', 'meta_description', 'meta_keywords']);
            $data['status']         = 1;
            $data['url']            = SlugService::createSlug(CmsPage::class, 'url', $data['title']);


            CmsPage::create($data);
            Session::flash('message', __('msgs.cms_page_add'));
            return redirect()->route('admin.cms-pages.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function show(CmsPage $cmsPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function edit(CmsPage $cmsPage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCmsPageRequest $request, CmsPage $cmsPage)
    {
        if ($request->isMethod('post')) {
            $data                   = $request->only(['title', 'description', 'meta_title', 'meta_description', 'meta_keywords']);
            $cmsPage->update($data);
            Session::flash('message', __('msgs.cms_page_update'));
            return redirect()->route('admin.cms-pages.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CmsPage::findOrFail($id)->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', __('msgs.cms_page_delete'));
        return redirect()->route('admin.cms-pages.index');
    }

    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'cms_page_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            CmsPage::where('id', $data['cms_page_id'])->update([
                'status'                => $status
            ]);
            return response()->json([
                'status'                => $status,
                'cms_page_id'           => $data['cms_page_id']
            ]);
        }
    }
}