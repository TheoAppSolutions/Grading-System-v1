<div class="modal-header">
    <h4>{{ $student->lastname . ', ' . $student->firstname }}</h4>
</div>

<div class="modal-body">
    <form role="form" class="ajax">
        <div style="overflow: auto; max-height: 400px;">
            <table class="table table-bordered table-responsive-lg table-striped">
                @php($schema = schema("comments.mid.senior.high")->{"Additional Comments"})

                @foreach($schema as $key => $value)
                    <tr>
                        <td>
                            @if (isset($comments->{"S".$key}))
                                <input title="checkbox" type="checkbox" class="comment" name="comment[]"
                                       {{ $comments->{"S".$key} > 0 ? 'checked' : '' }}
                                       value="{{ $comments->{"S".$key} ?? 0 }}"
                                       onclick="$(this).val(this.checked ? {{ $key }} : 0)">&nbsp;
                            @else
                                <input title="checkbox" type="checkbox" class="comment" name="comment[]"
                                       value="0"
                                       onclick="$(this).val(this.checked ? {{ $key }} : 0)">&nbsp;
                            @endif
                        </td>
                        <td>
                            {!! $value !!}
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </form>
</div>

@include('forms.modal_footer', ['checkbox' => 'true'])

<script>
    function clearChecked() {
        $('.comment').each(function () {
            this.checked = false;
            this.value = 0;
        });
    }

    function submit(nextprev = '') {
        var comments = $("input[name='comment[]']")
            .map(function () {
                return $(this).val();
            }).get();

        let student_id = '{{ $student->student_id }}', subject_id = '{{ $subject->subject_id }}', quarter = 1;

        $.ajax({
            url: '{{ route('comments.midquarter.save',[$subject->subject_id, $student->student_id]) }}',
            type: 'POST',
            data: {
                '_token': token,
                'student_id': student_id,
                'subject_id': subject_id,
                'comments': comments,
                'quarter': quarter
            },
            success: function (e) {
                console.log(e);
                if (nextprev === 'next') {
                    loadModal('View MiqQuarter Comments', '{{ route('comments.midquarter.show', [$subject->subject_id,$next]) }}');
                } else if (nextprev === 'prev') {
                    loadModal('View MiqQuarter Comments', '{{ route('comments.midquarter.show', [$subject->subject_id,$prev]) }}');
                } else {
                    $('#modal').modal('hide');
                    swal({
                        title: 'Comments Saved!',
                        type: 'success',
                        timer: 2000,
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Ok',
                    }).catch(swal.noop);
                }
            }
        });
    }
</script>
