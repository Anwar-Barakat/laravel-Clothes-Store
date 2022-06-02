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
                <!--Banners-->
                @include('frontend.banners.index')


                <!--Categories-->
                @php
                    $cats = App\Models\Category::take(2)
                        ->inRandomOrder()
                        ->get();
                @endphp
                <div class="wrap-banner style-twin-default">
                    @foreach ($cats as $cat)
                        <div class="banner-item" style="margin-bottom: 30px;">
                            <a href="{{ $cat->url }}" class="link-banner banner-effect-1">
                                @if ($cat->getFirstMediaUrl('categories', 'thumb'))
                                    <figure>
                                        <img src="{{ $cat->getFirstMediaUrl('categories', 'thumb') }}" alt="" width="580"
                                            height="190">
                                    </figure>
                                @endif
                            </a>
                        </div>
                    @endforeach
                </div>

                <!--Latest Products-->
                @if ($latestProducts->count() > 0)
                    <div class="wrap-show-advance-info-box style-1" style="margin-top: 30px;">
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
                        @php
                            $categoryImage = App\Models\Category::inRandomOrder()->first();
                        @endphp
                        @if ($categoryImage->getFirstMediaUrl('categories', 'thumb'))
                            <a href="{{ $categoryImage->url }}" class="link-banner banner-effect-2">
                                <figure style="width: 100%">
                                    <img src="{{ $categoryImage->getFirstMediaUrl('categories', 'thumb') }}"
                                        alt="{{ $categoryImage->name }}" width="100%">
                                </figure>
                            </a>
                        @else
                            <figure style="width: 100%">
                                <img src="{{ asset('assets/img/1.jpg') }}" alt="{{ $categoryImage->name }}"
                                    width="100%">
                            </figure>
                        @endif

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
                                                        <a href="{{ route('frontend.details', $item->id) }}"
                                                            title="{{ $item->name }}">
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
                                                        <a href="{{ route('frontend.details', $item->id) }}"
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
    <button id="cancelOrder">open 1</button>
    <div class="cancel-modal-container" id="cancel-modal-container">
        <div class="cancel-modal-content">
            <h1>{{ __('frontend.return_order') }}</h1>
            <button id="cancelOrderClose">close 1</button>
        </div>
    </div>

    <button id="exchangeOrder">open 2</button>
    <div class="exchange-modal-container" id="exchange-modal-container">
        <div class="exchange-modal-content">
            <h1>{{ __('frontend.exchange_order') }}</h1>
            <button id="cancelOrderClose">close 2</button>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        let cancelOrder = document.getElementById('cancelOrder');
        let cancelOrderClose = document.getElementById('cancelOrderClose');
        cancelOrder.addEventListener('click', function() {
            document.getElementById('cancel-modal-container').classList.add('open')
        });
        cancelOrderClose.addEventListener('click', function() {
            document.getElementById('cancel-modal-container').classList.remove('open')
        });


        let exchangeOrder = document.getElementById('exchangeOrder');
        let exchangeOrderClose = document.getElementById('exchangeOrderClose');
        exchangeOrder.addEventListener('click', function() {
            document.getElementById('exchange-modal-container').classList.add('open')
        });
        exchangeOrderClose.addEventListener('click', function() {
            document.getElementById('exchange-modal-container').classList.remove('open')
        })
    </script>
@endsection
