<div class="card border-primary">
    <div class="card-content">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-3 label-control"
                       for="userinput1">Student #:
                </label>
                <div class="col-md-9">
                    <input type="text" id="student_id"
                           class="form-control" readonly
                           value="{{ $student->student_id ?? '' }}"
                           placeholder="Student #" name="student_id">
                </div>
            </div>
            @if (schema("student")->{"student.lrn"})
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="userinput1">Student LRN#:
                    </label>
                    <div class="col-md-9">
                        <input type="text" id="student_lrn"
                               class="form-control"
                               value="{{ $student->student_lrn ?? '' }}"
                               placeholder="Student LRN#" name="student_lrn">
                    </div>
                </div>
            @endif

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
                        @php($gradelevels = schema("gradelevel.category"))
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
                            <option value="graduate"
                                    @if ($graduate) selected @endif>Graduate
                            </option>
                        </optgroup>
                    </select>
                </div>
            </div>

            @if (isset($request->section))
                @php($selected = $request->old('section'))
            @elseif (isset($student->section))
                @php($selected = $student->section)
            @else
                @php($selected = " ")
            @endif

            @php($sections = getSections())
            @if ($sections and $student->gradelevel >= 1 and $student->gradelevel <= 10)
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="userinput1">Section:
                    </label>
                    <div class="col-md-9">
                        <select class="select2-placeholder form-control hide-search"
                                name="section" id="section"
                                data-placeholder="Select Section" required>

                            <option value=" ">&nbsp;</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->section }}">
                                    {{ $section->section }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            @if (schema("student")->{"senior.high.school"} and $student->gradelevel >= 11 and $student->gradelevel <= 12)
                <div class="form-group row">
                    <label class="col-md-3 label-control"
                           for="section">Strand:
                    </label>
                    <div class="col-md-9">
                        <select class="select2-placeholder form-control hide-search"
                                name="section" id="section"
                                data-placeholder="Select Academic Strand" required>

                            @php($sections = schema("student")->{"strands"})
                            <optgroup label="Sections">
                                <option value="" {{ "" == $selected ? "selected" : "" }}> </option>
                                @foreach($sections as $section)
                                    <option value="{{ $section }}" {{ $section == $selected ? "selected" : "" }}>
                                        {{ $section }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
