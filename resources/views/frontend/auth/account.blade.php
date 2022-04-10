@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.my_account') }}
@endsection

@section('content')
    <div class="home-page home-01">
        <main id="main" class="main-site left-sidebar">
            <div class="container">
                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.my_account') }}</span></li>
                        <li class="item-link"><a href="{{ route('frontend.home') }}"
                                class="link">{{ __('frontend.home') }}</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-md-10 col-xs-12 col-md-offset-1">
                        <div class=" main-content-area" style="width: 100%">
                            <div class="wrap-login-item ">
                                <div class="login-form form-item form-stl">
                                    <form name="UpdateAccountDetails" id="UpdateAccountDetails"
                                        action="{{ route('frontend.user.account.details.update') }}" method="POST">
                                        @csrf
                                        <fieldset class="wrap-title">
                                            <h3 class="form-title">{{ __('frontend.update_info') }}</h3>
                                        </fieldset>
                                        <fieldset class="wrap-input">
                                            <label for="email">{{ __('frontend.email_address') }}:</label>
                                            <input type="email" title="{{ __('frontend.email_address') }}"
                                                value="{{ old('email') }}" readonly>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </fieldset>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="name">{{ __('frontend.name') }}:</label>
                                                    <input type="text" id="name" name="name"
                                                        title="{{ __('frontend.name') }}"
                                                        class="@error('name') is-invalid @enderror"
                                                        value="{{ old('name') }}" autocomplete="name" autofocus
                                                        placeholder="{{ __('frontend.type_your_name') }}">
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
                                                        placeholder="{{ __('frontend.type_your_mobile') }}">
                                                    @error('mobile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="address">{{ __('frontend.address') }}:</label>
                                                    <input type="text" id="address" name="address"
                                                        title="{{ __('frontend.address') }}"
                                                        class="@error('address') is-invalid @enderror"
                                                        value="{{ old('address') }}" autocomplete="address"
                                                        placeholder="{{ __('frontend.type_your_address') }}">
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="city">{{ __('frontend.city') }}:</label>
                                                    <input type="tel" id="city" name="city"
                                                        title="{{ __('frontend.city') }}"
                                                        class=" @error('city') is-invalid @enderror"
                                                        value="{{ old('city') }}" autocomplete="city" autofocus
                                                        placeholder="{{ __('frontend.type_your_city') }}">
                                                    @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="country">{{ __('frontend.country') }}:</label>
                                                    <input type="text" id="country" name="country"
                                                        title="{{ __('frontend.country') }}"
                                                        class="@error('country') is-invalid @enderror"
                                                        value="{{ old('country') }}" autocomplete="country"
                                                        placeholder="{{ __('frontend.type_your_country') }}">
                                                    @error('country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="pincode">{{ __('frontend.pincode') }}:</label>
                                                    <input type="tel" id="pincode" name="pincode"
                                                        title="{{ __('frontend.pincode') }}"
                                                        class=" @error('pincode') is-invalid @enderror"
                                                        value="{{ old('pincode') }}" autocomplete="pincode" autofocus
                                                        placeholder="{{ __('frontend.type_your_pincode') }}">
                                                    @error('pincode')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>

                                        <input type="submit" class="btn btn-submit" value="{{ __('buttons.update') }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end main products area-->
                    </div>
                </div>
                <!--end row-->

                <div class="row">
                    <div class="col-md-10 col-xs-12 col-md-offset-1">
                        <div class=" main-content-area" style="width: 100%">
                            <div class="wrap-login-item ">
                                <div class="login-form form-item form-stl">
                                    <form name="UpdateAccountPassword" id="UpdateAccountPassword"
                                        action="{{ route('frontend.user.account.password.update') }}" method="POST">
                                        @csrf
                                        <fieldset class="wrap-title">
                                            <h3 class="form-title">{{ __('frontend.update_account_password') }}</h3>
                                        </fieldset>

                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="email">{{ __('frontend.email_address') }}:</label>
                                                    <input type="email" id="email"
                                                        title="{{ __('frontend.email_address') }}"
                                                        value="{{ old('email') }}" autocomplete="email" readonly>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label
                                                        for="current_password">{{ __('frontend.current_password') }}:</label>
                                                    <input type="password" id="current_password" name="current_password"
                                                        class="@error('current_password') is-invalid @enderror"
                                                        placeholder="********">

                                                    @error('current_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="new_password">{{ __('frontend.new_password') }}:</label>
                                                    <input type="password" id="new_password"
                                                        title="{{ __('frontend.new_password') }}" name="new_password"
                                                        class="@error('new_password') is-invalid @enderror"
                                                        placeholder="********">

                                                    @error('new_password')
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
                                                        title="{{ __('frontend.password_confirmation') }}"
                                                        name="password_confirmation"
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
                                        <input type="submit" class="btn btn-submit"
                                            value="{{ __('frontend.register') }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--end main products area-->
                    </div>
                </div>
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
                name: "{{ __('msgs.enter_your_name') }}",
                mobile: {
                    required: "{{ __('msgs.enter_your_mobile') }}",
                    minlength: "{{ __('msgs.min_mobile') }}",
                    maxlength: "{{ __('msgs.max_mobile') }}",
                    digits: "{{ __('msgs.mobile_not_valid') }}",
                },
                email: {
                    required: "{{ __('msgs.email_not_valid') }} ",
                    email: "{{ __('msgs.valid_email') }} ",
                    remote: "{{ __('msgs.email_already_exists') }} ",
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
