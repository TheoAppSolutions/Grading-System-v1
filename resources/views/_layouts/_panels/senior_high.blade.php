<li class="navigation-header">
    <span>Senior High Subjects</span>
    <i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
       data-original-title="Subjects"></i>
</li>

@foreach($subjects['subjects_seniorhigh'] as $semester => $value)
    <li>
        <a href="#" class="menu-item"><i class="la la-coffee"></i>
            <span class="menu-title">{{ ordinal($semester) }} Semester</span>
        </a>

        <ul class="menu-content">
            @foreach($value as $subject)
                @if($loop->first)
                    {!! '<li>' !!}
                    <a href="#" class="menu-item"><i class="la la-file"></i>
                        <span class="menu-title">Grade: {{ $subject->gradelevel }}</span>
                    </a>

                    {!! '<ul class="menu-content">' !!}

                @elseif($lastGradeLevel != $subject->gradelevel)
                    {!! '</ul></li><li>' !!}
                    <a href="#" class="menu-item"><i class="la la-file"></i>
                        <span class="menu-title">Grade: {{ $subject->gradelevel }}</span>
                    </a>
                    {!! '<ul class="menu-content">' !!}
                @endif

                @if($lastSubjectName = $subject->subjectname)
                    <li>
                        @if ($subject->section)
                            <a class="menu-item"
                               href='{{ route('grades.show', [$subject->subject_id, 'section='.$subject->section]) }}'>{{ $subject->subjectname }}
                            </a>
                        @else
                            <a class="menu-item"
                               href='{{ route('grades.show', [$subject->subject_id]) }}'>{{ $subject->subjectname }}
                            </a>
                        @endif
                    </li>
                @endif

                @php($lastSubjectName = $subject->subjectname)
                @php($lastGradeLevel = $subject->gradelevel)

                @if($loop->last)
                    {!! "</ul>" !!}
                @endif
            @endforeach
        </ul>
    </li>
@endforeach