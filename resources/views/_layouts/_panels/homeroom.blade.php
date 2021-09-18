<li class="navigation-header">
    <span>Homeroom</span>
    <i class="la la-ellipsis-h ft-minus" data-toggle="tooltip" data-placement="right"
       data-original-title="Homeroom"></i>
</li>
<li>
    @foreach($homerooms as $homeroom)
        <a href="#" class="menu-item"><i class="la la-files-o"></i>
            <span class="menu-title">Grade: {{ $homeroom->advisory }} @if($homeroom->section)
                    - {{ $homeroom->section }}@endif</span>
        </a>
        <ul class="menu-content">
            <li>
                <a href="{{ route("homeroom.show", [$homeroom->advisory, "section" => $homeroom->section]) }}" class="menu-item">
                    <span class="menu-title">Progress Reports</span>
                </a>
            </li>
            <li>
                <a class="menu-item" href="{{ route('homeroom.summary.show', [$homeroom->advisory, "section" => $homeroom->section]) }}">
                    <span class="menu-title">Subject Summary</span>
                </a>
            </li>
        </ul>
    @endforeach
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
