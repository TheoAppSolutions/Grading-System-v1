<div class="modal-header">
    <h4>{{ $student->lastname . ', ' . $student->firstname }}</h4>
    <div class="pull-left">
        <b>LEGEND:</b>
        <b>(3)</b> - Highly Proficient,
        <b>(2)</b> - Proficient,
        <b>(1)</b> - Progressing Towards Standard
    </div>
</div>

<div class="modal-body">
    <form role="form" class="ajax">
        <div style="overflow: auto; max-height: 400px;">
            <table class="table table-bordered table-responsive-lg table-striped">

                @if ($subject->gradelevel >= 1 and $subject->gradelevel <= 6)
                    @php($schema = schema("comments.mid.lower.school"))
                    @php($additional = schema("comments.mid.additional.comments"))
                @elseif ($subject->gradelevel >= 7 and $subject->gradelevel <= 10)
                    @php($schema = schema("comments.mid.upper.school"))
                    @php($additional = schema("comments.mid.additional.comments"))
                @elseif ($subject->gradelevel >= 11 and $subject->gradelevel <= 12)
                    @php($schema = schema("comments.mid.senior.high"))
                @endif

                @foreach($schema as $title => $item)
                    @if($subject->subjectname == $title)
                        @foreach($item as $key => $value)
                            @if ($key == "Title" or $key == "Title2")
                                <tr>
                                    <td colspan="2" style="vertical-align: top;" class="alert-success">
                                        <b>{!! $value !!}</b>
                                    </td>
                                </tr>
                            @elseif ($key != "Title" or $key != "Title2")
                                <tr>
                                    <td style="vertical-align: middle;">
                                        {!! $value !!}
                                    </td>
                                    <td>
                                        <select class="text-center form-control select" title="" name="comment[]"
                                                style="min-width: 80px;">
                                            <option {{ $comments->{ $key }==0?'selected':'' }} value="0">&nbsp;</option>
                                            <option {{ $comments->{ $key }==1?'selected':'' }} value="1">1</option>
                                            <option {{ $comments->{ $key }==1.5?'selected':'' }} value="1.5">1.5
                                            </option>
                                            <option {{ $comments->{ $key }==2?'selected':'' }} value="2">2</option>
                                            <option {{ $comments->{ $key }==2.5?'selected':'' }} value="2.5">2.5
                                            </option>
                                            <option {{ $comments->{ $key }==3?'selected':'' }} value="3">3</option>
                                            <option {{ $comments->{ $key }=='N / A'?'selected':'' }} value="N / A">N/A
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if (isset($additional))
                    @foreach($additional as $title => $item)
                        <tr>
                            <td colspan="2" style="vertical-align: top;" class="alert-primary">
                                <b>{!! $title !!}</b>
                            </td>
                        </tr>
                        @foreach($item as $key => $value)
                            @if ($key == "ID")
                                @php($id = $value)
                            @else
                                <tr>
                                    <td style="vertical-align: middle;">
                                        {!! $value !!}
                                    </td>
                                    <td>
                                        <select class="text-center form-control select" title="" name="{{ $id }}[]"
                                                style="min-width: 80px;">
                                            <option {{ $comments->{ $key }==0?'selected':'' }} value="0">&nbsp;</option>
                                            <option {{ $comments->{ $key }==1?'selected':'' }} value="1">1</option>
                                            <option {{ $comments->{ $key }==1.5?'selected':'' }} value="1.5">1.5
                                            </option>
                                            <option {{ $comments->{ $key }==2?'selected':'' }} value="2">2</option>
                                            <option {{ $comments->{ $key }==2.5?'selected':'' }} value="2.5">2.5
                                            </option>
                                            <option {{ $comments->{ $key }==3?'selected':'' }} value="3">3</option>
                                            <option {{ $comments->{ $key }=='N / A'?'selected':'' }} value="N / A">N/A
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                @endif
            </table>
        </div>
    </form>
</div>

@include('forms.modal_footer', ['checkbox' => 'true'])

<script>
    function clearChecked() {
        $('.select').val('0');
        // set the check value for all check boxes
        for (var i = 0; i < comment.length; i++) {
            comment[i].checked = false;
            comment[i].value = 0;
        }
    }

    function submit(nextprev = '') {
        var comments = $("select[name='comment[]']")
            .map(function () {
                return $(this).val();
            }).get();

        var PSR = $("select[name='PSR[]']")
            .map(function () {
                return $(this).val();
            }).get();

        var WSS = $("select[name='WSS[]']")
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
                'PSR': PSR,
                'WSS': WSS,
                'quarter': quarter
            },
            success: function () {
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
