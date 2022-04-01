<div class="widget mercado-widget widget-product">
    <h2 class="widget-title">{{ __('frontend.popular_product') }}</h2>
    <div class="widget-content">
        <ul class="products">
            @foreach ($popular_products as $popular_product)
                <li class="product-item">
                    <div class="product product-widget-style">
                        <div class="thumbnnail">
                            @if ($popular_product->getFirstMediaUrl('image_products', 'small'))
                                <a href="" title="{{ $popular_product->name }}">
                                    <figure>
                                        <img src="{{ $popular_product->getFirstMediaUrl('image_products', 'small') }}"
                                            alt="{{ $popular_product->name }}" style="max-width: 60px">
                                    </figure>
                                </a>
                            @else
                                <a href="" title="{{ $popular_product->name }}">
                                    <figure>
                                        <img src="{{ asset('assets/img/') }}" alt="{{ $popular_product->name }}"
                                            style="max-width: 60px">
                                    </figure>
                                </a>
                            @endif
                        </div>
                        <div class="product-info">
                            <a href="#" class="product-name"><span>{{ $popular_product->name }}</span></a>
                            <div class="wrap-price"><span
                                    class="product-price">${{ $popular_product->price }}</span>
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
