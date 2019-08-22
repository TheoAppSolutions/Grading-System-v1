@if ($status != "graduates")
    <p>Select a <code>grade level</code> to view</p>
    <select class="select2-placeholder form-control hide-search" id="gradelevel-picker"
        data-placeholder="Select Grade Level" onchange="changeTable();"
        title="Select Grade Level">
    <option value="all" {{ "All" == $current_GradeLevel ? "selected" : "" }}>All</option>
        @foreach(schema()->gradelevel_category as $gradelevel_category)
            @foreach($gradelevel_category as $category => $gradelevel)
                <option value="{{ $gradelevel }}" {{ $gradelevel == $current_GradeLevel ? "selected" : "" }}>{{ $gradelevel }}
                </option>
            @endforeach
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