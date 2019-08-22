<li class="navigation-header">
    <span>Office Panel</span>
    <i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
       data-original-title="Subjects"></i>
</li>
<li>
    <a href="#" class="menu-item"><i class="la la-users"></i>
        <span class="menu-title">Students</span>
    </a>
    <ul class="menu-content">
        <li>
            <a class="menu-item" href="{{ route('student.index') }}">Student List</a>
        </li>
        <li>
            <a class="menu-item" href="{{ route('student.create') }}">Enroll New Student</a>
        </li>
    </ul>
</li>
<li>
    <a href="#" class="menu-item"><i class="la la-book"></i>
        <span class="menu-title">Subjects</span>
    </a>
    <ul class="menu-content">
        <li>
            <a class="menu-item" href="{{ route('subject.index') }}">Subject List</a>
        </li>
        <li>
            <a class="menu-item" href="{{ route('subject.create') }}">New Subject</a>
        </li>
    </ul>
</li>
<li>
    <a href="#" class="menu-item"><i class="la la-files-o"></i>
        <span class="menu-title">Reports</span>
    </a>
    @if (settings("report_enabled") or checkAdmin(auth()->id()))
        <ul class="menu-content">
            <li>
                <a class="menu-item" href="{{ route('homeroom.index') }}">Progress Reports</a>
            </li>
            <li>
                <a class="menu-item" href="{{ route('homeroom.summary.index') }}">
                    <span class="menu-title">Subject Summary</span>
                </a>
            </li>
        </ul>
    @else
        <ul class="menu-content">
            <li>
                <strong>Reports disabled by Administrator</strong>
            </li>
        </ul>
    @endif
</li>

<li>
    <a href="{{ route('office.settings') }}"><i class="la la-calendar-check-o"></i>
        <span class="menu-title">School Year Settings</span>
    </a>
</li>

<li>
    <a href="{{ route('announcement.index') }}"><i class="la la-bullhorn"></i>
        <span class="menu-title">Announcement Settings</span>
    </a>
</li>