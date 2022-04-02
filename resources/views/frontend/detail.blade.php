@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.detail') }}
@endsection

@section('css')
@endsection

@section('content')
    <div class="detail page">
        <!--main area-->
        <main id="main" class="main-site">

            <div class="container">

                <div class="wrap-breadcrumb">
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
                                        <img src="{{ $product->getFirstMediaUrl('image_products', 'small') }}"
                                            alt="{{ $product->name }}">
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
                                <div class="product-rating">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <a href="#" class="count-review">(05 review)</a>
                                </div>
                                <h2 class="product-name">{{ $product->name }}</h2>
                                <div class="short-desc">
                                    <ul>
                                        <li>{{ $product->brand->name }}</li>
                                        <li>Dual-core A7 with quad-core graphics</li>
                                        <li>FaceTime HD Camera 7.0 MP Photos</li>
                                    </ul>
                                </div>
                                <div class="quantity mt-3">
                                    <span style="    margin: 0.5rem 0;display: block;">
                                        {{ __('frontend.size') }}:</span>
                                    <select name="size" id="getPrice" product-id="{{ $product->id }}"
                                        class="form-control">
                                        <option value="">{{ __('frontend.choose_size') }}</option>
                                        @foreach ($product->attributes as $attribute)
                                            <option value="{{ $attribute->size }}">{{ $attribute->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="wrap-price" @if (App::getLocale() == 'ar') dir="ltr" @endif>
                                    <span class="product-price" id="productPrice">$.{{ $product->price }}
                                    </span>
                                </div>
                                <div class="stock-info in-stock">
                                    <p class="availability">{{ __('frontend.availability') }}: {{ $totalStock }}
                                        <b>{{ __('frontend.in_stock') }}</b>
                                    </p>
                                </div>
                                <div class="quantity">
                                    <span>{{ __('frontend.quantity') }}:</span>
                                    <div class="quantity-input">
                                        <input type="text" name="product-quatity" value="1" data-max="120" pattern="[0-9]*">

                                        <a class="btn btn-reduce" href="#"></a>
                                        <a class="btn btn-increase" href="#"></a>
                                    </div>
                                </div>
                                <div class="wrap-butons">
                                    <a href="#" class="btn add-to-cart">{{ __('frontend.add_to_cart') }}</a>
                                    <div class="wrap-btn">
                                        <a href="#" class="btn btn-compare">Add Compare</a>
                                        <a href="#" class="btn btn-wishlist">{{ __('frontend.add_wishlist') }}</a>
                                    </div>
                                </div>
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

                                            <div id="comments">
                                                <h2 class="woocommerce-Reviews-title">{{ $product->name }}</span></h2>
                                                <ol class="commentlist">
                                                    <li class="comment byuser comment-author-admin bypostauthor even thread-even depth-1"
                                                        id="li-comment-20">
                                                        <div id="comment-20" class="comment_container">
                                                            <img alt="" src="assets/images/author-avata.jpg" height="80"
                                                                width="80">
                                                            <div class="comment-text">
                                                                <div class="star-rating">
                                                                    <span class="width-80-percent">Rated <strong
                                                                            class="rating">5</strong> out of
                                                                        5</span>
                                                                </div>
                                                                <p class="meta">
                                                                    <strong
                                                                        class="woocommerce-review__author">admin</strong>
                                                                    <span class="woocommerce-review__dash">–</span>
                                                                    <time class="woocommerce-review__published-date"
                                                                        datetime="2008-02-14 20:00">Tue, Aug 15, 2017</time>
                                                                </p>
                                                                <div class="description">
                                                                    <p>Pellentesque habitant morbi tristique senectus et
                                                                        netus
                                                                        et malesuada fames ac turpis egestas.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div><!-- #comments -->

                                            <div id="review_form_wrapper">
                                                <div id="review_form">
                                                    <div id="respond" class="comment-respond">

                                                        <form action="#" method="post" id="commentform"
                                                            class="comment-form" novalidate="">
                                                            <p class="comment-notes">
                                                                <span id="email-notes">Your email address will not be
                                                                    published.</span> Required fields are marked <span
                                                                    class="required">*</span>
                                                            </p>
                                                            <div class="comment-form-rating">
                                                                <span>Your rating</span>
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
                                                                </p>
                                                            </div>
                                                            <p class="comment-form-author">
                                                                <label for="author">Name <span
                                                                        class="required">*</span></label>
                                                                <input id="author" name="author" type="text" value="">
                                                            </p>
                                                            <p class="comment-form-email">
                                                                <label for="email">Email <span
                                                                        class="required">*</span></label>
                                                                <input id="email" name="email" type="email" value="">
                                                            </p>
                                                            <p class="comment-form-comment">
                                                                <label for="comment">Your review <span
                                                                        class="required">*</span>
                                                                </label>
                                                                <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                                                            </p>
                                                            <p class="form-submit">
                                                                <input name="submit" type="submit" id="submit"
                                                                    class="submit" value="Submit">
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
                                                    <div class="group-flash">
                                                        <span
                                                            class="flash-item new-label">{{ __('frontend.new') }}</span>
                                                    </div>
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
            var marginBetweenThumbnails = '0.5';
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
                    $('#productPrice').html('$.' + response);
                },
                error: function() {
                    alert('error')
                }
            });
        });
    </script>
@endsection
