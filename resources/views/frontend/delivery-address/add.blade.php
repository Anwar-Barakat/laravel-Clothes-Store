@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.delivery_address') }}
@endsection

@section('content')
    <div class="shopping-cart page">
        <main id="main" class="main-site">
            <div class="container">
                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="rtl"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.delivery_address') }}</span></li>
                        <li class="item-link">
                            <a href="{{ route('frontend.home') }}" class="link">{{ __('frontend.home') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class=" main-content-area" @if (App::getLocale() == 'ar') dir="rtl"@else dir="ltr" @endif>
                    <div class="summary">
                        <div class="wrap-address-billing">
                            <fieldset class="wrap-address-billing">
                                <h3 class="box-title">{{ __('frontend.add_delivery_details') }}</h3>
                            </fieldset>
                            <form action="{{ route('frontend.delivery.address.store') }}" method="post"
                                name="frm-billing">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <p class="row-in-form">
                                    <label for="name">{{ __('frontend.name') }}</label>
                                    <input id="name" class="@error('name') is-invalid @enderror" type="text" name="name"
                                        value="{{ old('name') }}" placeholder="{{ __('frontend.type_your_name') }}"
                                        title="{{ __('frontend.name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="mobile">{{ __('frontend.mobile') }}</label>
                                    <input id="mobile" type="number" name="mobile"
                                        class="@error('mobile') is-invalid @enderror" value="{{ old('mobile') }}"
                                        title="{{ __('frontend.mobile') }}"
                                        placeholder="{{ __('msgs.enter_your_mobile') }}">
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="address">{{ __('frontend.address') }}</label>
                                    <input id="address" type="text" name="address" value="{{ old('address') }}"
                                        class="@error('address') is-invalid @enderror"
                                        title="{{ __('frontend.address') }}"
                                        placeholder="{{ __('frontend.type_your_address') }}">
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">
                                        {{ __('frontend.city') }} / {{ __('frontend.town') }}
                                    </label>
                                    <input id="city" type="text" name="city" value="{{ old('city') }}"
                                        class="@error('city') is-invalid @enderror" title="{{ __('frontend.city') }}"
                                        placeholder="{{ __('frontend.type_your_city') }}">
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="state">
                                        {{ __('frontend.state') }}
                                    </label>
                                    <input id="state" type="text" name="state" value="{{ old('state') }}"
                                        class="@error('state') is-invalid @enderror" title="{{ __('frontend.state') }}"
                                        placeholder="{{ __('frontend.type_your_state') }}">
                                    @error('state')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form country">
                                    <label for="country_id">{{ __('frontend.country') }}</label>
                                    <select name="country_id" id="country_id" class="use-chosen">
                                        <option value="">{{ __('frontend.choose_country') }}</option>
                                        @foreach (App\Models\Country::where('status', 1)->get() as $country)
                                            <option value="{{ old('country_id', $country->id) }}">
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('country_id')
                                        <span class="invalid-feedback country_alert" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form" style="width: 100%">
                                    <label for="pincode">{{ __('frontend.pincode') }}</label>
                                    <input id="pincode" type="number" name="pincode" value="{{ old('pincode') }}"
                                        class="@error('pincode') is-invalid @enderror"
                                        title="{{ __('frontend.pincode') }}"
                                        placeholder="{{ __('frontend.type_your_pincode') }}">
                                    @error('pincode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </p>
                                <p class="row-in-form" style="width: 100%; display: flex;column-gap: 8rem;">
                                    <a href="{{ route('frontend.cart') }}" class="button-30"
                                        role="button">{{ __('frontend.return_to_cart') }}</a>
                                    <input type="submit" class="button-30" role="button"
                                        value="{{ __('buttons.add') }}">
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end main content area-->
            </div>
            <!--end container-->

        </main>
    </div>
@endsection
