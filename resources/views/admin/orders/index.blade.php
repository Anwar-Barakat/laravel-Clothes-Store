@extends('layouts.master')
@section('title', __('translation.orders'))
@section('css')
    <!-- Internal Data table css -->
    <link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{ __('translation.dashboard') }}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.orders') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="row mb-5">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mg-b-0">{{ __('translation.orders') }}</h4>
                        <a href="{{ route('admin.orders.export') }}" class="button-30">
                            {{ __('buttons.export') }} &nbsp; <i class="far fa-file-excel"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="orders">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">{{ __('translation.order_number') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.order_date') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.customer_name') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.customer_email') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.ordered_products') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.order_amount') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.order_status') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.payment_method') }}</th>
                                    <th class="border-bottom-0 tr-class-action">
                                        {{ __('translation.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td><a href="" class="tag tag-green">{{ $order->name }}</a></td>
                                        <td><a href="" class="tag tag-cyan">{{ $order->email }}</a></td>
                                        <td>
                                            @foreach ($order->orderProduct as $item)
                                                <span class="d-block">
                                                    {{ $item->product_code }}
                                                    ({{ $item->product_quantity }})
                                                </span>
                                            @endforeach
                                        </td>
                                        <td>{{ $order->grand_amount }}</td>
                                        <td>
                                            <div style="position: relative"
                                                class="d-flex align-items-center justify-content-center">
                                                <span>{{ __('translation.' . $order->status) }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $order->payment_method }}</td>
                                        <td>
                                            <div class="dropdown dropup">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="main__btn-actions  ripple" data-toggle="dropdown" type="button">
                                                    <i class="fas fa-bars"></i>
                                                </button>
                                                <div class="dropdown-menu tx-13">
                                                    <a href="{{ route('admin.orders.show', $order) }}"
                                                        class="dropdown-item half-gap"
                                                        title="{{ __('translation.view_order_details') }}">
                                                        <i class="fas fa-eye text-warning"></i>
                                                        {{ __('translation.view_order_details') }}
                                                    </a>
                                                    @if ($order->status == 'shipped' || $order->status == 'delivered')
                                                        <a href="{{ route('admin.orders.invoice.show', $order) }}"
                                                            class="dropdown-item half-gap"
                                                            title="{{ __('translation.view_order_invoice') }}">
                                                            <i class="fas fa-file-invoice text-success"></i>
                                                            {{ __('translation.view_order_invoice') }}
                                                        </a>
                                                        <a href="{{ route('admin.orders.invoice.pdf', $order) }}"
                                                            class="dropdown-item half-gap"
                                                            title="{{ __('translation.print_pdf_invoice') }}">
                                                            <i class="fas fa-file-pdf text-primary"></i>
                                                            {{ __('translation.print_pdf_invoice') }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <!--Internal  Datatable js -->
    <script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
    <script>
        $('#orders').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
    </script>

@endsection
