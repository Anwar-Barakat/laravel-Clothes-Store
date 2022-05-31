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
                    <div class="col-md-10 col-xs-12 col-md-offset-1">
                        <div class=" main-content-area" style="width: 100%">
                            <div class="wrap-login-item ">
                                <div class="login-form form-item form-stl">
                                    <form name="registerForm" id="registerForm" action="{{ route('frontend.register') }}"
                                        method="POST">
                                        @csrf
                                        <fieldset class="wrap-address-billing">
                                            <h3 class="box-title">{{ __('frontend.create_new_account') }}</h3>
                                        </fieldset>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="name">{{ __('frontend.name') }}:</label>
                                                    <input type="text" id="name" name="name"
                                                        title="{{ __('frontend.name') }}"
                                                        class="@error('name') is-invalid @enderror"
                                                        value="{{ old('name') }}" autocomplete="name" autofocus
                                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.name')]) }}">
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="mobile">{{ __('frontend.mobile') }}:</label>
                                                    <input type="tel" id="mobile" name="mobile"
                                                        title="{{ __('frontend.mobile') }}"
                                                        class=" @error('mobile') is-invalid @enderror"
                                                        value="{{ old('mobile') }}" autocomplete="mobile" autofocus
                                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.mobile')]) }}">
                                                    @error('mobile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <fieldset class="wrap-input">
                                            <label for="email">{{ __('frontend.email_address') }}:</label>
                                            <input type="email" id="email" name="email"
                                                title="{{ __('frontend.email_address') }}"
                                                class="@error('email') is-invalid @enderror" value="{{ old('email') }}"
                                                autocomplete="email"
                                                placeholder="{{ __('translation.please_type', ['name' => __('translation.email_address')]) }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="password">{{ __('frontend.password') }}:</label>
                                                    <input type="password" id="password" name="password"
                                                        class="@error('password') is-invalid @enderror"
                                                        autocomplete="current-password" placeholder="********">

                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label
                                                        for="password_confirmation">{{ __('frontend.confirm_password') }}:</label>
                                                    <input type="password" id="password_confirmation"
                                                        name="password_confirmation" autocomplete="new-password"
                                                        class="@error('password_confirmation') is-invalid @enderror"
                                                        placeholder="********">

                                                    @error('password_confirmation')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <input type="submit" class="button-30" role="button"
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
        </main>
    </div>
@endsection


@section('js')
    <script src="{{ asset('front/assets/js/jquery.validate.min.js') }}"></script>
    <script>
        // validate signup form on keyup and submit
        $("#registerForm").validate({
            rules: {
                name: "required",
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
                },
                email: {
                    required: true,
                    email: true,
                    remote: "check-email"
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
                name: "{{ __('translation.please_type', ['name' => __('translation.name')]) }}",
                mobile: {
                    required: "{{ __('translation.please_type', ['name' => __('translation.mobile')]) }}",
                    minlength: "{{ __('msgs.min_mobile') }}",
                    maxlength: "{{ __('msgs.max_mobile') }}",
                    digits: "{{ __('msgs.mobile_not_valid') }}",
                },
                email: {
                    required: "{{ __('translation.please_type', ['name' => __('translation.email_address')]) }} ",
                    email: "{{ __('msgs.not_valid', ['name' => __('translation.email_address')]) }} ",
                    remote: "{{ __('msgs.is_existed', ['name' => __('translation.email_address')]) }} ",
                },
                password: {
                    required: "{{ __('translation.please_type', ['name' => __('translation.password')]) }}",
                    minlength: "{{ __('msgs.min_password') }}"
                },
                password_confirmation: {
                    required: "{{ __('translation.please_type', ['name' => __('translation.password_confirmation')]) }}",
                    minlength: "{{ __('msgs.min_password') }}",
                    equalTo: "{{ __('msgs.confirm_pass') }}"
                },
            }
        });
    </script>
@endsection
