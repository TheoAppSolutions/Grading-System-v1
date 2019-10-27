<div class="table-responsive">
    <input type="hidden" value="{{ $gradelevel }}" name="gradelevel">

    <table class="table table-white-space table-bordered row-grouping display no-wrap table-middle">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Teacher 1</th>
            <th>Teacher 2</th>
            <th>Units</th>
            @if (schema("student")->{'senior.high.school'} and $gradelevel >= 11 and $gradelevel <= 12)
                <th>Semester</th>
                <th>Section</th>
            @endif
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @php($lastTeacher = '')
        @foreach($subjects[$gradelevel] as $subject)
            @if(!isset($user_list[$subject->subject_id]["user_id"]))
                @php($user_list[$subject->subject_id]["user_id"] = '')
            @endif
            @if(!isset($user_list[$subject->subject_id]["user2_id"]))
                @php($user_list[$subject->subject_id]["user2_id"] = '')
            @endif

            <tr>
                <td class="p-1">{{ $subject->subject_id }}</td>
                <td class="p-1">{{ $subject->subjecttitle }}</td>
                <td class="p-1">
                    @php($selected = '')
                    <select class="form-control" name="subject[{{ $subject->subject_id }}][user_id]" title="">
                        <option value=""></option>
                        @foreach($users as $user)
                            @if($user->lastname != 'ADMIN' and $lastTeacher != $user->id)
                                <option value="{{ $user->id }}"
                                @if ($user_list[$subject->subject_id]["user_id"]==$user->id)
                                    {!! 'selected' !!}
                                            @php($selected = $user->id)
                                        @else
                                    {!! '' !!}
                                        @endif
                                >{{ $user->lastname }}
                                    {{ isset($user->lastname) ? ',' : '' }} {{ $user->firstname }}</option>
                            @endif
                            @php($lastTeacher = $user->user_id)
                        @endforeach
                    </select>
                </td>
                <td class="p-1">
                    @php($selected = '')
                    <select class="form-control" name="subject[{{ $subject->subject_id }}][user2_id]" title="">
                        <option value=""></option>
                        @php($lastTeacher = '')
                        @foreach($users as $user)
                            @if($user->lastname != 'ADMIN' and $lastTeacher != $user->id)
                                <option value="{{ $user->id }}"
                                @if ($user_list[$subject->subject_id]["user2_id"]==$user->id)
                                    {!! 'selected' !!}
                                    @php($selected = $user->id)
                                @else
                                    {!! '' !!}
                                @endif
                                >{{ $user->lastname }}
                                    {{ isset($user->lastname) ? ',' : '' }} {{ $user->firstname }}</option>
                            @endif
                            @php($lastTeacher = $user->user_id)
                        @endforeach
                    </select>
                </td>
                <td class="p-1">
                    <input type="number" class="form-control text-center" min="0" max="5" step="0.01"
                           name="subject[{{ $subject->subject_id }}][unit]" title=""
                           value="{{ $units[$subject->subject_id]['unit'] ?? 0 }}">
                </td>
                @if (schema("student")->{'senior.high.school'} and $gradelevel >= 11 and $gradelevel <= 12)
                    <td class="p-1">
                        <select class="select2-placeholder form-control hide-search"
                                name="subject[{{ $subject->subject_id }}][semester]">
                            <optgroup label="Semester">
                                @for($semester = 1; $semester <= 2; $semester++)
                                    <option value="{{ $semester }}" {{ $semester == $subject->semester ? "selected" : "" }}>
                                        {{ $semester }}
                                    </option>
                                @endfor
                            </optgroup>
                        </select>
                    </td>
                    <td class="p-1">
                        <select class="select2-placeholder form-control hide-search"
                                name="subject[{{ $subject->subject_id }}][section]">
                            @php($sections = schema("student")->{"strands"})
                            <option value=" "></option>
                            <optgroup label="Sections">
                                @foreach($sections as $section)
                                    <option value="{{ $section }}" {{ $section == $subject->section ? "selected" : "" }}>
                                        {{ $section }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </td>
                @endif
                <td class="p-1">
                    <a href="{{ route('subject.show', $subject->subject_id) }}" title="Edit"
                       class="btn btn-primary">
                        <i class="ft-edit-2"></i>
                    </a>
                    @if ($user_list[$subject->subject_id]["user_id"] != "")
                        <a href="{{ route('report.subject', [$subject->subject_id,'schoolyear='.$schoolyear]) }}"
                           target="_blank" title="Summary" class="btn btn-warning">
                            <i class="ft ft-file-text"></i>
                        </a>

                        <button type="button" title="Exclude Student" class="btn btn-danger" data-target='#modal'
                           data-toggle="modal"
                           onclick="loadModal('Student exclude list for {{ $subject->subjectname }}',
                                   '{{ route('exclude', $subject->subject_id) }}')">
                            <i class="ft-user-plus"></i>
                        </button>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>

        <tfoot>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Teacher 1</th>
            <th>Teacher 2</th>
            <th>Units</th>
            @if (schema("student")->{'senior.high.school'} and $gradelevel >= 11 and $gradelevel <= 12)
                <th>Semester</th>
                <th>Section</th>
            @endif
            <th>Action</th>
        </tr>
        </tfoot>
    </table>
</div>