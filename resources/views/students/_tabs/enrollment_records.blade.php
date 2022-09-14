<table class="table table-bordered">
    <thead>
    <tr>
        <th>School Year</th>
        <th>Grade Level</th>
        <th>Section / Strand</th>
        <th>Report Card</th>
    </tr>
    </thead>
    <tbody>
    @foreach($enrollment_records as $record)
        <tr>
            <td class="text-center align-middle">{{ $record->schoolyear }}</td>
            <td class="text-center align-middle">{{ $record->gradelevel }}</td>
            <td class="text-center align-middle">{{ $record->section_or_strand }}</td>
            <td>
                @if($record->gradelevel >= 11)
                    <div class="btn-group">
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Report Card
                        </button>
                        <div class="dropdown-menu arrow">
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.student', ['quarter',$record->student_id,'type=quarter','schoolyear='.$record->schoolyear, 'semester=1']) }}">
                                    1st Semester <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.student', ['quarter',$record->student_id,'type=quarter','schoolyear='.$record->schoolyear, 'semester=2']) }}">
                                    2nd Semester <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                        </div>
                    </div>
                @else
                    <a style="cursor: pointer;" target="_blank" class="btn btn-success"
                       href="{{ route('report.student', ['quarter',$record->student_id,'type=quarter','schoolyear='.$record->schoolyear, 'term=1']) }}">
                        Report Card<span class='fa fa-file-pdf-o pull-right'></span>
                    </a>
                @endif

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
