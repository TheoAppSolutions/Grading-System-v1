<p>Select a <code>grade level</code> to view</p>
<select class="form-control" id="schoolyear-picker" data-placeholder="Select School Year" title="Select School Year"
        onchange="changeTable();">
    @foreach($schoolYears as $schoolyear)
        <option
            value="{{ $schoolyear->schoolyear }}" {{ $schoolyear->schoolyear == $currentSchoolYear ? "selected" : "" }}>
            {{ $schoolyear->schoolyear }}
        </option>
    @endforeach
</select>

<script>
    function changeTable() {
        var url = window.location.pathname;
        url += '?schoolyear=' + $('#schoolyear-picker').val();
        window.location.href = url;
    }
</script>
