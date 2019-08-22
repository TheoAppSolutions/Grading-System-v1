<li class="navigation-header">
    <span>Admin Panel</span>
    <i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
       data-original-title="Subjects"></i>
</li>
<li>
    <a href="#" class="menu-item"><i class="la la-user"></i>
        <span class="menu-title">User Accounts</span>
    </a>
    <ul class="menu-content">
        <li>
            <a class="menu-item" href="{{ route('user.index') }}">Account List</a>
        </li>
        <li>
            <a class="menu-item" href="{{ route('user.create') }}">New Account</a>
        </li>
        <li>
            <a class="menu-item" href="{{ route('user.roles') }}">Account Roles</a>
        </li>
    </ul>
</li>

<li>
    <a href="#" class="menu-item"><i class="la la-eye"></i>
        <span class="menu-title">System Settings</span>
    </a>
    <ul class="menu-content">
        <li>
            <a href="{{ route('schoolyear.index') }}">
                <span class="menu-title">School Year</span>
            </a>
        </li>
        {{--<li>
            <a href="{{ route("admin.schema_setup") }}">
                <span class="menu-title">Comments</span>
            </a>
        </li>
        <li>
            <a href="{{ route("admin.schema_setup") }}">
                <span class="menu-title">Schema</span>
            </a>
        </li>
        <li>
            <a href="{{ route("admin.grading_setup") }}">
                <span class="menu-title">Grading</span>
            </a>
        </li>--}}
        {{--<li>
            <a href="{{ route('admin.database') }}">
                <span class="menu-title">Database Backup</span>
            </a>
        </li>--}}
        <li>
            <a href="{{ route('admin.system_settings') }}">
                <span class="menu-title">System</span>
            </a>
        </li>
    </ul>
</li>
<li class="disabled">
    <a href="#"><i class="la la-eye-slash"></i>
        <span class="menu-title">Documentation</span>
    </a>
</li>