@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.cart') }}
@endsection

@section('content')
    <div class="shopping-cart page">
        <main id="main" class="main-site">
            <div class="container">
                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.cart') }}</span></li>
                        <li class="item-link">
                            <a href="{{ route('frontend.home') }}" class="link">{{ __('frontend.home') }}
                            </a>
                        </li>
                    </ul>
                </div>
                <div class=" main-content-area">
                    <div class="wrap-iten-in-cart" id="AppendCartProducts">
                        @include('frontend.partials.cart_products')
                    </div>



                    @if ($featuredPorducts->count() > 0)
                        <div class="wrap-show-advance-info-box style-1 box-in-site">
                            <h3 class="title-box">
                                {{ __('frontend.most_viewed') }} ({{ $featuredPorducts->count() }})
                            </h3>
                            <div class="wrap-products" @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                                <div class="products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5"
                                    data-loop="false" data-nav="true" data-dots="false"
                                    data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                                    @foreach ($featuredPorducts as $featuredPorduct)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{ route('frontend.details', $featuredPorduct->id) }}"
                                                    title="{{ $featuredPorduct->name }}">
                                                    @if ($featuredPorduct->getFirstMediaUrl('image_products', 'small'))
                                                        <figure>
                                                            <img src="{{ $featuredPorduct->getFirstMediaUrl('image_products', 'small') }}"
                                                                width="214" height="214"
                                                                alt="{{ $featuredPorduct->name }}">
                                                        </figure>
                                                    @else
                                                        <figure>
                                                            <img src="{{ asset('assets/img/1.jpg') }}" width="214"
                                                                height="214" alt="{{ $featuredPorduct->name }}">
                                                        </figure>
                                                    @endif
                                                </a>
                                                <div class="group-flash">
                                                </div>
                                                <div class="wrap-btn">
                                                    <a href="#" class="function-link">
                                                        {{ __('frontend.quick_view') }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                                <a href="{{ route('frontend.details', $featuredPorduct->id) }}"
                                                    class="product-name"><span>{{ $featuredPorduct->name }}</span></a>
                                                <div class="wrap-price">
                                                    @php
                                                        $discount = App\Models\Product::getDiscountedPrice($featuredPorduct->id);
                                                    @endphp
                                                    @if ($discount > 0)
                                                        <ins>
                                                            <p class="product-price" id="productPriceWithDiscAfter">
                                                                ${{ $discount }}
                                                            </p>
                                                        </ins>
                                                        <del>
                                                            <p class="product-price" id="productPriceWithDiscBefore">
                                                                ${{ $featuredPorduct->price }}
                                                            </p>
                                                        </del>
                                                    @else
                                                        <span class="product-price"
                                                            id="productPriceWithoutDisc">${{ $featuredPorduct->price }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                            <!--End wrap-products-->
                        </div>
                    @endif

                </div>
                <!--end main content area-->
            </div>
            <!--end container-->

        </main>
    </div>
@endsection
