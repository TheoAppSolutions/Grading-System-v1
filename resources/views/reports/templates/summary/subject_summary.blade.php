<html>

<head>
    <meta http-equiv=Content-Type content="text/html; charset=UTF-8">
    <title>Summary {{ $subject->subject_id }}</title>

    <style>
        .blank {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            vertical-align: bottom;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .data {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            vertical-align: bottom;
            border-top: 1pt solid windowtext;
            border-right: none;
            border-bottom: 1pt solid windowtext;
            border-left: 1pt solid windowtext;
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
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            vertical-align: bottom;
            border-top: 1pt solid windowtext;
            border-right: 1pt solid black;
            border-bottom: 1pt solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
            text-align: center;
        }

        .grade {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            vertical-align: bottom;
            border-top: 1pt solid windowtext;
            border-right: none;
            border-bottom: 1pt solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
            text-align: center;
        }

        .label {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            border-top: 1pt solid windowtext;
            border-right: 1pt solid windowtext;
            border-bottom: none;
            border-left: 1pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .quarter {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            border-top: 1pt solid windowtext;
            border-right: none;
            border-bottom: 1pt solid windowtext;
            border-left: 1pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }
    </style>
</head>

<body>
<div align="center" style="padding-top: 10pt;">
    <h1>{{ $subject->subjectname . ' - ' . $subject->gradelevel .' (S.Y. '. getSchoolYear() .')' }}</h1>

    <table border="0" cellpadding="0" cellspacing="0" width="361"
           style="border-collapse: collapse;table-layout:fixed;width:271pt">
        <col class="blank" width="15" style="mso-width-source:userset;mso-width-alt: 548;width:20pt">
        <col width="150" style="mso-width-source:userset;mso-width-alt:4937;width:200pt">
        <col class="blank" width="30" style="mso-width-source:userset;mso-width-alt: 1097;width:23pt">
        <col class="blank" width="20" style="mso-width-source:userset;mso-width-alt: 548;width:23pt">
        <col class="blank" width="30" style="mso-width-source:userset;mso-width-alt: 1097;width:23pt">
        <col class="blank" width="20" style="mso-width-source:userset;mso-width-alt: 548;width:23pt">
        <col class="blank" width="30" style="mso-width-source:userset;mso-width-alt: 1097;width:23pt">
        <col class="blank" width="20" style="mso-width-source:userset;mso-width-alt: 548;width:23pt">
        <col class="blank" width="30" style="mso-width-source:userset;mso-width-alt: 1097;width:23pt">
        <col class="blank" width="20" style="mso-width-source:userset;mso-width-alt: 548;width:23pt">
        <col class="blank" width="30" style="mso-width-source:userset;mso-width-alt: 1097;width:23pt">
        <col class="blank" width="20" style="mso-width-source:userset;mso-width-alt: 548;width:23pt">
        <col class="blank" width="15" style="mso-width-source:userset;mso-width-alt: 548;width:300pt">
        <tr style="height:15.0pt">
            <td colspan=1 rowspan=2 height=40 class=label width=135
                style="border-bottom:1pt solid black; height:30.0pt;width:101pt">
            </td>
            <td colspan=1 rowspan=2 height=40 class=label width=135
                style="border-bottom:1pt solid black; height:30.0pt;width:101pt">Name
            </td>
            <td colspan=8 rowspan=1 class=label width=181 style="border-left:none;width:136pt">Term</td>
            <td colspan=2 rowspan=2 class=label width=45
                style="border-right:1pt solid black; border-bottom:1pt solid black;width:34pt">Final<br>Ave.
            </td>
            <td colspan=1 rowspan=2 class=label width=45
                style="border-right:1pt solid black; border-bottom:1pt solid black;width:34pt">Comments / Remarks /
                Changes
            </td>
        </tr>
        <tr style="height:15.0pt">
            <td colspan="2" class="quarter" style="border-right:1pt solid black;">1</td>
            <td colspan="2" class="quarter" style="border-right:1pt solid black;">2</td>
            <td colspan="2" class="quarter" style="border-right:1pt solid black;">3</td>
            <td colspan="2" class="quarter" style="border-right:1pt solid black;">4</td>
        </tr>
        @foreach($students as $student)
            @php($ctr = $loop->index + 1)
            <tr style="height:15.0pt">
                <td colspan="1" class="data" style="text-align: center">{{ $ctr }}</td>
                <td colspan="1" class="data"
                    style="border-right: 1pt solid black">{{ $student->lastname . ', ' . $student->firstname }}</td>
                @for($quarter = 1; $quarter <= 5; $quarter++)
                    @php($final = isset($grade[$student->student_id][$quarter]['final'])?$grade[$student->student_id][$quarter]['final']:'')
                    @php($effort = isset($grade[$student->student_id][$quarter]['effort'])?$grade[$student->student_id][$quarter]['effort']:'')
                    @php($color='')
                    @if($final>0)
                        @if($final < 60)
                            @php($color="background-color:#ff7276")
                        @elseif($final < 70)
                            @php($color="background-color:#ffef84")
                        @endif
                    @endif
                    <td colspan=1 style="{!! $color !!}"
                        class=grade>{{ $grade[$student->student_id][$quarter]['final'] ?? '' }}</td>
                    <td colspan=1 style="{!! $color !!}"
                        class=effort>{{ $grade[$student->student_id][$quarter]['effort'] ?? '' }}</td>
                @endfor
                <td colspan=1 class="blank" style='border:1pt solid black;'>
                    &nbsp;
                </td>
            </tr>
        @endforeach
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="11">&nbsp;</td>
            <td colspan="2" align="center"
                style="font-size: 20px;font-weight: bold;">{{ $teacher->title }} {{ $teacher->firstname }} {{ $teacher->lastname }}</td>
        </tr>
        <tr>
            <td colspan="11">&nbsp;</td>
            <td colspan="2" align="center" style="font-size: 20px;">Subject Teacher</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
    </table>
</div>
</body>
</html>
