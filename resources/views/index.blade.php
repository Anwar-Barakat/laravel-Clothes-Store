@extends('layouts.master')
@section('title', __('translation.dashboard'))
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{ URL::asset('assets/plugins/owl-carousel/owl.carousel.css') }}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{ URL::asset('assets/plugins/jqvmap/jqvmap.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">{{ __('translation.hi_welcome_back') }}</h2>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">{{ __('translation.total_invoices') }}</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                @php
                                    $total_invoices = App\Models\Order::sum('grand_amount');
                                    $invoices_count = App\Models\Order::count();
                                @endphp
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    ${{ number_format($total_invoices, 2) ?? '0' }}
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">{{ __('translation.invoice_count') }}
                                    {{ $invoices_count }}</p>
                            </div>
                            <span
                                class="float-right my-auto @if (App::getLocale() == 'ar') mr-auto @else ml-auto @endif">
                                <span class="text-white op-7">100%</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">{{ __('translation.unpaid_invoices') }}</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                @php
                                    $unpaid_invoices = App\Models\Order::where('status', 'new')
                                        ->orWhere('status', 'pending')
                                        ->orWhere('status', 'in process')
                                        ->sum('grand_amount');
                                    $unpaid_invoices_count = App\Models\Order::where('status', 'new')
                                        ->orWhere('status', 'pending')
                                        ->orWhere('status', 'in process')
                                        ->count();
                                @endphp
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    ${{ number_format($unpaid_invoices, 2) ?? '0' }}
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    {{ __('translation.invoice_count') }} {{ $unpaid_invoices_count ?? '0' }}
                                </p>
                            </div>
                            <span
                                class="float-right my-auto @if (App::getLocale() == 'ar') mr-auto @else ml-auto @endif">
                                <span class="text-white op-7">
                                    {{ round(($unpaid_invoices_count / $invoices_count) * 100, 2) }} %</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">{{ __('translation.paid_invoices') }}</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                @php
                                    $paid_invoices = App\Models\Order::where('status', 'paid')
                                        ->orWhere('status', 'shipped')
                                        ->orWhere('status', 'delivered')
                                        ->sum('grand_amount');
                                    $paid_invoices_count = App\Models\Order::where('status', 'paid')
                                        ->orWhere('status', 'shipped')
                                        ->orWhere('status', 'delivered')
                                        ->count();
                                @endphp
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    ${{ number_format($paid_invoices, 2) ?? '0' }}
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    {{ __('translation.invoice_count') }} {{ $paid_invoices_count ?? '0' }}
                                </p>
                            </div>
                            <span
                                class="float-right my-auto @if (App::getLocale() == 'ar') mr-auto @else ml-auto @endif">
                                <span class="text-white op-7">
                                    {{ round(($paid_invoices_count / $invoices_count) * 100, 2) }} %
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">{{ __('translation.pending_invoices') }}</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                @php
                                    $pending_invoices = App\Models\Order::where('status', 'pending')->sum('grand_amount');
                                    $pending_invoices_count = App\Models\Order::where('status', 'pending')->count();
                                @endphp
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">
                                    ${{ number_format($pending_invoices, 2) ?? '0' }}
                                </h4>
                                <p class="mb-0 tx-12 text-white op-7">
                                    {{ __('translation.invoice_count') }} {{ $pending_invoices_count ?? '0' }}
                                </p>
                            </div>
                            <span
                                class="float-right my-auto @if (App::getLocale() == 'ar') mr-auto @else ml-auto @endif">
                                <span class="text-white op-7">
                                    {{ round(($pending_invoices_count / $invoices_count) * 100, 2) }} %
                                </span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm mb-5">
        <div class="col-md-12 col-lg-12 col-xl-7">
            <div class="card">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">{{ __('translation.products_ratings') }}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0">...</p>
                </div>
                <div class="card-body">
                    {!! $products->render() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-5">
            <div class="card card-dashboard-map-one">
                <label class="main-content-label">{{ __('translation.invoices_rates') }}</label>
                <span class="d-block mg-b-20 text-muted tx-12">...</span>
                <div class="">
                    {!! $invoices->render() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('assets/plugins/chart.js/Chart.bundle.min.js') }}"></script>
    <!-- Moment js -->
    <script src="{{ URL::asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <!--Internal  Flot js-->
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.pie.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.resize.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jquery.flot/jquery.flot.categories.js') }}"></script>
    <script src="{{ URL::asset('assets/js/dashboard.sampledata.js') }}"></script>
    <script src="{{ URL::asset('assets/js/chart.flot.sampledata.js') }}"></script>
    <!--Internal Apexchart js-->
    <script src="{{ URL::asset('assets/js/apexcharts.js') }}"></script>
    <!-- Internal Map -->
    <script src="{{ URL::asset('assets/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ URL::asset('assets/js/modal-popup.js') }}"></script>
    <!--Internal  index js -->
    <script src="{{ URL::asset('assets/js/index.js') }}"></script>
    <script src="{{ URL::asset('assets/js/jquery.vmap.sampledata.js') }}"></script>
@endsection
