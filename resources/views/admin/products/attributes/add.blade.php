@extends('layouts.master')
@section('title', __('translation.product_attributes'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.product_attributes') }}</span>
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
                @if (!empty($product->attributes))
                    <div class="card-header pb-0">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title mg-b-0">{{ __('translation.added_attributes') }}</h4>
                        </div>
                    </div>
                    <div class="card-body product-attributes-info">
                        <form action="{{ route('admin.attributes.update', $product) }}" method="post"
                            name="UpdateProductAttributes" id="UpdateProductAttributes">
                            @csrf
                            <div class="table-responsive">
                                <table class="table text-md-nowrap" id="productAttributes">
                                    <thead>
                                        <tr>
                                            <th class="wd-15p border-bottom-0">{{ __('translation.id') }}</th>
                                            <th class="wd-15p border-bottom-0">{{ __('translation.size') }}</th>
                                            <th class="wd-15p border-bottom-0">{{ __('translation.sku') }}</th>
                                            <th class="wd-15p border-bottom-0">{{ __('translation.price') }}</th>
                                            <th class="wd-15p border-bottom-0">{{ __('translation.stock') }}</th>
                                            <th class="wd-15p border-bottom-0">{{ __('translation.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->attributes as $attribute)
                                            <input type="text" class="d-none" name="attribute_id[]"
                                                value="{{ $attribute['id'] }}">
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $attribute['size'] }}</td>
                                                <td>{{ $attribute['sku'] }}</td>
                                                <td>
                                                    <input type="number" class="form-control" name="price[]"
                                                        value="{{ $attribute['price'] }}" style="height: 2rem;">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="stock[]"
                                                        value="{{ $attribute['stock'] }}" style="height: 2rem;">
                                                </td>
                                                <td>
                                                    <div class="dropdown dropup">
                                                        <button aria-expanded="false" aria-haspopup="true"
                                                            style="font-size: 11px" class="btn ripple btn-secondary"
                                                            data-toggle="dropdown"
                                                            type="button">{{ __('translation.actions') }} <i
                                                                class="fas fa-caret-down ml-1"></i></button>
                                                        <div class="dropdown-menu tx-13">
                                                            <form
                                                                action="{{ route('admin.categories.destroy', $product) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                @if ($attribute['status'] == 1)
                                                                    <a href="javascript:void(0);"
                                                                        title="{{ __('translation.update_status') }}"
                                                                        class="updateAttributeStatus text-success dropdown-item"
                                                                        id="attribute-{{ $attribute['id'] }}"
                                                                        attribute_id="{{ $attribute['id'] }}"
                                                                        status="{{ $attribute['status'] }}">
                                                                        <i class="fas fa-power-off"></i>
                                                                        {{ __('translation.active') }}
                                                                    </a>
                                                                @else
                                                                    <a href="javascript:void(0);"
                                                                        title="{{ __('translation.update_status') }}"
                                                                        class="updateAttributeStatus text-danger  dropdown-item"
                                                                        id="attribute-{{ $attribute['id'] }}"
                                                                        attribute_id="{{ $attribute['id'] }}"
                                                                        status="{{ $attribute['status'] }}">
                                                                        <i class="fas fa-power-off "></i>
                                                                        {{ __('translation.disactive') }}
                                                                    </a>
                                                                @endif
                                                                <a href="javascript:void(0);"
                                                                    class="confirmationDelete dropdown-item"
                                                                    data-attribute="{{ $attribute['id'] }}"
                                                                    title="{{ __('buttons.delete') }}">
                                                                    <i class="fas fa-trash text-danger"></i>
                                                                    {{ __('buttons.delete') }}
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!-- bd -->
                            <div class="form-group mb-0 mt-3 justify-content-end">
                                <div>
                                    <button type="submit" class="button-30"
                                        role="button">{{ __('buttons.update') }}</button>
                                </div>
                            </div>
                        </form>
                    </div><!-- bd -->
                @endif
            </div><!-- bd -->
        </div>
    </div>
    <div class="row  mb-5">
        <div class="col-sm-12">
            <div class="card  box-shadow-0">
                <div class="card-header">
                    <h4 class="card-title mb-1">{{ __('translation.add_attributes') }} :</h4>
                </div>
                <div class="card-body pt-0">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.attributes.store') }}"
                        enctype="multipart/form-data" name="ProductAttributesForm" id="ProductAttributesForm">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="field_wrapper  multattributesform">
                                    <div class="form-group">
                                        <label for="size">{{ __('translation.size') }}</label>
                                        <input type="text" name="size[]" value="{{ old('size') }}" id="size"
                                            class="form-control" required=""
                                            placeholder="{{ __('translation.enter_size') }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="sku">{{ __('translation.sku') }}</label>
                                        <input type="text" name="sku[]" value="{{ old('sku') }}" id="sku"
                                            class="form-control" required=""
                                            placeholder="{{ __('translation.enter_sku') }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="price">{{ __('translation.price') }}</label>
                                        <input type="number" name="price[]" value="{{ old('price') }}" id="price"
                                            class="form-control" required=""
                                            placeholder="{{ __('translation.enter_price') }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">{{ __('translation.stock') }}</label>
                                        <input type="number" name="stock[]" value="{{ old('stock') }}" id="stock"
                                            class="form-control" required=""
                                            placeholder="{{ __('translation.enter_stock') }}" />
                                    </div>
                                    <a href="javascript:void(0);" class="add_button button-30" title="Add field">
                                        {{ __('buttons.add_row') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <button type="submit" class="button-30">{{ __('buttons.add') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
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
        $('#productAttributes').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
    </script>

    {{-- MultiField Form Script --}}
    <script type="text/javascript">
        $(document).ready(function() {
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML =
                `<div class="d-flex align-items-center justify-content-start added-field-attribute">
                    <div class="form-group">
                        <input type="text" name="size[]" value="{{ old('size') }}" class="form-control" required="" placeholder="{{ __('translation.enter_size') }}" id="size" />
                    </div>
                    <div class="form-group">
                        <input type="text" name="sku[]" value="{{ old('sku') }}" class="form-control" required="" placeholder="{{ __('translation.enter_sku') }}" id="sku" />
                    </div>
                    <div class="form-group">
                        <input type="number" name="price[]" value="{{ old('price') }}" class="form-control" required="" placeholder="{{ __('translation.enter_price') }}" id="price" />
                    </div>
                    <div class="form-group">
                    <input type="number" name="stock[]" value="{{ old('stock') }}" class="form-control" required="" placeholder="{{ __('translation.enter_stock') }}" id="stock" />
                    </div>
                    <a href="javascript:void(0);" class="remove_button button-30 added-field-attribute-deleted-btn">{{ __('buttons.delete_row') }}</a>
                </div>`; //New input field html
            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function() {
                //Check maximum number of input fields
                if (x < maxField) {
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>

    {{-- turn on/off the Attribute status --}}
    <script>
        $(document).ready(() => {
            $('.updateAttributeStatus').click(function() {
                var status = $(this).attr('status');
                var attribute_id = $(this).attr('attribute_id');
                $.ajax({
                    type: 'post',
                    url: '/admin/update-attribute-status',
                    data: {
                        status: status,
                        attribute_id: attribute_id,
                    },
                    success: function(response) {
                        if (response['status']) {
                            $('#attribute-' + response['attribute_id'])
                                .attr('status', `${response['status']}`);
                        }

                    },
                    error: function() {},
                });
            });
        });
    </script>

    {{-- Confirmation Delete Attribute --}}
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
                        window.location.href = '/admin/delete-attribute/' + $(this).data(
                            'attribute');
                    }
                });
            });
        })
    </script>
@endsection
