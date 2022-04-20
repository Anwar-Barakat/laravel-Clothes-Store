@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.thanks') }}
@endsection


@section('content')
    <div class="inner-page about-us" style="min-height: calc(100vh - 225px);">
        <main id="main" class="main-site">
            <div class="container">
                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="rtl"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link">
                            <a href="{{ route('frontend.home') }}" class="link">{{ __('frontend.thanks') }}</a>
                        </li>
                        <li class="item-link"><span>{{ __('frontend.home') }}</span></li>
                    </ul>
                </div>
            </div>

            <div class="container pb-60">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2>{{ __('frontend.thanks_line_1') }}</h2>
                        <p>{{ __('frontend.thanks_line_2') }} {{ Session::get('OrderId') }}
                            {{ __('frontend.thanks_line_3') }} {{ Session::get('grandPrice') }}$</p>
                        <a href="{{ route('frontend.url', 'men-shoes') }}" class="btn btn-submit btn-submitx">
                            {{ __('frontend.contiue_shopping') }}
                        </a>
                    </div>
                </div>
            </div>
            <!--end container-->
        </main>
    </div>
@endsection

@php
Session::forget('order_id');
Session::save();

Session::forget('grandPrice');
Session::save();

@endphp
