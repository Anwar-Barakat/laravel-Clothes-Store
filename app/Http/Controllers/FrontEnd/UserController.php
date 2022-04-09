<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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
    public function store(StoreUserRequest $request)
    {
        if ($request->isMethod('post')) {
            $data       = $request->only(['name', 'mobile', 'password', 'password_confirmation', 'email']);
            $userCount  = User::where('email', $data['email'])->count();
            if ($userCount > 0) {
                Session::flash('alert-type', 'info');
                Session::flash('message', __('msgs.email_already_exists'));
                return redirect()->back();
            } else {
                User::create($data);
                Session::flash('message', __('msgs.registered_success'));

                if (auth()->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                    if (!empty(Session::get('session_id'))) {
                        $user_id    = Auth::user()->id;
                        $session_id = Session::get('session_id');
                        Cart::where('session_id', $session_id)->update([
                            'user_id'   => $user_id,
                        ]);
                    }

                    $email          = $data['email'];
                    $messageData    = [
                        'name'      => $data['name'],
                        'mobile'    => $data['mobile'],
                        'email'     => $data['email'],
                    ];
                    Mail::send('frontend.emails.register', $messageData, function ($message) use ($email) {
                        $message->to($email)->subject('welcome to Laravel eCommerce Webiste');
                    });

                    return redirect()->route('frontend.cart');
                }
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
                Session::flash('message', __('translation.hi_welcome_back'));

                if (!empty(Session::get('session_id'))) {
                    $user_id    = Auth::user()->id;
                    $session_id = Session::get('session_id');
                    Cart::where('session_id', $session_id)->update([
                        'user_id'   => $user_id,
                    ]);
                }

                return redirect()->route('frontend.cart');
            } else {
                Session::flash('alert-type', 'info');
                Session::flash('message', __('msgs.email_or_pass_not_valid'));
                return redirect()->back();
            }
        }
    }


    public function showRegisterForm()
    {
        return view('frontend.auth.register');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('frontend.home');
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
}