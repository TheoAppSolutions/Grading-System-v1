@extends('_layouts.main')

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/vendors/css/forms/icheck/custom.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/plugins/forms/checkboxes-radios.css') }}">
@endpush

@push('js')
    <script src="{{ url('/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/app-assets/js/scripts/forms/checkbox-radio.js') }}" type="text/javascript"></script>
@endpush

@section('content-title')
    New Account
@endsection

@section('content-body')
    <div class="card border-info">
        <div class="card-header">
            <h4 class="card-title" id="striped-row-layout-basic">
                Fields with <span class="danger">*</span> are required fields.
            </h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li>
                        <a href="{{ route('user.index') }}" class="btn btn-primary block btn-md">
                            <i class="ft-list white"></i> User Accounts
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <div class="card-text">
                    @include('_partials.error_alerts')
                </div>
                <form class="form form-horizontal striped-rows form-bordered" action="{{ route('user.store') }}"
                      method="POST">
                    @csrf

                    <div class="form-body">
                        @include('users._snippets.form')
                    </div>

                    <div class="form-actions right">
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

