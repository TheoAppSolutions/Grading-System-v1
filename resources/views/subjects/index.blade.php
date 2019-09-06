@extends('_layouts.main')

@push('css')
    <link rel="stylesheet" type="text/css"
          href="{{ url('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/pages/users.css') }}">

    <style>
        input[type="number"]::-webkit-outer-spin-button, input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
@endpush

@push('js')
    <script src="{{ url('/app-assets/vendors/js/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ url('/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ url('/app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js') }}"
            type="text/javascript"></script>
@endpush

@section('content-title')
    Subject List
@endsection

@if(request("gradelevel") and request("gradelevel") != "")
    @php($current_GradeLevel = request("gradelevel"))
@else
    @php($current_GradeLevel = 1)
@endif

@section('content-body')
    <div class="card border-info">
        <div class="card-head">
            <div class="card-header">
                <h4 class="card-title">
                    Select a <code>grade level</code> to view
                </h4>

                <div class=" mt-3">
                    @include('subjects._snippets.gradeselect',['current_GradeLevel'=>$current_GradeLevel])
                </div>

                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a class="btn btn-success text-white" onclick="preload_subjects();">
                                <i class="ft-download"></i> Pre-Load Data
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('subject.create') }}" class="btn btn-primary text-white">
                                <i class="ft-plus"></i> New Subject
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <div class="card-content">
            <div class="card-body">
                @php($schoolyear = getSchoolYear())
                @if(isset($list[$current_GradeLevel]))
                    <form action="{{ route('subject.mass.update', $current_GradeLevel) }}"
                          method="POST">
                        @csrf
                        @method("PATCH")
                        <input type="hidden" value="{{ $current_GradeLevel }}"
                               name="gradelevel">
                        @include('subjects._snippets.table',['gradelevel'=>$current_GradeLevel])

                        <button type="submit" class="btn btn-success pull-right mb-1"><i class="la la-save"></i> Update</button>
                    </form>
                @else
                    No Records
                @endif
            </div>
        </div>
    </div>
    @include('_layouts.modal')

@endsection

@push('js')
    <script>
        function preload_subjects() {
            swal({
                title: 'Select Select School Year Data',
                input: 'select',
                type: 'warning',
                text: "Warning: This will override  all the current subject information data!",
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: 'Load Data',
                showCancelButton: true,
                inputPlaceholder: 'Select School Year',
                html: '<span class="text-danger h3 font-weight-bold"> Warning</span>: ' +
                    'This will override  all the current subject information data!',
                inputOptions: {
                    @foreach($schoolyears as $schoolyear)
                            @if($schoolyear->active != 1)
                    '{{ $schoolyear->schoolyear }}': '{{ $schoolyear->schoolyear }}',
                    @endif
                    @endforeach
                },
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value) {
                            resolve()
                        } else {
                            resolve("Please Select a School Year Preset")
                        }
                    })
                }
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: '/subject.load.data',
                        type: 'POST',
                        data: {
                            "schoolyear": result.value,
                            "_token": token
                        },
                        success: function (e) {
                            console.log(e);
                            swal(
                                'Success!',
                                'Subject Data Loaded: ' + result.value,
                                'success'
                            ).then(function () {
                                location.reload();
                            });
                        }
                    });
                }
            })
        }
    </script>
@endpush