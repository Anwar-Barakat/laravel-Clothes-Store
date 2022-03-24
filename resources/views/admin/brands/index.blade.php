@extends('layouts.master')
@section('title', __('translation.brands'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.brands') }}</span>
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
                        <h4 class="card-title mg-b-0">{{ __('translation.brands') }}</h4>
                        <button type="button" class="button-30 modal-effect" data-effect="effect-rotate-left" role="button"
                            data-toggle="modal" data-target="#addNewbrand">
                            {{ __('buttons.add') }}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="brands">
                            <thead>
                                <tr>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.id') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.name') }}</th>
                                    <th class="wd-15p border-bottom-0">{{ __('translation.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>
                                            @if ($brand->status == 1)
                                                <a href="javascript:void(0);" class="updateBrandStatus text-success p-2"
                                                    title="{{ __('translation.update_status') }}"
                                                    id="brand-{{ $brand->id }}" brand_id="{{ $brand->id }}"
                                                    status="{{ $brand->status }}">
                                                    <i class="fas fa-power-off"></i>
                                                </a>
                                            @else
                                                <a href="javascript:void(0);" class="updateBrandStatus text-danger p-2"
                                                    title="{{ __('translation.update_status') }}"
                                                    id="brand-{{ $brand->id }}" brand_id="{{ $brand->id }}"
                                                    status="{{ $brand->status }}">
                                                    <i class="fas fa-power-off text-danger"></i>
                                                </a>
                                            @endif
                                            <a href="javascript:void(0);" role="button" data-toggle="modal"
                                                title="{{ __('buttons.update') }}"
                                                data-target="#editBrand{{ $brand->id }}" class="text-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        {{-- Edit Brand Modal --}}
                                        <div class="modal fade" id="editBrand{{ $brand->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editBrand{{ $brand->id }}Label"
                                            aria-hidden="true" data-effect="effect-super-scaled">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            {{ __('translation.update_brand') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('admin.brands.update', $brand) }}"
                                                            method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label
                                                                    for="name_ar">{{ __('translation.name_ar') }}</label>
                                                                <input type="text"
                                                                    class="form-control  @error('name_ar') is-invalid @enderror"
                                                                    id="name_ar" name="name_ar"
                                                                    value="{{ $brand->getTranslation('name', 'ar') }}"
                                                                    placeholder="{{ __('translation.enter_the_name_en') }}">
                                                                @error('name_ar')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="name_en">{{ __('translation.name_en') }}</label>
                                                                <input type="text"
                                                                    class="form-control  @error('name_en') is-invalid @enderror"
                                                                    id="name_en" name="name_en"
                                                                    value="{{ $brand->getTranslation('name', 'en') }}"
                                                                    placeholder="{{ __('translation.enter_the_name_en') }}">
                                                                @error('name_en')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label
                                                                    for="status">{{ __('translation.status') }}</label>
                                                                <select
                                                                    class="form-control @error('status') is-invalid @enderror"
                                                                    id="status" name="status">
                                                                    <option value="">{{ __('translation.choose..') }}
                                                                    </option>
                                                                    <option value="1"
                                                                        {{ $brand->status ? 'selected' : '' }}>
                                                                        {{ __('translation.active') }}</option>
                                                                    <option value="0"
                                                                        {{ $brand->status ? '' : 'selected' }}>
                                                                        {{ __('translation.disactive') }}
                                                                    </option>
                                                                </select>
                                                                @error('status')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary modal-effect"
                                                                    data-dismiss="modal">{{ __('buttons.close') }}</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">{{ __('buttons.update') }}</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Add New Brand Modal --}}
    <div class="modal effect-rotate-left" id="addNewbrand" tabindex="-1" role="dialog" aria-labelledby="addNewbrandLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translation.add_new_brand') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.brands.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name_ar">{{ __('translation.name_ar') }}</label>
                            <input type="text" class="form-control  @error('name_ar') is-invalid @enderror" id="name_ar"
                                name="name_ar" placeholder="{{ __('translation.enter_the_name_en') }}">
                            @error('name_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="name_en">{{ __('translation.name_en') }}</label>
                            <input type="text" class="form-control  @error('name_en') is-invalid @enderror" id="name_en"
                                name="name_en" placeholder="{{ __('translation.enter_the_name_en') }}">
                            @error('name_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">{{ __('translation.status') }}</label>
                            <select class="form-control @error('status') is-invalid @enderror" id="status" name="status">
                                <option value="">{{ __('translation.choose..') }}</option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                    {{ __('translation.active') }}</option>
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                    {{ __('translation.disactive') }}</option>
                            </select>
                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-dismiss="modal">{{ __('buttons.close') }}</button>
                            <button type="submit" class="btn btn-primary">{{ __('buttons.add') }}</button>
                        </div>
                    </form>
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
        $('#brands').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
    </script>

    <!-- Internal Modal js-->
    <script src="{{ URL::asset('assets/js/modal.js') }}"></script>
    <script src="{{ URL::asset('assets/css/modal-popup.js') }}"></script>

    {{-- turn on/off the Brand status --}}
    <script>
        $(document).ready(() => {
            $('.updateBrandStatus').click(function() {
                var status = $(this).attr('status');
                var brand_id = $(this).attr('brand_id');
                var active = '{{ __('translation.active') }} ';
                var disactiev = '{{ __('translation.disactive') }} ';
                var activeIc = `<i class="fas fa-power-off text-success"></i>`;
                var disactiveIcon = `<i class="fas fa-power-off text-danger"></i>`;
                $.ajax({
                    type: 'post',
                    url: '/admin/update-brand-status',
                    data: {
                        status: status,
                        brand_id: brand_id,
                    },
                    success: function(response) {
                        if (response['status'] == 0) {
                            $('#brand-' + response['brand_id'])
                                .attr('status', `${response['status']}`);
                            $('#brand-' + response['brand_id']).html(
                                '<i class="fas fa-power-off text-danger"></i> ');
                        } else {
                            $('#brand-' + response['brand_id'])
                                .attr('status', `${response['status']}`);
                            $('#brand-' + response['brand_id']).html(
                                '<i class="fas fa-power-off text-success"></i> ');
                        }
                    },
                    error: function() {},
                });
            });
        });
    </script>
@endsection
