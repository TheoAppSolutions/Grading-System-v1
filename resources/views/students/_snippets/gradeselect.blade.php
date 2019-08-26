@if ($status != "graduates")
    <p>Select a <code>grade level</code> to view</p>
    <select class="select2-placeholder form-control hide-search" id="gradelevel-picker"
            data-placeholder="Select Grade Level" onchange="changeTable();"
            title="Select Grade Level">
        <option value=""></option>
        @php($gradelevels = schema("gradelevel.category"))
        @foreach($gradelevels as $gradelevel_category => $sub_category)
            <optgroup label="{{ $gradelevel_category }}">
                @foreach($sub_category as $category => $gradelevel)
                    <option value="{{ $gradelevel }}" {{ $gradelevel == $current_GradeLevel ? "selected" : "" }}>
                        {{ $gradelevel }}
                    </option>
                @endforeach
            </optgroup>
        @endforeach
    </select>
@else
    <input type="hidden" id="gradelevel-picker" value="all">
@endif

<script>
    function changeTable() {
        var url = window.location.pathname;
        url += '?gradelevel=' + $('#gradelevel-picker').val() + '&status=' + $('#student_status').val();
        window.location.href = url;
    }
</script>