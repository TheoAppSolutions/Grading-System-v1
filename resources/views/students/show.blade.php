@extends('_layouts.main')

@section('content-title')
    Student Profile
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
                            <a href="{{ route('student.index') }}" class="btn btn-primary block btn-md">
                                <i class="ft-list white"></i> Student Lists
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
                      action="{{ route('student.update', $student->student_id) }}"
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
                                            <h4 class="card-title text-white"><i class="la la-camera"></i> Profile Image
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <img src="{{ student_image($student->student_id) }}" class="img-circle"
                                                 id="avatar-img"
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
                                    <a class="nav-link" id="base-pill4" data-toggle="pill" href="#pill4"
                                       aria-expanded="false"><i class="la la-comments-o"></i> Student Level Info</a>
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
                                                               value="{{ $student->firstname ?? old('firstname', '') }}"
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
                                                               value="{{ $student->lastname ?? old('lastname', '') }}"
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
                                                               value="{{ $student->middlename ?? old('middlename', '') }}"
                                                               class="form-control"
                                                               max="1" placeholder="Middle Name" name="middlename">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="suffix">Suffix: </label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="suffix"
                                                               value="{{ $student->suffix ?? old('suffix', '') }}"
                                                               class="form-control" min="0"
                                                               placeholder="Suffix" name="suffix">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="birthdate">Birth
                                                        Date: </label>
                                                    <div class="col-md-9">
                                                        <input type="date" id="birthdate"
                                                               value="{{ $student->birthdate ?? old('birthdate', '') }}"
                                                               class="form-control" min="0"
                                                               placeholder="Birth Date:" name="birthdate">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    @if (isset($request->gender))
                                                        @php($selected = $request->old('gender'))
                                                    @elseif (isset($student->gender))
                                                        @php($selected = $student->gender)
                                                    @else
                                                        @php($selected = '1')
                                                    @endif
                                                    <label class="col-md-3 label-control"
                                                           for="gender">Gender :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <select class="form-control" id="gender" required name="gender">
                                                            <option value="">{{ $selected }}</option>
                                                            <option value="M" {{ $selected == 'M' ? 'selected' : '' }}>
                                                                Male
                                                            </option>
                                                            <option value="F" {{ $selected == 'F' ? 'selected' : '' }}>
                                                                Female
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
                                                        <input type="text" id="email"
                                                               value="{{ $student->email ?? old('email', '') }}"
                                                               class="form-control" min="0"
                                                               placeholder="Email Address" name="email">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="contact">Contact Number
                                                        :</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="contact"
                                                               value="{{ $student->contact ?? old('contact', '') }}"
                                                               class="form-control" min="0"
                                                               placeholder="Contact Number" name="contact">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="address">Home Address
                                                        :</label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="address"
                                                               value="{{ $student->address ?? old('address', '') }}"
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
                                                <code>Still Work in Progress</code>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="pill4" aria-labelledby="base-pill4">
                                    <div class="card border-primary">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                           for="userinput1">Student #:
                                                    </label>
                                                    <div class="col-md-9">
                                                        <input type="text" id="userinput1"
                                                               class="form-control" readonly
                                                               value="{{ $student->student_id ?? '' }}"
                                                               placeholder="Student #" name="student_id">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    @if (isset($request->gradelevel))
                                                        @php($selected = $request->old('gradelevel'))
                                                    @elseif (isset($student->gradelevel))
                                                        @php($selected = $student->gradelevel)
                                                    @else
                                                        @php($selected = '1')
                                                    @endif

                                                    <label class="col-md-3 label-control" for="gradelevel">
                                                        Grade Level :
                                                        <span class="danger">*</span>
                                                    </label>
                                                    <div class="col-md-9">
                                                        <select class="select2-placeholder form-control hide-search"
                                                                name="gradelevel" id="gradelevel"
                                                                data-placeholder="Select Grade Level" required>
                                                            @php($gradelevels = schema("gradelevel_category"))
                                                            @php($selected = '')
                                                            @foreach($gradelevels as $gradelevel_category => $sub_category)
                                                                <optgroup label="{{ $gradelevel_category }}">
                                                                    @foreach($sub_category as $category => $gradelevel)

                                                                        @if (!$graduate)
                                                                            @if (isset($request->gradelevel))
                                                                                @php($selected = $request->old('gradelevel'))
                                                                            @elseif (isset($student->gradelevel))
                                                                                @php($selected = $student->gradelevel)
                                                                            @else
                                                                                @php($selected = '')
                                                                            @endif
                                                                        @endif

                                                                        <option value="{{ $gradelevel }}" {{ $gradelevel == $selected ? "selected" : "" }}>
                                                                            {{ $gradelevel }}
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endforeach
                                                            <optgroup label="Graduate">
                                                                <option value="graduate" @if ($graduate) selected @endif>Graduate</option>
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions right">
                        <button type="submit" class="btn btn-primary">
                            <i class="la la-check-square-o"></i> Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
