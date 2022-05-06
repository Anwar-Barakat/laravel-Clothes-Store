<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use App\Models\Section;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.index', ['coupons' => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Section::with('categories')->get();
        $users      = User::select('email')->where('status', 1)->get();
        return view('admin.coupons.add', [
            'categories'    => $categories,
            'users'         => $users
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCouponRequest $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['option', 'code', 'categories', 'users', 'amount_type', 'amount', 'type', 'expiration_date']);

            if (isset($data['users'])) {
                $data['users'] = implode(',', $data['users'] ?? []);
            }
            if (isset($data['categories']))
                $data['categories'] = implode(',', $data['categories'] ?? []);

            if ($data['option'] == 'Automatic')
                $data['code'] = Str::random(10);


            Coupon::create($data);
            Session::flash('message', __('msgs.coupno_add'));
            return redirect()->route('admin.coupons.index');


            return $data;
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
    public function edit(Coupon $coupon)
    {
        $categories     = Section::with('categories')->get();
        $users          = User::select('email')->where('status', 1)->get();
        $selectCats     = explode(',', $coupon->categories);
        $selectUsers    = explode(',', $coupon->users);
        return view('admin.coupons.edit', [
            'coupon'        => $coupon,
            'categories'    => $categories,
            'selectCats'    => $selectCats,
            'users'         => $users,
            'selectUsers'   => $selectUsers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['categories', 'users', 'amount_type', 'amount', 'type', 'expiration_date']);

            if (isset($data['users'])) {
                $data['users'] = implode(',', $data['users'] ?? []);
            }
            if (isset($data['categories']))
                $data['categories'] = implode(',', $data['categories'] ?? []);

            $coupon->update($data);
            Session::flash('message', __('msgs.coupno_update'));
            return redirect()->route('admin.coupons.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', __('msgs.coupno_delete'));
        return redirect()->route('admin.coupons.index');
    }


    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'coupon_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            Coupon::where('id', $data['coupon_id'])->update([
                'status'    => $status
            ]);
            return response()->json([
                'status'        => $status,
                'coupon_id'    => $data['coupon_id']
            ]);
        }
    }
}
