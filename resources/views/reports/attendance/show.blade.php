@php($type = schema("attendance_type"))
<div class="modal-header">
    <h4><b>{{ $student->lastname . ', ' . $student->firstname }}</b></h4>
</div>
<div class="modal-body">
    <form role="form" class="ajax">
        <table class="table table-bordered table-responsive-lg table-striped">
            <thead>
            <tr class="bg-info white">
                <th>{{ $type }}</th>
                <th>School Days</th>
                <th>Absent</th>
                <th>Tardy</th>
            </tr>
            </thead>

            @php($total = 0)
            @php($total_absent = 0)
            @php($total_tardy = 0)
            @php($count = schema("attendance_count"))

            @for($ctr=1, $index=0; $ctr <= $count; $ctr++, $index++)
                @php($total += $days[$index])
                @isset ($attendance->attendance)
                    @php($total_absent += $attendance->attendance->{$ctr}->A)
                    @php($total_tardy += $attendance->attendance->{$ctr}->T)
                @endif

                <tr>
                    <th class="danger">{{ $ctr }}</th>
                    <td>
                        <input title="" type='text' class="form-control"
                               maxlength="5" disabled
                               value="{{ $days[$index] }}">
                    </td>
                    <td>
                        <input title="" type="text" class="form-control attendance"
                               maxlength="5" name="attendance[A][]"
                               value="{{ $attendance->attendance->{$ctr}->A ?? '' }}">
                    </td>
                    <td>
                        <input title="" type="text" class="form-control attendance"
                               maxlength="5" name="attendance[T][]"
                               value="{{ $attendance->attendance->{$ctr}->T ?? '' }}">
                    </td>
                </tr>
            @endfor

            <tr class="bg-success">
                <th class="white">TOTAL</th>
                <td>
                    <input title="" type="text" class="form-control" disabled id="mtd"
                           value="{{ $total }}">
                </td>
                <td>
                    <input title="" type="text" class="form-control" disabled id="mta"
                           value="{{ $total_absent }}">
                </td>
                <td>
                    <input title="" type="text" class="form-control" disabled id="mtt"
                           value="{{ $total_tardy }}">
                </td>
            </tr>
        </table>
    </form>
</div>

@include('forms.modal_footer', ['checkbox' => 'false'])

<script>
    var attendance = $(".attendance");

    function clearData() {
        this.value = (this.value === 0 ? '' : this.value);
    }

    for (let i = 0; i < attendance.length; i++) {
        attendance[i].addEventListener('focus', clearData, false);
    }

    function submit(nextprev = '') {

        let student_id = '{{ $student->student_id }}', attendance = [];

        attendance["A"] = $("input[name='attendance[A][]']")
            .map(function () {
                return parseInt($(this).val());
            }).get();

        attendance["T"] = $("input[name='attendance[T][]']")
            .map(function () {
                return parseInt($(this).val());
            }).get();

        $.ajax({
            url: '{{ route('attendance.save', $student->student_id) }}',
            type: 'POST',
            data: {
                '_token': token,
                'student_id': student_id,
                'attendance[A]': attendance["A"],
                'attendance[T]': attendance["T"]
            },
            success: function () {
                if (nextprev === 'next') {
                    loadModal('View Attendance', '{{ route('attendance.show',$next) }}');
                } else if (nextprev === 'prev') {
                    loadModal('View Attendance', '{{ route('attendance.show',$prev) }}');
                } else {
                    $('#modal').modal('hide');
                    swal({
                        title: 'Attendance Saved!',
                        type: 'success',
                        timer: 2000,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok',
                    }).catch(swal.noop);
                }
            }
        });
        return false;
    }
</script>
