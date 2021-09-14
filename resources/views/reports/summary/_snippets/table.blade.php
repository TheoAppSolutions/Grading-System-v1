@isset($subjects[$gradelevel])
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th class="text-center">Subject Name</th>
                <th colspan="2" class="text-center">Teacher</th>
                @if($gradelevel >= 11)
                    <th class="text-center">Semester</th>
                @endif
                <th class="text-center">
                    <a href="{{ route('report.summary.grade',[$gradelevel,'schoolyear='.getSchoolYear()]) }}"
                       class="btn btn-success" target="_blank"
                       data-toggle="tooltip"
                       data-placement="bottom" title="All Summary">
                        <i class="la la-file-pdf-o"></i>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($subjects[$gradelevel] as $subject)
                @if(isset($subject->lastname))
                    <tr>
                        <td class="text-center">{{ $subject->subjecttitle }}</td>
                        <td class="text-center">
                            <img src='{{ profile_image($subject->id) }}'
                                 style='height: 50px;width:50px;cursor: pointer;'
                                 class='img-rounded center-block'
                                 data-toggle="modal"
                                 data-target="#myModal"
                                 onclick="$('#img-responsive').attr('src',this.src);">
                        </td>
                        <td class="text-center">
                            {{ $subject->lastname }} {{  isset($subject->lastname) ? ',' : '' }} {{  $subject->firstname }}  {{ $student->suffix ?? "" }}</td>
                        @if($gradelevel >= 11)
                            <td class="text-center">{{ $subject->semester }}</td>
                        @endif
                        <td class="text-center">
                            <a href="{{ route('report.summary.subject', [$subject->subject_id,'schoolyear='.getSchoolYear()]) }}"
                               class="btn btn-warning" target="_blank"
                               data-toggle="tooltip"
                               data-placement="bottom" title="Summary">
                                <i class="la la-file-pdf-o"></i>
                            </a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <code>No Subjects Registered.</code> Please register a subject teacher to a corresponding gradelevel.
@endisset
