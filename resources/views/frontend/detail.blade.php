@extends('frontend.layouts.master')

@section('title')
    {{ $product->name }}
@endsection

@section('meta_description')
    {{ $product->description }}
@endsection

@section('meta_keywords')
    {{ $product->name }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="detail page">
        <!--main area-->
        <main id="main" class="main-site">

            <div class="container">

                <div class="wrap-breadcrumb" @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                    <ul>
                        <li class="item-link"><span>{{ $product->name }}</span></li>
                        <li class="item-link"><a href="{{ route('frontend.url', $product->category->url) }}">
                                {{ $product->category->name }}</a>
                        </li>
                        <li class="item-link"><a href="{{ route('frontend.home') }}"
                                class="link">{{ __('frontend.home') }}</a></li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">
                        <div class="wrap-product-detail">
                            <div class="detail-media">
                                <div class="gellery">
                                    <div class="master__image">
                                        <i class="fa fa-chevron-right icon"></i>
                                        <i class="fa fa-chevron-left icon"></i>
                                        @if ($product->getFirstMediaUrl('image_products', 'small'))
                                            <figure>
                                                <img src="{{ $product->getFirstMediaUrl('image_products', 'small') }}">
                                            </figure>
                                        @else
                                            <figure>
                                                <img src="{{ asset('assets/img/products/default-image.png') }}" alt="">
                                            </figure>
                                        @endif

                                    </div>
                                    <div class="thumnails">
                                        <img src="{{ $product->getFirstMediaUrl('image_products', 'small') }}"
                                            alt="{{ $product->name }}" class="selected">
                                        @if (!empty($product->getMedia('product_attachments')))
                                            @foreach ($product->getMedia('product_attachments') as $key => $image)
                                                <img src="{{ $image->getUrl('small') }}" />
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="detail-info">
                                @if (isset($avgStarRating) && !empty($avgStarRating))
                                    <div class="product-rating">
                                        @if ($avgStarRating == 1)
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($avgStarRating == 2)
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($avgStarRating == 3)
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($avgStarRating == 4)
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @elseif ($avgStarRating == 5)
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                            <i class="fas fa-star text-warning"></i>
                                        @else
                                            <i class="fas fa-star-half-alt text-warning">
                                            </i>
                                        @endif
                                        <a href="javascript:void(0);" class="count-review">
                                            ({{ $ratingCount }}
                                            {{ __('translation.reviews') }})</a>
                                    </div>
                                @else
                                    <div class="product-rating">
                                        <a href="javascript:void(0);" class="count-review">
                                            (0
                                            {{ __('translation.reviews') }})
                                        </a>
                                    </div>
                                @endif

                                <h2 class="product-name">{{ $product->name }}</h2>
                                <div class="short-desc">
                                    <ul>
                                        <li>{{ $product->brand->name }}</li>
                                        <li>Dual-core A7 with quad-core graphics</li>
                                        <li>FaceTime HD Camera 7.0 MP Photos</li>
                                    </ul>
                                </div>
                                <br>
                                @if (isset($groupProducts) && $groupProducts->count() > 0)
                                    <h4 class="mt-2">{{ __('frontend.similar_products') }}</h4>
                                    <div class="similar_products">
                                        @foreach ($groupProducts as $groupProduct)
                                            @foreach ($groupProduct->getMedia('image_products') as $key => $image)
                                                <div class="swiper-slide">
                                                    <a href="{{ route('frontend.details', $groupProduct->id) }}">
                                                        <img src="{{ $image->getUrl('small') }}" width="80px"
                                                            title="{{ $groupProduct->name }}"
                                                            class="similar_products-img" />
                                                    </a>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                @endif
                                <hr>

                                <div class="wrap-price" @if (App::getLocale() == 'ar') dir="ltr" @endif>
                                    @php
                                        $discount = App\Models\Product::getDiscountedPrice($product->id);
                                    @endphp
                                    @if ($discount > 0)
                                        <ins>
                                            <p class="product-price" id="productPriceWithDiscAfter">
                                                ${{ number_format($discount, 2) }}
                                            </p>
                                        </ins>
                                        <del>
                                            <p class="product-price" id="productPriceWithDiscBefore">
                                                ${{ number_format($product->price, 2) }}
                                            </p>
                                        </del>
                                    @else
                                        <span class="product-price"
                                            id="productPriceWithoutDisc">${{ number_format($product->price, 2) }}
                                        </span>
                                    @endif
                                </div>
                                <br>
                                <table class="table table-striped">
                                    @foreach ($getCurrencies as $currency)
                                        <tr @if (App::getLocale() == 'ar') dir="ltr" @endif>
                                            <td>
                                                {{ $currency->code }}
                                            </td>
                                            <td>
                                                @if ($discount > 0)
                                                    {{ number_format($discount / $currency->rate, 2) }}
                                                @else
                                                    {{ number_format($product->price / $currency->rate, 2) }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                                <div class="stock-info in-stock">
                                    <p class="availability">{{ __('frontend.availability') }}: {{ $totalStock }}
                                        <b>{{ __('frontend.in_stock') }}</b>
                                    </p>
                                </div>
                                <form action="{{ route('frontend.cart.store') }}" method="post" class="addToCartform">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <div class="main-form">
                                        <div class="size">
                                            <span style="    margin: 0.5rem 0;display: block;">
                                                {{ __('frontend.size') }}:</span>
                                            <select name="size" id="getPrice" product-id="{{ $product->id }}"
                                                class="form-control" required>
                                                <option value="">{{ __('frontend.choose_size') }}</option>
                                                @foreach ($product->attributes as $attribute)
                                                    <option value="{{ $attribute->size }}">{{ $attribute->size }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('size')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="quantity">
                                            <span>{{ __('frontend.quantity') }}:</span>
                                            <div class="quantity-input">
                                                <input type="number" name="product-quatity" value="1" data-max="120"
                                                    pattern="[0-9]*" required="required">
                                                <a class="btn btn-reduce" href="#"></a>
                                                <a class="btn btn-increase" href="#"></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrap-butons">
                                        <button type="submit"
                                            class="btn add-to-cart">{{ __('frontend.add_to_cart') }}</button>
                                    </div>
                                </form>
                            </div>
                            <div class="advance-info">
                                <div class="tab-control normal">
                                    <a href="#description"
                                        class="tab-control-item active">{{ __('frontend.description') }}</a>
                                    <a href="#add_infomation"
                                        class="tab-control-item">{{ __('frontend.additional_info') }}</a>
                                    <a href="#review" class="tab-control-item">{{ __('frontend.review') }}</a>
                                </div>
                                <div class="tab-contents">
                                    <div class="tab-content-item active" id="description">
                                        <p>{{ $product->description }}</p>
                                    </div>
                                    <div class="tab-content-item " id="add_infomation">
                                        <table class="shop_attributes">
                                            <tbody>
                                                <tr>
                                                    <th>{{ __('frontend.weight') }}</th>
                                                    <td class="product_weight">1 kg</td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('frontend.color') }}</th>
                                                    <td>
                                                        <p>{{ $product->color }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('frontend.code') }}</th>
                                                    <td>
                                                        <p>{{ $product->code }}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>{{ __('frontend.wash_care') }}</th>
                                                    <td>
                                                        <p>{{ $product->wash_care }}</p>
                                                    </td>
                                                </tr>
                                                @if (isset($product->fabric))
                                                    <tr>
                                                        <th>{{ __('frontend.fabric') }}</th>
                                                        <td>
                                                            <p>
                                                                @if ($product->fabric == '0')
                                                                    {{ __('frontend.cotton') }}
                                                                @elseif ($product->fabric == '1')
                                                                    {{ __('frontend.polyester') }}
                                                                @elseif ($product->fabric == '2')
                                                                    {{ __('frontend.wool') }}
                                                                @endif
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endif

                                                @if (isset($product->sleeve))
                                                    <tr>
                                                        <th>{{ __('frontend.sleeve') }}</th>
                                                        <td>
                                                            <p>
                                                                @if ($product->sleeve == '0')
                                                                    {{ __('frontend.full_sleeve') }}
                                                                @elseif ($product->sleeve == '1')
                                                                    {{ __('frontend.half_sleeve') }}
                                                                @elseif ($product->sleeve == '2')
                                                                    {{ __('frontend.short_sleeve') }}
                                                                @elseif ($product->sleeve == '3')
                                                                    {{ __('frontend.sleeveless') }}
                                                                @endif
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (isset($product->pattern))
                                                    <tr>
                                                        <th>{{ __('frontend.pattern') }}</th>
                                                        <td>
                                                            <p>
                                                                @if ($product->pattern == '0')
                                                                    {{ __('frontend.checked') }}
                                                                @elseif ($product->pattern == '1')
                                                                    {{ __('frontend.plain') }}
                                                                @elseif ($product->pattern == '2')
                                                                    {{ __('frontend.printed') }}
                                                                @elseif ($product->pattern == '3')
                                                                    {{ __('frontend.self') }}
                                                                @elseif ($product->pattern == '4')
                                                                    {{ __('frontend.solid') }}
                                                                @endif
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (isset($product->fit))
                                                    <tr>
                                                        <th>{{ __('frontend.fit') }}</th>
                                                        <td>
                                                            <p>
                                                                @if ($product->fit == '0')
                                                                    {{ __('frontend.regular') }}
                                                                @elseif ($product->fit == '1')
                                                                    {{ __('frontend.slim') }}
                                                                @endif
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (isset($product->occasion))
                                                    <tr>
                                                        <th>{{ __('frontend.occasion') }}</th>
                                                        <td>
                                                            <p>
                                                                @if ($product->occasion == '0')
                                                                    {{ __('frontend.casual') }}
                                                                @elseif ($product->occasion == '1')
                                                                    {{ __('frontend.formal') }}
                                                                @endif
                                                            </p>
                                                        </td>
                                                    </tr>
                                                @endif

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-content-item " id="review">
                                        <div class="wrap-review-form">
                                            @if ($ratings->count() > 0)
                                                @foreach ($ratings as $rating)
                                                    <div id="comments">
                                                        <ol class="commentlist">
                                                            <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                                                id="li-comment-20">
                                                                <div id="comment-20" class="comment_container">
                                                                    <img alt=""
                                                                        src="{{ asset('front/assets/images/icons/user-detault-icons.png') }}"
                                                                        height="60px" width="60px">
                                                                    <div class="comment-text">
                                                                        @if ($rating->rating == 1)
                                                                            <i class="fas fa-star text-warning"></i>
                                                                        @elseif ($rating->rating == 2)
                                                                            <i class="fas fa-star text-warning"></i>
                                                                            <i class="fas fa-star text-warning"></i>
                                                                        @elseif ($rating->rating == 3)
                                                                            <i class="fas fa-star text-warning"></i>
                                                                            <i class="fas fa-star text-warning"></i>
                                                                            <i class="fas fa-star text-warning"></i>
                                                                        @elseif ($rating->rating == 4)
                                                                            <i class="fas fa-star text-warning"></i>
                                                                            <i class="fas fa-star text-warning"></i>
                                                                            <i class="fas fa-star text-warning"></i>
                                                                            <i class="fas fa-star text-warning"></i>
                                                                        @elseif ($rating->rating == 5)
                                                                            <i class="fas fa-star text-warning"></i>
                                                                            <i class="fas fa-star text-warning"></i>
                                                                            <i class="fas fa-star text-warning"></i>
                                                                            <i class="fas fa-star text-warning"></i>
                                                                            <i class="fas fa-star text-warning"></i>
                                                                        @else
                                                                            <i class="fas fa-star-half-alt text-warning">
                                                                            </i>
                                                                        @endif
                                                                        <p class="meta">
                                                                            <strong
                                                                                class="woocommerce-review__author">{{ $rating->user->name }}</strong>
                                                                            <span class="woocommerce-review__dash">–</span>
                                                                            <time class="woocommerce-review__published-date"
                                                                                datetime="2008-02-14 20:00">{{ $rating->created_at }}</time>
                                                                        </p>
                                                                        <div class="description">
                                                                            <p>{{ $rating->review }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ol>
                                                    </div><!-- #comments -->
                                                @endforeach
                                            @endif

                                            <div id="review_form_wrapper">
                                                <div id="review_form">
                                                    <div id="respond" class="comment-respond">
                                                        <form action="{{ route('frontend.ratings.store') }}"
                                                            method="post" id="commentform" class="comment-form"
                                                            novalidate="">
                                                            @csrf
                                                            @if ($errors->any())
                                                                {{ implode('', $errors->all('<div>:message</div>')) }}
                                                            @endif
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                            <input type="hidden" name="user_id"
                                                                value="{{ Auth::user()->id ?? '' }}">
                                                            <p class="comment-notes">
                                                                <span
                                                                    id="email-notes">{{ __('translation.review_email_notes') }}
                                                                </span>
                                                                {{ __('translation.review_email_notes_2') }}
                                                                <span class="required">*</span>
                                                            </p>
                                                            <div class="comment-form-rating">
                                                                <span>{{ __('translation.your_rating') }}</span>
                                                                <p class="stars">
                                                                    <label for="rated-1"></label>
                                                                    <input type="radio" id="rated-1" name="rating"
                                                                        value="1">
                                                                    <label for="rated-2"></label>
                                                                    <input type="radio" id="rated-2" name="rating"
                                                                        value="2">
                                                                    <label for="rated-3"></label>
                                                                    <input type="radio" id="rated-3" name="rating"
                                                                        value="3">
                                                                    <label for="rated-4"></label>
                                                                    <input type="radio" id="rated-4" name="rating"
                                                                        value="4">
                                                                    <label for="rated-5"></label>
                                                                    <input type="radio" id="rated-5" name="rating" value="5"
                                                                        checked="checked">
                                                                    @error('rating')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </p>
                                                            </div>
                                                            <p class="comment-form-comment">
                                                                <label for="comment">{{ __('translation.your_review') }}
                                                                    <span class="required">*</span>
                                                                </label>
                                                                <textarea id="comment" name="review" class=" @error('review') is-invalid @enderror" cols="45"
                                                                    rows="4">{{ old('review') }}</textarea>
                                                                @error('review')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </p>
                                                            <p class="form-submit">
                                                                <input name="submit" type="submit" id="submit"
                                                                    class="submit"
                                                                    value="{{ __('buttons.submit') }}">
                                                            </p>
                                                        </form>

                                                    </div><!-- .comment-respond-->
                                                </div><!-- #review_form -->
                                            </div><!-- #review_form_wrapper -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end main products area-->

                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                        @include('frontend.partials.popular_products')
                    </div>
                    <!--end sitebar-->

                    @if ($relatedProducts->count() > 0)
                        <div class="single-advance-box col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="wrap-show-advance-info-box style-1 box-in-site">
                                <h3 class="title-box">{{ __('frontend.related_products') }}</h3>
                                <div class="wrap-products"
                                    @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
                                    <div class="products slide-carousel owl-carousel style-nav-1 equal-container"
                                        data-items="5" data-loop="false" data-nav="true" data-dots="false"
                                        data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"3"},"1200":{"items":"5"}}'>
                                        @foreach ($relatedProducts as $relatedProduct)
                                            <div class="product product-style-2 equal-elem ">
                                                <div class="product-thumnail">
                                                    <a href="detail.html" title="{{ $relatedProduct->name }}">
                                                        @if ($relatedProduct->getFirstMediaUrl('image_products', 'small'))
                                                            <a href="{{ route('frontend.details', $relatedProduct->id) }}"
                                                                title="{{ $relatedProduct->name }}">
                                                                <figure><img
                                                                        src="{{ $relatedProduct->getFirstMediaUrl('image_products', 'small') }}"
                                                                        width="214" height="214"
                                                                        alt="{{ $relatedProduct->name }}">
                                                                </figure>
                                                            </a>
                                                        @else
                                                            <a href="{{ route('frontend.details', $relatedProduct->id) }}"
                                                                title="{{ $relatedProduct->name }}">
                                                                <figure>
                                                                    <img src="{{ asset('assets/img/products/default-image.png') }}"
                                                                        width="214" height="214"
                                                                        alt="{{ $relatedProduct->name }}">
                                                                </figure>
                                                            </a>
                                                        @endif
                                                    </a>
                                                    <div class="wrap-btn">
                                                        <a href="{{ route('frontend.details', $relatedProduct->id) }}"
                                                            class="function-link">{{ __('frontend.quick_view') }}</a>
                                                    </div>
                                                </div>
                                                <div class="product-info">
                                                    <a href="#"
                                                        class="product-name"><span>{{ $relatedProduct->name }}</span></a>
                                                    <div class="wrap-price"><span
                                                            class="product-price">${{ $relatedProduct->price }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--End wrap-products-->
                            </div>
                        </div>
                    @endif
                </div>
                <!--end row-->

            </div>
            <!--end container-->

        </main>
        <!--main area-->
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            var numberOfThumbnails = $('.thumnails').children().length;
            var marginBetweenThumbnails = '1';
            var totalMargin = (numberOfThumbnails - 1) * marginBetweenThumbnails;
            var thumnailsWidth = (100 - totalMargin) / numberOfThumbnails;

            $('.thumnails img').css({
                'max-width': thumnailsWidth + '%',
                'margin-right': marginBetweenThumbnails + '%'
            });

            $('.thumnails img').on('click', function() {
                $(this).addClass('selected').siblings().removeClass('selected');
                console.log($(this).attr('src'));
                $('.master__image img').hide().attr('src', $(this).attr('src')).fadeIn(500);
            });
        });
    </script>
@endsection


@section('js')
    <script>
        $('#getPrice').on('change', function() {
            var productId = $(this).attr('product-id');
            var size = $(this).val();
            if (size == "") {
                confirm('select size');
                return false;
            }

            $.ajax({
                type: "post",
                url: '/get-product-price',
                data: {
                    productId: productId,
                    size: size,
                },
                success: function(response) {
                    if (response['discount'] > 0) {
                        $('#productPriceWithDiscAfter').html('$.' + response['finalPrice']);
                        $('#productPriceWithDiscBefore').html('$.' + response['productPrice']);
                        $('.table.table-striped').html(response['currency']);


                    } else {
                        $('#productPriceWithoutDisc').html('$.' + response['productPrice']);
                        $('.table.table-striped').html(response['currency']);
                    }
                },
                error: function() {
                    alert('error')
                }
            });
        });
    </script>
@endsection
