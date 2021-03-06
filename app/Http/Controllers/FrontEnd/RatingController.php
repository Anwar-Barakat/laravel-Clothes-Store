<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Requests\UpdateRatingRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RatingController extends Controller
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
     * @param  \App\Http\Requests\StoreRatingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRatingRequest $request)
    {

        if ($request->isMethod('post')) {
            $data                   = $request->only(['product_id', 'review', 'rating']);
            if (!Auth::check()) {
                Session::flash('alert-type', 'info');
                Session::flash('message', __('msgs.login_to', ['name' => __('frontend.rate_the_product')]));
                return redirect()->route('frontend.form.login');
            }

            $ratingCount            = Rating::where(['user_id' => Auth::user()->id, 'product_id' => $data['product_id']])->count();
            if ($ratingCount > 0) {
                Session::flash('alert-type', 'info');
                Session::flash('message', __('msgs.is_existed', ['name' => __('frontend.review')]));
            } else {
                $data['user_id']    = Auth::user()->id;
                Rating::create($data);
                Session::flash('message', __('msgs.added', ['name' => __('frontend.your_rating')]));
            }
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function edit(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRatingRequest  $request
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRatingRequest $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rating  $rating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
