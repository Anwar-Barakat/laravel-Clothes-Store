@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.wishlist') }}
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/table/css/style.css') }}">
@endsection

@section('content')
    <div class="shopping-cart page" style="min-height: calc(100vh - 225px);">
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-4">
                        <h2 class="heading-section">
                            {{ __('frontend.wishlist_products') }} ({{ count($userWishlist) }})
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-striped">
                                <thead class="thead-primary ">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('frontend.product') }}</th>
                                        <th>{{ __('frontend.description') }}</th>
                                        <th>{{ __('frontend.price') }}</th>
                                        <th>{{ __('frontend.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($userWishlist as $item)
                                        <tr class="alert" role="alert">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                @if ($item->product->getFirstMediaUrl('image_products', 'small'))
                                                    <figure>
                                                        <img src="{{ $item->product->getFirstMediaUrl('image_products', 'small') }}"
                                                            width="80" alt="{{ $item->product->name }}">
                                                    </figure>
                                                @else
                                                    <figure>
                                                        <img src="{{ asset('assets/img/1.jpg') }}" width="80"
                                                            alt="{{ $item->product->name }}">
                                                    </figure>
                                                @endif
                                            </td>
                                            <td>
                                                <p>{{ $item->product->name }}</p>
                                                <p>{{ $item->product->code }}</p>
                                                <p>{{ $item->product->price }}</p>
                                            </td>
                                            <td>
                                                {{ $item->product->price }}$
                                            </td>
                                            <td class="wishlist-actions">
                                                <a href="{{ route('frontend.orders.show', $item->id) }}">
                                                    <i class="fas fa-eye text-warning"></i>
                                                </a>
                                                <a href="{{ route('frontend.orders.show', $item->id) }}">
                                                    <i class="fas fa-trash-alt text-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $userWishlist->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/table/js/popper.js') }}"></script>
    <script src="{{ asset('assets/table/js/main.js') }}"></script>
@endsection
