@extends('_layouts.main')

@push('css')
    <link rel="stylesheet" type="text/css"
          href="{{ url('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/pages/users.css') }}">
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
    Activity Log
@endsection

@section('content-body')

@endsection

