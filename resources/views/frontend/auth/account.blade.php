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
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="email">{{ __('frontend.email_address') }}:</label>
                                                    <input type="email" title="{{ __('frontend.email_address') }}"
                                                        value="{{ Auth::user()->email }}" readonly>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="name">{{ __('frontend.name') }}:</label>
                                                    <input type="text" id="name" name="name"
                                                        title="{{ __('frontend.name') }}"
                                                        class="@error('name') is-invalid @enderror"
                                                        value="{{ old('name', Auth::user()->name) }}" autocomplete="name"
                                                        autofocus placeholder="{{ __('frontend.type_your_name') }}"
                                                        pattern="[A-Za-z]+">
                                                    @error('name')
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
                                                    <label for="pincode">{{ __('frontend.pincode') }}:</label>
                                                    <input type="tel" id="pincode" name="pincode"
                                                        title="{{ __('frontend.pincode') }}"
                                                        class=" @error('pincode') is-invalid @enderror"
                                                        value="{{ old('pincode', Auth::user()->pincode) }}"
                                                        autocomplete="pincode" autofocus
                                                        placeholder="{{ __('frontend.type_your_pincode') }}">
                                                    @error('pincode')
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
                                                        value="{{ old('mobile', Auth::user()->mobile) }}"
                                                        autocomplete="mobile" autofocus
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
                                                        value="{{ old('address', Auth::user()->address) }}"
                                                        autocomplete="address"
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
                                                        value="{{ old('city', Auth::user()->city) }}" autocomplete="city"
                                                        autofocus placeholder="{{ __('frontend.type_your_city') }}">
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
                                                    <label for="state">{{ __('frontend.state') }}:</label>
                                                    <input type="text" id="state" name="state"
                                                        title="{{ __('frontend.state') }}"
                                                        class="@error('state') is-invalid @enderror"
                                                        value="{{ old('state', Auth::user()->state) }}"
                                                        autocomplete="state"
                                                        placeholder="{{ __('frontend.type_your_state') }}">
                                                    @error('state')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input">
                                                    <label for="country">{{ __('frontend.country') }}:</label>
                                                    <input type="text" id="country" name="country"
                                                        title="{{ __('frontend.country') }}"
                                                        class="@error('country') is-invalid @enderror"
                                                        value="{{ old('country', Auth::user()->country) }}"
                                                        autocomplete="country"
                                                        placeholder="{{ __('frontend.type_your_country') }}">
                                                    @error('country')
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
                                                        value="{{ Auth::user()->email }}" autocomplete="email" readonly>
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
                                                    <label for="password">{{ __('frontend.new_password') }}:</label>
                                                    <input type="password" id="password"
                                                        title="{{ __('frontend.password') }}" name="password"
                                                        class="@error('password') is-invalid @enderror"
                                                        placeholder="********">

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
                                        <input type="submit" class="btn btn-submit" value="{{ __('buttons.update') }}">
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
        $("#UpdateAccountDetails").validate({
            rules: {
                name: "required",
                mobile: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                    digits: true
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
            }
        });
    </script>
@endsection
