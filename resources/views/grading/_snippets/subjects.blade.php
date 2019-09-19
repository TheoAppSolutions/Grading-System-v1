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
        @php($teacher=[])

        @foreach($subjects[$gradelevel] as $subject)
            @if(!isset($user_list[$subject->subject_id]["user_id"]))
                @php($user_list[$subject->subject_id]["user_id"] = '')
            @endif
            @if(!isset($user_list[$subject->subject_id]["user2_id"]))
                @php($user_list[$subject->subject_id]["user2_id"] = '')
            @endif

            @foreach($users as $user)
                @if ($user_list[$subject->subject_id]["user_id"]==$user->id)
                    @php($teacher[1] = $user->lastname . ', ' . $user->firstname)
                @elseif ($user_list[$subject->subject_id]["user2_id"]==$user->id)
                    @php($teacher[2] = $user->lastname . ', ' . $user->firstname)
                @endif
            @endforeach

            @if (isset($teacher[1]) or isset($teacher[2]))
                <tr>
                    <td class="p-1">{{ $subject->subject_id }}</td>
                    <td class="p-1">{{ $subject->subjecttitle }}</td>
                    <td class="p-1">
                        {{ $teacher[1] ?? '' }}
                    </td>
                    <td class="p-1">
                        {{ $teacher[2] ?? '' }}
                    </td>
                    <td class="p-1">
                        {{ $units[$subject->subjectname]['unit'] ?? 0 }}
                    </td>
                    @if (schema("student")->{'senior.high.school'} and $gradelevel >= 11 and $gradelevel <= 12)
                        <td class="p-1">
                            {{ $subject->semester }}
                        </td>
                        <td class="p-1">
                            {{ $subject->section }}
                        </td>
                    @endif
                    <td class="p-1">
                        @if ($subject->section)
                            <a href="{{ route('grades.show', [$subject->subject_id,"section=".$subject->section]) }}"
                               title="Show" class="btn btn-success" target="_blank"><i class="ft-award"></i>
                            </a>
                        @else
                            <a href="{{ route('grades.show', [$subject->subject_id]) }}"
                               title="Show" class="btn btn-success" target="_blank"><i class="ft-award"></i>
                            </a>
                        @endif
                    </td>
                </tr>
                @php($teacher[1] = "")
                @php($teacher[2] = "")
            @endif
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
