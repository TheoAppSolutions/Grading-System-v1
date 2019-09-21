<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="author" content="Lemuel De Castro">
    <title>@yield('title', schema("app.name"))
    </title>
    <link rel="apple-touch-icon" href="{{ url('/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/favicon.ico') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="{{ url('/app-assets/fonts/line-awesome/css/line-awesome.min.css') }}"
          rel="stylesheet">

    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" href="{{ url('/app-assets/css/vendors.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('/app-assets/vendors/css/forms/selects/select2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('/assets/css/sweetalert2.css') }}" type="text/css">
    <!-- END VENDOR CSS-->

    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" href="{{ url('/app-assets/css/app.css') }}" type="text/css">
    <!-- END MODERN CSS-->

    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" href="{{ url('/app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}"
          type="text/css">
    <link rel="stylesheet" href="{{ url('/app-assets/css/core/colors/palette-gradient.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ url('/app-assets/fonts/simple-line-icons/style.css') }}" type="text/css">
    <!-- END Page Level CSS-->

    <!-- BEGIN Custom CSS-->
    @stack('css')
    <link rel="stylesheet" href="{{ url('/assets/css/style.css') }}" type="text/css">
    <!-- END Custom CSS-->

    <style>
        select[multiple='multiple'] {
            overflow: auto;
            height: 250px;
        }

        .select2 {
            width: 100% !important;
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" id="body">

<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    @include('_layouts.top_nav')
</nav>

<div id="main-menu" data-scroll-to-active="true" class="main-menu menu-dark menu-fixed menu-shadow menu-accordion">
    <!-- main menu content-->
    <div class="main-menu-content">
        @include('_layouts.side_nav')
    </div>
    <!-- /main menu content-->
</div>


<div id="app" class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">
                    @yield('content-title')
                </h3>

                <code>School Year: {{ getSchoolYear() }}</code>

            </div>
        </div>
        <div class="content-body">
            @yield('content-body')
        </div>
    </div>
</div>

<footer class="footer footer-static footer-light navbar-border navbar-shadow">
    @include('_layouts.footer')
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{ url('/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- END VENDOR JS-->

<!-- BEGIN PAGE VENDOR JS-->
@stack('js-vendor')
<script src="{{ url('/app-assets/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/app-assets/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/js/sweetalert2.js') }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->

<!-- BEGIN MODERN JS-->
<script src="{{ url('/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ url('/app-assets/js/core/app.js') }}" type="text/javascript"></script>
<script src="{{ url('/app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
<!-- END MODERN JS-->

<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ url('/app-assets/js/scripts/forms/select/form-select2.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/js/scripts.js?') . time() }}"></script>
@stack('js')
@stack('js-page')

<!-- END PAGE LEVEL JS-->

@if (session("notify"))
    <script>
        swal({
            title: "{!! session("notify.message") !!}",
            type: "{!! session("notify.type") !!}",
            text: "{!! session("notify.option.text") !!}",
            @if (session("notify.option.timer"))
            timer: {{ session("notify.option.timer") }},
            button: true
            @endif
        });
    </script>
@endif

</body>
</html>
