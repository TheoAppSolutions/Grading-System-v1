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
            <th>Action</th>
        </tr>
        </thead>

        <tbody>
        @php($lastTeacher = '')
        @foreach($list[$gradelevel] as $subject)
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
                    @foreach($users as $user)
                        @if ($user_list[$subject->subject_id]["user_id"]==$user->id)
                            {{ $user->lastname }}
                            {{ isset($user->lastname) ? ',' : '' }} {{ $user->firstname }}
                        @endif
                    @endforeach
                </td>
                <td class="p-1">
                    @foreach($users as $user)
                        @if ($user_list[$subject->subject_id]["user2_id"]==$user->id)
                            {{ $user->lastname }}
                            {{ isset($user->lastname) ? ',' : '' }} {{ $user->firstname }}
                        @endif
                    @endforeach
                </td>
                <td class="p-1">
                    {{ $units[$subject->subjectname]['unit'] ?? 0 }}
                </td>
                <td class="p-1">
                    <a href="{{ route('grades.show', $subject->subject_id) }}" title="Show" class="btn btn-success"
                       target="_blank">
                        <i class="ft-award"></i></a>
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
            <th>Action</th>
        </tr>
        </tfoot>
    </table>
</div>
