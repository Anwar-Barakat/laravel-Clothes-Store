<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $contactUs  = ContactUs::latest()->get();
        return view('admin.contact-us.index', ['contactUs' => $contactUs]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show(ContactUs $contactUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ContactUs::findOrFail($id)->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', __('msgs.message_delete'));
        return redirect()->route('admin.contact-us.index');
    }


    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'message_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            ContactUs::where('id', $data['message_id'])->update([
                'status'                => $status
            ]);
            return response()->json([
                'status'                => $status,
                'message_id'            => $data['message_id']
            ]);
        }
    }
}