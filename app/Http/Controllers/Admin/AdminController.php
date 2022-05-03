<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        $admins     = Admin::latest()->get();
        return view('admin.admins.index', ['admins' => $admins]);
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['email', 'password']);

            $validatedData = $request->validate([
                'email'     => 'required|email',
                'password'  => 'required',
            ]);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                Session::flash('message', __('translation.welcome_back'));
                return redirect()->route('admin.dashboard');
            } else {
                Session::flash('alert-type', 'error');
                Session::flash('message', __('translation.email_or_pass_not_valid'));
                return redirect()->route('admin.login');
            }
        }
        return view('admin.login_admin');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}