@extends('layouts.master')
@section('title', __('translation.order_invoice'))
@section('css')
    <style>
        @media print {
            #printBtn {
                display: none;
            }
        }

    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('translation.dashboard') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.order_invoice') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm mb-5">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="printPage">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">{{ __('translation.invoice') }}</h1>
                            <div class="billed-from">
                                <h6>{{ __('translation.order_number') }} #{{ $orderDetails->id }}</h6>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">{{ __('translation.billed_to') }}</label>
                                <div class="billed-to">
                                    <h6>{{ $orderDetails->user->name }}</h6>
                                    <p style="font-size: 14px;line-height: 2">
                                        {{ $orderDetails->user->address }},
                                        {{ $orderDetails->user->city }},
                                        {{ $orderDetails->user->state }},{{ $orderDetails->user->country->name }}<br>
                                        {{ __('translation.mobile') }}: {{ $orderDetails->user->mobile }}<br>
                                        {{ __('translation.email') }}: {{ $orderDetails->user->email }}<br>
                                        {{ __('translation.payment_method') }}:
                                        {{ $orderDetails->payment_method }}<br>
                                        {{ __('translation.created_at') }}: {{ $orderDetails->created_at }}<br>
                                    <div class="d-flex align-items-center mt-3" style="column-gap: 1rem">
                                        <span> {{ __('translation.barcode') }} :</span>
                                        <span>
                                            @php
                                                echo DNS1D::getBarcodeHTML($orderDetails->id, 'C39');
                                            @endphp
                                        </span>
                                    </div>
                                    </p>
                                </div>
                            </div>
                            <div class="col-md">
                                <label class="tx-gray-600">{{ __('translation.shipped_to') }}</label>
                                <p class="invoice-info-row">
                                    <span>{{ __('translation.name') }}</span>
                                    <span>{{ $orderDetails->name }} </span>
                                </p>
                                <p class="invoice-info-row">
                                    <span>{{ __('translation.address') }}</span>
                                    <span>{{ $orderDetails->address }} </span>
                                </p>
                                <p class="invoice-info-row">
                                    <span>{{ __('translation.city') }}</span>
                                    <span>{{ $orderDetails->city }} </span>
                                </p>
                                <p class="invoice-info-row">
                                    <span>{{ __('translation.state') }}</span>
                                    <span>{{ $orderDetails->state }} </span>
                                </p>
                                <p class="invoice-info-row">
                                    <span>{{ __('translation.country') }}</span>
                                    <span>{{ $orderDetails->country->name }} </span>
                                </p>
                                <p class="invoice-info-row">
                                    <span>{{ __('translation.pincode') }}</span>
                                    <span>{{ $orderDetails->pincode }} </span>
                                </p>
                                <p class="invoice-info-row">
                                    <span>{{ __('translation.mobile') }}</span>
                                    <span>{{ $orderDetails->mobile }} </span>
                                </p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">{{ __('translation.product') }}</th>
                                        <th class="tx-center">{{ __('translation.quantity') }}</th>
                                        <th class="tx-right">{{ __('translation.unit_price') }}</th>
                                        <th class="tx-right">{{ __('translation.amount') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $subAmount = 0;
                                    @endphp
                                    @foreach ($orderDetails->orderProduct as $product)
                                        @php
                                            $amount = 0;
                                            $amount = $product->product_price * $product->product_quantity;
                                        @endphp
                                        <tr>
                                            <td>
                                                {{ __('translation.name') }} : {{ $product->product_name }}<br>
                                                {{ __('translation.code') }} : {{ $product->product_code }}<br>
                                                {{ __('translation.color') }} : {{ $product->product_color }}<br>
                                                {{ __('translation.size') }} : {{ $product->product_size }}<br>
                                                <div class="d-flex align-items-center">
                                                    <span>
                                                        @php
                                                            echo DNS1D::getBarcodeHTML($product->product_code, 'C39');
                                                        @endphp
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="tx-center">{{ $product->product_quantity }}</td>
                                            <td class="tx-right">${{ $product->product_price }}</td>
                                            <td class="tx-right">
                                                ${{ $amount }}
                                            </td>
                                        </tr>
                                        @php
                                            $subAmount += $amount;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td class="valign-middle" colspan="2" rowspan="4">
                                            <div class="invoice-notes">
                                                <label class="main-content-label tx-13">Notes</label>
                                                <p>
                                                    ...
                                                </p>
                                            </div><!-- invoice-notes -->
                                        </td>
                                        <td class="tx-right">{{ __('translation.sub_amount') }}</td>
                                        <td class="tx-right" colspan="2">${{ $subAmount }}</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right">{{ __('translation.shipping') }}</td>
                                        <td class="tx-right" colspan="2">$0</td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right">{{ __('frontend.discount') }}</td>
                                        <td class="tx-right" colspan="2">-${{ $orderDetails->coupon_amount ?? 0 }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tx-right tx-uppercase tx-bold tx-inverse">
                                            {{ __('translation.total_due') }}</td>
                                        <td class="tx-right" colspan="2">
                                            <h4 class="tx-primary tx-bold">${{ $orderDetails->grand_amount }}</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <hr class="mg-b-40">
                        <a href="javascript:void(0);" class="btn btn-danger float-left mt-3 mr-2" onclick="printDiv()"
                            id="printBtn">
                            <i class="mdi mdi-printer ml-1"></i> {{ __('translation.print') }}
                        </a>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>

    <script>
        function printDiv() {
            var printPage = document.getElementById('printPage').innerHTML;
            var originalContent = document.body.innerHTML;
            document.body.innerHTML = printPage;
            window.print();
            document.body.innerHTML = originalContent;
            location.reload();
        }
    </script>
@endsection
