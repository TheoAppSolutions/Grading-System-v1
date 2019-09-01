<div class="form-group col-12 contact-repeater">
    <div data-repeater-list="repeater-group">
        @foreach($excluded as $exclude)
            <div class="input-group mb-1">
                <select class="select2-placeholder form-control">
                    <option value=""></option>
                    @foreach($students as $student)
                        <option value="{{ $student->student_id }}"
                                {{ $exclude->student_id == $student->student_id ? "selected" : "" }}>
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
        @endforeach
        <div class="input-group mb-1" data-repeater-item>
            <select class="select2-placeholder form-control">
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
    <hr>
    <button type="button" data-repeater-create class="btn btn-primary">
        <i class="ft-plus"></i> Add New Student
    </button>
    <button type="button" class="btn btn-success pull-right">
        <i class="ft-check"></i> Save
    </button>
</div>

<script src="{{ url('/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js') }}" type="text/javascript"></script>
<script src="{{ url('/app-assets/js/scripts/forms/form-repeater.js') }}" type="text/javascript"></script>