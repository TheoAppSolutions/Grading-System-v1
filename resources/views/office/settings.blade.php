@extends('_layouts.main')

@section('content-title')
    School Year Settings
@endsection

@section('content-body')
    <section class="row">
        <div class="col-lg-7 col-md-12">
            <div class="card border-info">
                <div class="card-content">
                    <div class="card-header card-head-inverse bg-info">
                        <h4 class="card-title text-white">Homeroom Adviser</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('office.homeroom.update') }}" method="POST">
                                @csrf
                                @method("PATCH")
                                <input type="hidden" name="schoolyear" value="{{ getSchoolYear() }}">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">Grade Level</th>
                                        <th class="text-center">Homeroom Adviser</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th class="text-center">Grade Level</th>
                                        <th class="text-center">Homeroom Adviser</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    @php($gradelevels = schema("gradelevel.category"))
                                    @foreach($gradelevels as $gradelevel_category => $sub_category)
                                        @foreach($sub_category as $category => $gradelevel)
                                            @if($gradelevel != "Graduated")
                                                <tr>
                                                <td class="align-middle">
                                                    {{ $gradelevel }}
                                                </td>
                                                <td>
                                                    <select class="select2-placeholder form-control"
                                                            style="width: 100%;"
                                                            name="homeroom[{{ $gradelevel }}]"
                                                            data-placeholder="Grade {{ $gradelevel }} Homeroom Adviser"
                                                            title="Homeroom Adviser">
                                                        <optgroup label="Grade {{ $gradelevel }} Homeroom Adviser">
                                                            <option value=""> </option>
                                                            @php($lastID = "")
                                                            @foreach($users as $user)
                                                                @if($lastID != $user->id)

                                                                    @isset($homeroomArray[$gradelevel])
                                                                        <option value="{{ $user->id }}" {{ $user->id == $homeroomArray[$gradelevel]->user_id ? "selected" : "" }}>
                                                                            {{ $user->lastname }}
                                                                            , {{ $user->firstname }}</option>
                                                                    @else
                                                                        <option value="{{ $user->id }}">
                                                                            {{ $user->lastname }}
                                                                            , {{ $user->firstname }}</option>
                                                                    @endisset

                                                                    @php($lastID = $user->id)
                                                                @endif
                                                            @endforeach
                                                        </optgroup>
                                                    </select>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                                <button type="submit" id="update_homeroom" hidden></button>
                            </form>
                            <div class="form-group pull-right">
                                <button class="btn btn-success" onclick="$('#update_homeroom').click();">
                                    <i class="la la-check-square"></i>
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-12">
            <div class="card border-info">
                <div class="card-content">
                    <div class="card-header card-head-inverse bg-info">
                        <h4 class="card-title text-white">Number of School Days</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{ route('office.schooldays.update') }}" method="POST">
                                @csrf
                                @method("PATCH")
                                <input type="hidden" name="schoolyear" value="{{ getSchoolYear() }}">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th class="text-center">{{ schema("quarter.term") }}</th>
                                        <th class="text-center"># of School Days</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th class="text-center">{{ schema("quarter.term") }}</th>
                                        <th class="text-center"># of School Days</th>
                                    </tr>
                                    </tfoot>

                                    <tbody>
                                    @for($ctr = 1, $month = getStartMonth(); $ctr <= 2; $ctr++, $month++)
                                        <tr>
                                            @if (schema("attendance.type") == "Semester")
                                                <td class="align-middle text-center">
                                                    {{ $ctr }}
                                                </td>
                                                <td class="p-1">
                                                    <input type="number" name="days[{{ $ctr ?? "" }}]"
                                                           value="{{ $terms->{"term" . $ctr} ?? "" }}"
                                                           placeholder=""
                                                           class="form-control" step="0.5">
                                                </td>
                                            @elseif (schema("attendance.type") == "Month")
                                                <td class="align-middle">
                                                    {{ date("F", mktime(0, 0, 0, $month)) }}
                                                </td>
                                                <td class="p-1">
                                                    <input type="number" name="days[{{ $ctr ?? "" }}]"
                                                           value="" placeholder=""
                                                           class="form-control" step="0.5">
                                                </td>
                                                @if ($month == 12)
                                                    @php($month = 0)
                                                @endif
                                            @endif
                                        </tr>
                                    @endfor
                                    </tbody>
                                </table>
                                <div class="form-group pull-right">
                                    <button class="btn btn-success" type="submit">
                                        <i class="la la-check-square"></i>
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

