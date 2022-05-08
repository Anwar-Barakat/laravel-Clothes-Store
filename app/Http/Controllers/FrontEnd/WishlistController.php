<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            $userWishlist   = Wishlist::with([
                'product' => function ($q) {
                    $q->select('id', 'name', 'code', 'color', 'price');
                }
            ])->where('user_id', Auth::user()->id)
                ->orderBy('id', 'desc')
                ->paginate();

            return view('frontend.wishlist.index', ['userWishlist' => $userWishlist]);
        } else {
            Session::flash('alert-type', 'info');
            Session::flash('message', __('msgs.login_to_display_wishlist'));
            return redirect()->back();
        }
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
     * @param  \App\Http\Requests\StoreWishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishlistRequest $request)
    {
        if ($request->ajax()) {
            $data = $request->only('product_id');
            if (!Auth::check())
                return 'login-to-add-wishlist';

            $countWishlist          = Wishlist::countWishlist($data['product_id']);
            if ($countWishlist == 0) {
                $data['user_id']    = Auth::user()->id;
                Wishlist::create($data);


                $wishlistItemsCount = Wishlist::where('user_id', Auth::user()->id)->count();
                return response()->json([
                    'status'                => true,
                    'action'                => 'add',
                    'wishlistItemsCount'    => $wishlistItemsCount
                ]);
            } else {
                Wishlist::where(['user_id' => Auth::user()->id, 'product_id' => $data['product_id']])->delete();

                $wishlistItemsCount = Wishlist::where('user_id', Auth::user()->id)->count();
                return response()->json([
                    'status'                => true,
                    'action'                => 'remove',
                    'wishlistItemsCount'    => $wishlistItemsCount
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWishlistRequest  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}