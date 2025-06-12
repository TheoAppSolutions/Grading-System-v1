<select class="select2-placeholder form-control hide-search" id="gradelevel-picker"
        data-placeholder="Select Grade Level" onchange="changeGradeLevel();"
        title="Select Grade Level">
    <option value=""></option>
    @php($gradelevels = schema("gradelevel.category"))
    @foreach($gradelevels as $gradelevel_category => $sub_category)
        @if($gradelevel_category != "Graduated")
        <optgroup label="{{ $gradelevel_category }}">
            @foreach($sub_category as $category => $gradelevel)
                <option @if($category == 11) value="Kindy" @elseif($category == 12) value="Prep" @else value="{{ $category }}" @endif
                @if($category == 11 && $current_GradeLevel == "Kindy") selected @elseif($category == 12 && $current_GradeLevel == "Prep") selected @else {{ $category == $current_GradeLevel ? "selected" : "" }} @endif>
                    {{ $gradelevel }}
                </option>
            @endforeach
        </optgroup>
        @elseif(isset($includeGraduate) and $includeGraduate)
        <optgroup label="Others">
            <option value="graduates">Graduated</option>
        </optgroup>
        @endif
    @endforeach
</select>

<script>
    function changeGradeLevel() {
        var url = window.location.pathname;
        url += '?gradelevel=' + $('#gradelevel-picker').val();
        window.location.href = url;
    }
</script>
