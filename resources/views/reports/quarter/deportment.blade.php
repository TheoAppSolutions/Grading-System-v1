<div class="modal-header">
    <h4><b>{{ $student->lastname . ', ' . $student->firstname }}</b></h4>
</div>
<div class="modal-body">
    <form role="form" class="ajax">
        <div class="form-group row">
            <label class="col-md-3 label-control" for="firstname">Quarter 1
                <span class="danger">*</span>: </label>
            <div class="col-md-9">
                <input type="number" id="deportment" class="form-control deportment" min="1" max="100" required
                       placeholder="Quarter 1 Deportment Grade" name="deportment[1]" value="{{ $deportment[1] ?? '' }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="firstname">Quarter 2
                <span class="danger">*</span>: </label>
            <div class="col-md-9">
                <input type="number" id="deportment" class="form-control deportment" min="1" max="100" required
                       placeholder="Quarter 2 Deportment Grade" name="deportment[2]" value="{{ $deportment[2] ?? '' }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="firstname">Quarter 3
                <span class="danger">*</span>: </label>
            <div class="col-md-9">
                <input type="number" id="deportment" class="form-control deportment" min="1" max="100" required
                       placeholder="Quarter 3 Deportment Grade" name="deportment[3]" value="{{ $deportment[3] ?? '' }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 label-control" for="firstname">Quarter 4
                <span class="danger">*</span>: </label>
            <div class="col-md-9">
                <input type="number" id="deportment" class="form-control deportment" min="1" max="100" required
                       placeholder="Quarter 4 Deportment Grade" name="deportment[4]" value="{{ $deportment[4] ?? '' }}">
            </div>
        </div>
    </form>
</div>

@include('forms.modal_footer', ['checkbox' => 'false'])

<script>
    function submit(nextprev = '') {

        let student_id = '{{ $student->student_id }}', deportment = [];

        deportment[1] = $("input[name='deportment[1]']").val();
        deportment[2] = $("input[name='deportment[2]']").val();
        deportment[3] = $("input[name='deportment[3]']").val();
        deportment[4] = $("input[name='deportment[4]']").val();

        $.ajax({
            url: '{{ route('deportment.save', $student->student_id) }}',
            type: 'POST',
            data: {
                '_token': token,
                'student_id': student_id,
                'deportment': deportment
            },
            success: function () {
                if (nextprev === 'next') {
                    loadModal('View Deportment', '{{ route('deportment.show',$next) }}');
                } else if (nextprev === 'prev') {
                    loadModal('View Deportment', '{{ route('deportment.show',$prev) }}');
                } else {
                    $('#modal').modal('hide');
                    swal({
                        title: 'Deportment Saved!',
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
