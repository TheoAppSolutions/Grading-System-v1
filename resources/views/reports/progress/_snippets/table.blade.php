@php($schoolyear = getSchoolYear())
@if(isset($students) and count($students) > 0)
    <div class="table-responsive">
        <table class='table table-striped table-bordered table-hover'>
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Grade Level Reports
                        </button>
                        <div class="dropdown-menu arrow">
                            @if ($gradelevel >= 1 and $gradelevel <= 10)
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'term=1']) }}">
                                    1st MidQuarter<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'term=2']) }}">
                                    2nd MidQuarter<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'term=3']) }}">
                                    3rd MidQuarter<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'term=4']) }}">
                                    4th MidQuarter<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['quarter',$gradelevel,'type=quarter','schoolyear='.$schoolyear]) }}">
                                    Quarter <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                {{--<div class="dropdown-divider"></div>--}}
                                {{--<a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['award',$gradelevel,'term=4','schoolyear='.$schoolyear, 'type=award']) }}">
                                    Award Card <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>--}}
                            @elseif ($gradelevel >= 11 and $gradelevel <= 12)
                                <div class="dropdown-header">1st Semester</div>
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'semester=1', 'term=1']) }}">
                                    MidQuarter 1<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'semester=1', 'term=2']) }}">
                                    MidQuarter 2<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['quarter',$gradelevel,'type=quarter','schoolyear='.$schoolyear, 'semester=1']) }}">
                                    Quarter <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">2nd Semester</div>
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'semester=2', 'term=3']) }}">
                                    MidQuarter 1<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'semester=2', 'term=4']) }}">
                                    MidQuarter 2<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['quarter',$gradelevel,'type=quarter','schoolyear='.$schoolyear, 'semester=2']) }}">
                                    Quarter <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                {{--<div class="dropdown-divider"></div>--}}
                                {{--<a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['award',$gradelevel,'term=4','schoolyear='.$schoolyear, 'type=award']) }}">
                                    Award Card <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>--}}
                            @endif
                        </div>
                    </div>
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                            Download Reports
                        </button>
                        <div class="dropdown-menu arrow">
                            @if ($gradelevel >= 1 and $gradelevel <= 10)
                                <a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'term=1', 'download=true']) }}">
                                    1st MidQuarter<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'term=2', 'download=true']) }}">
                                    2nd MidQuarter<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'term=3', 'download=true']) }}">
                                    3rd MidQuarter<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'term=4', 'download=true']) }}">
                                    4th MidQuarter<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['quarter',$gradelevel,'type=quarter','schoolyear='.$schoolyear, 'download=true']) }}">
                                    Quarter <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                {{--<div class="dropdown-divider"></div>--}}
                                {{--<a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['award',$gradelevel,'term=4','schoolyear='.$schoolyear, 'type=award']) }}">
                                    Award Card <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>--}}
                            @elseif ($gradelevel >= 11 and $gradelevel <= 12)
                                <div class="dropdown-header">1st Semester</div>
                                <a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'semester=1', 'term=1', 'download=true']) }}">
                                    MidQuarter 1<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'semester=1', 'term=2', 'download=true']) }}">
                                    MidQuarter 2 <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['quarter',$gradelevel,'type=quarter','schoolyear='.$schoolyear, 'semester=1', 'download=true']) }}">
                                    Quarter <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">2nd Semester</div>
                                <a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'semester=2', 'term=3', 'download=true']) }}">
                                    MidQuarter 1<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['midquarter',$gradelevel,'type=midquarter','schoolyear='.$schoolyear, 'semester=2', 'term=4', 'download=true']) }}">
                                    MidQuarter 2<span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                <a style="cursor: pointer;" class="dropdown-item"
                                   href="{{ route('report.grade', ['quarter',$gradelevel,'type=quarter','schoolyear='.$schoolyear, 'semester=2', 'download=true']) }}">
                                    Quarter <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>
                                {{--<div class="dropdown-divider"></div>--}}
                                {{--<a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                   href="{{ route('report.grade', ['award',$gradelevel,'term=4','schoolyear='.$schoolyear, 'type=award']) }}">
                                    Award Card <span class='fa fa-file-pdf-o pull-right'></span>
                                </a>--}}
                            @endif
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
                            {{ $student->lastname . ', ' . $student->firstname }} {{ $student->suffix ?? "" }}
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    Reports
                                </button>
                                <div class="dropdown-menu arrow">
                                    @php($schoolyears = getSchoolYears())
                                    @foreach($schoolyears as $year)
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['quarter',$student->student_id,'term=4','schoolyear='.$year->schoolyear]) }}">
                                            {{ $year->schoolyear }}
                                            <span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                    @endforeach
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
                            {{ $student->lastname . ', ' . $student->firstname }} <i
                                style="font-family: 'Times New Roman'">{{ $student->suffix ?? "" }}</i>
                            @if($student->section) ({{ $student->section }}) @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button data-target='#modal' data-toggle="modal" class="btn btn-danger"
                                        title="Deportment Grade"
                                        onclick="loadModal('Deportment Grade','{{ route('deportment.show', $student->student_id) }}')">
                                    <i class="la la-user" title="Deportment Grade" data-toggle="tooltip"
                                       data-placement="bottom"></i>
                                </button>
                            </div>
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
                                    @if ($student->gradelevel >= 1 and $student->gradelevel <= 10)
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['midquarter',$student->student_id,'type=midquarter','schoolyear='.$schoolyear, 'term=1']) }}">
                                            1st MidQuarter <span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['midquarter',$student->student_id,'type=midquarter','schoolyear='.$schoolyear, 'term=2']) }}">
                                            2nd MidQuarter <span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['midquarter',$student->student_id,'type=midquarter','schoolyear='.$schoolyear, 'term=3']) }}">
                                            3rd MidQuarter <span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['midquarter',$student->student_id,'type=midquarter','schoolyear='.$schoolyear, 'term=4']) }}">
                                            4th MidQuarter <span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['quarter',$student->student_id,'type=quarter','schoolyear='.$schoolyear]) }}">
                                            Quarter <span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                        {{--<div class="dropdown-divider"></div>--}}
                                        {{--<a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['award',$student->student_id,'term=3','schoolyear='.$schoolyear]) }}">
                                            Award Card <span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>--}}
                                    @elseif ($student->gradelevel >= 11 and $student->gradelevel <= 12)
                                        <div class="dropdown-header">1st Semester</div>
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['midquarter',$student->student_id,'type=midquarter','schoolyear='.$schoolyear, 'semester=1', 'term=1']) }}">
                                            MidQuarter 1<span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['midquarter',$student->student_id,'type=midquarter','schoolyear='.$schoolyear, 'semester=1', 'term=2']) }}">
                                            MidQuarter 2<span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['quarter',$student->student_id,'type=quarter','schoolyear='.$schoolyear, 'semester=1']) }}">
                                            Quarter <span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <div class="dropdown-header">2nd Semester</div>
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['midquarter',$student->student_id,'type=midquarter','schoolyear='.$schoolyear, 'semester=2', 'term=3']) }}">
                                            MidQuarter 1<span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['midquarter',$student->student_id,'type=midquarter','schoolyear='.$schoolyear, 'semester=2', 'term=4']) }}">
                                            MidQuarter 2<span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                        <a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['quarter',$student->student_id,'type=quarter','schoolyear='.$schoolyear, 'semester=2']) }}">
                                            Quarter <span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>
                                        {{--<div class="dropdown-divider"></div>--}}
                                        {{--<a style="cursor: pointer;" target="_blank" class="dropdown-item"
                                           href="{{ route('report.student', ['award',$student->student_id,'term=3','schoolyear='.$schoolyear]) }}">
                                            Award Card <span class='fa fa-file-pdf-o pull-right'></span>
                                        </a>--}}
                                    @endif
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
@endif
