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
                                        <th>{{ __('frontend.order_products') }}</th>
                                        <th>{{ __('frontend.payment_methods') }}</th>
                                        <th>{{ __('frontend.grand_total') }}</th>
                                        <th>{{ __('frontend.created_at') }}</th>
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="alert" role="alert">
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>
                                            <td>
                                                @foreach ($order->orderProduct as $item)
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
                                                <a href="{{ route('frontend.orders.show', $order->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    {{ __('frontend.view_details') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
