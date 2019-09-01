<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Modern admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities with bitcoin dashboard.">
    <meta name="keywords" content="admin template, modern admin template, dashboard template, flat admin template, responsive admin template, web app, crypto dashboard, bitcoin dashboard">
    <meta name="author" content="PIXINVENT">
    <title>Form Repeater - Modern Admin - Clean Bootstrap 4 Dashboard HTML Template + Bitcoin
        Dashboard
    </title>
    <link rel="apple-touch-icon" href="{{ url('/app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/vendors.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/app.css') }}">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/core/colors/palette-gradient.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/style.css') }}">
    <!-- END Custom CSS-->
</head>
<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-body">
            <section id="form-repeater">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="repeat-form">Repeating Forms</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-h font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body">
                                    <div class="repeater-default">
                                        <div data-repeater-list="car">
                                            <div data-repeater-item>
                                                <form class="form row">
                                                    <div class="form-group mb-1 col-sm-12 col-md-2">
                                                        <label for="email-addr">Email address</label>
                                                        <br>
                                                        <input type="email" class="form-control" id="email-addr" placeholder="Enter email">
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-2">
                                                        <label for="pass">Password</label>
                                                        <br>
                                                        <input type="password" class="form-control" id="pass" placeholder="Password">
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-2">
                                                        <label for="bio" class="cursor-pointer">Bio</label>
                                                        <br>
                                                        <textarea class="form-control" id="bio" rows="2"></textarea>
                                                    </div>
                                                    <div class="skin skin-flat form-group mb-1 col-sm-12 col-md-2">
                                                        <label for="tel-input">Gender</label>
                                                        <br>
                                                        <input class="form-control" type="tel" value="1-(555)-555-5555" id="tel-input">
                                                    </div>
                                                    <div class="form-group mb-1 col-sm-12 col-md-2">
                                                        <label for="profession">Profession</label>
                                                        <br>
                                                        <select class="form-control" id="profession">
                                                            <option>Select Option</option>
                                                            <option>Option 1</option>
                                                            <option>Option 2</option>
                                                            <option>Option 3</option>
                                                            <option>Option 4</option>
                                                            <option>Option 5</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-sm-12 col-md-2 text-center mt-2">
                                                        <button type="button" class="btn btn-danger" data-repeater-delete> <i class="ft-x"></i> Delete</button>
                                                    </div>
                                                </form>
                                                <hr>
                                            </div>
                                        </div>
                                        <div class="form-group overflow-hidden">
                                            <div class="col-12">
                                                <button data-repeater-create class="btn btn-primary">
                                                    <i class="ft-plus"></i> Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

<!-- BEGIN VENDOR JS-->
<script src="{{ url('/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ url('/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="{{ url('/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ url('/app-assets/js/core/app.js') }}" type="text/javascript"></script>
<script src="{{ url('/app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ url('/app-assets/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL JS-->
</body>
</html>