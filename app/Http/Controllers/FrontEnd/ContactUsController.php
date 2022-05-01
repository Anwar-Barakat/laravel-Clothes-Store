<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactUsRequest;
use App\Models\CmsPage;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactUs      = CmsPage::where('url', 'contact-us')->first();
        if (isset($contactUs) && !empty($contactUs))
            return view('frontend.pages.contact-us', ['contactUs' => $contactUs]);
        else
            abort(404);
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
    public function store(StoreContactUsRequest $request)
    {
        if ($request->isMethod('post')) {
            $data       = $request->only(['name', 'phone', 'comment', 'email']);

            ContactUs::create($data);
            Session::flash('message', __('msgs.contact_us_add'));
            return redirect()->back();
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
    public function update(Request $request, CmsPage $cmsPage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CmsPage  $cmsPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CmsPage $cmsPage)
    {
        //
    }
}