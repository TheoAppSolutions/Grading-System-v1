@extends('_layouts.main')

@push("css")
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/vendors/css/file-uploaders/dropzone.min.css")  }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/css/plugins/file-uploaders/dropzone.css")  }}">
@endpush

@push("js")
    <script src="{{ url("/app-assets/vendors/js/extensions/dropzone.min.js") }}" type="text/javascript"></script>
    <script src="{{ url("/app-assets/js/scripts/extensions/dropzone.js") }}" type="text/javascript"></script>
@endpush

@section('content-title')
    Grading Setup
@endsection

@section('content-body')
@endsection
