<div class="modal-header">
    <h4>Subject Excellence Awardee</h4>
</div>

<div class="modal-body">
    <form role="form" class="ajax">
        <div style="overflow: auto; max-height: 300px;">
            <table class='table table-striped table-bordered table-hover'>
                <thead>
                <tr>
                    <th class="text-center">Rank#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Final Ave.</th>
                    {{--<th class="text-center">Action</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($grades as $key => $grade)
                    <tr>
                        @if ($key != "SEA")
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $studentNames[$key]->lastname . ', ' . $studentNames[$key]->firstname }}</td>
                            <td class="text-center">{{ $grade }}</td>
                            {{--<td class="text-center">
                                @if ($grades['SEA'] != $key)
                                    <button class="btn btn-success">Select Student</button>
                                @else
                                    <label class="btn btn-danger disabled" disabled="">Selected</label>
                                @endif
                            </td>--}}
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </form>
</div>

<script>
    function setSEA() {
        /*let Student1 = $('#sea1').val(), Student2 = $('#sea2').val(), Subject = '';

        $.ajax({
            url: '',
            type: 'post',
            data: {
                'student_id': Student1,
                'student_id2': Student2,
                'subject_id': Subject,
                '_token': token
            },
            success: function () {
                swal({
                    title: 'Subject Excellence Updated',
                    type: 'success',
                    timer: 2000,
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'Ok',
                }).catch(swal.noop);
            }
        });*/
    }
</script>
