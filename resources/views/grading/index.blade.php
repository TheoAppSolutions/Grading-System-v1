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

    <script src="{{ url('/app-assets/js/scripts/pages/users-contacts.js') }}" type="text/javascript"></script>
@endpush

@section('content-title')
    Grade Subject List
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
                    <span class="text-danger">
                        Note: This will override the teacher permission for the corresponding subject grade.
                    </span>
                    Select a <code>grade level</code> to view
                </h4>

                <div class=" mt-3">
                    @include('subjects._snippets.gradeselect',['current_GradeLevel'=>$current_GradeLevel])
                </div>
            </div>

        </div>
        <div class="card-content">
            <div class="card-body">
                @php($schoolyear = getSchoolYear())
                @if(isset($subjects[$current_GradeLevel]))
                    <form action="{{ route('subject.mass.update', $current_GradeLevel) }}"
                          method="POST">
                        @csrf
                        @method("PATCH")
                        <input type="hidden" value="{{ $current_GradeLevel }}"
                               name="gradelevel">
                        @include('grading._snippets.subjects',['gradelevel'=>$current_GradeLevel])
                    </form>
                @else
                    No Records
                @endif
            </div>
        </div>
    </div>
@endsection
