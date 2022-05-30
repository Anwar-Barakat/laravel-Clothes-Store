@extends('layouts.master')
@section('title', __('translation.website_settings'))
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('translation.dashboard') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.website_settings') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row mb-5">
        <div class="col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">{{ __('translation.website_settings') }}</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.settings.update', $setting) }}"
                        name="updateWebsiteSettings" id="updateWebsiteSettings">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="email">{{ __('translation.email') }}</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        value="{{ old('email', $setting->email) }}"
                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.email_address')]) }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="mobile">{{ __('translation.mobile') }}</label>
                                    <input type="tel" name="mobile"
                                        class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                                        value="{{ old('mobile', $setting->mobile) }}"
                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.mobile')]) }}">
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="location">{{ __('translation.location') }}</label>
                                    <input type="text" name="location"
                                        class="form-control @error('location') is-invalid @enderror" id="location"
                                        value="{{ old('location', $setting->location) }}"
                                        placeholder="{{ __('translation.please_type', ['name' => __('translation.location')]) }}">
                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="min_cart_value">{{ __('translation.min_cart_value') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" name="min_cart_value"
                                            aria-label="Amount (to the nearest dollar)"
                                            class="form-control @error('min_cart_value') is-invalid @enderror"
                                            value="{{ old('min_cart_value', $setting->min_cart_value) }}"
                                            placeholder="{{ __('translation.please_type', ['name' => __('translation.min_cart_value')]) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div><!-- input-group -->
                                    @error('min_cart_value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="max_cart_value">{{ __('translation.max_cart_value') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input type="number" name="max_cart_value"
                                            aria-label="Amount (to the nearest dollar)"
                                            class="form-control @error('max_cart_value') is-invalid @enderror"
                                            value="{{ old('max_cart_value', $setting->max_cart_value) }}"
                                            placeholder="{{ __('translation.please_type', ['name' => __('translation.max_cart_value')]) }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div><!-- input-group -->
                                    @error('max_cart_value')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="button-30"
                                    role="button">{{ __('buttons.update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">

        </div>
    </div>
    <!-- row -->
@endsection
