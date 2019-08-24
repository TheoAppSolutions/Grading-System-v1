<form class="form">
    <div class="form-body">
        <div class="form-section row">
            <div class="col-12 col-md-3 text-center">
                <span class="avatar avatar-lg">
                <img src="{{ student_image($student->student_id) }}"
                     alt="avatar">
                </span>
            </div>
            <div class="col-12 col-md-9">
                <div class="table-responsive">
                    <table class="table table-white-space table-bordered row-grouping display no-wrap table-middle">
                        <thead>
                        <tr>
                            <th colspan="2" class="h2">
                                {{ $student->lastname . ", " . $student->firstname }} (#{{ $student->student_id }})
                            </th>
                        </tr>
                        <tr>
                            <th>Grade Level</th>
                            <th>General Average</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($enrolled_years as $enrolled)
                            @if (isset($grades[$enrolled->schoolyear]))
                                <tr>
                                    <td>
                                        <span class="success h3">Grade {{ $enrolled->gradelevel }}</span>
                                        <span class="danger h5">(S.Y. {{ $enrolled->schoolyear }})</span>
                                    </td>
                                    <td>
                                        <span class="h2">{{ $grades[$enrolled->schoolyear]["generalaverage"] ?? '' }}</span>
                                        <span class="success h5">  {{ $grades[$enrolled->schoolyear]["generalremarks"] ?? '' }}</span>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="form-group">
            <h5><i class="la la-upload"></i>
                Select what grade level to enroll the student to <code>School Year {{ getSchoolYear() }}</code>
            </h5>
            @php($nextgradelevel = request('nextgradelevel') != "" ? request('nextgradelevel') : $student->next_gradelevel)
            <select id="enroll_gradelevel" name="" class="select2 form-control">
                    @php($gradelevels = schema("gradelevel_category"))
                    @foreach($gradelevels as $gradelevel_category => $sub_category)
                        <optgroup label="{{ $gradelevel_category }}">
                            @foreach($sub_category as $category => $gradelevel)
                                <option value="{{ $gradelevel }}" {{ $gradelevel == $nextgradelevel ? "selected" : "" }}>
                                    {{ $gradelevel }} {{ $student->gradelevel == $gradelevel ? "(S.Y." . $student->schoolyear . ")" : "" }}
                                    {{ $student->next_gradelevel == $gradelevel ? "(Next Grade Level)" : "" }}
                                </option>
                            @endforeach
                        </optgroup>
                    @endforeach
            </select>
        </div>
    </div>

    <div class="form-actions right">
        @if($student->next_notenrolled != '')
            <button class='btn btn-info text-center' type="button"
                    onclick="enroll_student('next');">
                Enroll & Next Student
            </button>
        @endif
        <button type="button" class="btn btn-success" onclick="enroll_student();">Enroll & Close</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</form>

<script>
    function enroll_student(nextprev = '') {
        let id = '{{ $student->student_id }}', gradelevel = $('#enroll_gradelevel').val();
        console.log(nextprev);
        $.ajax({
            url: '{{ route('enrollment.save', $student->student_id) }}',
            type: 'POST',
            data: {
                'student_id': id,
                'schoolyear': '{{ getSchoolYear() }}',
                'gradelevel': gradelevel,
                '_token': token
            },
            success: function (response) {
                if (nextprev === 'next') {
                    loadModal('Enroll Student S.Y. {{ getSchoolYearNow() }}', '{{ route('enrollment', $student->next_notenrolled) }}?nextgradelevel='.gradelevel)
                } else {
                    location.reload();
                }
            }
        });
        return false;
    }
</script>