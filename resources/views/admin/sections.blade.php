@extends('_layouts.main')

@section('content-title')
    Grade Levels
@endsection

@section('content-body')
    <section class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card">
                <div class="card-head bg-info text-white">
                    <div class="card-header">
                        @include('_partials.options_schoolyear')
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <table class="table table-white-space table-bordered row-grouping display no-wrap table-middle">
                            <thead>
                            <tr>
                                <th>Gradelevel</th>
                                <th>Section or Strand</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php($done = false)
                            @foreach($sections as $gradelevel => $records)
                                @php($done = false)
                                @foreach($records as $section)
                                    @if($section->schoolyear == $currentSchoolYear)
                                        <tr>
                                            @if(count($sections[$section->gradelevel]) > 1 and $done != true)
                                                <td rowspan="{{ count($sections[$section->gradelevel]) }}">
                                                    {{ $section->gradelevel }}
                                                </td>
                                            @elseif(count($sections[$section->gradelevel]) == 1 and $done != true)
                                                <td>
                                                    {{ $section->gradelevel }}
                                                </td>
                                            @endif
                                            <td>
                                                {{ $section->section }}
                                                <a class="btn btn-sm btn-danger float-right"
                                                   href="{{ route('section.remove', $section->entry_id) }}">Remove</a>
                                            </td>
                                            @if(count($sections[$section->gradelevel]) > 1 and $done != true)
                                                @php($done = true)
                                                <td rowspan="{{ count($sections[$section->gradelevel]) }}">
                                                    <a class="btn btn-sm btn-primary"
                                                       href="{{ route('sections.students', [$section->schoolyear, $section->gradelevel]) }}">Add
                                                        Students</a>
                                                </td>
                                            @elseif(count($sections[$section->gradelevel]) == 1 and $done != true)
                                                @php($done = true)
                                                <td>
                                                    <a class="btn btn-sm btn-primary"
                                                       href="{{ route('sections.students', [$section->schoolyear, $section->gradelevel]) }}">Add
                                                        Students</a>
                                                </td>
                                            @endif
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-head bg-success text-white">
                    <div class="card-header">
                        Add New Section
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('section.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <label>Section or Strand Name</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Input Section Name"
                                           name="section" required>
                                    <input type="hidden" name="schoolyear" value="{{ $currentSchoolYear }}">
                                </div>
                            </div>

                            <div class="row mt-1">
                                <div class="col">
                                    <label>Grade Level</label>
                                </div>
                                <div class="col">
                                    <select class="select2-placeholder form-control hide-search"
                                            name="gradelevel" id="gradelevel"
                                            data-placeholder="Select Grade Level" required>
                                        @php($gradelevels = schema("gradelevel.category"))
                                        @php($selected = '')
                                        @foreach($gradelevels as $gradelevel_category => $sub_category)
                                            <optgroup label="{{ $gradelevel_category }}">
                                                @foreach($sub_category as $category => $gradelevel)

                                                    @if (isset($request->gradelevel))
                                                        @php($selected = $request->old('gradelevel'))
                                                    @elseif (isset($student->gradelevel))
                                                        @php($selected = $student->gradelevel)
                                                    @else
                                                        @php($selected = '')
                                                    @endif

                                                    <option
                                                        value="{{ $gradelevel }}" {{ $gradelevel == $selected ? "selected" : "" }}>
                                                        {{ $gradelevel }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row pt-1">
                                <div class="col">
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-success pull-right">Add Section</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

