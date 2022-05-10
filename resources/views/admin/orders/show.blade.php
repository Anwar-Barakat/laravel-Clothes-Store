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
                                                <img width="80"
                                                    src="{{ $product->product->getFirstMediaUrl('image_products', 'small') }}"
                                                    alt="" class="img img-thumbnail">
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
    <div class="row mb-2">
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
                                    <td scope="row">{{ __('translation.order_date') }}</td>
                                    <td>{{ $orderDetails->created_at }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.order_status') }}</td>
                                    <td>{{ $orderDetails->status }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.grand_total') }}</td>
                                    <td>${{ $orderDetails->grand_amount }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.shipping_charges') }}</td>
                                    <td>${{ $orderDetails->shipping_cart }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.coupon_code') }}</td>
                                    <td>{{ $orderDetails->coupon_code ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.coupon_amount') }}</td>
                                    <td>${{ $orderDetails->coupon_amount ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.payment_methods') }}</td>
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
                                    <td scope="row">{{ __('translation.name') }}</td>
                                    <td>{{ $orderDetails->name }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.address') }}</td>
                                    <td>{{ $orderDetails->address }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.state') }}</td>
                                    <td>{{ $orderDetails->state }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.country') }}</td>
                                    <td>{{ $orderDetails->country->name }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.mobile') }}</td>
                                    <td>{{ $orderDetails->mobile ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.pincode') }}</td>
                                    <td>{{ $orderDetails->pincode }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
    </div>
    <div class="row mb-5">
        <div class="col-xl-6 col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('translation.customer_details') }}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <tbody>
                                <tr>
                                    <td scope="row">{{ __('translation.name') }}</td>
                                    <td>{{ $orderDetails->user->name }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.email') }}</td>
                                    <td>{{ $orderDetails->user->email }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('translation.update_order_status') }}</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('admin.orders.update') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $orderDetails->id }}" name="order_id">
                        <div class="form-group">
                            <label for="status">{{ __('translation.status') }}</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="">{{ __('translation.choose..') }}</option>
                                @foreach (App\Models\OrderStatus::where('status', 1)->get() as $status)
                                    <option value="{{ $status->name }}"
                                        {{ $orderDetails->status == $status->name ? 'selected' : '' }}>
                                        {{ __('translation.' . $status->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group courier_name">
                                    <label for="courier_name">{{ __('translation.courier_name') }}</label>
                                    <input type="text" class="form-control @error('courier_name') is-invalid @enderror"
                                        id="courier_name" name="courier_name" value="{{ $orderDetails->courier_name }}"
                                        placeholder="{{ __('translation.type_courier_name') }}">
                                    @error('courier_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="form-group tracking_number">
                                    <label for="tracking_number">{{ __('translation.tracking_number') }}</label>
                                    <input type="text" class="form-control @error('tracking_number') is-invalid @enderror"
                                        id="tracking_number" name="tracking_number"
                                        value="{{ $orderDetails->tracking_number }}"
                                        placeholder="{{ __('translation.type_tracking_number') }}">
                                    @error('tracking_number')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0 mt-3 justify-content-end">
                            <div>
                                <button type="submit" class="button-30"
                                    role="button">{{ __('buttons.update') }}</button>
                            </div>
                        </div>
                    </form>

                    @if ($orderLogs->count() > 0)
                        <hr>
                        <div class="mt-3" style="max-height: 200px;overflow: scroll;">
                            @foreach ($orderLogs as $orderLog)
                                <div class="mb-1">
                                    {{ __('translation.' . $orderLog->order_status) }} {{ __('translation.in') }}
                                    :
                                    {{ $orderLog->created_at }}
                                    @if (!empty($orderLog->reason))
                                        <p>{{ __('translation.cause') }} : {{ $orderLog->reason ?? '-' }}</p>
                                    @endif
                                </div>
                                <br>
                            @endforeach
                        </div>
                    @endif
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
                                    <td scope="row">{{ __('translation.name') }}</td>
                                    <td>{{ $orderDetails->user->name }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.address') }}</td>
                                    <td>{{ $orderDetails->user->address }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.city') }}</td>
                                    <td>{{ $orderDetails->user->state }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.state') }}</td>
                                    <td>{{ $orderDetails->user->state }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.country') }}</td>
                                    <td>{{ $orderDetails->user->country->name }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.mobile') }}</td>
                                    <td>{{ $orderDetails->user->mobile ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td scope="row">{{ __('translation.pincode') }}</td>
                                    <td>{{ $orderDetails->user->pincode }}</td>
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

    <script>
        $(document).ready(function() {
            if ($('#status').val() == 'shipped') {
                $('.courier_name').show();
                $('.tracking_number').show();
            } else {
                $('.courier_name').hide();
                $('.tracking_number').hide();
            }
            $('#status').on('change', function() {
                if (this.value == 'shipped') {
                    $('.courier_name').show();
                    $('.tracking_number').show();
                } else {
                    $('.courier_name').hide();
                    $('.tracking_number').hide();
                }
            });
        });
    </script>
@endsection
