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
                                    <form name="frm-login" action="{{ route('frontend.login') }}" method="POST"
                                        id="loginForm">
                                        @csrf
                                        <fieldset class="wrap-address-billing">
                                            <h3 class="box-title">{{ __('frontend.login_into_account') }}</h3>
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="email">{{ __('frontend.email_address') }}:</label>
                                            <input type="email" id="email" name="email"
                                                title="{{ __('frontend.email_address') }}"
                                                class="@error('email') is-invalid @enderror" value="{{ old('email') }}"
                                                required autocomplete="email" autofocus
                                                placeholder="{{ __('translation.please_type', ['name' => __('translation.email_address')]) }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="password">{{ __('frontend.password') }}:</label>
                                            <input type="password" id="password" name="password"
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
                                            <a class="link-function left-position"
                                                href="{{ route('frontend.forget.password.form') }}"
                                                title="{{ __('frontend.forgotten_password') }}?">{{ __('frontend.forgotten_password') }}?</a>
                                        </fieldset>
                                        <input type="submit" class="button-30" role="button"
                                            value="{{ __('frontend.login') }}">
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
@section('js')
    <script src="{{ asset('front/assets/js/jquery.validate.min.js') }}"></script>
    <script>
        // validate signup form on keyup and submit
        $("#loginForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8
                },
            },
            messages: {
                email: {
                    required: "{{ __('translation.please_type', ['name' => __('translation.email_address')]) }} ",
                    email: "{{ __('msgs.not_valid', ['name' => __('translation.email_address')]) }} ",
                },
                password: {
                    required: "{{ __('translation.please_type', ['name' => __('translation.password')]) }}",
                    minlength: "{{ __('msgs.min_password') }}"
                },
            }
        });
    </script>
@endsection
