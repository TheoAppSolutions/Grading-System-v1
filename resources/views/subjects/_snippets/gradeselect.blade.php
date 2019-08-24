<select class="select2-placeholder form-control hide-search" id="gradelevel-picker"
        data-placeholder="Select Grade Level" onchange="changeGradeLevel();"
        title="Select Grade Level">
        <option value=""></option>
        @php($gradelevels = schema("gradelevel_category"))
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

<script>
    function changeGradeLevel() {
        var url = window.location.pathname;
        url += '?gradelevel=' + $('#gradelevel-picker').val();
        window.location.href = url;
    }
</script>
