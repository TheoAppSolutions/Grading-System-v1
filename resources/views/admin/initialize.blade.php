<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords"
          content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title', config("app.name"))
    </title>
    <link rel="apple-touch-icon" href="{{ url('/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/vendors/css/forms/icheck/custom.css') }}">
    <link rel="stylesheet" href="{{ url('/assets/css/sweetalert2.css') }}" type="text/css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ url('/app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/pages/login-register.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/style.css') }}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 1-column   menu-expanded blank-page blank-page"
      data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 box-shadow-2 p-0">
                        <div class="card border-grey border-lighten-3 m-0">
                            <div class="card-header border-0">
                                <div class="card-title text-center">
                                    <div class="p-1">
                                        <div style='display:block;text-align:center;margin-top: 5%;'>
                                            <img src='{{ url('images/logo.png') }}' id='img'
                                                 style='height: 100px;width:100px;' class='img-rounded center-block'>
                                            <label for='avatar'>
                                                <span class='btn btn-info btn-sm btn-block'>
                                                    <i class='fa fa-camera'></i> Change Logo
                                                </span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Initialize Grading System</span>
                                </h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-0">
                                    <form class="form-horizontal form-simple" action="{{ route('initialize.save') }}"
                                          enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <input name='avatar' id='avatar' type='file' accept='image/*'
                                               onchange='readURL(this);'
                                               class='form-control' style='visibility: hidden;'>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="email">School Year :</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control form-control-lg input-lg"
                                                       name="schoolyear"
                                                       placeholder="Enter Active School Year" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="email">School Year Start
                                                :</label>
                                            <div class="col-md-9">
                                                <select class="select2-placeholder form-control hide-search"
                                                        name="schoolyear_start">
                                                    @for($quarter = 1; $quarter <= 12; $quarter++)
                                                        <option value="{{ $quarter }}">
                                                            {{ date('F', mktime(0, 0, 0, $quarter)) }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="email">School Year End :</label>
                                            <div class="col-md-9">
                                                <select class="select2-placeholder form-control hide-search"
                                                        name="schoolyear_end">
                                                    @for($quarter = 1; $quarter <= 12; $quarter++)
                                                        <option value="{{ $quarter }}">
                                                            {{ date('F', mktime(0, 0, 0, $quarter)) }}
                                                        </option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="contact">School Dates Template :</label>

                                            <div class="col-md-9">
                                                <select class="select2-placeholder form-control hide-search" name="days_settings"
                                                        id="single-placeholder">
                                                    <option value="4">By Terms (4 Entries)</option>
                                                    <option value="12">By Months (12 Entries)</option>
                                                </select>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="email">Password :</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control form-control-lg input-lg"
                                                       id="user-password" name="password"
                                                       placeholder="Enter Password for Admin User" required>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-info btn-lg btn-block">
                                            <i class="ft-unlock"></i> Save Setup
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<!-- BEGIN VENDOR JS-->
<script src="{{ url('/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ url('/app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}"
        type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ url('/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ url('/app-assets/js/core/app.js') }}" type="text/javascript"></script>
<script src="{{ url('/app-assets/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/assets/js/sweetalert2.js') }}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ url('/app-assets/js/scripts/forms/form-login-register.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->

<script>
    function readURL(input) {
        let img = $("#img");
        let url = input.value;
        let ext = url.substring(url.lastIndexOf(".") + 1).toLowerCase();
        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#img").attr("src", e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
            console.log(url);
        } else {
            $("#img").attr("src", img.getAttribute("src"));
        }
    }
</script>

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