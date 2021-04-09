<select class="select2-placeholder form-control hide-search" id="gradelevel-picker"
        data-placeholder="Select Grade Level" onchange="changeGradeLevel();"
        title="Select Grade Level">
    <option value=""></option>
    @php($gradelevels = schema("gradelevel.category"))
    @foreach($gradelevels as $gradelevel_category => $sub_category)
        <optgroup label="{{ $gradelevel_category }}">
            @foreach($sub_category as $category => $gradelevel)
                <option @if($category == "11")value="Jr. Kindy" @elseif($category == "12") value="Prep" @else value="{{ $category }}" @endif
                @if($current_GradeLevel == "11") selected @elseif($current_GradeLevel == "12") selected @else {{ $category == $current_GradeLevel ? "selected" : "" }} @endif>
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
