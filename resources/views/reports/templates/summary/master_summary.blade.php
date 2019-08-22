<html>
<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>Master Summary {{ $gradelevel }}</title>
    <style>
        .blank {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .name {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            border: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .id {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: right;
            vertical-align: middle;
            border: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .effort {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 8.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: bottom;
            border-top: .5pt solid windowtext;
            border-right: .5pt solid windowtext;
            border-bottom: .5pt solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .grade {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: right;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: .5pt solid windowtext;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .label {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 9.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            border: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
            word-wrap: break-word;
        }
    </style>
</head>

<body>
<div align=center>

    <table border=0 cellpadding=0 cellspacing=0 width=1310 class=blank
           style='border-collapse:collapse;table-layout:fixed;width:994pt'>
        <col class=blank width=30 style='mso-width-source:userset;mso-width-alt:
 1097;width:23pt'>
        <col class=blank width=250 style='mso-width-source:userset;mso-width-alt:
 9142;width:188pt'>
        @foreach($subjects as $subject)
            <col class=blank width=50 style='mso-width-source:userset;mso-width-alt: 1792;width:45pt'>
            <col class=blank width=40 style='mso-width-source:userset;mso-width-alt: 1097;width:20pt'>
        @endforeach

        <tr style='mso-height-source:userset;height:15.0pt'>
            <td height=20 class=blank width=30 style='height:15.0pt;width:23pt'></td>
            <td class=blank width=250 style='width:188pt'>Grade: {{ $gradelevel ?? '' }}
                Quarter: {{ $quarter }}
                ({{ getSchoolYear() }})
            </td>
            <td class=label colspan="2">LEGEND:</td>
            <td class=label colspan="3" style="background-color:#ff7276;">RED (< 75)</td>
            <td class=label colspan="3" style="background-color:#ffef84;">YELLOW (< 80)</td>
        </tr>

        <tr style='mso-height-source:userset;height:15.0pt'>
            <td height=20 class=label>#</td>
            <td class=label>Name</td>
            @foreach($subjects as $subject)
                <td class=label colspan="2">{{ substr($subject->subjectname,0,10) }}</td>
            @endforeach
        </tr>

        @php($count = 0)
        @foreach($students as $student)
            @php($count = $loop->index + 1)
            <tr style='mso-height-source:userset;height:15.0pt'>
                <td height=20 class=id style='height:15.0pt;'>{{ $count }}</td>
                <td class=name>&nbsp;{{ $student->lastname . ', ' . $student->firstname }}</td>
                @foreach($subjects as $subject)
                    @php($final = isset($grades["$student->student_id"]["$subject->subjectname"][$quarter]["final"])?$grades["$student->student_id"]["$subject->subjectname"][$quarter]["final"]:'')
                    @php($effort = isset($grades["$student->student_id"]["$subject->subjectname"][$quarter]["effort"])?$grades["$student->student_id"]["$subject->subjectname"][$quarter]["effort"]:'')
                    @php($color='')
                    @if($final > 0)
                        @if($final < 75)
                            @php($color="background-color:#ff7276")
                        @elseif($final < 80)
                            @php($color="background-color:#ffef84")
                        @endif
                    @endif

                    <td class=grade style="{!! $color !!}">{{ $final }}</td>
                    <td class=effort style="{!! $color !!}">{{ $effort }}</td>
                @endforeach
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>

