@php($nextgradelevel = getNextGradeLevel())
<div class="table-responsive">
    <table class="table table-white-space table-bordered row-grouping display no-wrap table-middle table-striped"
           id="students_table">
        <thead>
        <tr>
            @if($status != "graduates" and $status !=  'all')
                <th></th>
            @endif
            <th>ID#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact#</th>
            @if($status != "graduates" and $status !=  'all')
                @if($current_GradeLevel == "all")
                    <th>Grade Level</th>
                @endif
                @if($status == "notenrolled" or $status == "inactive")
                    <th>Next Grade Level</th>
                @endif
            @elseif ($status == "graduates" or $status == "all")
                <th>Grade Level</th>
            @endif
            <th>Actions</th>
        </tr>
        </thead>

        <tbody>
        @foreach($students as $student)
            @isset($student->student_id)
                <tr>
                    @if($status != "graduates" and $status !=  'all')
                        <td>{{ $student->student_id ?? ''}}</td>
                    @endif

                    <td>
                        {{ $student->student_id ?? ''}}
                    </td>

                    <td>
                        <span hidden>{{ $student->lastname }}</span>
                        <div class="media">
                            <div class="media-left pr-1">
                                <span class="avatar avatar-sm rounded-circle">
                                <img src="{{ student_image($student->student_id) }}"
                                     alt="avatar">
                                </span>
                            </div>
                            <div class="media-body media-middle">
                                <a href="#" class="media-heading" data-target='#modal' data-toggle="modal"
                                   onclick="loadModal('View Student Information',
                                       '{{ route('student.show.modal', $student->student_id) }}')">
                                    {{ $student->lastname . ", " . $student->firstname }}
                                </a>
                            </div>
                        </div>
                    </td>

                    <td class="text-center">
                        {{ $student->email ?? '' }}
                    </td>

                    <td>
                        {{ $student->contact ?? '' }}
                    </td>

                    @if($current_GradeLevel == "all" and $status != "graduates" and $status != 'all')
                        <td class="font-weight-bold">{{ $student->gradelevel ?? '' }} <span class="text-danger">(S.Y. {{ $student->schoolyear ?? '' }})</span>
                        </td>
                    @elseif ($status == "graduates")
                        <td class="font-weight-bold">Graduate <span class="text-danger">(S.Y. {{ $student->graduated_at ?? '' }})</span>
                        </td>
                    @elseif ($status == "all")
                        @if (isset($studentsArray['graduates'][$student->student_id]))
                            <td class="font-weight-bold">Graduate <span class="text-danger">(S.Y. {{ $studentsArray['graduates'][$student->student_id]->graduated_at ?? '' }})</span>
                            </td>
                        @else
                            <td class="font-weight-bold">{{ $student->gradelevel ?? '' }} <span class="text-danger">(S.Y. {{ $student->schoolyear ?? '' }})</span>
                            </td>
                        @endif
                    @endif

                    @if($status == "notenrolled" or $status == "inactive")
                        <td>{{ $nextgradelevel[$student->gradelevel] ?? ''}}</td>
                    @elseif ($status == "enrolled" and $current_GradeLevel != "all")
                    @endif

                    {{-- Action --}}
                    <td>
                        <a href="{{ route('student.show', $student->student_id) }}" title="Edit" class="btn btn-info"
                           target="_blank"><i
                                class="ft-eye"></i></a>
                        @if($status == "enrolled")
                            {{--<a href="#" title="Un-enroll" class="btn btn-danger" data-target='#modal' data-toggle="modal"
                               type="button"
                               onclick="loadModal('Un-enroll Student S.Y. {{ getSchoolYearNow() }}', '{{ route('un-enroll', $student->student_id) }}')">
                                <i class="ft-download"></i>
                            </a>--}}

                        @elseif($status == "notenrolled")
                            @isset ($nextgradelevel[$student->gradelevel])
                                @php($next_gradelevel = $nextgradelevel[$student->gradelevel])
                                <button type="button" title="Enroll" class="btn btn-success" data-target='#modal'
                                        data-toggle="modal"
                                        onclick="loadModal('Enroll Student S.Y. {{ getSchoolYear() }}', '{{ route('enrollment', $student->student_id) }}')">
                                    <i class="ft-upload"></i>
                                </button>
                            @endisset
                        @endif

                        @if ($status != "graduates")
                            @if ($student->active == 1)
                                <button type="button" title="Deactivate" class="btn btn-warning"
                                        onclick="studentStatus('{{ route('status.student') }}','Deactivate', '{{ $student->student_id }}')">
                                    <i class="ft-thumbs-down"></i></button>

                            @elseif ($student->active == 0)
                                <button type="button" title="Activate" class="btn btn-success"
                                        onclick="studentStatus('{{ route('status.student') }}','Activate', '{{ $student->student_id }}')">
                                    <i class="ft-thumbs-up"></i></button>
                                <button type="button" title="Delete" class="btn btn-danger"
                                        onclick="studentStatus('{{ route('student.destroy') }}','Delete', '{{ $student->student_id }}')">
                                    <i class="la la-trash"></i></button>
                            @endif
                        @endif
                    </td>
                </tr>
            @endisset
        @endforeach
        </tbody>

        <tfoot>
        <tr>
            @if($status != "graduates" and $status !=  'all')
                <th></th>
            @endif
            <th>ID#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact#</th>
            @if($status != "graduates" and $status !=  'all')
                @if($current_GradeLevel == "all")
                    <th>Grade Level</th>
                @endif
                @if($status == "notenrolled" or $status == "inactive")
                    <th>Next Grade Level</th>
                @endif
            @elseif ($status == "graduates" or $status == "all")
                <th>Grade Level</th>
            @endif
            <th>Actions</th>
        </tr>
        </tfoot>
    </table>
</div>

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/vendors/css/extensions/toastr.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/css/plugins/extensions/toastr.css") }}">
@endpush

@push('js')
    <script src="{{ url("/app-assets/vendors/js/extensions/toastr.min.js") }}" type="text/javascript"></script>
    <script src="{{ url("/app-assets/js/scripts/extensions/toastr.js") }}" type="text/javascript"></script>
    <script>
        function update_sections() {
            var sections = $("select[data-section='section']")
                .map(function () {
                    return $(this).attr('name') + ',' + $(this).val() + '';
                }).get();

            let gradelevel = '{{ $current_GradeLevel }}';

            $.ajax({
                url: '{{ route('student.sections.update') }}',
                type: 'POST',
                data: {
                    '_token': token,
                    '_method': 'PATCH',
                    'sections': sections,
                    'gradelevel': gradelevel
                },
                success: function (e) {
                    toastr.success('Updated without errors!', 'Student Sections Updated Successfully!', {
                        positionClass: 'toast-bottom-right',
                        containerId: 'toast-bottom-right'
                    });
                }
            });
        }
    </script>
@endpush
