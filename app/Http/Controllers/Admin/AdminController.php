<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Str;

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

    public function store(StoreAdminRequest $request)
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
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        if ($request->isMethod('post')) {
            $data   = $request->only(['name', 'password', 'type', 'mobile', 'status']);
            $admin->update($data);
            if ($request->hasFile('image') && $request->file('image')->isValid()) {
                $admin->clearMediaCollection('avatars');
                $admin->addMediaFromRequest('image')->toMediaCollection('avatars');
            }
            Session::flash('message', __('msgs.admin_update'));
            return redirect()->route('admin.admins.index');
        }
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        Media::where(['model_id' => $admin->id, 'collection_name' => 'avatars'])->delete();
        Session::flash('alert-type', 'info');
        Session::flash('message', __('msgs.admin_delete'));
        return redirect()->route('admin.admins.index');
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
        return view('admin.auth.login');
    }

    public function resetPasswordForm()
    {
        return view('admin.auth.password.reset');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email'         => ['required', 'email', 'exists:admins,email']
        ]);
        $token              = Str::random(64);
        DB::table('password_resets')->insert([
            'email'         => $request->email,
            'token'         => $token,
            'created_at'    => Carbon::now(),
        ]);

        $action_link = route('admin.reset.password.form', [
            'email'         => $request->email,
            'token'         => $token
        ]);
        $body       = "you can reset the password by clicking the link below";

        Mail::send('frontend.emails.email_forget', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
            $message->to($request->email)->subject(__('frontend.reset_password'));
        });


        Session::flash('alert-type', 'info');
        Session::flash('message', __('msgs.send_link_to_reset_password'));
        return redirect()->back();
    }

    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.auth.password.email', ['token' => $token, 'email' => $request->email]);
    }

    public function resetUserPassword(Request $request)
    {
        $request->validate([
            'email'                 => ['required', 'email', 'exists:admins,email'],
            'password'              => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8']
        ]);
        $check_token    = DB::table('password_resets')->where([
            'token'     => $request->token,
            'email'     => $request->email
        ])->first();

        if (!$check_token) {
            Session::flash('alert-type', 'error');
            Session::flash('message', __('msgs.email_not_valid'));
            return redirect()->back();
        } else {
            DB::table('password_resets')->where('email', $request->email)->delete();
            Admin::where('email', $request->email)->update([
                'password'  => bcrypt($request->password)
            ]);

            Session::flash('message', __('msgs.password_update'));
            return redirect()->route('admin.login');
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }
}