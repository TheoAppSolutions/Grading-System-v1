@extends('_layouts.main')

@section('content-title')
    User Profile
@endsection

@section('content-body')
    <div class="card border-info">
        <div class="card-header">
            <h4 class="card-title" id="striped-row-layout-basic">
                Fields with <span class="danger">*</span> are required fields.
            </h4>
            @if (Auth::id() == 1)
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
            @endif
        </div>

        <div class="card-content">
            <div class="card-body">
                <div class="card-text">
                    @include('_partials.error_alerts')
                </div>
                <form class="form form-horizontal striped-rows form-bordered"
                      action="{{ route('user.update', $user->id) }}"
                      method="POST" enctype="multipart/form-data">
                    @method("PATCH")
                    @csrf
                    <input name="avatar" id="avatar" type="file" accept="image/*" hidden
                           onchange="changeImage(this);">
                    <input type="hidden" value="false" id="removeAvatar" name="removeAvatar">

                    <div class="form-body row">
                        <div class="col-4">
                            <div class="text-center align-middle">
                                <div class="card border-primary">
                                    <div class="card-content">
                                        <div class="card-header card-head-inverse bg-primary">
                                            <h4 class="card-title text-white"><i class="la la-camera"></i> Profile Image</h4>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ profile_image($user->id) }}" class="img-circle" id="avatar-img"
                                                 style="max-width: 200px; width: 100%;">
                                        </div>
                                        <div class="card-footer">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-icon btn-success dropdown-toggle"
                                                        data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="true">
                                                    <i class="la la-camera"></i> Action
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start">
                                                    <a class="dropdown-item" href="#" onclick="$('#avatar').click();">
                                                        <i class="la la-upload"></i> Change Image
                                                    </a>

                                                    <a class="dropdown-item" href="{{ route('image.editor') }}" target="_blank">
                                                        <i class="la la-edit"></i> Image Editor
                                                    </a>

                                                    <a class="dropdown-item" href="#"
                                                       onclick="removeImage();">
                                                        <i class="la la-times"></i> Remove Image
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <ul class="nav nav-pills nav-pill-bordered">
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-pill1" data-toggle="pill" href="#pill1"
                                       aria-expanded="true"><i class="la la-user"></i> Personal Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-pill2" data-toggle="pill" href="#pill2"
                                       aria-expanded="false"><i class="la la-phone"></i> Contact Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-pill3" data-toggle="pill" href="#pill3"
                                       aria-expanded="false"><i class="la la-file"></i> Documents</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="pill1" aria-expanded="true"
                                     aria-labelledby="base-pill1">
                                    <div class="card border-primary">
                                        <div class="card-content">

                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="firstname">First Name
                                                        <span
                                                                class="danger">*</span>: </label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="firstname"
                                                               value="{{ $user->firstname ?? old('firstname', '') }}"
                                                               class="form-control" min="1"
                                                               max="255" required
                                                               placeholder="First Name" name="firstname">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="lastname">Last Name <span
                                                                class="danger">*</span>:</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="lastname"
                                                               value="{{ $user->lastname ?? old('lastname', '') }}"
                                                               class="form-control" min="1"
                                                               max="255" required
                                                               placeholder="Last Name" name="lastname">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="middlename">Middle
                                                        Name: </label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="middlename"
                                                               value="{{ $user->middlename ?? old('middlename', '') }}"
                                                               class="form-control"
                                                               max="1" placeholder="Middle Name" name="middlename">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="suffix">Suffix: </label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="suffix"
                                                               value="{{ $user->suffix ?? old('suffix', '') }}"
                                                               class="form-control" min="0"
                                                               placeholder="Suffix" name="suffix">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="birthdate">Birth
                                                        Date: </label>
                                                    <div class="col-md-9">
                                                        <input type="date" id="birthdate"
                                                               value="{{ $user->birthdate ?? old('birthdate', '') }}"
                                                               class="form-control" min="0"
                                                               placeholder="Birth Date:" name="birthdate">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                           for="title">Honorifics :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="title" required name="title">
                                                            @if (isset($request->title))
                                                                @php($title = $request->old('title'))
                                                            @elseif (isset($user->title))
                                                                @php($title = $user->title)
                                                            @else
                                                                @php($title = '')
                                                            @endif
                                                            <option value=""></option>
                                                            <option value="Mr." {{ $title == "Mr." ? "selected" : "" }}>
                                                                Mr.
                                                            </option>
                                                            <option value="Ms." {{ $title == "Ms."  ? "selected" : ""}}>
                                                                Ms.
                                                            </option>
                                                            <option value="Mrs." {{ $title == "Mrs." ? "selected" : "" }}>
                                                                Mrs.
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="pill2" aria-labelledby="base-pill2">
                                    <div class="card border-primary">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="email">Email Address
                                                        :</label>
                                                    <div class="col-md-9">
                                                        <input type="email" id="email"
                                                               value="{{ $user->email ?? old('email', '') }}"
                                                               class="form-control" min="0"
                                                               placeholder="Email Address" name="email">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="contact">Contact Number
                                                        :</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="contact"
                                                               value="{{ $user->contact ?? old('contact', '') }}"
                                                               class="form-control" min="0"
                                                               placeholder="Contact Number" name="contact">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="address">Home Address
                                                        :</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="address"
                                                               value="{{ $user->address ?? old('address', '') }}"
                                                               class="form-control" min="0"
                                                               placeholder="Home Address" name="address">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="pill3" aria-labelledby="base-pill3">
                                    <div class="card border-primary">
                                        <div class="card-content">
                                            <div class="card-body">
                                                @if (settings("file_storage_enabled") === "false" or checkAdmin(auth()->id()))
                                                    <code>Still Work in Progress</code>
                                                @else
                                                    <code>File storage disabled by the Administrator</code>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-12 col-md-6 order-1 order-md-0 mt-2 mt-md-0">
                                <div class="left">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Update
                                    </button>
                                </div>
                            </div>
                            @if(Auth()->id() == 1)
                                <div class="col-12 col-md-6 order-0 order-md-1">
                                    <div class="form right">
                                        @if($user->active == 1)
                                            <button type="button" class="btn btn-danger" title="De-Activate"
                                                    onclick="accountStatus('{{ route('user.activate') }}','Disable','{{ $user->id }}');">
                                                <i class="ft-thumbs-down"></i> Disable
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-success" title="De-Activate"
                                                    onclick="accountStatus('{{ route('user.activate') }}','Activate','{{ $user->id }}');">
                                                <i class="ft-thumbs-up"></i> Activate
                                            </button>
                                            <button type="button" class="btn btn-danger" title="De-Activate"
                                                    onclick="accountStatus('{{ route('user.delete') }}','Delete','{{ $user->id }}');">
                                                <i class="ft-trash"></i> Delete
                                            </button>
                                        @endif
                                        <button type="button" class="btn btn-secondary"
                                                onclick="accountStatus('{{ route('admin.password.default') }}','Reset Password','{{ $user->id }}')">
                                            <i class="la la-key"></i> Reset Password
                                        </button>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @include('_layouts.modal')
@endsection
