<p>Select a <code>grade level</code> to view</p>
<div class="card-title">
    <div class="col-md-4">
        <div class="form-group">
            <div class="text-bold-600 font-medium-2">
                School Year
            </div>
            <select class="select2-placeholder form-control" id="single-placeholder"
                    data-placeholder="School Year">
                <optgroup label="School Year">
                    @foreach($schoolyears as $schoolyear)
                        @if($schoolyear->active == 1)
                            @php($currentSchoolyear = $schoolyear->schoolyear )
                        @endif
                        <option value="{{ $schoolyear->schoolyear }}" {{ $schoolyear->active == 1 ? "selected" : "" }}>{{ $schoolyear->schoolyear }}</option>
                    @endforeach
                </optgroup>
            </select>
        </div>
    </div>
</div>