<?php

namespace App\Http\Controllers\Admin;

use App\Exports\SubscrivberExport;
use App\Http\Controllers\Controller;
use App\Models\NewslatterSubsciber;
use App\Http\Requests\StoreNewslatterSubsciberRequest;
use App\Http\Requests\UpdateNewslatterSubsciberRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class NewslatterSubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers    = NewslatterSubsciber::latest()->get();
        return view('admin.newsletter-subscribers.index', ['subscribers' => $subscribers]);
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
     * @param  \App\Http\Requests\StoreNewslatterSubsciberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewslatterSubsciberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewslatterSubsciber  $newslatterSubsciber
     * @return \Illuminate\Http\Response
     */
    public function show(NewslatterSubsciber $newslatterSubsciber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewslatterSubsciber  $newslatterSubsciber
     * @return \Illuminate\Http\Response
     */
    public function edit(NewslatterSubsciber $newslatterSubsciber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewslatterSubsciberRequest  $request
     * @param  \App\Models\NewslatterSubsciber  $newslatterSubsciber
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewslatterSubsciberRequest $request, NewslatterSubsciber $newslatterSubsciber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewslatterSubsciber  $newslatterSubsciber
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subscriber = NewslatterSubsciber::findOrFail($id);
        $subscriber->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', __('msgs.subscriber_delete'));
        return redirect()->route('admin.newslatter-subscribers.index');
    }

    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'subscriber_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            NewslatterSubsciber::where('id', $data['subscriber_id'])->update([
                'status'                => $status
            ]);
            return response()->json([
                'status'                => $status,
                'subscriber_id'         => $data['subscriber_id']
            ]);
        }
    }

    public function export(){
        return Excel::download(new SubscrivberExport,'subscribers.xlsx');
    }
}