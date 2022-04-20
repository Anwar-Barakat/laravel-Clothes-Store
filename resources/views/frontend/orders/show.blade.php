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
            </div>
        </section>
    </div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/table/js/popper.js') }}"></script>
    <script src="{{ asset('assets/table/js/main.js') }}"></script>
@endsection
