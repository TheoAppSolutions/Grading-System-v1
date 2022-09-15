<li class="navigation-header">
    <span>Subjects</span>
    <i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
       data-original-title="Subjects"></i>
</li>

@foreach($subjects['subjects'] as $subject)
    @if($loop->first)
        {!! '<li>' !!}
        <a href="#" class="menu-item"><i class="la la-coffee"></i>
            <span class="menu-title">{{ $subject->subjectname }}</span>
        </a>

        {!! '<ul class="menu-content">' !!}

    @elseif($lastSubjectName != $subject->subjectname)
        {!! '</ul></li><li>' !!}
        <a href="#" class="menu-item"><i class="la la-coffee"></i>
            <span class="menu-title">{{ $subject->subjectname }}</span>
        </a>
        {!! '<ul class="menu-content">' !!}

    @endif

    @if($lastGradeLevel != $subject->gradelevel)
        <li>
            <a class="menu-item"
               href='{{ route('grades.show', $subject->subject_id) }}'>Grade: {{ $subject->gradelevel }}
            </a>
        </li>
    @endif

    @php($lastSubjectName = $subject->subjectname)
    @php($lastGradeLevel = '')

    @if($loop->last)
        {!! "</ul>" !!}
    @endif
@endforeach
