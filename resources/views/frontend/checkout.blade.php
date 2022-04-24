@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.checkout') }}
@endsection

@section('css')
    {{-- Sweat Alert 2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
@endsection

@section('content')
    <div class="shopping-cart page">
        <main id="main" class="main-site">
            <div class="container">
                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="rtl"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link"><span>{{ __('frontend.checkout') }}</span></li>
                        <li class="item-link">
                            <a href="{{ route('frontend.home') }}" class="link">{{ __('frontend.home') }}
                            </a>
                        </li>
                    </ul>
                </div>

                @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                @endif
                <div class=" main-content-area">
                    <form action="{{ route('frontend.checkout.store') }}" method="POST" name="checkoutForm"
                        id="checkoutForm">
                        @csrf
                        <div class="wrap-iten-in-cart" id="AppendCartProducts">
                            @include('frontend.partials.checkout_products')
                        </div>

                        <div class="summary">
                            <div class="order-summary" style="display: block">
                                <h4 class="title-box">{{ __('frontend.payment_methods') }}</h4>
                            </div>
                            <div class="payment-method-container">
                                <div>
                                    <input type="radio" name="payment_gateway" id="COD" value="COD" required>
                                    <label for="COD">
                                        <img src="{{ asset('front/assets/images/payments/cod.png') }}" width="80" alt="">
                                    </label>
                                </div>
                                <div>
                                    <input type="radio" name="payment_gateway" id="Paypal" value="Paypal" required>
                                    <label for="Paypal">
                                        <img src="{{ asset('front/assets/images/payments/paypal.png') }}" alt=""
                                            width="80">
                                    </label>
                                </div>
                            </div>
                            @error('payment_gateway')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="checkout-info">
                                <input type="submit" class="btn btn-checkout" value="{{ __('frontend.place_order') }}">
                            </div>
                        </div>
                    </form>

                    @if ($featuredPorducts->count() > 0)
                        <div class="wrap-show-advance-info-box style-1 box-in-site">
                            <h3 class="title-box">
                                {{ __('frontend.most_viewed') }} ({{ $featuredPorducts->count() }})
                            </h3>
                            <div class="wrap-products" @if (App::getLocale() == 'ar') dir="rtl"@else dir="ltr" @endif>
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

@section('scripts')
    {{-- Confirmation Delete Delivery address --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).on("click", ".confirmationDelete", function() {
            Swal.fire({
                title: '{{ __('msgs.are_your_sure') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '{{ __('buttons.close') }}',
                confirmButtonText: '{{ __('msgs.yes_delete') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/delivery-addressess-delete/' + $(this).data('delivery');
                }
            });
        });
    </script>
@endsection
