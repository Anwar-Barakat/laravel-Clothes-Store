<div class="wrap-main-slide" @if (App::getLocale() == 'ar') dir="ltr"@else dir="ltr" @endif>
    <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
        @foreach (App\Models\Banner::getBanners() as $banner)
            <div class="item-slide">
                <a href="{{ url($banner->link) }}">
                    <img src="{{ $banner->getFirstMediaUrl('banners', 'thumb') }}" alt="" class="img-slide">
                </a>
            </div>
        @endforeach
    </div>
</div>
