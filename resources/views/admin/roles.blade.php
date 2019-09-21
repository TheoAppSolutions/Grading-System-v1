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
    Account Roles
@endsection

@section('content-body')
    <section class="row">
        <div class="col-lg-6 col-12">
            <div class="card border-info">
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('roles.update') }}" method="POST">
                            {{ csrf_field() }}

                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Roles</th>
                                        <th class="text-center">User</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-middle align-middle">School Registrar</td>
                                        <td class="text-center">
                                            <select class="select2-placeholder form-control hide-search"
                                                    style="width: 100%;" name="role[Registrar]"
                                                    data-placeholder="School Registrar" title="School Registrar">
                                                <option value=""> </option>
                                                    @php($lastID = "")
                                                    @foreach($users as $user)
                                                        @if($user->lastname != 'ADMIN' and $lastID != $user->id)
                                                            <option value="{{ $user->id }}" {{ $user->id == $roles['Registrar'] ? "selected" : "" }}>
                                                                {{ $user->lastname }}{{ isset($user->lastname) ? ',' : '' }} {{ $user->firstname }}</option>
                                                            @php($lastID = $user->id)
                                                        @endif
                                                    @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-middle align-middle">School Secretary</td>
                                        <td class="text-center">
                                            <select class="select2-placeholder form-control hide-search"
                                                    style="width: 100%;" name="role[Secretary]"
                                                    data-placeholder="School Secretary" title="School Secretary">
                                                <option value=""> </option>
                                                    @php($lastID = "")
                                                    @foreach($users as $user)
                                                        @if($user->lastname != 'ADMIN' and $lastID != $user->id)
                                                            <option value="{{ $user->id }}" {{ $user->id == $roles['Secretary'] ? "selected" : "" }}>
                                                                {{ $user->lastname }}{{ isset($user->lastname) ? ',' : '' }} {{ $user->firstname }}</option>
                                                            @php($lastID = $user->id)
                                                        @endif
                                                    @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-middle align-middle">School Principal</td>
                                        <td class="text-center">
                                            <select class="select2-placeholder form-control hide-search"
                                                    style="width: 100%;" name="role[Principal]"
                                                    data-placeholder="School Principal" title="School Principal">
                                                <option value=""> </option>
                                                    @php($lastID = "")
                                                    @foreach($users as $user)
                                                        @if($user->lastname != 'ADMIN' and $lastID != $user->id)
                                                            <option value="{{ $user->id }}" {{ $user->id == $roles['Principal'] ? "selected" : "" }}>
                                                                {{ $user->lastname }}{{ isset($user->lastname) ? ',' : '' }} {{ $user->firstname }}</option>
                                                            @php($lastID = $user->id)
                                                        @endif
                                                    @endforeach
                                            </select>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">
                                    <i class="la la-check-square"></i>
                                    Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
