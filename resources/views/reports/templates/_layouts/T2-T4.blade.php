<html>
<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>Quarter Report Card</title>

    <link href="{{ url('ReportCard.css') }}" rel="stylesheet">
</head>
<body>
<div>
    <table class=blank
           style='border-collapse:collapse;table-layout:fixed;width:685pt'>
        <col class=blank span=7 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=2 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=2 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=2 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=3 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=3 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=7 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=3 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=2 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=5 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=5 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=2 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>
        <col class=blank span=9 style='mso-width-source:userset;mso-width-alt:512;width:11pt'>

        <tr style='mso-height-source:userset;height:15.0pt'>
            <td colspan="22" height="60" rowspan="4" style="text-align: right">
                <img src="{{ system_logo() }}" style="height: 60.0pt;"/>
            </td>
            <td colspan=41 height=20 class=heavylabel width=882 style='height:15.0pt;width:693pt;; text-align: left; padding-left: 0px;'>
                BETHEL INTERNATIONAL SCHOOL
            </td>
        </tr>
        <tr style='mso-height-source:userset;height:15.0pt'>
            <td colspan=41 height=20 class=lightlabel style='height:15.0pt; text-align: left; padding-left: 50px;'>PAWING, PALO, LEYTE</td>
        </tr>
        <tr style='mso-height-source:userset;height:15.0pt'>
            <td colspan=41 height=20 class=lightlabel style='height:15.0pt; text-align: left; padding-left: 90px;'>Philippines</td>
        </tr>
        <tr style='mso-height-source:userset;height:15.0pt'>
            <td colspan=41 height=20 class=heavylabel style='height:15.0pt'></td>
        </tr>
        <tr style='mso-height-source:userset;height:15.0pt'>
            <td colspan=63 height=20 class=heavylabel style='height:15.0pt'>REPORT CARD</td>
        </tr>
        <tr style='mso-height-source:userset;height:15.0pt'>
            <td colspan=63 height=20 class=heavylabel style='height:15.0pt'>School Year
                {{ getSchoolYear() }}
            </td>
        </tr>

        @if(isset($semester) and $semester != '' and $student->gradelevel >= 11 and $student->gradelevel <= 12)
            <tr style='mso-height-source:userset;height:13.5pt'>
                <td height=20 class=blank style='height:13.5pt'></td>
            </tr>
            <tr style='mso-height-source:userset;height:15.0pt'>
                <td colspan=63 height=20 class=heavylabel style='height:15.0pt'>{{ 'Semester ' . $semester }}</td>
            </tr>
        @endif

        <tr style='mso-height-source:userset;height:15.0pt'>
            <td colspan=63 height=20 class=blank style='height:15.0pt'></td>
        </tr>
        <tr style='mso-height-source:userset;height:18.75pt'>
            <td colspan=4 height=25 class=labels style='height:18.75pt'>NAME:</td>
            <td colspan=20 class=info style="{{ strlen($student->lastname . ', ' . $student->firstname) >= 30 ? "font-size:13px" : "" }}">
                {{ $student->lastname . ', ' . $student->firstname }} {{ $student->suffix ?? "" }}
            </td>
            <td class=blank></td>
            <td colspan=3 class=labels>LRN:</td>
            <td colspan=10 class=info>{{ $student->student_lrn ?? '' }}</td>
            <td class=blank></td>
            <td colspan=6 class=labels>GENDER:</td>
            <td colspan=2 class=info>{{ $student->gender }}</td>
            <td class=blank></td>
            <td colspan=5 class=labels>GRADE:</td>
            <td colspan={{ $student->section!='' ?'8' : '3' }} class=info>{{ ordinal($student->gradelevel) }} {{ $student->section_or_strand !='' ? ' - ' . $student->section_or_strand : '' }}</td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;height:13.5pt'>
            <td height=20 class=blank style='height:13.5pt'></td>
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

        @if ($type == "award")
            @include('reports.templates._partials.footer_award')
        @else
            @include('reports.templates._partials.footer_quarter')
        @endif

    </table>
</div>
</body>
</html>
