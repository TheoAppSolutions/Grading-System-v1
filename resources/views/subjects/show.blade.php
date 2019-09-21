@extends('_layouts.main')

@section('content-title')
    Update Subject
@endsection

@section('content-body')
    <div class="card border-info">
        <div class="card-content">
            <div class="card-header">
                <div class="heading-elements">
                    <a href="{{ route('subject.index') }}" class="btn btn-primary block btn-md">
                        <i class="ft-list white"></i> Subject Lists
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="form form-horizontal form-bordered striped-rows"
                      action="{{ route('subject.update', $subject->subject_id) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <div class="form-body row">
                        <div class="col-lg-5 col-12">
                            <div class="card border-primary">
                                <div class="card-header card-head-inverse bg-primary">
                                    <h4 class="card-title text-white">Subject Details</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control"
                                                   for="subject_id">ID#</label>
                                            <div class="col-md-9">
                                                <input type="text" id="subject_id"
                                                       class="form-control"
                                                       placeholder="Subject ID#" name="subject_id"
                                                       value="{{ $subject->subject_id }}" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control"
                                                   for="subjecttitle">Title</label>
                                            <div class="col-md-9">
                                                <input type="text" id="subjecttitle"
                                                       class="form-control"
                                                       placeholder="Subject Title" name="subjecttitle"
                                                       value="{{ $subject->subjecttitle }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 label-control" for="subjectname">Short
                                                Term</label>
                                            <div class="col-md-9">
                                                <input type="text" id="subjectname"
                                                       class="form-control"
                                                       placeholder="Subject Short Term (Ex: ENG01 for ENGLISH 1)"
                                                       name="subjectname" value="{{ $subject->subjectname }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-7 col-12">
                            <ul class="nav nav-pills nav-pill-bordered">
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-pill1" data-toggle="pill" href="#pill1"
                                       aria-expanded="true"><i class="la la-book"></i> Subject Info</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-pill3" data-toggle="pill" href="#pill3"
                                       aria-expanded="false"><i class="la la-file"></i> Excluded Students</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="pill1" aria-expanded="true"
                                     aria-labelledby="base-pill1">
                                    <div class="card border-primary">
                                        <div class="card-content">
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="user_id">Teacher
                                                        1</label>
                                                    <div class="col-md-9">
                                                        <select class="select2-placeholder form-control hide-search"
                                                                title="Subject Teacher"
                                                                name="user_id">
                                                            <optgroup label="Subject Teacher">
                                                                <option value=""> </option>
                                                                @php($lastID = "")
                                                                @foreach($users as $user)
                                                                    @if($lastID != $user->id)
                                                                        <option value="{{ $user->id }}" {{ $subject->user_id == $user->id ? "selected" : "" }}>
                                                                            {{ $user->lastname }}
                                                                            {{ isset($user->lastname) ? ',' : '' }} {{ $user->firstname }}</option>
                                                                        @php($lastID = $user->id)
                                                                    @endif
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="user2_id">
                                                        Teacher
                                                        2</label>
                                                    <div class="col-md-9">
                                                        <select class="select2-placeholder form-control hide-search"
                                                                title="Subject Teacher"
                                                                name="user2_id">
                                                            <optgroup label="Subject Teacher">
                                                                <option value=""> </option>
                                                                @php($lastID = "")
                                                                @foreach($users as $user)
                                                                    @if($lastID != $user->id)
                                                                        <option value="{{ $user->id }}" {{ $subject->user2_id == $user->id ? "selected" : "" }}>
                                                                            {{ $user->lastname }}
                                                                            {{ isset($user->lastname) ? ',' : '' }} {{ $user->firstname }}</option>
                                                                        @php($lastID = $user->id)
                                                                    @endif
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                           for="units">Units</label>
                                                    <div class="col-md-9">
                                                        <input type="number" id="units" min="0"
                                                               class="form-control" step="0.01"
                                                               placeholder="Subject Units" name="units"
                                                               value="{{ $subject->units }}">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control"
                                                           for="userinput4">Grade Level</label>
                                                    <div class="col-md-9">
                                                        <select class="select2-placeholder form-control"
                                                                id="single-placeholder"
                                                                data-placeholder="Subject Grade Level" name="gradelevel"
                                                                title="Subject Grade Level">
                                                            <option value=""> </option>

                                                            @if (isset($request->gradelevel))
                                                                @php($selected = $request->old('gradelevel'))
                                                            @elseif (isset($subject->gradelevel))
                                                                @php($selected = $subject->gradelevel)
                                                            @else
                                                                @php($selected = '')
                                                            @endif

                                                            @php($gradelevels = schema("gradelevel.category"))
                                                            @foreach($gradelevels as $gradelevel_category => $sub_category)
                                                                <optgroup label="{{ $gradelevel_category }}">
                                                                    @foreach($sub_category as $category => $gradelevel)
                                                                        <option value="{{ $gradelevel }}" {{ $selected == $gradelevel ? 'selected' : '' }}>
                                                                            {{ $gradelevel }}
                                                                        </option>
                                                                    @endforeach
                                                                </optgroup>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-md-3 label-control" for="user_id">Section</label>
                                                    <div class="col-md-9">
                                                        <select class="select2-placeholder form-control hide-search"
                                                                name="section" title="Subject Section">
                                                            @php($sections = schema("student")->{"strands"})
                                                            <optgroup label="Sections">
                                                                <option value=""> </option>
                                                                @foreach($sections as $section)
                                                                    <option value="{{ $section }}" {{ $section == $subject->section ? "selected" : "" }}>
                                                                        {{ $section }}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                </div>
                                                @if ($subject->gradelevel >= 11 and $subject->gradelevel <= 12)
                                                    <div class="form-group row">
                                                        <label class="col-md-3 label-control" for="user2_id">
                                                            Semester</label>
                                                        <div class="col-md-9">
                                                            <select class="select2-placeholder form-control hide-search"
                                                                    title="Subject Semester" name="semester">
                                                                <optgroup label="Semester">
                                                                    <option value=""> </option>
                                                                    @php($lastID = "")
                                                                    @for($semester=1; $semester <= 2; $semester++)
                                                                        <option value="{{ $semester }}" {{ $semester == $subject->semester ? "selected" : "" }}>
                                                                            {{ $semester }}</option>
                                                                    @endfor
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="pill3" aria-labelledby="base-pill3">
                                    <div class="card border-primary">
                                        <div class="card-content">
                                            <div class="card-body">
                                                @include('subjects._modal.exclude', ['students'=>$students, 'excluded'=>$excluded, 'id'=>$subject->subject_id, 'type'=>'form'])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions right">
                        <button type="submit" class="btn btn-success">
                            <i class="la la-check-square-o"></i> Update
                        </button>
                        <button type="button" class="btn btn-danger" onclick="$('#destroy').click();">
                            <i class="la la-trash"></i> Delete
                        </button>
                    </div>
                </form>
                <form action="{{ route('subject.destroy', $subject->subject_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" hidden id="destroy"></button>
                </form>
            </div>
        </div>
    </div>
@endsection
