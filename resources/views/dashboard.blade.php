@extends('_layouts.main')

@section('content-title')
    Dashboard
@endsection

@push('css')
    <link rel="stylesheet" type="text/css"
          href="{{ url("/app-assets/css/core/menu/menu-types/vertical-menu-modern.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/css/core/colors/palette-callout.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ url("/app-assets/css/core/colors/palette-gradient.css") }}">
@endpush

@section('content-body')
    <section id="additional-content-alerts">
        <div class="row">
            @if(checkAdmin(Auth::id()))
                @include('dashboard.system_notice')
            @endif

            <div class="col-12">
                <div class="card box-shadow-0 border-primary">
                    <div class="card-header card-head-inverse bg-primary">
                        <h4 class="card-title text-white">Announcements</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            @isset($notifications["announcements"])
                                @foreach($notifications["announcements"] as $notif)
                                    @if ($notif['date_end'] >= date("Y-m-d"))
                                        <div class="alert alert-info alert-dismissible mb-2" role="alert">
                                            <h3 class="alert-heading mb-2 font-weight-bold">{{ $notif['title'] }}</h3>
                                            <p>{{ $notif['description'] }}</p>
                                            <br/>
                                            <b>From:
                                                @if (strpos($notif['from_user_id'], "ADMIN") !== false)
                                                    <span class="badge badge-pill badge-danger badge-square">
                                                        ADMINISTRATOR
                                                    </span></b>
                                            @else
                                                <span class="badge badge-pill badge-secondary badge-square">
                                                        {{ $notif['from_user_id'] }}
                                                    </span></b>
                                            @endif

                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="bs-callout-success callout-border-left mt-1 p-1">
                                    <strong>No Announcements</strong>
                                </div>
                            @endisset
                        </div>
                    </div>
                </div>

                @isset($notifications["system"])
                @endisset
            </div>

            <div class="col-lg-6 col-md-12">
                @isset($notifications["student"])
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Student Alerts</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">

                                </div>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($notifications["birthdays"])
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Upcoming Birthdays</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="row">
                                    @foreach($notifications["birthdays"] as $notif)
                                        <strong>{{ $notif['name'] }}</strong>
                                        <p>{{ $notif['birthdate'] }}
                                        </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endisset
            </div>
        </div>
    </section>
@endsection
