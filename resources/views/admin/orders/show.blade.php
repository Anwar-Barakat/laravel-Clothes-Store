@extends('layouts.master')
@section('title', __('translation.order_details'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.order_details') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="row mb-2">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mg-b-0">{{ __('translation.orders') }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="orders">
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">#</th>
                                    <th class="border-bottom-0">{{ __('translation.product') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.product_name') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.product_code') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.product_color') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.product_size') }}</th>
                                    <th class="border-bottom-0">{{ __('translation.product_quantity') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderDetails->orderProduct as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            @if ($product->product->getFirstMediaUrl('image_products', 'small'))
                                                <a href="{{ route('frontend.details', $product->product_id) }}">
                                                    <img width="80"
                                                        src="{{ $product->product->getFirstMediaUrl('image_products', 'small') }}"
                                                        alt="" class="img img-thumbnail">
                                                </a>
                                            @else
                                                <img width="80" src="{{ asset('assets/img/1.jpg') }}" alt=""
                                                    class="img img-thumbnail">
                                            @endif
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
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-xl-6 col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('translation.order_details') }}
                            {{ __('translation.number') }} #{{ $orderDetails->id }}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <tbody>
                                <tr>
                                    <td scope="row">{{ __('frontend.order_date') }}</td>
                                    <td>{{ $orderDetails->created_at }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('frontend.order_status') }}</td>
                                    <td>{{ $orderDetails->status }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('frontend.grand_total') }}</td>
                                    <td>{{ $orderDetails->grand_amount }}$</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('frontend.shipping_charges') }}</td>
                                    <td>{{ $orderDetails->shipping_cart }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('frontend.coupon_code') }}</td>
                                    <td>{{ $orderDetails->coupon_code ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('frontend.coupon_amount') }}</td>
                                    <td>{{ $orderDetails->coupon_amount ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('frontend.payment_methods') }}</td>
                                    <td>{{ $orderDetails->payment_method }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <div class="col-xl-6 col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('translation.delivery_details') }}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <tbody>
                                <tr>
                                    <td scope="row">{{ __('frontend.name') }}</td>
                                    <td>{{ $orderDetails->name }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('frontend.address') }}</td>
                                    <td>{{ $orderDetails->address }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('frontend.state') }}</td>
                                    <td>{{ $orderDetails->state }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('frontend.country') }}</td>
                                    <td>{{ $orderDetails->country->name }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('frontend.mobile') }}</td>
                                    <td>{{ $orderDetails->mobile ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('frontend.pincode') }}</td>
                                    <td>{{ $orderDetails->pincode }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
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

    {{-- turn on/off the Product status --}}
    <script>
        $(document).on("click", ".updateProductStatus", function() {
            var status = $(this).attr('status');
            var product_id = $(this).attr('product_id');
            var active = '{{ __('translation.active') }} ';
            var disactiev = '{{ __('translation.disactive') }} ';
            var activeIc = `<i class="fas fa-power-off text-success"></i>`;
            var disactiveIcon = `<i class="fas fa-power-off text-danger"></i>`;
            $.ajax({
                type: 'post',
                url: '/admin/update-product-status',
                data: {
                    status: status,
                    product_id: product_id,
                },
                success: function(response) {
                    if (response['status'] == 0) {
                        $('#product-' + response['product_id'])
                            .attr('status', `${response['status']}`);
                        $('#product-' + response['product_id']).text(disactiev);
                        $('#product-' + response['product_id']).attr('style',
                            'color : #ee335e  !important');
                        $('#product-' + response['product_id']).prepend(
                            '<i class="fas fa-power-off text-danger"></i> ');
                    } else {
                        $('#product-' + response['product_id'])
                            .attr('status', `${response['status']}`);
                        $('#product-' + response['product_id']).text(active);
                        $('#product-' + response['product_id']).attr('style',
                            'color : #22c03c   !important');
                        $('#product-' + response['product_id']).prepend(
                            '<i class="fas fa-power-off text-success"></i> ');

                    }
                },
                error: function() {},
            });
        });
    </script>

    {{-- Confirmation Delete Attribute --}}
    <script>
        $(document).on("click", ".confirmationDelete", function() {
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
                    window.location.href = '/admin/delete-product/' + $(this).data('product');
                }
            });
        });
    </script>
@endsection
