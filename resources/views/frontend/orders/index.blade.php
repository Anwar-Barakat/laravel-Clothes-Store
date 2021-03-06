@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.orders') }}
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
                        <h2 class="heading-section">{{ __('frontend.the_orders') }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table table-striped">
                                <thead class="thead-primary ">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('frontend.products') }}</th>
                                        <th>{{ __('frontend.order_products') }}</th>
                                        <th>{{ __('frontend.payment_methods') }}</th>
                                        <th>{{ __('frontend.grand_total') }}</th>
                                        <th>{{ __('frontend.created_at') }}</th>
                                        <th>{{ __('frontend.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr class="alert" role="alert">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                @foreach ($order->orderProduct as $item)
                                                    @if ($item->product->getFirstMediaUrl('image_products', 'small'))
                                                        <figure class="mb-2">
                                                            <img src="{{ $item->product->getFirstMediaUrl('image_products', 'small') }}"
                                                                style="min-width: 100px" class="img img-thumbnail"
                                                                alt="{{ $item->product->name }}">
                                                        </figure>
                                                    @else
                                                        <figure>
                                                            <img src="{{ asset('assets/img/1.jpg') }}" width="80"
                                                                class="img img-thumbnail"
                                                                alt="{{ $item->product->name }}">
                                                        </figure>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($order->orderProduct as $index => $item)
                                                    <p>{{ $item->product_name }}</p>
                                                    <p>{{ $item->product_code }}</p>
                                                    <p>{{ $item->product_color }}</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{ $order->payment_method }}
                                            </td>
                                            <td>
                                                {{ $order->grand_amount }}$
                                            </td>
                                            <td>
                                                {{ $order->created_at }}
                                            </td>
                                            <td>
                                                <a href="{{ route('frontend.orders.show', $order->id) }}">
                                                    <i class="fa fa-eye text-warning"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">{{ __('frontend.no_orders') }}</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                            {{ $orders->links() }}
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
