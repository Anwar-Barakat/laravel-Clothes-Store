@extends('layouts.master')
@section('title', __('translation.product_images'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.product_images') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('translation.main_info') }}</h4>
                    </div>
                </div>
                <div class="card-body product-info">
                    <div class="table-responsive">
                        <table class="table table-striped mg-b-0 text-md-nowrap">
                            <tbody>
                                <tr>
                                    <th>{{ __('translation.name') }}</th>
                                    <td>{{ $product->name }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('translation.code') }}</th>
                                    <td>{{ $product->code }}</td>
                                </tr>
                                <tr>
                                    <th>{{ __('translation.color') }}</th>
                                    <td>{{ $product->color }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div><!-- bd -->
                    <div class="col-sm-12 text-center col-xl-6">
                        @if ($product->getFirstMediaUrl('image_products', 'small'))
                            <img src="{{ $product->getFirstMediaUrl('image_products', 'medium') }}"
                                class="img img-thumbnail mb-4 admin-image product_edit_image">
                        @else
                            <img src="{{ asset('assets/img/1.jpg') }}"
                                class="img img-thumbnail mb-4 admin-image product_edit_image" alt="Alternative Image">
                        @endif
                    </div>
                </div><!-- bd -->


                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('translation.product_images') }}</h4>
                    </div>
                </div>
                <div class="card-body">

                </div>
            </div><!-- bd -->
        </div>
    </div>
    <div class="row  mb-5">
        <div class="col-sm-12">
            <div class="card  box-shadow-0">
                {{-- @if (!empty($product->images)) --}}
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">{{ __('translation.manage_product_images') }}</h4>
                    </div>
                </div>
                <div class="card-body product-images-info">
                    <form action="{{ route('admin.product.images.store') }}" method="POST" name="ProductAttachmentsForm"
                        id="ProductAttachmentsForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="row">
                            <div class="col-xl-6 col-sm-12">
                                <div class="form-group">
                                    <label for="image">{{ __('translation.attachments') }}</label>
                                    <div class="custom-file">
                                        <input class="custom-file-input" id="customFile" type="file" type="file"
                                            name="image[]" accept=".jpg, .png, image/jpeg, image/png" multiple> <label
                                            class="custom-file-label @error('image') is-invalid @enderror"
                                            for="customFile">{{ __('translation.choose_file') }}</label>
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- <input id="demo" type="file" name="image" accept=".jpg, .png, image/jpeg, image/png"> --}}
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12">
                                <label></label>
                                <div class="form-group" style="margin-top: 0.35rem">
                                    <button type="submit" class="button-30"
                                        role="button">{{ __('buttons.add') }}</button>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <table class="table text-md-nowrap" id="productAttachments">
                                <thead>
                                    <tr>
                                        <th class="wd-15p border-bottom-0">{{ __('translation.id') }}</th>
                                        <th class="wd-15p border-bottom-0">{{ __('translation.image') }}</th>
                                        <th class="wd-15p border-bottom-0">{{ __('translation.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product->getMedia('product_attachments') as $key => $image)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img width="200" src="{{ $image->getUrl('small') }}"
                                                    class="img img-thumbnail  admin-image">
                                            </td>
                                            <td>
                                                <div class="dropdown dropup">
                                                    <button aria-expanded="false" aria-haspopup="true"
                                                        style="font-size: 11px" class="btn ripple btn-secondary"
                                                        data-toggle="dropdown"
                                                        type="button">{{ __('translation.actions') }} <i
                                                            class="fas fa-caret-down ml-1"></i></button>
                                                    <div class="dropdown-menu tx-13">
                                                        {{-- <form
                                                            action="{{ route('admin.product.image.destroy', $product) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            @if ($image['status'] == 1)
                                                                <a href="javascript:void(0);"
                                                                    title="{{ __('translation.update_status') }}"
                                                                    class="updateImageStatus text-success dropdown-item"
                                                                    id="image-{{ $image['id'] }}"
                                                                    image_id="{{ $image['id'] }}"
                                                                    status="{{ $image['status'] }}">
                                                                    <i class="fas fa-power-off "></i>
                                                                    {{ __('translation.active') }}
                                                                </a>
                                                            @else
                                                                <a href="javascript:void(0);"
                                                                    title="{{ __('translation.update_status') }}"
                                                                    class="updateImageStatus text-danger  dropdown-item"
                                                                    id="image-{{ $image['id'] }}"
                                                                    image_id="{{ $image['id'] }}"
                                                                    status="{{ $image['status'] }}">
                                                                    <i class="fas fa-power-off "></i>
                                                                    {{ __('translation.disactive') }}
                                                                </a>
                                                            @endif
                                                            <a href="javascript:void(0);"
                                                                class="confirmationDelete dropdown-item"
                                                                data-image="{{ $image['id'] }}"
                                                                title="{{ __('buttons.delete') }}">
                                                                <i class="fas fa-trash text-danger"></i>
                                                                {{ __('buttons.delete') }}
                                                            </a>
                                                        </form> --}}
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- bd -->
                    </form>
                </div><!-- bd -->
                {{-- @endif --}}
            </div>
        </div>
    </div>
    <!-- row -->
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
        $('#productAttachments').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
    </script>

    {{-- turn on/off the image status --}}
    <script>
        $(document).ready(() => {
            $('.updateImageStatus').click(function() {
                var status = $(this).attr('status');
                var image_id = $(this).attr('image_id');
                var active = '{{ __('translation.active') }} ';
                var disactiev = '{{ __('translation.disactive') }} ';
                var activeIc = `<i class="fas fa-power-off text-success"></i>`;
                var disactiveIcon = `<i class="fas fa-power-off text-danger"></i>`;

                $.ajax({
                    type: 'post',
                    url: '/admin/update-image-status',
                    data: {
                        status: status,
                        image_id: image_id,
                    },
                    success: function(response) {
                        if (response['status'] == 0) {
                            $('#image-' + response['image_id'])
                                .attr('status', `${response['status']}`);
                            $('#image-' + response['image_id']).text(disactiev);
                            $('#image-' + response['image_id']).attr('style',
                                'color : #ee335e  !important');
                            $('#image-' + response['image_id']).prepend(
                                '<i class="fas fa-power-off text-danger"></i> ');
                        } else {
                            $('#image-' + response['image_id'])
                                .attr('status', `${response['status']}`);
                            $('#image-' + response['image_id']).text(active);
                            $('#image-' + response['image_id']).attr('style',
                                'color : #22c03c   !important');
                            $('#image-' + response['image_id']).prepend(
                                '<i class="fas fa-power-off text-success"></i> ');

                        }
                    },
                    error: function() {},
                });
            });
        });
    </script>

    {{-- Confirmation Delete image --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.confirmationDelete').click(function() {
                Swal.fire({
                    title: 'Are you sure?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete! '
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/admin/delete-image/' + $(this).data(
                            'image');
                    }
                });
            });
        })
    </script>
@endsection
