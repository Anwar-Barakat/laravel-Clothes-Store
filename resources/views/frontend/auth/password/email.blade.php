@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.reset_password') }}
@endsection

@section('content')
    <div class="home-page home-01">
        <main id="main" class="main-site left-sidebar">

            <div class="container">

                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.reset_password') }}</span></li>
                        <li class="item-link"><a href="{{ route('frontend.home') }}"
                                class="link">{{ __('frontend.home') }}</a></li>
                    </ul>
                </div>
                @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 col-md-offset-3">
                        <div class=" main-content-area">
                            <div class="wrap-login-item ">
                                <div class="login-form form-item form-stl">
                                    <form name="frm-login" action="{{ route('frontend.user.reset.password') }}"
                                        method="POST" id="ResetPasswordForm">
                                        @csrf
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <fieldset class="wrap-address-billing">
                                            <h3 class="box-title">{{ __('frontend.reset_password') }}</h3>
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="email">{{ __('frontend.email_address') }}:</label>
                                            <input type="email" id="email" name="email"
                                                title="{{ __('frontend.email_address') }}"
                                                class="@error('email') is-invalid @enderror"
                                                value="{{ old('email', $email) }}" required autocomplete="email"
                                                autofocus placeholder="{{ __('frontend.email_to_reset_pass') }}">
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
                                            <label
                                                for="password_confirmation">{{ __('frontend.confirm_password') }}:</label>
                                            <input type="password" id="password_confirmation" name="password_confirmation"
                                                class="@error('password_confirmation') is-invalid @enderror" required
                                                autocomplete="current-password_confirmation" placeholder="********">
                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>
                                        <input type="submit" class="button-30" role="button"
                                            value="{{ __('frontend.reset_password') }}">

                                        <br>
                                        <br>
                                        <fieldset class="wrap-input mt-3">
                                            <p>{{ __('frontend.have_an_account') }}?<a
                                                    href="{{ route('frontend.form.login') }}">{{ __('frontend.login') }}</a>
                                            </p>
                                        </fieldset>
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
        $("#ResetPasswordForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true,
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    equalTo: "#password"
                },
            },
            messages: {
                email: {
                    required: "{{ __('msgs.email_not_valid') }} ",
                    email: "{{ __('msgs.valid_email') }} ",
                },
                password: {
                    required: "{{ __('msgs.enter_your_password') }}",
                    minlength: "{{ __('msgs.min_password') }}"
                },
                password_confirmation: {
                    required: "{{ __('msgs.enter_your_conf__pass') }}",
                    minlength: "{{ __('msgs.min_password') }}",
                    equalTo: "{{ __('msgs.confirm_pass') }}"
                },
            }
        });
    </script>
@endsection
