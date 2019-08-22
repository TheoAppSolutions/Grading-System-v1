@extends('_layouts.main')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/vendors/css/forms/icheck/icheck.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/vendors/css/forms/icheck/custom.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/css/plugins/forms/checkboxes-radios.css") }}">
@endpush

@push('js')
    <script src="{{ url("/app-assets/vendors/js/forms/icheck/icheck.min.js") }}" type="text/javascript"></script>
    <script src="{{ url("app-assets/js/scripts/forms/checkbox-radio.js") }}" type="text/javascript"></script>
@endpush

@section('content-title')
    Grade Levels
@endsection

@section('content-breadcrumb')
    <div class="row breadcrumbs-top d-inline-block">
        <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Admin
                </li>
                <li class="breadcrumb-item active">Grade Level Settings
                </li>
            </ol>
        </div>
    </div>
@endsection

@section('content-body')
    <section class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-head">
                    <div class="card-header">
                        @include('_partials.options_schoolyear', ['currentSchoolyear' => $currentSchoolyear])

                        <div class="heading-elements">
                            <a href="{{ route('student.create') }}" class="btn btn-primary btn-md"><i
                                        class="ft-plus white"></i> Add Gradelevels
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body pt-0">
                        <table class="table table-white-space table-bordered row-grouping display no-wrap table-middle">
                            <thead>
                            <tr>
                                <th>Gradelevel</th>
                                <th>Level ID</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($gradelevels as $grade)
                                @if($grade->schoolyear == $currentSchoolyear    )
                                    <tr>
                                        <td>
                                            {{ $grade->gradelevel }}
                                        </td>
                                        <td>
                                            {{ $grade->level_id }}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>

                            <tfoot>
                            <tr>
                                <th>Gradelevel</th>
                                <th>Level ID</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
