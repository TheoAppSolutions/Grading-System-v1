@extends('_layouts.main')

@section('content-title')
    School Year
@endsection

@section('content-body')
    <section class="row">
        <div class="col-lg-8 col-md-12">
            <div class="card border-info">
                <div class="card-head">
                    <div class="card-header">
                        <button class="btn btn-primary btn-md" onclick="schoolyear_create();">
                            <i class="ft-plus white"></i> Add New School Year
                        </button>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-body pt-0">
                        <div class="table-responsive">
                            <table class="table table-white-space table-bordered row-grouping display no-wrap table-middle">
                                <thead>
                                <tr>
                                    <th>School Year</th>
                                    <th>Month Start</th>
                                    <th></th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($schoolyears as $schoolyear)
                                    <tr>
                                        <td>
                                            {{ $schoolyear->schoolyear }}
                                        </td>
                                        <td>
                                            {{ date("F", mktime(0, 0, 0, $schoolyear->schoolyear_start)) }}
                                        </td>
                                        <td>
                                            @if($schoolyear->active)
                                                <button class="btn btn-default disabled"
                                                        style="background-color: #1ABB9C; color: white">
                                                    Currently Active
                                                </button>
                                            @else
                                                <button class="btn btn-default"
                                                        onclick="schoolyear_action('{{ $schoolyear->schoolyear }}', 'activate');">
                                                    Activate
                                                </button>
                                            @endif
                                            <a href="{{ route('schoolyear.show', $schoolyear->schoolyear) }}"
                                               class="btn btn-primary"
                                               onclick="">
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th>School Year</th>
                                    <th>Month Start</th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push("js")
    <script>
        /*function update_start_month(schoolyear, month) {
            $.ajax({
                url: '/admin/schoolyear/month',
                type: 'POST',
                data: {
                    "schoolyear": schoolyear,
                    "month": month,
                    "_token": token
                },
                success: function () {
                }
            });
        }*/
    </script>
@endpush