<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Intervention\Image;

class AdminSettingController extends Controller
{
    public function settings(Request $request)
    {
        return view('admin.admin_settings');
    }

    public function checkCurrentPassword(Request $request)
    {
        $data = $request->only(['current_password']);
        if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password))
            echo "true";
        else
            echo 'false';
    }

    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['current_password', 'password', 'password_confirmation']);
            if (Hash::check($data['current_password'], Auth::guard('admin')->user()->password)) {
                $validatedData = $request->validate([
                    'password'                  => 'required|min:6|confirmed',
                    'password_confirmation'     => 'required|min:6',
                ]);
                Admin::where('id', Auth::guard('admin')->user()->id)->update([
                    'password'  => bcrypt($validatedData['password']),
                ]);
                Session::flash('message', __('msgs.update_admin_password'));
            } else {
                Session::flash('alert-type', 'error');
                Session::flash('message', __('translation.currnet_pwd_false'));
            }
            return redirect()->back();
        }
    }

    public function updateDetails(Request $request)
    {
        if ($request->isMethod('post')) {

            $data = $request->only(['name', 'type', 'mobile', 'avatar']);
            $validatedData = $request->validate([
                'name'          => 'required|regex:/^[\pL\s\-]+$/u',
                'mobile'        => 'required|numeric|min:9',
                'avatar'        => 'nullable|image|mimes:jpeg,png,jpg|max:1048',
            ]);


            $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $admin->clearMediaCollection('avatars');
                $admin->addMediaFromRequest('avatar')->toMediaCollection('avatars');
            }


            $admin->update([
                'name'      => $validatedData['name'],
                'mobile'    => $validatedData['mobile'],
            ]);
            return view('admin.admin_details', ['admin', $admin]);
            Session::flash('message', __('msgs.update_admin_details'));
            return redirect()->back();
        }
        return view('admin.admin_details');
    }
}
