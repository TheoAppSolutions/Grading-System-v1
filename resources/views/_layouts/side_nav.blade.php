<ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
    <li>
        <a href="{{ route('home') }}"><i class="la la-tv"></i>
            <span>Dashboard</span>
        </a>
    </li>

    @php($roles = getRoles(auth()->id())) {{-- Get roles for the current login user --}}
    @php($break = false) {{-- Check if role has alread checked then break from the foreach loop if true --}}
    @foreach($roles as $role) {{-- Loop through all the roles --}}
    @switch($role->role_description)
        @case("Admin") {{-- Check if roles has a Admin --}}
        @include('_layouts._panels.admin')
        @include('_layouts._panels.office')
        @break;

        @case("Secretary") {{-- Check if any of the 3 roles is applied --}}
        @case("Registrar")
        @case("Principal")
        @include('_layouts._panels.office')
        @php($break = true)
        @break;
    @endswitch
    @if ($break)
        @break
    @endif
    @endforeach

    {{-- Check whether the user has a subject assigned --}}
    @if (auth()->id() != 1)
        @php($subjects = getSubjects(auth()->id()))
        @php($lastSubjectName = '')
        @php($lastGradeLevel = '')

        @if($subjects['has_subject'])
            @include('_layouts._panels.subjects')
        @endif
        @if(schema('student')->{"senior.high.school"} and $subjects['has_seniorhigh_subject'])
            @include('_layouts._panels.senior_high')
        @endif

        {{-- Check whether the user has a homeroom assigned --}}
        @php($homerooms = getHomeroom(Auth::id()))
        @if($homerooms != false)
            @include('_layouts._panels.homeroom')
        @endif
    @endif


    <li class="navigation-header">
        <span>Profile Panel</span>
        <i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"></i>
    </li>
    <li>
        <a href="{{ route('user.show', auth()->id()) }}" class="menu-item"><i class="la la-user"></i>
            <span class="menu-title">Profile</span>
        </a>
    </li>
    <li>
        <a href="{{ route('user.settings', auth()->id()) }}" class="menu-item"><i class="la la-cogs"></i>
            <span class="menu-title">Settings</span>
        </a>
    </li>
    <li>
        <a href="{{ route('logout') }}"><i class="la la-sign-out"></i>
            <span class="menu-title">Log Out</span>
        </a>
    </li>
</ul>

{{-- Script to fix the highlighted side menu link --}}
@push('js')
    <script>
        let href = location.protocol + '//' + location.host + location.pathname;
        let pathname = href.substr(-1) === "/" ? href.substr(0, href.length - 1) : href;
        let path = $("a[href='" + pathname + "']");
        path.parent().addClass('active open');//get the menu item
        path.parents('li').last().addClass('open'); //get the parent
    </script>
@endpush
