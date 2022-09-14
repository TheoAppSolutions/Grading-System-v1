@extends('_layouts.main')

@section('content-title')
    Grade Levels
@endsection

@section('content-body')
    <section class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-head text-white">
                    <div class="card-header">
                        <ul class="nav nav-tabs nav-top-border no-hover-bg">
                            <li class="nav-item">
                                <a class="nav-link active" id="baseLable-tab2" data-toggle="tab"
                                   aria-controls="tabLable2" href="#unassigned" aria-expanded="false">
                                    Un-assigned</a>
                            </li>
                            @foreach($section_list as $section)
                                <li class="nav-item">
                                    <a class="nav-link" id="baseLable-tab2" data-toggle="tab"
                                       aria-controls="tabLable2" href="#{{ $section->section }}" aria-expanded="false">
                                        {{ $section->section }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="unassigned">
                                <form action="{{ route('student.sections.update') }}" method="POST">
                                    <input type="hidden" name="schoolyear" value="{{ $section->schoolyear }}">
                                    @csrf
                                    <div class="table-responsive overflow-auto border-bottom"
                                         style="max-height: 500px;">
                                        <table
                                            class="table table-white-space table-bordered row-grouping display no-wrap table-middle">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Section</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @php($ctr = 0)
                                            @foreach($students as $student)
                                                @if($student->section_or_strand == "")
                                                    @php($ctr++)
                                                    <tr>
                                                        <td>{{ $ctr }}</td>
                                                        <td>{{ $student->student_id }}</td>
                                                        <td>{{ $student->lastname . ", " . $student->firstname . " " . $student->suffix }}</td>
                                                        <td>
                                                            <select class="form-control"
                                                                    name="section_or_strand[{{ $student->student_id }}]">
                                                                <option value=""></option>
                                                                @foreach($section_list as $section)
                                                                    <option
                                                                        value="{{ $section->section }}">{{ $section->section }}</option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-success form-control mt-2">Save</button>
                                </form>
                            </div>


                            @foreach($section_list as $section)
                                @php($ctr = 0)
                                <div role="tabpanel" class="tab-pane" id="{{ $section->section }}">
                                    <form action="{{ route('student.sections.update') }}" method="POST">
                                        <input type="hidden" name="schoolyear" value="{{ $section->schoolyear }}">
                                        @csrf
                                        <div class="table-responsive overflow-auto border-bottom"
                                             style="max-height: 500px;">
                                            <table
                                                class="table table-white-space table-bordered row-grouping display no-wrap table-middle">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Section</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($students as $student)
                                                    @if($student->section_or_strand == $section->section)
                                                        @php($ctr++)
                                                        <tr>
                                                            <td>{{ $ctr }}</td>
                                                            <td>{{ $student->student_id }}</td>
                                                            <td>{{ $student->lastname . ", " . $student->firstname . " " . $student->suffix }}</td>
                                                            <td>
                                                                <select class="form-control"
                                                                        name="section_or_strand[{{ $student->student_id }}]">
                                                                    <option value=""></option>
                                                                    @foreach($section_list as $section2)
                                                                        <option
                                                                            {{ $student->section_or_strand == $section2->section ? "selected" : "" }}
                                                                            value="{{ $section2->section }}">{{ $section2->section }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" class="btn btn-success form-control mt-2">Save</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

