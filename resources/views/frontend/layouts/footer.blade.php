<!--footer area-->
<footer id="footer">
    <div class="wrap-footer-content footer-style-1">
        <div class="wrap-function-info">
            <div class="container">
                <ul>
                    <li class="fc-info-item">
                        <i class="fas fa-truck" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">{{ __('frontend.free_shipping') }}</h4>
                            <p class="fc-desc">{{ __('frontend.free_shipping_desc') }}</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fas fa-recycle" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">{{ __('frontend.guarantee') }}</h4>
                            <p class="fc-desc">{{ __('frontend.guarantee_desc') }}</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fas fa-credit-card"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">{{ __('frontend.safe_payment') }}</h4>
                            <p class="fc-desc">{{ __('frontend.guarantee') }}</p>
                        </div>

                    </li>
                    <li class="fc-info-item">
                        <i class="fa fa-life-ring" aria-hidden="true"></i>
                        <div class="wrap-left-info">
                            <h4 class="fc-name">{{ __('frontend.online_support') }}</h4>
                            <p class="fc-desc">{{ __('frontend.online_support_desc') }}</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--End function info-->

        <div class="main-footer-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                        <div class="wrap-footer-item">
                            <h3 class="item-header">{{ __('frontend.contact_details') }}</h3>
                            <div class="item-content">
                                <div class="wrap-contact-detail">
                                    <ul>
                                        <li>
                                            <i class="fas fa-map-marked-alt"></i>
                                            <p class="contact-txt">{{ $setting->location }}</p>
                                        </li>
                                        <li>
                                            <i class="fas fa-phone"></i>
                                            <p class="contact-txt">{{ $setting->mobile }}</p>
                                        </li>
                                        <li>
                                            <i class="far fa-envelope"></i>
                                            <p class="contact-txt">{{ $setting->email }}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                        <div class="wrap-footer-item footer-item-second">
                            <h3 class="item-header">{{ __('frontend.newsletters_sign_up') }}</h3>
                            <div class="item-content">
                                <div class="wrap-newletter-footer">
                                    <form action="#" class="frm-newletter" id="frm-newletter">
                                        <input type="email"
                                            class="input-email @error('subscriber_email') is-invalid @enderror"
                                            value="{{ old('subscriber_email') }}" id="subscriberEmail"
                                            placeholder="{{ __('frontend.type_email') }}" required
                                            pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}">
                                        @error('subscriber_email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <button type="button" class="btn-submit" id="subscriberEmailBtn">
                                            {{ __('frontend.subscribe') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 box-twin-content ">
                        <div class="row">
                            <div class="wrap-footer-item twin-item">
                                <h3 class="item-header">{{ __('frontend.quick_shop') }}</h3>
                                <div class="item-content">
                                    <div class="wrap-vertical-nav">
                                        <ul>
                                            @foreach ($categories as $category)
                                                <li class="menu-item">
                                                    <a href="{{ $category->url }}" class="link-term">
                                                        {{ $category->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap-footer-item twin-item">
                                <h3 class="item-header">{{ __('frontend.information') }}</h3>
                                <div class="item-content">
                                    <div class="wrap-vertical-nav">
                                        <ul>
                                            <li class="menu-item">
                                                <a href="{{ route('admin.contact-us.index') }}"
                                                    class="link-term">
                                                    {{ __('frontend.contact_us') }}
                                                </a>
                                            </li>
                                            <li class="menu-item">
                                                <a href="{{ route('frontend.about-us') }}" class="link-term">
                                                    {{ __('frontend.about_us') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wrap-back-link">
                <div class="container">
                    <div class="back-link-box">
                        <h3 class="backlink-title">{{ __('frontend.quick_links') }}</h3>
                        <div class="back-link-row">
                            @foreach ($sections as $section)
                                <ul class="list-back-link">
                                    <li><span class="row-title">{{ $section->name }} : </span></li>
                                    @foreach ($section->categories ?? [] as $category)
                                        <li><a href="{{ $category->url }}" class="redirect-back-link"
                                                title="mobile">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                                <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="coppy-right-box">
            <div class="container">
                <div class="coppy-right-item item-left">
                    <p class="coppy-right-text">{{ __('msgs.copy_right') }}</p>
                </div>
                <div class="coppy-right-item item-right">
                    <div class="wrap-nav horizontal-nav">
                        <ul>
                            <li class="menu-item">
                                <a href="{{ route('frontend.about-us') }}"
                                    class="link-term">{{ __('frontend.about_us') }}</a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="link-term">{{ __('frontend.privacy_policy') }}</a>
                            </li>
                            <li class="menu-item">
                                <a href="" class="link-term">{{ __('frontend.terms_&_conditions') }}</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</footer>
