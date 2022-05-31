<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Cart;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }


    public function store(StoreUserRequest $request)
    {
        if ($request->isMethod('post')) {
            $data           = $request->only(['name', 'mobile', 'password', 'password_confirmation', 'email']);
            $data['status'] = 0;
            $userCount  = User::where('email', $data['email'])->count();
            if ($userCount > 0) {
                Session::flash('alert-type', 'info');
                Session::flash('message',  __('msgs.is_existed', ['name' => __('frontend.email_address')]));
                return redirect()->back();
            } else {
                User::create($data);
                Session::flash('message', __('msgs.registered_success'));

                $email          = $data['email'];
                $details        = [
                    'email'     => $email,
                    'name'      => $data['name'],
                    'mobile'    => $data['mobile'],
                    'code'      => base64_encode($email),
                ];
                Mail::send('frontend.emails.email_confirmation', $details, function ($message) use ($email) {
                    $message->to($email)->subject('__("msgs.confirm_email")');
                });
                Session::flash('alert-type', 'info');
                Session::flash('message', __('msgs.please_confirm_email'));
                return redirect()->route('frontend.form.login');
            }
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }


    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->only(['email', 'password']);
            if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {

                $userStatus = User::where('email', $data['email'])->first();
                if ($userStatus->status == '0') {
                    Session::flash('alert-type', 'info');
                    Session::flash('message', __('msgs.please_confirm_email'));
                    return redirect()->back();
                } else {
                    Session::flash('message', __('translation.hi_welcome_back'));
                    if (!empty(Session::get('session_id'))) {
                        $user_id    = Auth::user()->id;
                        $session_id = Session::get('session_id');
                        Cart::where('session_id', $session_id)->update([
                            'user_id'   => $user_id,
                        ]);
                    }
                    return redirect()->route('frontend.cart');
                }
            } else {
                Session::flash('alert-type', 'info');
                Session::flash('message',  __('msgs.not_valid', ['name' => __('msgs.email_or_password')]));
                return redirect()->back();
            }
        }
    }


    public function checkEmail(Request $request)
    {
        $data           = $request->only(['email']);
        $emailCount     = User::where('email', $data['email'])->count();
        if ($emailCount > 0)
            return "false";
        else
            return "true";
    }

    public function confirmationEmail($email)
    {
        $email      = base64_decode($email);
        $userCount  = User::where('email', $email)->count();
        if ($userCount > 0) {
            $user = User::where('email', $email)->first();

            if ($user->status == 1) {
                Session::flash('alert-type', __('msgs.already_cofirm'));
                Session::flash('message', __('msgs.email_confirmed'));
                return redirect()->route('frontend.form.login');
            } else {
                User::where('email', $email)->update(['status' => 1]);
                $email          = $user['email'];
                $messageData    = [
                    'name'      => $user['name'],
                    'mobile'    => $user['mobile'],
                    'email'     => $user['email'],
                ];
                Mail::send('frontend.emails.register', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('welcome to An eCommerce Webiste');
                });


                Session::flash('message', __('msgs.email_confirmed'));
                return redirect()->route('frontend.form.login');
            }
        } else
            abort(404);
    }

    public function resetPasswordForm()
    {
        return view('frontend.auth.password.reset');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate([
            'email'         => ['required', 'email', 'exists:users,email']
        ]);
        $token              = Str::random(64);
        DB::table('password_resets')->insert([
            'email'         => $request->email,
            'token'         => $token,
            'created_at'    => Carbon::now(),
        ]);

        $action_link = route('frontend.reset.password.form', [
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
        return view('frontend.auth.password.email', ['token' => $token, 'email' => $request->email]);
    }

    public function resetUserPassword(Request $request)
    {
        $request->validate([
            'email'                 => ['required', 'email', 'exists:users,email'],
            'password'              => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8']
        ]);
        $check_token    = DB::table('password_resets')->where([
            'token'     => $request->token,
            'email'     => $request->email
        ])->first();

        if (!$check_token) {
            Session::flash('alert-type', 'error');
            Session::flash('message', __('msgs.not_valid', ['name' => __('translation.email_address')]));
            return redirect()->back();
        } else {
            DB::table('password_resets')->where('email', $request->email)->delete();
            User::where('email', $request->email)->update([
                'password'  => bcrypt($request->password)
            ]);

            Session::flash('message', __('msgs.updated', ['name' => __('translation.password')]));
            return redirect()->route('frontend.form.login');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('frontend.form.login');
    }
}
