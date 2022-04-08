@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.login') }}
@endsection

@section('content')
    <div class="home-page home-01">
        <main id="main" class="main-site left-sidebar">

            <div class="container">

                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.login') }}</span></li>
                        <li class="item-link"><a href="{{ route('frontend.home') }}"
                                class="link">{{ __('frontend.home') }}</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                        <div class=" main-content-area">
                            <div class="wrap-login-item ">
                                <div class="login-form form-item form-stl">
                                    <form name="frm-login" action="{{ route('frontend.login') }}" method="POST">
                                        @csrf
                                        <fieldset class="wrap-title">
                                            <h3 class="form-title">{{ __('frontend.login_into_account') }}</h3>
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="frm-login-email_address">{{ __('frontend.email_address') }}:</label>
                                            <input type="email" id="frm-login-email_address" name="email"
                                                title="{{ __('frontend.email_address') }}"
                                                class="@error('email') is-invalid @enderror" value="{{ old('email') }}"
                                                required autocomplete="email" autofocus
                                                placeholder="{{ __('frontend.type_tour_email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="frm-login-pass">{{ __('frontend.password') }}:</label>
                                            <input type="password" id="frm-login-pass" name="password"
                                                class="@error('password') is-invalid @enderror" required
                                                autocomplete="current-password" placeholder="********">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>

                                        <fieldset class="wrap-input">
                                            <label class="remember-field">
                                                <input class="frm-input " name="rememberme" id="rememberme"
                                                    value="forever" {{ old('remember') ? 'checked' : '' }}
                                                    type="checkbox"><span>{{ __('frontend.remember_me') }}</span>
                                            </label>
                                            <a class="link-function left-position" href="#"
                                                title="{{ __('frontend.forgotten_password') }}?">{{ __('frontend.forgotten_password') }}?</a>
                                        </fieldset>
                                        <input type="submit" class="btn btn-submit" value="{{ __('frontend.login') }}">
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
