@extends('layouts.master')
@section('title', __('translation.add_coupon'))
@section('css')
    <!-- Internal Select2 css -->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!--Internal  Datetimepicker-slider css -->
    <link href="{{ URL::asset('assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css') }}"
        rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <!-- Internal Spectrum-colorpicker css -->
    <link href="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('translation.dashboard') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.add_coupon') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row  mb-5">
        <div class="col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">{{ __('translation.add_coupon') }}</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.coupons.store') }}"
                        enctype="multipart/form-data" name="couponForm" id="couponForm">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="couponOption">{{ __('translation.option') }}</label>
                                    <select class="form-control @error('option') is-invalid @enderror" id="couponOption"
                                        name="option">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        <option value="Automatic" {{ old('option') == 'Automatic' ? 'selected' : '' }}>
                                            {{ __('translation.Automatic') }}</option>
                                        <option value="Manual" {{ old('option') == 'Manual' ? 'selected' : '' }}>
                                            {{ __('translation.Manual') }}</option>
                                    </select>
                                    @error('option')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6" id="couponCode" style="display: none">
                                <div class="form-group">
                                    <label for="code">{{ __('translation.code') }}</label>
                                    <input type="text" name="code" class="form-control @error('code') is-invalid @enderror"
                                        id="code" value="{{ old('code') }}"
                                        placeholder="{{ __('translation.enter_code') }}">
                                    @error('code')
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
                                    <p class="mg-b-10">{{ __('translation.categories') }}</p>
                                    <select class="form-control @error('categories') is-invalid @enderror  select2"
                                        name="categories[]" id="categories" multiple
                                        @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        @foreach ($categories as $section)
                                            <optgroup label="{{ $section->name }}"></optgroup>
                                            @foreach ($section->categories ?? [] as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('categories') == $category->id ? 'selected' : '' }}>
                                                    &nbsp;&raquo;&nbsp; {{ $category->name }}
                                                </option>
                                                @foreach ($category->subCategories ?? [] as $subcategory)
                                                    <option value="{{ $subcategory->id }}"
                                                        {{ old('categories') == $subcategory->id ? 'selected' : '' }}>
                                                        &nbsp;&raquo;&nbsp; &nbsp;&raquo;&nbsp;
                                                        {{ $subcategory->name }}
                                                    </option>
                                                @endforeach
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @error('categories')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <p class="mg-b-10">{{ __('translation.users') }}</p>
                                    <select class="form-control @error('users') is-invalid @enderror  select2"
                                        name="users[]" id="users" multiple
                                        @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->email }}">
                                                {{ $user->email }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('users')
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
                                    <label for="amountType">{{ __('translation.amount_type') }}</label>
                                    <select class="form-control @error('option') is-invalid @enderror" id="amountType"
                                        name="amount_type">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        <option value="Percentage" {{ old('option') == 'Percentage' ? 'selected' : '' }}>
                                            {{ __('translation.Percentage') }} (%)</option>
                                        <option value="Fixed" {{ old('option') == 'Fixed' ? 'selected' : '' }}>
                                            {{ __('translation.Fixed') }} ($)</option>
                                    </select>
                                    @error('amount_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="amount">{{ __('translation.amount') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                        </div>
                                        <input name="amount" aria-label="Amount (to the nearest dollar)"
                                            class="form-control @error('amount') is-invalid @enderror" type="number"
                                            value="{{ old('amount') }}">
                                        <div class="input-group-append">
                                            <span class="input-group-text">.00</span>
                                        </div>
                                    </div><!-- input-group -->
                                    @error('amount')
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
                                    <label for="couponType">{{ __('translation.type') }}</label>
                                    <select class="form-control @error('option') is-invalid @enderror" id="couponType"
                                        name="type">
                                        <option value="">{{ __('translation.choose..') }}</option>
                                        <option value="Multiple Times"
                                            {{ old('option') == 'Multiple Times' ? 'selected' : '' }}>
                                            {{ __('translation.Multiple Times') }}</option>
                                        <option value="Single Times"
                                            {{ old('option') == 'Single Times' ? 'selected' : '' }}>
                                            {{ __('translation.Single Times') }}</option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12 col-xl-6">
                                <div class="form-group">
                                    <label for="expiration_date">{{ __('translation.expiration_date') }}</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="typcn typcn-calendar-outline tx-24 lh--9 op-6"></i>
                                            </div>
                                        </div>
                                        <input class="form-control fc-datepicker" placeholder="MM/DD/YYYY" type="text"
                                            name="expiration_date">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="button-30"
                                    role="button">{{ __('buttons.add') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-6 col-sm-12 col-sm-12">

        </div>
    </div>
    <!-- row -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{ URL::asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{ URL::asset('assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js') }}"></script>
    <!-- Ionicons js -->
    <script src="{{ URL::asset('assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js') }}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{ URL::asset('assets/plugins/pickerjs/picker.min.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: 'Choose one',
                searchInputPlaceholder: 'Search'
            });
        });
    </script>


    <script>
        $(document).ready(function() {
            $('#couponOption').change(function() {
                var $option = $(this).find('option:selected');
                var value = $option.val();
                if (value == 'Manual')
                    $('#couponCode').fadeIn();
                else
                    $('#couponCode').fadeOut();

            });
        });
    </script>
@endsection
