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
                    <button type="button" class="btn btn-sm btn-warning" onclick="changeStudentID()">Update Student #
                    </button>
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
                            <option value="graduate" @if ($graduate) selected @endif>Graduate</option>
                        </optgroup>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script>
        function changeStudentID() {
            Swal.fire({
                title: "Input Password To Unlock Student ID",
                input: "password",
                confirmButtonText: "Submit",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value) {
                            resolve()
                        } else {
                            resolve("You need to write something!")
                        }
                    })
                },
                preConfirm: (password) => {
                    return new Promise((resolve) => {
                        setTimeout(function () {
                            $.ajax(
                                {
                                    type: "post",
                                    url: "/user/password/check",
                                    data: {
                                        "password": password,
                                        "_token": token
                                    },
                                    success: function (response) {
                                        if (response === "success") {
                                            $("#student_id").removeAttr("readonly");
                                            resolve("Correct Password");
                                        } else {
                                            resolve("Wrong Password");
                                        }
                                    },
                                });

                        }, 1000)
                    })
                }
            }).then((result) => {
                if (result.value === "Correct Password") {
                    Swal.fire({
                        type: "success",
                        title: "Grades Unlocked"
                    });
                } else if (result.value === "Wrong Password") {
                    Swal.fire({
                        type: "error",
                        title: "Wrong Password"
                    });
                }
            });

        }
    </script>
@endpush
