<div class="row">
    <div class="col-12 col-lg-6">
        <h4 class="form-section"><i class="la la-book"></i> Subject Info</h4>
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
        <div class="form-group row">
            <label class="col-md-3 label-control"
                   for="units">Units</label>
            <div class="col-md-9">
                <input type="number" id="units" min="0"
                       class="form-control" step="0.01"
                       placeholder="Subject Units" name="units" value="{{ $subject->units }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control"
                   for="userinput4">Grade Level</label>
            <div class="col-md-9">
                <select class="select2-placeholder form-control" id="single-placeholder"
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

                        @php($gradelevels = schema()->gradelevel_category)
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
    </div>
    <div class="col-12 col-lg-6">
        <h4 class="form-section"><i class="ft-user"></i> Subject Teacher</h4>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="user_id">Teacher
                1</label>
            <div class="col-md-9">
                <select class="form-control" id="user_id" title="Subject Teacher"
                        name="user_id">
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
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="user2_id">
                Teacher
                2</label>
            <div class="col-md-9">
                <select class="form-control" id="user2_id" title="Subject Teacher"
                        name="user2_id">
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
                </select>
            </div>
        </div>
    </div>
</div>
