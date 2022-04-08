@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.register') }}
@endsection

@section('content')
    <div class="home-page home-01">
        <main id="main" class="main-site left-sidebar">

            <div class="container">

                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.register') }}</span></li>
                        <li class="item-link"><a href="{{ route('frontend.home') }}"
                                class="link">{{ __('frontend.home') }}</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                        <div class=" main-content-area">
                            <div class="wrap-login-item ">
                                <div class="login-form form-item form-stl">
                                    <form name="frm-login" action="{{ route('frontend.register') }}" method="POST">
                                        @csrf
                                        <fieldset class="wrap-title">
                                            <h3 class="form-title">{{ __('frontend.create_new_account') }}</h3>
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="frm-register-uname">{{ __('frontend.name') }}:</label>
                                            <input type="text" id="frm-register-uname" name="name"
                                                title="{{ __('frontend.name') }}"
                                                class="@error('name') is-invalid @enderror" value="{{ old('name') }}"
                                                required autocomplete="name" autofocus
                                                placeholder="{{ __('frontend.type_tour_name') }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="frm-register-uname">{{ __('frontend.email_address') }}:</label>
                                            <input type="email" id="frm-register-uname" name="email"
                                                title="{{ __('frontend.email_address') }}"
                                                class="@error('email') is-invalid @enderror" value="{{ old('email') }}"
                                                required autocomplete="email"
                                                placeholder="{{ __('frontend.type_your_email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="frm-register-pass">{{ __('frontend.password') }}:</label>
                                            <input type="password" id="frm-register-pass" name="password"
                                                class="@error('password') is-invalid @enderror" required
                                                autocomplete="current-password" placeholder="********">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="wrap-input">
                                            <label
                                                for="frm-register-conf-pass">{{ __('frontend.confirm_password') }}:</label>
                                            <input type="password" id="frm-register-conf-pass" name="password_confirmation"
                                                required autocomplete="new-password"
                                                class="@error('password_confirmation') is-invalid @enderror"
                                                placeholder="********">

                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>

                                        <input type="submit" class="btn btn-submit"
                                            value="{{ __('frontend.register') }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end main products area-->
                    </div>
                </div>
                <!--end row-->

            </div>
            <!--end container-->

        </main>
    </div>
@endsection
