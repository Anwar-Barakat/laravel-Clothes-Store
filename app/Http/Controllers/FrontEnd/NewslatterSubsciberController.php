<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\NewslatterSubsciber;
use App\Http\Requests\StoreNewslatterSubsciberRequest;
use App\Http\Requests\UpdateNewslatterSubsciberRequest;

class NewslatterSubsciberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        if ($request->isMethod('post')) {
            $data               = $request->only(['email']);

            // echo '<pre>';
            // print_r($data);
            // die;
            $alreadySubscriber  = NewslatterSubsciber::where('email', $data['email'])->count();
            if ($alreadySubscriber > 0)
                return 'exists';
            else {
                NewslatterSubsciber::create($data);
                return 'true';
            }
        }
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
    public function destroy(NewslatterSubsciber $newslatterSubsciber)
    {
        //
    }
}
