@extends('frontend.layouts.master')

@section('title')
    {{ __('frontend.offer_details') }}
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
                        <h2 class="heading-section">{{ __('frontend.offer_details') }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('frontend.product_name') }}</th>
                                        <th>{{ __('frontend.product_code') }}</th>
                                        <th>{{ __('frontend.product_color') }}</th>
                                        <th>{{ __('frontend.product_size') }}</th>
                                        <th>{{ __('frontend.product_quantity') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderDetails->orderProduct as $product)
                                        <tr class="alert" role="alert">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->product_color }}</td>
                                            <td>{{ $product->product_size }}</td>
                                            <td>{{ $product->product_quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="table-wrap">
                            <h4 class="mb-4 mt-5 text-center">{{ __('frontend.order_details') }}</h4>
                            <table class="table">
                                <tbody>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.order_date') }}</td>
                                        <td>{{ $orderDetails->created_at }}</td>
                                    </tr>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.order_status') }}</td>
                                        <td>{{ $orderDetails->status }}</td>
                                    </tr>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.grand_total') }}</td>
                                        <td>{{ $orderDetails->grand_amount }}$</td>
                                    </tr>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.shipping_charges') }}</td>
                                        <td>{{ $orderDetails->shipping_cart }}</td>
                                    </tr>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.coupon_code') }}</td>
                                        <td>{{ $orderDetails->coupon_code ?? '-' }}</td>
                                    </tr>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.coupon_amount') }}</td>
                                        <td>{{ $orderDetails->coupon_amount ?? '-' }}</td>
                                    </tr>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.payment_methods') }}</td>
                                        <td>{{ $orderDetails->payment_method }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="table-wrap">
                            <h4 class="mb-4 mt-5 text-center">{{ __('frontend.delivery_address') }}</h4>
                            <table class="table border">
                                <tbody>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.name') }}</td>
                                        <td>{{ $orderDetails->name }}</td>
                                    </tr>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.address') }}</td>
                                        <td>{{ $orderDetails->address }}</td>
                                    </tr>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.state') }}</td>
                                        <td>{{ $orderDetails->state }}</td>
                                    </tr>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.country') }}</td>
                                        <td>{{ $orderDetails->country->name }}</td>
                                    </tr>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.mobile') }}</td>
                                        <td>{{ $orderDetails->mobile ?? '-' }}</td>
                                    </tr>
                                    <tr class="alert" role="alert">
                                        <td>{{ __('frontend.pincode') }}</td>
                                        <td>{{ $orderDetails->pincode }}</td>
                                    </tr>
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
