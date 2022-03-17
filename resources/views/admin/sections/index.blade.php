@extends('layouts.master')
@section('title', __('translation.sections'))
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
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{ __('translation.sections') }}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title mg-b-0">{{ __('translation.all_sections') }}</h4>
                    <button type="button" class="button-30" role="button" data-toggle="modal"
                        data-target="#exampleModal">
                        {{ __('buttons.add') }}
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-md-nowrap" id="sections">
                        <thead>
                            <tr>
                                <th class="wd-15p border-bottom-0">{{ __('translation.id') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('translation.name') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('translation.status') }}</th>
                                <th class="wd-15p border-bottom-0">{{ __('translation.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sections as $section)
                                <tr>
                                    <td>{{ $section->id }}</td>
                                    <td>{{ $section->name }}</td>
                                    <td>
                                        @if ($section->status == 1)
                                            <a href="javascript:void(0);" class="updateSectionStatus text-success"
                                                id="section-{{ $section->id }}" section_id="{{ $section->id }}"
                                                status="{{ $section->status }}">
                                                <i class="fas fa-power-off text-success"></i>
                                                {{ __('translation.active') }}
                                            </a>
                                        @else
                                            <a href="javascript:void(0);" class="updateSectionStatus text-danger"
                                                id="section-{{ $section->id }}" section_id="{{ $section->id }}"
                                                status="{{ $section->status }}">
                                                <i class="fas fa-power-off text-danger"></i>
                                                {{ __('translation.disactive') }}
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" class="text-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- Add New Section Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translation.add_new_section') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.sections.store') }}" method="post">
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
                                <option value="1">{{ __('translation.active') }}</option>
                                <option value="0">{{ __('translation.disactive') }}</option>
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
        $('#sections').DataTable({
            language: {
                searchPlaceholder: 'Search...',
                sSearch: '',
                lengthMenu: '_MENU_',
            }
        });
    </script>

    {{-- turn on/off the section status --}}
    <script>
        $(document).ready(() => {
            $('.updateSectionStatus').click(function() {
                var status = $(this).attr('status');
                var section_id = $(this).attr('section_id');

                $.ajax({
                    type: 'post',
                    url: '/admin/update-section-status',
                    data: {
                        status: status,
                        section_id: section_id,
                    },
                    success: function(response) {
                        if (response['status'])
                            window.reload();


                    },
                    error: function() {},
                });
            });
        });
    </script>
@endsection
