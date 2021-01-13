@php($schoolyear = getSchoolYear())
@if(isset($students) and count($students) > 0)
    <div class="">
        <table class='table table-striped table-bordered table-hover'>
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Year Graduated</th>
                <th class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Grade Level Reports
                        </button>
                        <div class="dropdown-menu arrow">
                            <h6 class="dropdown-header">Progress Report</h6>
                            <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                               href="{{ route('report.grade', ['midquarter',$gradelevel,'term=1','schoolyear='.$schoolyear]) }}">
                                Term 1 Card <span class='fa fa-file-pdf-o pull-right'></span>
                            </a>
                            <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                               href="{{ route('report.grade', ['quarter',$gradelevel,'term=2','schoolyear='.$schoolyear]) }}">
                                Term 2 Card <span class='fa fa-file-pdf-o pull-right'></span>
                            </a>
                            <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                               href="{{ route('report.grade', ['midquarter',$gradelevel,'term=3','schoolyear='.$schoolyear]) }}">
                                Term 3 Card <span class='fa fa-file-pdf-o pull-right'></span>
                            </a>
                            <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                               href="{{ route('report.grade', ['quarter',$gradelevel,'term=4','schoolyear='.$schoolyear]) }}">
                                Term 4 Card <span class='fa fa-file-pdf-o pull-right'></span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <h6 class="dropdown-header">Awards Report</h6>
                            <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                               href="{{ route('report.grade', ['award',$gradelevel,'term=award','schoolyear='.$schoolyear]) }}">
                                Awards Card <span class='fa fa-file-pdf-o pull-right'></span>
                            </a>
                            <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                               href="{{ route('report.award.summary.print', [$gradelevel,'schoolyear='.$schoolyear]) }}">
                                Awards Summary <span class='fa fa-file-pdf-o pull-right'></span>
                            </a>
                        </div>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody>
            @php($ctr = 1)
            @foreach($students as $student)
                @if($gradelevel == "graduates")
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td style="text-align: left;">
                            <img src="{{ student_image($student->student_id) }}"
                                 style="height: 50px;width:50px;cursor: pointer;" class="img-rounded center-block"
                                 data-toggle="modal"
                                 data-target="#myModal" onclick="$('#img-responsive').attr('src',this.src);">
                            {{ $student->lastname . ', ' . $student->firstname }}</td>
                        <td class="text-center">{{ $student->graduated_at ?? "" }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Reports
                                </button>
                                <div class="dropdown-menu arrow">
                                    <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                       href="{{ route('report.transcript', [$student->student_id]) }}">
                                        Transcript of Record<span class='fa fa-file-pdf-o pull-right'></span>
                                    </a>
                                </div>
                            </div>
                        </td>

                    </tr>
                @elseif($student->gradelevel == $gradelevel)
                    <tr>
                        <td class="text-center">{{ $ctr++ }}</td>
                        <td style="text-align: left;">
                            <img src="{{ student_image($student->student_id) }}"
                                 style="height: 50px;width:50px;cursor: pointer;" class="img-rounded center-block"
                                 data-toggle="modal"
                                 data-target="#myModal" onclick="$('#img-responsive').attr('src',this.src);">
                            {{ $student->lastname . ', ' . $student->firstname }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button data-target='#modal' data-toggle="modal" class="btn btn-primary"
                                        title="Comments"
                                        onclick="loadModal('View Comments','{{ route('comments.quarter.show', $student->student_id) }}')">
                                    <i class="la la-check" title="Comments" data-toggle="tooltip"
                                       data-placement="bottom"></i>
                                </button>
                            </div>
                            <div class="btn-group">
                                <button data-target="#modal" data-toggle="modal" class="btn btn-success"
                                        title="Attendance"
                                        onclick="loadModal('View Attendance','{{ route('attendance.show', $student->student_id) }}')">
                                    <i class="la la-calendar" title="Attendance" data-toggle="tooltip"
                                       data-placement="bottom"></i>
                                </button>
                            </div>
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Reports
                                </button>
                                <div class="dropdown-menu arrow">
                                    <h6 class="dropdown-header">Progress Report</h6>
                                    <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                       href="{{ route('report.student', ['midquarter',$student->student_id,'term=1','schoolyear='.$schoolyear]) }}">
                                        Term 1 Card <span class='fa fa-file-pdf-o pull-right'></span>
                                    </a>
                                    <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                       href="{{ route('report.student', ['quarter',$student->student_id,'term=2','schoolyear='.$schoolyear]) }}">
                                        Term 2 Card <span class='fa fa-file-pdf-o pull-right'></span>
                                    </a>
                                    <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                       href="{{ route('report.student', ['midquarter',$student->student_id,'term=3','schoolyear='.$schoolyear]) }}">
                                        Term 3 Card <span class='fa fa-file-pdf-o pull-right'></span>
                                    </a>
                                    <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                       href="{{ route('report.student', ['quarter',$student->student_id,'term=4','schoolyear='.$schoolyear]) }}">
                                        Term 4 Card <span class='fa fa-file-pdf-o pull-right'></span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Awards Report</h6>
                                    <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                       href="{{ route('report.award', [$student->student_id,'term=award','schoolyear='.$schoolyear]) }}">
                                        Awards Card <span class='fa fa-file-pdf-o pull-right'></span>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <h6 class="dropdown-header">Beta</h6>
                                    <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                       href="{{ route('report.transcript', [$student->student_id]) }}">
                                        Transcript of Record<span class='fa fa-file-pdf-o pull-right'></span>
                                    </a>
                                    {{--<div class="dropdown-divider"></div>
                                    <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                       href="{{ route('report.student', ['award',$student->student_id,'term=4','schoolyear='.$schoolyear]) }}">
                                        Award Card <span class='fa fa-file-pdf-o pull-right'></span>
                                    </a>--}}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@else
    <code>No Students Records Found.</code> Please Enroll Old Students or Add New Students.
@endisset
