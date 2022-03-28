<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banners.index', ['banners' => Banner::latest()->get()]);
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
    public function store(StoreBannerRequest $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['title_ar', 'title_en', 'link', 'alternative', 'status', 'image']);

            $banner = Banner::create([
                'title'      => [
                    'ar'        => $data['title_ar'],
                    'en'        => $data['title_en'],
                ],
                'link'          => $data['link'],
                'alternative'   => $data['alternative'],
                'status'        => $data['status'],
            ]);

            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $banner->addMediaFromRequest('image')->toMediaCollection('banners');
            }
            Session::flash('message', __('msgs.banner_add'));
            return redirect()->route('admin.banners.index');
        }
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

    public function updateBannerStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'banner_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            Banner::where('id', $data['banner_id'])->update([
                'status'    => $status
            ]);
            return response()->json([
                'status'        => $status,
                'banner_id'    => $data['banner_id']
            ]);
        }
    }
}