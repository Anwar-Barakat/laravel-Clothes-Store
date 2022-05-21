@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.home') }}
@endsection

@section('meta_description')
    {{ __('frontend.meta_keywords') }}
@endsection

@section('meta_keywords')
    {{ __('frontend.meta_keywords') }}
@endsection

@section('content')
    <div class="home-page home-01">
        <main id="main">
            <div class="container">
                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link">
                            <a href="{{ route('frontend.home') }}" class="link">{{ __('frontend.home') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <!--MAIN SLIDE-->
                @include('frontend.banners.index')

                <a href="{{ route('frontend.orders.index') }}">order</a>
                <!--On Sale-->
                <div class="wrap-show-advance-info-box style-1 has-countdown">
                    <h3 class="title-box">{{ __('frontend.on_sale') }}</h3>
                    <div class="wrap-countdown mercado-countdown" data-expire="2020/12/12 12:34:56"></div>
                    <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container " data-items="5"
                        data-loop="false" data-nav="true" data-dots="false"
                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img
                                            src="{{ asset('front/assets/images/products/tools/tools_equipment_7.jpg') }}"
                                            width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('front/assets/images/products/digitals/digital_18.jpg') }}"
                                            width="800" height="800" alt=""></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('front/assets/images/products/fashions/fashion_08.jpg') }}"
                                            width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img
                                            src="{{ asset('front/assets/images/products/digitals/digital_17.jpg') }}"
                                            width="800" height="800" alt=""></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img
                                            src="{{ asset('front/assets/images/products/tools/tools_equipment_3.jpg') }}"
                                            width="800" height="800" alt=""></figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img
                                            src="{{ asset('front/assets/images/products/fashions/fashion_05.jpg') }}"
                                            width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img
                                            src="{{ asset('front/assets/images/products/digitals/digital_04.jpg') }}"
                                            width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><span class="product-price">$250.00</span></div>
                            </div>
                        </div>

                        <div class="product product-style-2 equal-elem ">
                            <div class="product-thumnail">
                                <a href="detail.html" title="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    <figure><img src="{{ asset('front/assets/images/products/kidtoys/kidtoy_05.jpg') }}"
                                            width="800" height="800" alt="T-Shirt Raw Hem Organic Boro Constrast Denim">
                                    </figure>
                                </a>
                                <div class="group-flash">
                                    <span class="flash-item sale-label">sale</span>
                                </div>
                                <div class="wrap-btn">
                                    <a href="#" class="function-link">quick view</a>
                                </div>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>Radiant-360 R6 Wireless Omnidirectional Speaker
                                        [White]</span></a>
                                <div class="wrap-price"><ins>
                                        <p class="product-price">$168.00</p>
                                    </ins> <del>
                                        <p class="product-price">$250.00</p>
                                    </del></div>
                            </div>
                        </div>

                    </div>
                </div>

                <!--Latest Products-->
                @if ($latestProducts->count() > 0)
                    <div class="wrap-show-advance-info-box style-1">
                        <h3 class="title-box">
                            {{ __('frontend.latest_products') }} ({{ $latestProducts->count() }})
                        </h3>
                        <div class="wrap-products">
                            <div class="wrap-product-tab tab-style-1">
                                <div class="tab-contents">
                                    <div class="tab-content-item active" id="digital_1a"
                                        @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                                        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                            data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                            @foreach ($latestProducts as $latestProduct)
                                                <div class="product product-style-2 equal-elem ">
                                                    <div class="product-thumnail">
                                                        <a href="{{ route('frontend.details', $latestProduct->id) }}"
                                                            title="{{ $latestProduct->name }}">
                                                            @if ($latestProduct->getFirstMediaUrl('image_products', 'small'))
                                                                <figure>
                                                                    <img src="{{ $latestProduct->getFirstMediaUrl('image_products', 'small') }}"
                                                                        width="800" height="800"
                                                                        alt="{{ $latestProduct->name }}">
                                                                </figure>
                                                            @else
                                                                <figure>
                                                                    <img src="{{ asset('assets/img/1.jpg') }}"
                                                                        width="800" height="800"
                                                                        alt="{{ $latestProduct->name }}">
                                                                </figure>
                                                            @endif
                                                        </a>

                                                        <div class="wrap-btn">
                                                            <a href="{{ route('frontend.details', $latestProduct->id) }}"
                                                                class="function-link">{{ __('frontend.quick_view') }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="{{ route('frontend.details', $latestProduct->id) }}"
                                                            class="product-name"><span>{{ $latestProduct->name }}</span></a>
                                                        <div class="wrap-price">
                                                            @php
                                                                $discount = App\Models\Product::getDiscountedPrice($latestProduct->id);
                                                            @endphp
                                                            @if ($discount > 0)
                                                                <ins>
                                                                    <p class="product-price"
                                                                        id="productPriceWithDiscAfter">
                                                                        ${{ $discount }}
                                                                    </p>
                                                                </ins>
                                                                <del>
                                                                    <p class="product-price"
                                                                        id="productPriceWithDiscBefore">
                                                                        ${{ $latestProduct->price }}
                                                                    </p>
                                                                </del>
                                                            @else
                                                                <span class="product-price"
                                                                    id="productPriceWithoutDisc">${{ $latestProduct->price }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!--Product Categories-->

                <div class="wrap-show-advance-info-box style-1">
                    <h3 class="title-box">Product Categories</h3>
                    <div class="wrap-top-banner">
                        <a href="#" class="link-banner banner-effect-2">
                            @php
                                $categoryImage = App\Models\Category::first();
                            @endphp
                            @if ($categoryImage->getFirstMediaUrl('categories', 'thumb'))
                                <figure style="width: 100%">
                                    <img src="{{ $categoryImage->getFirstMediaUrl('categories', 'thumb') }}"
                                        alt="{{ $categoryImage->name }}" width="100%">
                                </figure>
                            @else
                                <figure style="width: 100%">
                                    <img src="{{ asset('assets/img/1.jpg') }}" alt="{{ $categoryImage->name }}"
                                        width="100%">
                                </figure>
                            @endif
                        </a>
                    </div>
                    <div class="wrap-products">
                        <div class="wrap-product-tab tab-style-1">
                            <div class="tab-control">
                                @foreach ($categpryProducts as $key => $category)
                                    <a href="#category_{{ $category->id }}"
                                        class="tab-control-item {{ $key == 0 ? 'active' : '' }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                            <div class="tab-contents">
                                @foreach ($categpryProducts as $key => $category)
                                    <div class="tab-content-item {{ $key == 0 ? 'active' : '' }}"
                                        id="category_{{ $category->id }}">
                                        <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container"
                                            data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                            data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}'>
                                            @foreach ($category->products as $item)
                                                <div class="product product-style-2 equal-elem ">
                                                    <div class="product-thumnail">
                                                        <a href="detail.html" title="{{ $item->name }}">
                                                            @if ($item->getFirstMediaUrl('image_products', 'small'))
                                                                <figure>
                                                                    <img src="{{ $item->getFirstMediaUrl('image_products', 'small') }}"
                                                                        width="800" height="800" alt="{{ $item->name }}">
                                                                </figure>
                                                            @else
                                                                <figure>
                                                                    <img src="{{ asset('assets/img/1.jpg') }}"
                                                                        width="800" height="800" alt="{{ $item->name }}">
                                                                </figure>
                                                            @endif
                                                        </a>
                                                        <div class="wrap-btn">
                                                            <a href="{{ route('frontend.details', $item->id) }}"
                                                                class="function-link">{{ __('frontend.quick_view') }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-info">
                                                        <a href="#"
                                                            class="product-name"><span>{{ $item->name }}</span></a>
                                                        <div class="wrap-price">
                                                            @php
                                                                $discount = App\Models\Product::getDiscountedPrice($item->id);
                                                            @endphp
                                                            @if ($discount > 0)
                                                                <ins>
                                                                    <p class="product-price">
                                                                        ${{ $discount }}
                                                                    </p>
                                                                </ins>
                                                                <del>
                                                                    <p class="product-price">
                                                                        ${{ $item->price }}
                                                                    </p>
                                                                </del>
                                                            @else
                                                                <span class="product-price">${{ $item->price }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
