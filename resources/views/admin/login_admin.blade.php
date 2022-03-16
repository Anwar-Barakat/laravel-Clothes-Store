@extends('layouts.master2')

@section('title')
    {{ __('translation.login') }}
@stop


@section('css')
    <!--===============================================================================================-->
    <link rel="stylesheet" href="{{ asset('admin/css/admin-login-register/util.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/admin-login-register/all.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/admin-login-register/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/admin-login-register/main.css') }}">

@endsection
@section('content')
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('admin/images/admin-login-register/img-01.png') }}" alt="IMG">
                </div>
                <form class="login100-form validate-form" action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <span class="login100-form-title">
                        {{ __('translation.admin_login') }}
                    </span>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled mb-0">
                                @foreach ($errors->all() as $error)
                                    <li class="mb-0">- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="wrap-input100">
                        <input class="input100 @error('email') is-invalid @enderror" type="email" id="email" name="email"
                            value="{{ old('email') }}" autocomplete="email"
                            placeholder="{{ __('translation.email_address') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="wrap-input100">
                        <input class="input100 @error('password') is-invalid @enderror" type="password" name="password"
                            autocomplete="current-password" placeholder="{{ __('translation.password') }}">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="form-group row align-items-center">
                        <div class="col-md-12">
                            <div class="container-login100-form-btn pt-0">
                                <button class="login100-form-btn" type="submit">
                                    {{ __('translation.login') }}
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="text-center p-t-12">
                        <span class="txt1">
                            {{ __('translation.forget_password') }}
                        </span>
                        <a class="txt2" href="#">
                            {{ __('translation.here') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!--===============================================================================================-->
    <script src="{{ asset('admin/js/admin-login-register/all.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('admin/js/admin-login-register/main.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('vendor/tilt/tilt.jquery.min.js') }}"></script>
    <!--===============================================================================================-->
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
@endsection
