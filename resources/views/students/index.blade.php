@extends('_layouts.main')

@push('css')
    <link rel="stylesheet" type="text/css"
          href="{{ url('/app-assets/vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/app-assets/vendors/css/tables/extensions/rowReorder.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
          href="{{ url('/app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ url('/app-assets/css/pages/users.css') }}">
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/css/dataTables.checkboxes.css"
          rel="stylesheet"/>

@endpush

@push('js')
    <script src="{{ url('/app-assets/vendors/js/tables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ url('/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"
            type="text/javascript"></script>
    <script src="{{ url('/app-assets/vendors/js/tables/datatable/dataTables.rowReorder.min.js') }}"
            type="text/javascript"></script>

    <script type="text/javascript"
            src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.11/js/dataTables.checkboxes.min.js"></script>
@endpush

@section('content-title')
    Student List
@endsection

@if(request("gradelevel") and request("gradelevel") != "")
    @php($current_GradeLevel = request("gradelevel"))
@else
    @php($current_GradeLevel = "all")
@endif

@php($status = request("status") != "" ? request("status") : "all")

@section('content-body')
    @include('_partials.error_alerts')

    <div class="card border-info">
        <div class="card-head">
            <div class="card-header">
                <div class="card-title">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <p>Select a <code>enrollment status</code> to view</p>
                            <select class="select2-placeholder form-control hide-search" id="student_status"
                                    data-placeholder="Select Status" onchange="changeTable();"
                                    title="Select Status">
                                <option value="all" {{ $status == "all" ? "selected" : "" }}>
                                    All
                                </option>
                                <option value="enrolled" {{ $status == "enrolled" ? "selected" : "" }}>
                                    Enrolled
                                </option>
                                <option value="notenrolled" {{ $status == "notenrolled" ? "selected" : "" }}>
                                    Not Enrolled
                                </option>
                                <option value="graduates" {{ $status == "graduates" ? "selected" : "" }}>
                                    Graduates
                                </option>
                                <option value="inactive" {{ $status == "inactive" ? "selected" : "" }}>
                                    Inactive
                                </option>
                            </select>
                        </div>
                        <div class="col-12 col-md-6">
                            @if ($status != "all")
                                @include('students._snippets.gradeselect')
                            @else
                                <input type="hidden" id="gradelevel-picker" value="">
                            @endif
                        </div>
                    </div>
                </div>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li>
                            <a href="#" data-target='#modal' data-toggle="modal"
                               class="btn btn-success btn-md"
                               onclick="loadModal('Import Student Code', '{{ route('student.import.show') }}')">
                                <i class="ft-plus white"></i> Import
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('student.create') }}" class="btn btn-primary btn-md">
                                <i class="ft-plus white"></i> Add
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                @if(isset($studentsArray[$current_GradeLevel]) and count($studentsArray[$current_GradeLevel]) > 0)
                    @switch($status)
                        @case ("all")
                        @include('students._snippets.table',['students'=>$studentsArray["all"]])
                        @break
                        @case ("notenrolled")
                        <form action="{{ route('enrollment.mass') }}" method="POST" id="enroll_students">
                            @csrf
                            @include('students._snippets.table',['students'=>$studentsArray[$current_GradeLevel]])
                            <input type="hidden" name="schoolyear" value="{{ getSchoolYear() }}">
                            <button type="submit" class="btn-submit btn btn-success" disabled>Multiple Enroll</button>
                        </form>
                        @break
                        @case ("enrolled")
                        <form action="{{ route('student.mass.activate') }}" method="POST" id="deactivate_students">
                            @csrf
                            @include('students._snippets.table',['students'=>$studentsArray[$current_GradeLevel]])
                            @if ($current_GradeLevel != "all")
                                <button type="button" class="btn btn-primary pull-right" onclick="update_sections();">
                                    <i class="fa fa-check"></i> Update Sections
                                </button>
                            @endif
                            <button type="submit" class="btn-submit btn btn-success" disabled>Multiple De-activate
                            </button>
                        </form>
                        @break
                        @case ("inactive")
                        <form action="{{ route('student.mass.activate') }}" method="POST" id="activate_students">
                            @csrf
                            @include('students._snippets.table',['students'=>$studentsArray[$current_GradeLevel]])
                            <button type="submit" class="btn-submit btn btn-success" disabled>Multiple Activate
                            </button>
                        </form>
                        @break
                        @case ("graduates")
                        @include('students._snippets.table',['students'=>$studentsArray["all"]])
                        @break
                    @endswitch
                @else
                    <code>No Students Records Found.</code> Please Enroll Old Students or Add New Students.
                @endif
            </div>
        </div>
    </div>


    <!-- Modal -->
    @include('_layouts.modal')
@endsection

@push('js')
    <script>
        @if($status == "graduates" or $status ==  'all')
        $('#students_table').DataTable({order: [[1, 'asc']]});

                @elseif($status != "graduates" and $status !=  'all')
        var table = $('#students_table').DataTable({
                columnDefs: [
                    {
                        targets: 0,
                        checkboxes: {
                            selectRow: true
                        }
                    }
                ],
                select: {
                    style: 'multi'
                },
                order: [[2, 'asc']]
            });

        // Handle form submission event

        $('#enroll_students').on('submit', function (e) {
            e.preventDefault();
            swal({
                title: 'Mass Enroll Students?',
                type: 'warning',
                html: "<span class='text-danger'>Warning</span>: Mass Enroll the selected students. Once enrolled their grade level will be increased by one(1).",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Confirm',
            }).then((result) => {
                if (result.value) {
                    var form = this;
                    var rows_selected = table.column(0).checkboxes.selected();
                    // Iterate over all selected checkboxes
                    $.each(rows_selected, function (index, rowId) {
                        // Create a hidden element
                        $(form).append(
                            $('<input>')
                                .attr('type', 'hidden')
                                .attr('name', 'enroll[' + table.row(index).data()[1] + ']')
                                .val(table.row(index).data()[6])
                        );
                    });
                    form.submit();
                }
            }).catch(swal.noop);
        });

        $('#students_table').on('change', 'input[type="checkbox"]', function () {
            if (table.column(0).checkboxes.selected().length > 0) {
                $('.btn-submit').prop("disabled", false)
            } else {
                $('.btn-submit').prop("disabled", true);
            }
        });

        @endif

        function changeTable() {
            var url = window.location.pathname;
            if ($('#student_status').val() == 'all') {
                url += '?';
            } else {
                url += '?gradelevel=' + $('#gradelevel-picker').val() + '&status=' + $('#student_status').val();
            }
            window.location.href = url;
        }
    </script>
@endpush