<div class="modal-header">
    <h4><b>{{ $student->lastname . ', ' . $student->firstname }}</b></h4>
</div>
<div class="modal-body">
    <form role="form" class="ajax" name="ajax">
        <table class="table table-bordered table-responsive-lg table-striped">
            @php($schema = schema("comments_quarter"))
            @foreach($schema as $title => $item)
                <tr>
                    @if($loop->iteration % 2)
                        <td style="vertical-align: top;" class="alert-info" colspan="2">
                    @else
                        <td style="vertical-align: top;" class="alert-success" colspan="2">
                            @endif
                            <b>{{ $title }}</b><br>
                        </td>

                </tr>
                @foreach($item as $key => $value)
                    <tr>
                    <td>
                        <input title="checkbox" type="checkbox" class="comment" id="{{ strtolower($key) }}"
                               name="comments[{{ substr($key,0,-1) }}][]"
                               value="{{ $comments->comments->{$key} ?? 0 }}"
                               onclick="$(this).val(this.checked ? 1 : 0)">&nbsp;
                    </td>
                    <td>
                        {!! $value !!}
                    </td>
                    </tr>
                @endforeach
            @endforeach
        </table>
    </form>
</div>

@include('forms.modal_footer', ['checkbox' => 'true'])

<script>
    $('input[value="1"]').prop("checked", true); //Make all with value of 1 to be checked on load only

    var comment = $(".comment");

    function clearChecked() {
        $('.select').val('0');
        // set the check value for all check boxes
        for (var i = 0; i < comment.length; i++) {
            comment[i].checked = false;
            comment[i].value = 0;
        }
    }

    //-----------------------------------------------------------

    function submit(nextprev = '') {
        let id = '{{ $student->student_id }}', comments = [];

        comments["A"] = $("input[name='comments[A][]']")
            .map(function () {
                return $(this).val();
            }).get();
        comments["B"] = $("input[name='comments[B][]']")
            .map(function () {
                return $(this).val();
            }).get();
        comments["C"] = $("input[name='comments[C][]']")
            .map(function () {
                return $(this).val();
            }).get();
        comments["D"] = $("input[name='comments[D][]']")
            .map(function () {
                return $(this).val();
            }).get();
        comments["E"] = $("input[name='comments[E][]']")
            .map(function () {
                return $(this).val();
            }).get();
        comments["F"] = $("input[name='comments[F][]']")
            .map(function () {
                return $(this).val();
            }).get();

        $.ajax({
            url: '{{ route('comments.quarter.save', $student->student_id) }}',
            type: 'POST',
            data: {
                'student_id': id,
                'comments[A]': comments['A'],
                'comments[B]': comments['B'],
                'comments[C]': comments['C'],
                'comments[D]': comments['D'],
                'comments[E]': comments['E'],
                'comments[F]': comments['F'],
                '_token': token
            },
            success: function () {
                if (nextprev === 'next') {
                    loadModal('View Comments', '{{ route('comments.quarter.show', $next) }}');
                } else if (nextprev === 'prev') {
                    loadModal('View Comments', '{{ route('comments.quarter.show', $prev) }}');
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
        return false;
    }
</script>
