@extends('layouts.master')
@section('title', __('translation.product_attributes'))
@section('css')
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
                                <tr>
                                    <th>{{ __('translation.price') }}</th>
                                    <td>{{ $product->price }}</td>
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
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

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
@endsection
