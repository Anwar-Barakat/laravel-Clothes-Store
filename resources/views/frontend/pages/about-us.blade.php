@extends('frontend.layouts.master')

@section('title')
    {{ $aboutUs->meta_title }}
@endsection

@section('meta_description')
    {{ $aboutUs->meta_description }}
@endsection

@section('meta_keywords')
    {{ $aboutUs->meta_keywords }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="inner-page about-us">
        <!--main area-->
        <main id="main" class="main-site">
            <div class="container">
                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="rtl"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.about_us') }}</span></li>
                        <li class="item-link">
                            <a href="{{ route('frontend.home') }}" class="link">{{ __('frontend.home') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <!-- <div class="main-content-area"> -->
                <div class="aboutus-info style-center">
                    <b class="box-title">{{ __('frontend.interesting_facts') }}</b>
                    <p class="txt-content">
                        {{ $aboutUs->description }}
                    </p>
                </div>
            </div>
            <!--end container-->
        </main>
        <!--main area-->
    </div>
@endsection
