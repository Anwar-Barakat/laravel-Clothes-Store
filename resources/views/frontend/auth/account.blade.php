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
                                        <fieldset class="wrap-address-billing">
                                            <h3 class="box-title">{{ __('frontend.update_info') }}</h3>
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
                                                        autofocus placeholder="{{ __('translation.please_type', ['name' => __('translation.name')]) }}"
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
                                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.pincode')]) }}">
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
                                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.mobile')]) }}">
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
                                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.address')]) }}">
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
                                                    <input type="text" id="city" name="city"
                                                        title="{{ __('frontend.city') }}"
                                                        class=" @error('city') is-invalid @enderror"
                                                        value="{{ old('city', Auth::user()->city) }}" autocomplete="city"
                                                        autofocus placeholder="{{ __('translation.please_type', ['name' => __('translation.city')]) }}">
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
                                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.state')]) }}">
                                                    @error('state')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6 col-sm-12">
                                                <fieldset class="wrap-input country">
                                                    <label for="country_id">{{ __('frontend.country') }}:</label>
                                                    <select name="country_id" id="country_id" class="use-chosen">
                                                        <option value="">{{ __('frontend.choose_country') }}</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                {{ $country->id == Auth::user()->country_id ? 'selected' : '' }}>
                                                                {{ $country->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @error('country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </fieldset>
                                            </div>
                                        </div>
                                        <input type="submit" class="button-30 mt-sm-5" role="button"
                                            value="{{ __('buttons.update') }}">
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
                                                    <span id="checkCurrentPasswordResult"
                                                        style="display: block;margin-top: 0.5rem;">
                                                    </span>

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
                                        <input type="submit" class="button-30" role="button"
                                            value="{{ __('buttons.update') }}">
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
                name: "{{ __('translation.please_type', ['name' => __('translation.name')]) }}",
                mobile: {
                    required: "{{ __('msgs.updated', ['name' => __('translation.mobile')]) }}",
                    minlength: "{{ __('msgs.min_mobile') }}",
                    maxlength: "{{ __('msgs.max_mobile') }}",
                    digits: "{{ __('msgs.not_valid', ['name' => __('translation.mobile')]) }}",
                },
            }
        });
        $("#UpdateAccountPassword").validate({
            rules: {
                password: {
                    required: true,
                    minlength: 8,
                    maxlength: 25,
                },
                password_confirmation: {
                    required: true,
                    minlength: 8,
                    maxlength: 25,
                    equalTo: "#password"
                },
            },
            messages: {
                password: {
                    required: "{{ __('translation.please_type', ['name' => __('translation.password')]) }}",
                    minlength: "{{ __('msgs.min_password') }}",
                    maxlength: "{{ __('msgs.max_password') }}",
                },
                password_confirmation: {
                    required: "{{ __('translation.please_type', ['name' => __('translation.password_confirmation')]) }}",
                    minlength: "{{ __('msgs.min_password') }}",
                    maxlength: "{{ __('msgs.max_password') }}",
                    equalTo: "{{ __('msgs.confirm_pass') }}"
                },
            }
        });
    </script>

    <script>
        $('#current_password').keyup(() => {
            var current_password = $('#current_password').val();
            $.ajax({
                type: 'post',
                url: '/check-current-password',
                data: {
                    current_password: current_password
                },
                success: function(response) {
                    if (response == 'true') {
                        $('#checkCurrentPasswordResult').html(
                            '<font class="text-success">{{ __('translation.currnet_pwd_true') }}</font>'
                        );
                        $('#current_password').css('border-color', '#22c03c');
                    } else {
                        $('#checkCurrentPasswordResult').html(
                            '<font class="text-danger">{{ __('translation.currnet_pwd_false') }}</font>'
                        );
                        $('#current_password').css('border-color', '#ee335e');
                    }

                },
                error: function() {
                    alert('error')
                }
            });
        });
    </script>
@endsection
