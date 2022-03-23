@extends('layouts.master')
@section('title', __('translation.products'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.products') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('translation.products') }}</h4>
                        <a href="{{ route('admin.products.create') }}" class="button-30">
                            {{ __('buttons.add') }}
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="products">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.id') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.name') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.section') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.category') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.code') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.color') }}</th>
                                    <th class="wd-15p border-bottom-0 tr-class-image">{{ __('translation.image') }}</th>
                                    <th class=" border-bottom-0 tr-class-action">
                                        {{ __('translation.actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td><a href="" class="tag tag-green">{{ $product->section->name }}</a></td>
                                        <td><a href="" class="tag tag-cyan">{{ $product->category->name }}</a></td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->color }}</td>
                                        <td>
                                            @if ($product->getFirstMediaUrl('image_products', 'small'))
                                                <img width="160" height="200"
                                                    src="{{ $product->getFirstMediaUrl('image_products', 'small') }}"
                                                    alt="{{ $product->name }}" class="img img-thumbnail">
                                            @else
                                                <img width="160" height="200" src="{{ asset('assets/img/1.jpg') }}"
                                                    alt="{{ $product->name }}" class="img img-thumbnail">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown dropup">
                                                <button aria-expanded="false" aria-haspopup="true" style="font-size: 11px"
                                                    class="btn ripple btn-secondary" data-toggle="dropdown"
                                                    type="button">{{ __('translation.actions') }} <i
                                                        class="fas fa-caret-down ml-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    <form action="{{ route('admin.categories.destroy', $product) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        @if ($product->status == 1)
                                                            <a href="javascript:void(0);"
                                                                title="{{ __('translation.update_status') }}"
                                                                class="updateProductStatus text-success dropdown-item"
                                                                id="product-{{ $product->id }}"
                                                                product_id="{{ $product->id }}"
                                                                status="{{ $product->status }}">
                                                                <i class="fas fa-power-off"></i>
                                                                {{ __('translation.active') }}
                                                            </a>
                                                        @else
                                                            <a href="javascript:void(0);"
                                                                title="{{ __('translation.update_status') }}"
                                                                class="updateProductStatus text-danger  dropdown-item"
                                                                id="product-{{ $product->id }}"
                                                                product_id="{{ $product->id }}"
                                                                status="{{ $product->status }}">
                                                                <i class="fas fa-power-off "></i>
                                                                {{ __('translation.disactive') }}
                                                            </a>
                                                        @endif
                                                        <a href="{{ route('admin.products.edit', $product) }}"
                                                            class="dropdown-item" title="{{ __('buttons.edit') }}">
                                                            <i class="fas fa-edit text-primary"></i>
                                                            {{ __('buttons.edit') }}
                                                        </a>
                                                        <a href="javascript:void(0);"
                                                            class="confirmationDelete dropdown-item"
                                                            data-product="{{ $product->id }}"
                                                            title="{{ __('buttons.delete') }}">
                                                            <i class="fas fa-trash text-danger"></i>
                                                            {{ __('buttons.delete') }}
                                                        </a>
                                                        <a href="{{ route('admin.attributes.create', $product) }}"
                                                            class="dropdown-item"
                                                            title="{{ __('translation.add_attributes') }}">
                                                            <i class="fas fa-plus" style="color: gray"></i>
                                                            {{ __('translation.add_attributes') }}
                                                        </a>
                                                    </form>
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
        $('#products').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
    </script>

    {{-- turn on/off the Product status --}}
    <script>
        $(document).ready(() => {
            $('.updateProductStatus').click(function() {
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
        });
    </script>

    {{-- Confirmation Delete Category --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.confirmationDelete').click(function() {
                // confirm($(this).data('category'));
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete! '
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/admin/delete-product/' + $(this).data('product');
                    }
                });
            });
        })
    </script>
@endsection
