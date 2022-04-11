<div class="widget mercado-widget widget-product">
    <h2 class="widget-title">{{ __('frontend.popular_product') }}</h2>
    <div class="widget-content">
        <ul class="products">
            @foreach ($popular_products as $popular_product)
                <li class="product-item">
                    <div class="product product-widget-style">
                        <div class="thumbnnail">
                            @if ($popular_product->getFirstMediaUrl('image_products', 'small'))
                                <a href="{{ route('frontend.details',$popular_product->id) }}" title="{{ $popular_product->name }}">
                                    <figure>
                                        <img src="{{ $popular_product->getFirstMediaUrl('image_products', 'small') }}"
                                            alt="{{ $popular_product->name }}" style="max-width: 60px">
                                    </figure>
                                </a>
                            @else
                                <a href="{{ route('frontend.details',$popular_product->id) }}" title="{{ $popular_product->name }}">
                                    <figure>
                                        <img src="{{ asset('assets/img/') }}" alt="{{ $popular_product->name }}"
                                            style="max-width: 60px">
                                    </figure>
                                </a>
                            @endif
                        </div>
                        <div class="product-info">
                            <a href="{{ route('frontend.details',$popular_product->id) }}" class="product-name"><span>{{ $popular_product->name }}</span></a>
                            <div class="wrap-price">
                                @php
                                    $discount = App\Models\Product::getDiscountedPrice($popular_product->id);
                                @endphp
                                @if ($discount > 0)
                                    <ins>
                                        <p class="product-price" id="productPriceWithDiscAfter">
                                            ${{ $discount }}
                                        </p>
                                    </ins>
                                    <del>
                                        <p class="product-price" id="productPriceWithDiscBefore">
                                            ${{ $popular_product->price }}
                                        </p>
                                    </del>
                                @else
                                    <span class="product-price"
                                        id="productPriceWithoutDisc">${{ $popular_product->price }}
                                    </span>
                                @endif

                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
