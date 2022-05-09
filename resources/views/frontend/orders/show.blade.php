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
                    <div class="col-md-12  mb-4 d-flex justify-content-between">
                        <h2 class="heading-section">{{ __('frontend.offer_details') }}</h2>
                        @php
                            $Order = App\Models\Order::select('status')
                                ->where('id', $orderDetails->id)
                                ->first();
                            $status = $Order->status;
                        @endphp
                        @if ($status == 'new')
                            <div class="w-10">
                                <a href="javascript:void(0);" order_id="{{ $orderDetails->id }}"
                                    class="main-button cancelOrder">{{ __('frontend.cancel_order') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrap">
                            <table class="table ">
                                <thead class="thead-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('frontend.product') }}</th>
                                        <th>{{ __('frontend.product_name') }}</th>
                                        <th>{{ __('frontend.product_code') }}</th>
                                        <th>{{ __('frontend.product_color') }}</th>
                                        <th>{{ __('frontend.product_size') }}</th>
                                        <th>{{ __('frontend.product_quantity') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orderDetails->orderProduct as $product)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <div class="img">
                                                    @if ($product->product->getFirstMediaUrl('image_products', 'small'))
                                                        <img width="80"
                                                            src="{{ $product->product->getFirstMediaUrl('image_products', 'small') }}"
                                                            alt="" class="img img-thumbnail">
                                                    @else
                                                        <img width="80" src="{{ asset('assets/img/1.jpg') }}" alt=""
                                                            class="img img-thumbnail">
                                                    @endif
                                                </div>
                                            </td>
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
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>{{ __('frontend.order_date') }}</td>
                                        <td>{{ $orderDetails->created_at }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('frontend.order_status') }}</td>
                                        <td>{{ __('frontend.' . $orderDetails->status) }}</td>
                                    </tr>
                                    @if ($orderDetails->status == 'shipped')
                                        <tr>
                                            <td>{{ __('frontend.courier_name') }}</td>
                                            <td>{{ $orderDetails->courier_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>{{ __('frontend.tracking_number') }}</td>
                                            <td>{{ $orderDetails->tracking_number }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <td>{{ __('frontend.grand_total') }}</td>
                                        <td>${{ $orderDetails->grand_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('frontend.shipping_charges') }}</td>
                                        <td>{{ $orderDetails->shipping_cart }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('frontend.coupon_code') }}</td>
                                        <td>{{ $orderDetails->coupon_code ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('frontend.coupon_amount') }}</td>
                                        <td>{{ $orderDetails->coupon_amount ?? '-' }}</td>
                                    </tr>
                                    <tr>
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
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>{{ __('frontend.name') }}</td>
                                        <td>{{ $orderDetails->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('frontend.address') }}</td>
                                        <td>{{ $orderDetails->address }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('frontend.state') }}</td>
                                        <td>{{ $orderDetails->state }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('frontend.country') }}</td>
                                        <td>{{ $orderDetails->country->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('frontend.mobile') }}</td>
                                        <td>{{ $orderDetails->mobile ?? '-' }}</td>
                                    </tr>
                                    <tr>
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


    {{-- toastr --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- Confirmation Cancel Order --}}
    <script>
        $(document).on("click", ".cancelOrder", function() {
            var order_id = $(this).attr('order_id');
            Swal.fire({
                title: '{{ __('msgs.are_your_sure') }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: '{{ __('buttons.close') }}',
                confirmButtonText: '{{ __('msgs.yes_delete') }}',
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/orders/destroy/${order_id}`;
                }
            });
        });
    </script>
@endsection
