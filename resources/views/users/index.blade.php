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
    Account List
@endsection

@if(request("user_status") and request("user_status") != "")
    @php($user_status = request("user_status"))
@else
    @php($user_status = "Active")
@endif

@section('content-body')
    <section class="row">
        <div class="col-12">
            <div class="card border-info">
                <div class="card-content">
                    <div class="card-head">
                        <div class="card-header">
                            <div class="card-title">
                                <p>Select a <code>user</code> to view</p>

                                <select class="select2-placeholder form-control hide-search" id="user_status"
                                        data-placeholder="Select Status" onchange="changeTable();"
                                        title="Select Status">
                                    <option value="Active" {{ "Active" == $user_status ? "selected" : "" }}>Active
                                    </option>
                                    <option value="Inactive" {{ "Inactive" == $user_status ? "selected" : "" }}>Disabled
                                    </option>
                                </select>
                            </div>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li>
                                        <a href="{{ route('user.create') }}" class="btn btn-primary block btn-md">
                                            <i class="ft-plus white"></i> New User
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="card-content">
                        <div class="card-body">
                            @include('users._snippets.table',['users'=>$users[$user_status], 'roles'=>$roles])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script>
        function changeTable() {
            var url = window.location.pathname;
            url += '?user_status=' + $('#user_status').val();
            window.location.href = url;
        }
    </script>
@endpush