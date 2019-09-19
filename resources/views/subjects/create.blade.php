@extends('_layouts.main')

@section('content-title')
    New Subject
@endsection

@section('content-body')
    <div class="card border-info">
        <div class="card-content collpase show">
            <div class="card-header">
                <div class="heading-elements">
                    <a href="{{ route('subject.index') }}" class="btn btn-primary block btn-md">
                        <i class="ft-list white"></i> Subject Lists
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form class="form form-horizontal striped-rows form-bordered" action="{{ route('subject.store') }}" method="POST">
                    @csrf

                    <div class="form-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <h4 class="form-section"><i class="la la-book"></i> Subject Info</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control"
                                           for="subject_id">ID#</label>
                                    <div class="col-md-9">
                                        <input type="text" id="subject_id" required
                                               class="form-control" name="subject_id"
                                               placeholder="Subject Short ID (Ex: ENG01 for ENGLISH 1)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control"
                                           for="subjecttitle">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" id="subjecttitle" required
                                               class="form-control" name="subjecttitle"
                                               placeholder="Subject Title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="subjectname">Short
                                        Term</label>
                                    <div class="col-md-9">
                                        <input type="text" id="subjectname"
                                               class="form-control" name="subjectname" required
                                               placeholder="Subject Short ID (Ex: ENGLISH 1)">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control"
                                           for="units">Units</label>
                                    <div class="col-md-9">
                                        <input type="number" id="units" min="0" step="0.01"
                                               class="form-control" name="units" required
                                               placeholder="Subject Units">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control"
                                           for="gradelevel">Grade Level</label>
                                    <div class="col-md-9">
                                        <select class="select2-placeholder form-control" id="gradelevel"
                                                data-placeholder="Subject Grade Level" name="gradelevel" required
                                                title="Subject Grade Level">
                                                <option value=""> </option>
                                                @php($gradelevels = schema("gradelevel.category"))
                                                @foreach($gradelevels as $gradelevel_category => $sub_category)
                                                    <optgroup label="{{ $gradelevel_category }}">
                                                        @foreach($sub_category as $category => $gradelevel)
                                                            <option value="{{ $gradelevel }}">
                                                                {{ $gradelevel }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <h4 class="form-section"><i class="ft-user"></i> Subject Teacher</h4>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="teacher1">Teacher 1</label>
                                    <div class="col-md-9">
                                        <select class="form-control" title="Subject Teacher" name="teacher1" id="teacher1" required>
                                            <option value=""> </option>
                                            @php($lastID = "")
                                            @foreach($users as $user)
                                                @if($user->lastname != 'ADMIN' and $lastID != $user->id)
                                                    <option value="{{ $user->id }}">{{ $user->lastname }}
                                                        {{ isset($user->lastname) ? ',' : '' }} {{ $user->firstname }}</option>
                                                    @php($lastID = $user->id)
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="teacher2">Teacher 2</label>
                                    <div class="col-md-9">
                                        <select class="form-control" title="Subject Teacher" name="teacher2" id="teacher2">
                                            <option value=""> </option>
                                            @php($lastID = "")
                                            @foreach($users as $user)
                                                @if($user->lastname != 'ADMIN' and $lastID != $user->id)
                                                    <option value="{{ $user->id }}">{{ $user->lastname }}
                                                        {{ isset($user->lastname) ? ',' : '' }} {{ $user->firstname }}</option>
                                                    @php($lastID = $user->id)
                                                @endif
                                            @endforeach
                                        </select>
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
