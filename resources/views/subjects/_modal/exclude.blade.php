<div class="repeater1">
    <div data-repeater-list="exclude">
        @foreach($excluded as $exclude)
            <div class="input-group mb-1" data-repeater-item>
                <select class="select2-placeholder form-control" data-name="exclude[]">
                    <option value=""></option>
                    @foreach($students as $key => $student)
                        <option value="{{ $student->student_id }}"
                                {{ $exclude->student_id == $student->student_id ? "selected" : "" }}>
                            {{ $student->lastname }}, {{ $student->firstname }}</option>
                    @endforeach
                </select>

                <span class="input-group-append" id="button-addon2">
              <button class="btn btn-danger" type="button" data-repeater-delete>
                  <i class="ft-x"></i>
              </button>
            </span>
            </div>
        @endforeach
    </div>
</div>
<div class="repeater">
    <div data-repeater-list="exclude">
        <div class="input-group mb-1" data-repeater-item>
            <select class="select2-placeholder form-control" data-name="exclude[]">
                <option value=""></option>
                @foreach($students as $student)
                    <option value="{{ $student->student_id }}">
                        {{ $student->lastname }}
                        , {{ $student->firstname }}</option>
                @endforeach
            </select>
            <span class="input-group-append" id="button-addon2">
                  <button class="btn btn-danger" type="button" data-repeater-delete>
                      <i class="ft-x"></i>
                  </button>
            </span>
        </div>
    </div>
    <button type="button" data-repeater-create class="btn btn-primary">
        <i class="ft-plus"></i> Add New Student
    </button>

    <button type="button" class="btn btn-success pull-right" onclick="excludes();">
        <i class="ft-check"></i> Save List
    </button>
</div>

<link rel="stylesheet" type="text/css" href="{{ url("/app-assets/vendors/css/extensions/toastr.css") }}">
<link rel="stylesheet" type="text/css" href="{{ url("/app-assets/css/plugins/extensions/toastr.css") }}">
<script src="{{ url("/app-assets/vendors/js/extensions/toastr.min.js") }}" type="text/javascript"></script>
<script src="{{ url("/app-assets/js/scripts/extensions/toastr.js") }}" type="text/javascript"></script>

<script src="{{ url('/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>

<script>
    function excludes() {
        var exclude_list = $("select[data-name='exclude[]']")
            .map(function () {
                return $(this).val();
            }).get();

        $.ajax({
            url: '{{ route('exclude.patch', $id) }}',
            type: 'POST',
            data: {
                '_token': token,
                '_method': 'PATCH',
                'exclude_list': exclude_list,
            },
            success: function () {
                $('.modal').modal('hide');
                toastr.success('Updated without errors!', 'List Updated Successfully!', {
                    positionClass: 'toast-bottom-right',
                    containerId: 'toast-bottom-right'
                });
            }
        });
    }

    $('.repeater1').repeater({
        hide: function (deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                console.log(deleteElement);
                $(this).slideUp(deleteElement);
            }
        },
    });
    $('.repeater').repeater({
        // (Optional)
        // start with an empty list of repeaters. Set your first (and only)
        // "data-repeater-item" with style="display:none;" and pass the
        // following configuration flag
        initEmpty: false,

        // (Optional)
        // "defaultValues" sets the values of added items.  The keys of
        // defaultValues refer to the value of the input's name attribute.
        // If a default value is not specified for an input, then it will
        // have its value cleared.
        defaultValues: {
            'text-input': 'foo'
        },
        // (Optional)
        // "show" is called just after an item is added.  The item is hidden
        // at this point.  If a show callback is not given the item will
        // have $(this).show() called on it.
        show: function () {
            $(this).slideDown();
        },
        // (Optional)
        // "hide" is called when a user clicks on a data-repeater-delete
        // element.  The item is still visible.  "hide" is passed a function
        // as its first argument which will properly remove the item.
        // "hide" allows for a confirmation step, to send a delete request
        // to the server, etc.  If a hide callback is not given the item
        // will be deleted.
        hide: function (deleteElement) {
            if (confirm('Are you sure you want to delete this element?')) {
                console.log(deleteElement);
                $(this).slideUp(deleteElement);
            }
        },

        // (Optional)
        // Removes the delete button from the first list item,
        // defaults to false.
        isFirstItemUndeletable: false
    });
</script>
