<li class="navigation-header">
    <span>Homeroom</span>
    <i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
       data-original-title="Homeroom"></i>
</li>
<li>
    <a href="#" class="menu-item"><i class="la la-files-o"></i>
        <span class="menu-title">Progress Reports</span>
    </a>
    <ul class="menu-content">
        @foreach($homerooms as $homeroom)
            <li>
                <a href="{{ route("homeroom.show", $homeroom->advisory) }}" class="menu-item">
                    <span class="menu-title">Grade: {{ $homeroom->advisory }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</li>
<li>
    <a href="#" class="menu-item"><i class="la la-files-o"></i>
        <span class="menu-title">Subject Summary</span>
    </a>
    <ul class="menu-content">
        @foreach($homerooms as $homeroom)
            <li>
                <a class="menu-item" href="{{ route('homeroom.summary.show', $homeroom->advisory) }}">
                    <span class="menu-title">Grade: {{ $homeroom->advisory }}</span>
                </a>
            </li>
        @endforeach
    </ul>
</li>
{{--<li>
    <a href="#" class="menu-item"><i class="la la-envelope"></i>
        <span class="menu-title">Student Reports</span>
    </a>
</li>
<li>
    <a href="#" class="menu-item"><i class="la la-envelope"></i>
        <span class="menu-title">Subject Summary</span>
    </a>
</li>--}}