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
                                           for="userinput1">ID#</label>
                                    <div class="col-md-9">
                                        <input type="text" id="userinput1"
                                               class="form-control"
                                               placeholder="Subject ID#" name="firstname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control"
                                           for="userinput2">Title</label>
                                    <div class="col-md-9">
                                        <input type="text" id="userinput2"
                                               class="form-control"
                                               placeholder="Subject Title" name="lastname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="userinput3">Short
                                        Term</label>
                                    <div class="col-md-9">
                                        <input type="text" id="userinput3"
                                               class="form-control"
                                               placeholder="Subject Short Term (Ex: ENG01 for ENGLISH 1)"
                                               name="username">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control"
                                           for="userinput4">Units</label>
                                    <div class="col-md-9">
                                        <input type="number" id="userinput4" min="0" step="0.01"
                                               class="form-control"
                                               placeholder="Subject Units" name="nickname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 label-control"
                                           for="userinput4">Grade Level</label>
                                    <div class="col-md-9">
                                        <select class="select2-placeholder form-control" id="single-placeholder"
                                                data-placeholder="Subject Grade Level"
                                                title="Subject Grade Level">
                                                <option value=""> </option>
                                                @php($gradelevels = schema()->gradelevel_category)
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
                                    <label class="col-md-3 label-control">Teacher 1</label>
                                    <div class="col-md-9">
                                        <select class="form-control" title="Subject Teacher">
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
                                    <label class="col-md-3 label-control">Teacher 2</label>
                                    <div class="col-md-9">
                                        <select class="form-control" title="Subject Teacher">
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
