@extends('frontend.layouts.master')

@section('title')
    {{ $contactUs->meta_title }}
@endsection

@section('meta_description')
    {{ $contactUs->meta_description }}
@endsection

@section('meta_keywords')
    {{ $contactUs->meta_keywords }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="home-page home-01">
        <!--main area-->
        <main id="main" class="main-site left-sidebar">
            <div class="container">
                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="rtl"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.contact_us') }}</span></li>
                        <li class="item-link">
                            <a href="{{ route('frontend.home') }}" class="link">{{ __('frontend.home') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="row">
                    <div class=" main-content-area">
                        <div class="wrap-contacts ">
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="contact-box contact-form">
                                    <h2 class="box-title">{{ __('frontend.leave_a_messsage') }}</h2>
                                    <form action="{{ route('frontend.contact-us.store') }}" method="post"
                                        name="frm-contact">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">{{ __('frontend.name') }}<span>*</span></label>
                                            <input type="text" class="form-control  @error('name') is-invalid @enderror"
                                                id="name" name="name" value="{{ old('name') }}"
                                                placeholder="{{ __('translation.please_type', ['name' => __('translation.name')]) }}">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="email">{{ __('frontend.email_address') }}<span>*</span></label>
                                            <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                                id="email" name="email" value="{{ old('email') }}"
                                                placeholder="{{ __('translation.please_type', ['name' => __('translation.email_address')]) }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="phone">{{ __('frontend.mobile') }}</label>
                                            <input type="text" class="form-control  @error('phone') is-invalid @enderror"
                                                id="phone" name="phone" value="{{ old('phone') }}"
                                                placeholder="{{ __('translation.please_type', ['name' => __('translation.mobile')]) }}">
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">{{ __('frontend.mobile') }}</label>
                                            <textarea type="text" class="form-control  @error('comment') is-invalid @enderror" id="comment" name="comment"
                                                placeholder="{{ __('translation.please_type', ['name' => __('translation.comment')]) }}">{{ old('comment') }}</textarea>
                                            @error('comment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <input type="submit" name="ok" value="{{ __('buttons.submit') }}">
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                <div class="contact-box contact-info">
                                    <h2 class="box-title"></h2>
                                    <div class="wrap-icon-box">

                                        <div class="icon-box-item">
                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                            <div class="right-info">
                                                <b>{{ __('frontend.email_address') }}</b>
                                                <p>Support1@Mercado.com</p>
                                            </div>
                                        </div>

                                        <div class="icon-box-item">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <div class="right-info">
                                                <b>{{ __('frontend.phone') }}</b>
                                                <p>0123-465-789-111</p>
                                            </div>
                                        </div>

                                        <div class="icon-box-item">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <div class="right-info">
                                                <b>{{ __('frontend.mail_office') }}</b>
                                                <p>Sed ut perspiciatis unde omnis<br />Street Name, Los Angeles</p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end main products area-->

                </div>
                <!--end row-->

            </div>
            <!--end container-->
        </main>
        <!--main area-->
    </div>
@endsection
