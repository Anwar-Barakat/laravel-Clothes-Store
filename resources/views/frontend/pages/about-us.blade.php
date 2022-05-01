@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.about_us') }}
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

                <div class="row equal-container">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="aboutus-box-score equal-elem ">
                            <b class="box-score-title">10000</b>
                            <span class="sub-title">Items in Store</span>
                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the dummy text ever since the 1500s...</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="aboutus-box-score equal-elem ">
                            <b class="box-score-title">90%</b>
                            <span class="sub-title">Our Customers comeback</span>
                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the dummy text ever since the 1500s...</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="aboutus-box-score equal-elem ">
                            <b class="box-score-title">2 million</b>
                            <span class="sub-title">User of the site</span>
                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting
                                industry. Lorem Ipsum has been the dummy text ever since the 1500s...</p>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="aboutus-info style-small-left">
                            <b class="box-title">What we really do?</b>
                            <p class="txt-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It
                                has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                old. Richard McClintock,</p>
                        </div>
                        <div class="aboutus-info style-small-left">
                            <b class="box-title">History of the Company</b>
                            <p class="txt-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It
                                has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                old. Richard McClintock,</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="aboutus-info style-small-left">
                            <b class="box-title">Our Vision</b>
                            <p class="txt-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It
                                has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                old. Richard McClintock,</p>
                        </div>
                        <div class="aboutus-info style-small-left">
                            <b class="box-title">Cooperate with Us!</b>
                            <p class="txt-content">Contrary to popular belief, Lorem Ipsum is not simply random text. It
                                has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                old. Richard McClintock,</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="aboutus-info style-small-left">
                            <b class="box-title">Cooperate with Us!</b>
                            <div class="list-showups">
                                <label>
                                    <input type="radio" class="hidden" name="showup" id="shoup1" value="shoup1"
                                        checked="checked">
                                    <span class="check-box"></span>
                                    <span class='function-name'>Support 24/7</span>
                                    <span class="desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry...</span>
                                </label>
                                <label>
                                    <input type="radio" class="hidden" name="showup" id="shoup2" value="shoup2">
                                    <span class="check-box"></span>
                                    <span class='function-name'>Best Quanlity</span>
                                    <span class="desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry...</span>
                                </label>
                                <label>
                                    <input type="radio" class="hidden" name="showup" id="shoup3" value="shoup3">
                                    <span class="check-box"></span>
                                    <span class='function-name'>Fastest Delivery</span>
                                    <span class="desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry...</span>
                                </label>
                                <label>
                                    <input type="radio" class="hidden" name="showup" id="shoup4" value="shoup4">
                                    <span class="check-box"></span>
                                    <span class='function-name'>Customer Care</span>
                                    <span class="desc">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry...</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!--end container-->
        </main>
        <!--main area-->
    </div>
@endsection
