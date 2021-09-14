<html>
<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>{{ $student->lastname . ', ' . $student->firstname }} {{ $student->suffix ?? "" }} (MidQuarter)</title>
    <link href="{{ url('ReportCard.css') }}" rel="stylesheet">

</head>
<body>
<div align=center>
    <table border=0 cellpadding=0 cellspacing=0 width=1174
           style='border-collapse:collapse;width:880pt'>
        <col width=24 span=46 style='mso-width-source:userset;mso-width-alt:877;width:18pt'>
        <col width=23 span=2 style='mso-width-source:userset;mso-width-alt:841;width:17pt'>
        <col width=24 style='mso-width-source:userset;mso-width-alt:877;width:18pt'>
        <tr style='mso-height-source:userset;height:15.0pt'>
            <td colspan=2 height=20 class=labels width=48 style='height:15.0pt;width:36pt'>NAME:</td>
            <td colspan=15 class=info width=360
                style='width:270pt'>{{ $student->lastname . ', ' . $student->firstname }} {{ $student->suffix ?? "" }}</td>
            <td class=blank width=24 style='width:18pt'></td>
            <td colspan=3 class=labels width=72 style='width:54pt'>GENDER:</td>
            <td class=info width=24 style='width:18pt'>{{ $student->gender ?? '' }}</td>
            <td class=blank width=24 style='width:18pt'></td>
            <td colspan=3 class=labels width=72 style='width:54pt'>GRADE:</td>
            <td colspan={{ $student->section!='' ?'5' : '3' }} class=info>
                {{ ordinal($student->gradelevel) }} {{ $student->section!='' ? ' - ' . $student->section : '' }}
            </td>

            <td class=blank width=24 style='width:18pt'></td>
            <td colspan=3 class=labels width=71 style='width:53pt'>QUARTER:</td>
            <td class=blank width=24 style='width:18pt'></td>
            <td class=info width=23 style='width:17pt'>
                @if ($student->gradelevel >= 11 and $student->gradelevel <= 12)
                    @if ($quarter == 1 or $quarter == 3)
                        Midterm
                    @elseif ($quarter == 2 or $quarter == 4)
                        Finals
                    @endif
                @else
                    {{ $quarter ?? '' }}
                @endif
            </td>
            <td class=blank width=24 style='width:18pt'></td>
        </tr>

        @yield('content')

    </table>
</div>
</body>
</html>
