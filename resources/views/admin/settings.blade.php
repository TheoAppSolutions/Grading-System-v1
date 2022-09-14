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
@endpush

@section('content-title')
    System Settings
@endsection

@section('content-body')
    <section class="row">
        <div class="col-lg-4 col-md-12">
            <div class="card border-info">
                <div class="card-content">
                    <div class="card-header card-head-inverse bg-info">
                        <h4 class="card-title text-white">Default Password</h4>
                    </div>
                    <div class="card-body">
                        <input class="form-control" type="password" id="password" value="{{ getDefaultPword() }}"
                               required>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="customCheck" id="customCheck1"
                                   onchange="document.getElementById('password').type = this.checked ? 'text' : 'password'">
                            <label class="custom-control-label" for="customCheck1">Show password</label>
                        </div>
                        <div class="form-group pull-right">
                            <button class="btn btn-warning"
                                    onclick="change_settings('default_password', $('#password').val())">
                                <i class="la la-check-square"></i>
                                Change
                            </button>
                        </div>
                        <br/>
                        <span>Change default user password.</span>
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
                                    <td class="text-middle align-middle">Enable Principal Signature</td>
                                    <td class="text-center">
                                        <input type="checkbox" class="switch hidden" id="switch2"
                                               onchange="change_settings('principal_signature');"
                                               data-reverse="" {{ getSettings("login_enabled") ? 'value="1" checked' : 'value="0"' }}>
                                    </td>
                                    <td class="align-middle">
                                        This will disable auto insert of School Principal signature, whenever report cards are generated.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-middle align-middle">Enable Homeroom Signatures</td>
                                    <td class="text-center">
                                        <input type="checkbox" class="switch hidden" id="switch2"
                                               onchange="change_settings('homeroom_signature');"
                                               data-reverse="" {{ getSettings("login_enabled") ? 'value="1" checked' : 'value="0"' }}>
                                    </td>
                                    <td class="align-middle">
                                        This will disable auto insert of Homeroom Adviser signature, whenever report cards are generated.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-middle align-middle">Enable Login</td>
                                    <td class="text-center">
                                        <input type="checkbox" class="switch hidden" id="switch2"
                                               onchange="change_settings('login_enabled');"
                                               data-reverse="" {{ getSettings("login_enabled") ? 'value="1" checked' : 'value="0"' }}>
                                    </td>
                                    <td class="align-middle">
                                        This will disable login for all users except the Administrator.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-middle align-middle">Enable Generate Report</td>
                                    <td class="text-center">
                                        <input type="checkbox" class="switch hidden" id="switch2"
                                               onchange="change_settings('report_enabled');"
                                               data-reverse="" {{ getSettings("report_enabled") ? 'value="1" checked' : 'value="0"' }}>
                                    </td>
                                    <td class="align-middle">
                                        This will disable generate report cards for all users except the
                                        Administrator.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-middle align-middle">Enable Email Notification</td>
                                    <td class="text-center">
                                        <input type="checkbox" class="switch hidden" id="switch2"
                                               onchange="change_settings('email_enabled');"
                                               data-reverse="" {{ getSettings("email_enabled") ? 'value="1" checked' : 'value="0"' }}>
                                    </td>
                                    <td class="align-middle">
                                        This will disable email functions for all users.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-middle align-middle">Enable File Storage</td>
                                    <td class="text-center">
                                        <input type="checkbox" class="switch hidden" id="switch2"
                                               onchange="change_settings('file_storage_enabled');"
                                               data-reverse="" {{ getSettings("file_storage_enabled") ? 'value="1" checked' : 'value="0"' }}>
                                    </td>
                                    <td class="align-middle">
                                        This will disable file storage function for all users. <span
                                                class="text-danger">(This will
                                            not remove files already stored)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-middle align-middle">Update System <span
                                                class="danger">(Beta)</span></td>
                                    <td class="text-center">
                                        <button class="btn btn-danger" disabled>
                                            <i class="la la-cloud-download"></i>
                                            Update
                                        </button>
                                    </td>
                                    <td class="align-middle">
                                        Function still experimental.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-middle align-middle">Clear Cache</td>
                                    <td class="text-center">
                                        <a href="{{ route('refresh') }}" class="btn btn-primary" >
                                            <i class="la la-recycle"></i>
                                            Clear
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        Clear Up Stored Cache in the System.
                                        <span class="text-danger">(Improves loading times)</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-middle align-middle">Clear Duplicates Grades</td>
                                    <td class="text-center">
                                        <a href="{{ route('fix', "fix=remove duplicates") }}" class="btn btn-danger" >
                                            <i class="la la-recycle"></i>
                                            Clear
                                        </a>
                                    </td>
                                    <td class="align-middle">
                                        Remove duplicate grade entry
                                        <span class="text-danger">(May fix grades not updating bug)</span>
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

@push("js")
    <script>
        function change_settings(field_name, field_value = '') {
            $.ajax({
                url: "/settings",
                type: "POST",
                data: {
                    "_token": token,
                    "_method": "PATCH",
                    "field_name": field_name,
                    "field_value": field_value
                },
                success: function (response) {
                    field_name = field_name.replace("_enabled", " ");
                    field_name = field_name.replace("_", " ");
                    field_name = field_name.charAt(0).toUpperCase() + field_name.slice(1);

                    if (response === "true") {
                        toastr.success(field_name + ' setting updated successfully!', 'Settings Update!', {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    } else {
                        toastr.error(field_name + ' ' + response, 'Settings Update Failed!', {
                            positionClass: 'toast-bottom-right',
                            containerId: 'toast-bottom-right'
                        });
                    }
                }
            });
        }
    </script>
@endpush
