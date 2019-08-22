@extends('_layouts.main')

@section('content-title')
    School Year
@endsection

@section('content-body')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                School Year {{ $schoolyear->schoolyear }}
            </h4>
            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li>
                        <a href="{{ route('schoolyear.index') }}" class="btn btn-primary block btn-md">
                            <i class="ft-list white"></i> School Year Lists
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-content">
            <div class="card-body">
                <form class="form form-horizontal striped-rows form-bordered"
                      action="{{ route('schoolyear.update') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" value="{{ $schoolyear->schoolyear }}" name="schoolyear">
                    <div class="form-body row">
                        <div class="col-12 col-xl-6">
                            <h4 class="form-section"><i class="la la-wrench"></i> Configuration</h4>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="email">School Year Start :</label>
                                <div class="col-md-9">
                                    <select class="select2-placeholder form-control hide-search" name="schoolyear_start"
                                            id="single-placeholder">
                                        @for($quarter = 1; $quarter <= 12; $quarter++)
                                            <option value="{{ $quarter }}"
                                                    @if($schoolyear->schoolyear_start == $quarter) selected @endif>{{ date('F', mktime(0, 0, 0, $quarter)) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="email">School Year End :</label>
                                <div class="col-md-9">
                                    <select class="select2-placeholder form-control hide-search" name="schoolyear_end"
                                            id="single-placeholder">
                                        @for($quarter = 1; $quarter <= 12; $quarter++)
                                            <option value="{{ $quarter }}"
                                                    @if($schoolyear->schoolyear_end == $quarter) selected @endif>{{ date('F', mktime(0, 0, 0, $quarter)) }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="contact">School Dates Template :</label>

                                <div class="col-md-9">
                                    <select class="select2-placeholder form-control hide-search" name="days_settings"
                                            id="single-placeholder">
                                        <option value="4" @if($schoolyear->days_settings == 4) selected @endif>By Terms (4 Entries)</option>
                                        <option value="12" @if($schoolyear->days_settings == 12) selected @endif>By Months (12 Entries)</option>
                                    </select>
                                </div>
                            </div>

                            <h4 class="form-section mt-2"><i class="la la-file-pdf-o"></i>Card Template</h4>
                            @foreach(schema()->gradelevel_category as $gradelevel_category => $category)
                                <div class="form-group row">
                                    <label class="col-md-3 label-control"
                                           for="userinput2">Report Card Template ({{ $gradelevel_category }}
                                        ) :
                                    </label>
                                    <div class="col-md-9">
                                        <select class="select2-placeholder form-control hide-search"
                                                id="single-placeholder" name="card_template_1"
                                                data-placeholder="School Year">
                                            <option value="1">Card Template v1</option>
                                        </select>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="col-12 col-xl-6">
                            <h4 class="form-section"><i class="la la-cogs"></i>Additional Steps</h4>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="email">Enroll Students :</label>
                                <div class="col-md-9">
                                    <a href="{{ route('student.index') }}" class="btn btn-primary">Student
                                        Lists</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="email">Subject Records :</label>
                                <div class="col-md-9">
                                    <a href="{{ route('subject.index') }}" class="btn btn-primary">Subject
                                        Lists</a>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 label-control" for="email">Homeroom Records :</label>
                                <div class="col-md-9">
                                    <a href="{{ route('office.settings') }}" class="btn btn-primary">Homeroom
                                        Advisers</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-actions">
                        <div class="row">
                            <div class="col-12 col-md-6 order-1 order-md-0 mt-2 mt-md-0">
                                <div class="left">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Update
                                    </button>
                                    <a href="{{ route('schoolyear.index') }}" type="button" class="btn btn-secondary">
                                        <i class="la la-sign-in"></i> Cancel
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 order-0 order-md-1">
                                <div class="form right">
                                    @if (!$schoolyear->active)
                                        <button type="button" class="btn btn-danger"
                                                onclick="schoolyear_action('{{ $schoolyear->schoolyear }}', 'delete');">
                                            <i class="la la-trash"></i> Remove
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection