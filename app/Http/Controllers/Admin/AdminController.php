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


    public function create()
    {
        return view('admin.admins.add');
    }

    public function store(Request $request)
    {
        if ($request->isMethod('post')) {
            $data   = $request->only(['name', 'email', 'password', 'type', 'mobile', 'status']);

            $admin  = Admin::create($data);

            if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
                $admin->addMediaFromRequest('avatar')->toMediaCollection('avatars');
            }

            Session::flash('message', __('msgs.admin_add'));
            return redirect()->route('admin.admins.index');
        }
    }

    public function edit(Admin $admin)
    {
    }

    public function updateStatus(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->only(['status', 'admin_id']);
            if ($data['status'] == 1)
                $status = 0;
            else
                $status = 1;
            Admin::where('id', $data['admin_id'])->update([
                'status'            => $status
            ]);
            return response()->json([
                'status'            => $status,
                'admin_id'          => $data['admin_id']
            ]);
        }
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['email', 'password']);

            $validatedData = $request->validate([
                'email'     => 'required|email',
                'password'  => 'required',
            ]);

            if (Auth::guard('admin')->attempt(
                [
                    'email'         => $data['email'],
                    'password'      => $data['password'],
                    'status'        => 1
                ]
            )) {
                Session::flash('message', __('translation.welcome_back'));
                return redirect()->route('admin.dashboard');
            } else {
                Session::flash('alert-type', 'error');
                Session::flash('message', __('translation.email_or_pass_not_valid'));
                return redirect()->route('admin.login');
            }
        }
        return view('admin.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}