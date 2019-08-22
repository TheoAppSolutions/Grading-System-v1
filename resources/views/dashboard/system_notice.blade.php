@if((strpos(getSchoolYearNow(), date("Y")) === false ) or isset($notifications["system"]))
    <div class="col-lg-6 col-md-12">
        <div class="card box-shadow-0 border-danger">
            <div class="card-header card-head-inverse bg-danger">
                <h4 class="card-title text-white">System Announcements!</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    @if(strpos(getSchoolYearNow(), date("Y")) === false)
                        <div class="bs-callout-danger callout-border-left mt-1 p-1">
                            <strong>Warning!</strong>
                            <p> The Current Active School Year <code>{{ getSchoolYearNow() }}</code>
                                does not match with the Computer System Year <code>{{ date("Y") }}</code>.
                            </p>
                            <p class="mb-0">
                                @if (getSchoolYear(date("Y")))
                                    <button class="btn btn-success" onclick="schoolyear_action('{{ date("Y") }}', 'activate');">
                                        <i class="la la-lock"></i>
                                        Activate
                                    </button>
                                @else
                                    <button class="btn btn-info" onclick="schoolyear_create();">
                                        <i class="la la-plus-circle"></i>
                                        Create New School Year
                                    </button>
                                @endif

                                <a href="{{ route('schoolyear.index') }}" class="btn btn-primary">
                                    <i class="la la-edit"></i>
                                    Go to Settings
                                </a>
                            </p>
                        </div>
                    @endif

                    @isset($notifications["system"]["email"])
                        <div class="bs-callout-danger callout-border-left mt-1 p-1">
                            <strong>Warning!</strong>
                            <p>User Email Address is blank. Please consider adding Email
                                Address.</p>

                            <p class="mb-0">
                                <a href="{{ route("user.show", Auth::id()) }}"
                                   class="btn btn-success"
                                   disabled>
                                    <i class="la la-chain"></i>
                                    Change
                                </a>
                            </p>
                        </div>
                    @endisset

                    @isset($notifications["system"]["password"])
                        <div class="bs-callout-danger callout-border-left mt-1 p-1">
                            <strong>Warning!</strong>
                            <p>User Password is still the default password. Please consider changing
                                User Password.</p>

                            <p class="mb-0">
                                <a href="{{ route("user.settings", Auth::id()) }}"
                                   class="btn btn-success"
                                   disabled>
                                    <i class="la la-chain"></i>
                                    Change
                                </a>
                            </p>
                        </div>
                    @endisset
                </div>
            </div>
        </div>
    </div>
@endif