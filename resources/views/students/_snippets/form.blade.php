<div class="row">
    <div class="col-12 col-lg-6">
        <h4 class="form-section">
            <i class="la la-user"></i> Personal Information
        </h4>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="firstname">First Name <span
                        class="danger">*</span>: </label>
            <div class="col-md-9">
                <input type="text" id="firstname" value="{{ $student->firstname ?? old('firstname', '') }}"
                       class="form-control" min="1"
                       max="255" required
                       placeholder="First Name" name="firstname">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="lastname">Last Name <span class="danger">*</span>:</label>
            <div class="col-md-9">
                <input type="text" id="lastname" value="{{ $student->lastname ?? old('lastname', '') }}"
                       class="form-control" min="1"
                       max="255" required
                       placeholder="Last Name" name="lastname">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="middlename">Middle Name: </label>
            <div class="col-md-9">
                <input type="text" id="middlename" value="{{ $student->middlename ?? old('middlename', '') }}"
                       class="form-control"
                       max="1" placeholder="Middle Name" name="middlename">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="suffix">Suffix: </label>
            <div class="col-md-9">
                <input type="text" id="suffix" value="{{ $student->suffix ?? old('suffix', '') }}"
                       class="form-control" min="0"
                       placeholder="Suffix" name="suffix">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="birthdate">Birth Date: </label>
            <div class="col-md-9">
                <input type="date" id="birthdate" value="{{ $student->birthdate ?? old('birthdate', '') }}"
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
                @php($selected = '')
            @endif
            <label class="col-md-3 label-control"
                   for="gender">Gender :
                <span class="danger">*</span>
            </label>
            <div class="col-md-9">
                <select class="form-control" id="gender" required name="gender">
                    <option value=""></option>
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

    <div class="col-12 col-lg-6">
        <h4 class="form-section">
            <i class="la la-comments-o"></i> Student Level Information
        </h4>
        <div class="form-group row">
            <label class="col-md-3 label-control"
                   for="userinput1">Student #:
            </label>
            <div class="col-md-9">
                <input type="text" id="userinput1"
                       class="form-control" value="{{ $student->student_id ?? '' }}"
                       placeholder="Recommended Student #: {{ getLastStudentID() + 1 }}" name="student_id">
            </div>
        </div>
        <div class="form-group row">
            @if (isset($request->gradelevel))
                @php($selected = $request->old('gradelevel'))
            @elseif (isset($student->gradelevel))
                @php($selected = $student->gradelevel)
            @else
                @php($selected = '')
            @endif

            <label class="col-md-3 label-control" for="gradelevel">
                Grade Level :
                <span class="danger">*</span>
            </label>
            <div class="col-md-9">
                <select class="select2-placeholder form-control hide-search" name="gradelevel" id="gradelevel"
                        data-placeholder="Select Grade Level" required>
                    <option value=""></option>
                    @php($gradelevels = schema()->gradelevel_category)
                    @foreach($gradelevels as $gradelevel_category => $sub_category)
                        <optgroup label="{{ $gradelevel_category }}">
                            @foreach($sub_category as $category => $gradelevel)

                                @if (isset($request->gradelevel))
                                    @php($selected = $request->old('gradelevel'))
                                @elseif (isset($student->gradelevel))
                                    @php($selected = $student->gradelevel)
                                @else
                                    @php($selected = '')
                                @endif

                                <option value="{{ $gradelevel }}" {{ $gradelevel == $selected ? "selected" : "" }}>
                                    {{ $gradelevel }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach

                </select>
            </div>
        </div>

        <h4 class="form-section mt-2">
            <i class="ft-phone"></i> Contact Information
        </h4>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="email">Email Address :</label>
            <div class="col-md-9">
                <input type="text" id="email" value="{{ $student->email ?? old('email', '') }}"
                       class="form-control" min="0"
                       placeholder="Email Address" name="email">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="contact">Contact Number :</label>
            <div class="col-md-9">
                <input type="text" id="contact" value="{{ $student->contact ?? old('contact', '') }}"
                       class="form-control" min="0"
                       placeholder="Contact Number" name="contact">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 label-control" for="address">Home Address :</label>
            <div class="col-md-9">
                <input type="text" id="address" value="{{ $student->address ?? old('address', '') }}"
                       class="form-control" min="0"
                       placeholder="Home Address" name="address">
            </div>
        </div>
    </div>
</div>
