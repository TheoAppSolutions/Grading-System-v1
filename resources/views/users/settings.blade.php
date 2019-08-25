@extends('_layouts.main')
@push('css')
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/vendors/css/forms/icheck/icheck.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/vendors/css/forms/icheck/custom.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/css/plugins/forms/checkboxes-radios.css") }}">

    <link rel="stylesheet" type="text/css"
          href="{{ url("/app-assets/vendors/css/forms/toggle/bootstrap-switch.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/vendors/css/forms/toggle/switchery.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/css/plugins/forms/switch.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/vendors/css/extensions/toastr.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/css/plugins/extensions/toastr.css") }}">
@endpush

@push('js')
    <script src="{{ url("/app-assets/vendors/js/forms/icheck/icheck.min.js") }}" type="text/javascript"></script>
    <script src="{{ url("app-assets/js/scripts/forms/checkbox-radio.js") }}" type="text/javascript"></script>

    <script src="{{ url("/app-assets/vendors/js/forms/toggle/bootstrap-switch.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ url("/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js") }}"
            type="text/javascript"></script>
    <script src="{{ url("/app-assets/vendors/js/forms/toggle/switchery.min.js") }}" type="text/javascript"></script>
    <script src="{{ url("/app-assets/js/scripts/forms/switch.js") }}" type="text/javascript"></script>

    <script src="{{ url("/app-assets/vendors/js/extensions/toastr.min.js") }}" type="text/javascript"></script>
    <script src="{{ url("/app-assets/js/scripts/extensions/toastr.js") }}" type="text/javascript"></script>
    <script src="{{ url("/app-assets/js/scripts/extensions/block-ui.js") }}" type="text/javascript"></script>
@endpush

@section('content-title')
    User Settings
@endsection

@section('content-body')
    <section class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card border-info">
                <div class="card-content">
                    <div class="card-header card-head-inverse bg-info">
                        <h4 class="card-title text-white">Change Password</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.password.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="form-group">
                                <input class="form-control" type="password" id="old_password"
                                       value="{{ old('old_password') }}" name="old_password"
                                       placeholder="Old Password">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           id="old_password1"
                                           onchange="$('#old_password').type = this.checked ? 'text' : 'password'">
                                    <label class="custom-control-label" for="old_password1">Show password</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <input class="form-control" type="password" id="new_password"
                                       value="{{ old('new_password') }}" name="new_password"
                                       placeholder="New Password">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           id="new_password1"
                                           onchange="$('#new_password').type = this.checked ? 'text' : 'password'">
                                    <label class="custom-control-label" for="new_password1">Show password</label>
                                </div>
                            </div>

                            <div class="form-group pull-right">
                                <button class="btn btn-warning" type="submit">
                                    <i class="la la-check-square"></i>
                                    Change
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8 col-md-12">
            <div class="card border-info">
                <div class="card-content">
                    <div class="card-header card-head-inverse bg-info">
                        <h4 class="card-title text-white">System Configuration</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>Function</th>
                                    <th class="text-center">Controls</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="text-middle align-middle">Email Notification</td>
                                    <td class="text-center">
                                        <input type="checkbox" class="switch hidden" id="switch2" data-reverse=""
                                               value="" {{ $settings['email_notification'] ? '' : 'checked' }}
                                               onchange="system_configuration('email_notification', '{{ Auth::id() }}')"
                                        >
                                    </td>
                                    <td class="align-middle">
                                        Enables email notification.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-middle align-middle">Auto Log Out</td>
                                    <td class="text-center">
                                        <input type="checkbox" class="switch hidden" id="switch2" data-reverse=""
                                               value="" {{ $settings['auto_logout'] == 0 ? '' : 'checked' }}
                                               onchange="system_configuration('auto_logout', '{{ Auth::id() }}')">
                                    </td>
                                    <td class="align-middle">
                                        Auto logout after 15minutes inactive
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
