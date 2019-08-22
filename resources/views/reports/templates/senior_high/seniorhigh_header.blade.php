<html>
<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>{{ $student->lastname . ', ' . $student->firstname }} (MidQuarter)</title>
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
                style='width:270pt'>{{ $student->lastname . ', ' . $student->firstname }}</td>
            <td class=blank width=24 style='width:18pt'></td>
            <td colspan=3 class=labels width=72 style='width:54pt'>GENDER:</td>
            <td class=info width=24 style='width:18pt'>{{ $student->gender ?? '' }}</td>
            <td class=blank width=24 style='width:18pt'></td>
            <td colspan=3 class=labels width=72 style='width:54pt'>GRADE:</td>
            <td colspan={{ $student->section!='' ?'5' : '3' }} class=info>
                {{ ordinal($student->gradelevel) }} {{ $student->section!='' ? ' - ' . $student->section : '' }}
            </td>

            <td class=blank width=24 style='width:18pt'></td>
            <td colspan=3 class=labels width=71 style='width:53pt'>SEMESTER:</td>
            <td class=blank width=24 style='width:18pt'></td>
            <td class=info width=23 style='width:17pt'>{{ $semester ?? '' }}</td>
            <td class=blank width=24 style='width:18pt'></td>
        </tr>
        <tr style='mso-height-source:userset;height:15.0pt'>
            <td height=20 class=blank style='height:15.0pt'></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>

        @yield('content')

        <tr style='mso-height-source:userset;height:15.0pt'>
            <td height=20 class=blank style='height:15.0pt'></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        @include('reports.templates.senior_high.seniorhigh_footer')
    </table>
</div>
</body>
</html>