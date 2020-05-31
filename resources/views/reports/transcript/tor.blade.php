<html>

<head>
    <title>TOR</title>
    <style>
        table {
            mso-displayed-decimal-separator: "\.";
            mso-displayed-thousand-separator: "\,";
        }

        .blank {
            border: none;
        }

        .header {
            padding: 0;
            mso-ignore: padding;
            color: windowtext;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .header__phone {
            color: #002060;
            font-size: 9.0pt;
            font-family: Calibri, sans-serif;
        }

        .header__moto {
            color: #002060;
            font-size: 20.0pt;
            font-weight: 700;
            font-family: Mistral, cursive;
        }

        .header__school_name {
            font-size: 14.0pt;
            font-family: "Copperplate Gothic Bold", sans-serif;
        }

        .header__address {
            font-size: 10.0pt;
            font-family: Arial, sans-serif;
        }

        .header__tor_label {
            font-size: 22px;
            font-weight: 700;
            font-family: "Berlin Sans FB Demi", sans-serif;
            font-style: italic;
        }

        .student_details {
            padding: 0;
            mso-ignore: padding;
            color: windowtext;
            font-size: 12px;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            border-top: none;
            border-right: none;
            border-bottom: 2px solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .student_label {
            padding: 0;
            mso-ignore: padding;
            color: windowtext;
            font-size: 12px;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .grades__blank {
            padding: 0;
            mso-ignore: padding;
            color: windowtext;
            font-size: 7.0pt;
            font-weight: 400;
            font-style: italic;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .grades__subject {
            padding: 5px 10px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 12px;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            border: 1px solid #000000;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .grades__label {
            padding: 5px 2px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 12px;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Calibri, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            border: 1px solid #000000;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .grades__final {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12px;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #000000;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .grades__table {
            border-collapse: collapse;
            border: 1px;
        }

        .grades__average_value {
            padding: 0;
            mso-ignore: padding;
            color: windowtext;
            font-size: 12px;
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

        .grades__average_label {
            padding: 0;
            mso-ignore: padding;
            color: windowtext;
            font-size: 12px;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: right;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        /*.center {
            margin: auto;
        // width: 50 %;
        // border: 3 px solid green;
        // padding: 10 px;
        }*/
    </style>
</head>

<body>
<div class="center">
    <img src="{{ url('images/logo.png') }}" alt="" style="height: 100px; width: 80px; position: absolute; left: 50px;">

    <table class=blank style='border-collapse:collapse;table-layout:fixed;'>
        <col class="blank" span=4 style='mso-width-source:userset;
 mso-width-alt:731;width:15pt'>
        <col class="blank" span=8 style='mso-width-source:userset;
 mso-width-alt:731;width:15pt'>
        <col class="blank" span=2 style='mso-width-source:userset;
 mso-width-alt:731;width:15pt'>
        <col class="blank" span=2 style='mso-width-source:userset;
 mso-width-alt:731;width:15pt'>
        <col class="blank" span=2 style='mso-width-source:userset;
 mso-width-alt:731;width:15pt'>
        <col class="blank" style='mso-width-source:userset;mso-width-alt:
 731;width:15pt'>
        <col class="blank" style='mso-width-source:userset;mso-width-alt:
 731;width:15pt'>
        <col class="blank" span=2 style='mso-width-source:userset;
 mso-width-alt:731;width:15pt'>
        <col class="blank" style='mso-width-source:userset;mso-width-alt:
 731;width:15pt'>
        <col class="blank" span=3 style='mso-width-source:userset;
 mso-width-alt:731;width:15pt'>
        <col class="blank" style='mso-width-source:userset;mso-width-alt:
 731;width:15pt'>
        <col class="blank" style='mso-width-source:userset;mso-width-alt:
 731;width:15pt'>
        <col class="blank" span=11 style='mso-width-source:userset;
 mso-width-alt:731;width:15pt'>
        <col class="blank" style='mso-width-source:userset;mso-width-alt:
 731;width:15pt'>
        <col class="blank" style='width:48pt'>

        <tr>
            <td colspan="38" height="28" class="header header__school_name">HIGHLANDS CHRISTIAN GRAMMAR SCHOOL</td>
        </tr>
        <tr>
            <td colspan="38" class="header header__address" style='width:555pt'>P.O. Box 1582</td>
        </tr>
        <tr>
            <td colspan="38" class="header header__address">Mt. Hagen, WHP 281 Papua New Guinea</td>
        </tr>
        <tr>
            <td height="14" class="blank"></td>
        </tr>
        <tr>
            <td colspan="38" class="header header__moto">A Christian Learning Community</td>
        </tr>
        <tr>
            <td colspan="38" class="header header__phone">Phone / Fax: (675) 7630 2494</td>
        </tr>
        <tr>
            <td height="14" class="blank"></td>
        </tr>

        <tr>
            <td height="14" class="blank"></td>
        </tr>
        <tr>
            <td height="14" class="blank"></td>
            <td colspan="8" class="student_details">{{ $student->lastname }}</td>
            <td colspan="8" class="student_details">{{ $student->firstname }}</td>
            <td colspan="5" class="student_details">{{ $student->middlename }}</td>
            <td colspan="3" class="student_details">{{ $student->suffix }}</td>
            <td colspan="6" class="student_details">{{ $student->citizenship ?? '' }}</td>
            <td colspan="6" class="student_details">{{ $student->student_id }}</td>
            <td height="14" class="blank"></td>
        </tr>
        <tr>
            <td height="14" class="blank"></td>
            <td colspan="8" class="student_label">Family Name</td>
            <td colspan="8" class="student_label">First Name</td>
            <td colspan="5" class="student_label">Middle</td>
            <td colspan="3" class="student_label">Suffix</td>
            <td colspan="6" class="student_label">Citizenship</td>
            <td colspan="6" class="student_label">Student ID</td>
            <td height="14" class="blank"></td>
        </tr>

        <tr>
            <td height="14" class="blank"></td>
        </tr>

        <tr>
            <td height="14" class="blank"></td>
            <td colspan="5" class="student_details">{{ $student->gender == "M" ? "MALE" : "FEMALE" }}</td>
            <td colspan="6" class="student_details">{{ $student->birthdate ?? '' }}</td>
            <td colspan="15" class="student_details">{{ $student->address ?? '' }}</td>
            <td colspan="10" class="student_details">{{ array_key_first($schoolyears) ?? '' }}</td>
            <td height="14" class="blank"></td>
        </tr>

        <tr>
            <td height="14" class="blank"></td>
            <td colspan="5" class="student_label">Gender</td>
            <td colspan="6" class="student_label">Date of Birth</td>
            <td colspan="15" class="student_label">Address</td>
            <td colspan="10" class="student_label">Date of Entrance</td>
            <td height="14" class="blank"></td>
        </tr>

        <tr>
            <td height="14" class="blank"></td>
        </tr>

        <tr>
            <td height="14" class="blank"></td>
        </tr>

        <tr>
            <td height="14" class="blank"></td>
            <td colspan="36" class="header header__tor_label">Official Academic Transcript</td>
            <td height="14" class="blank"></td>
        </tr>

        <tr>
            <td height="14" class="blank"></td>
        </tr>

        @php($ctr = 1)
        @foreach($schoolyears as $schoolyear => $grades)
            @if($ctr==1)
                {!! "<tr>" !!}
                <td height="14" class="grades__blank"></td>
            @endif

            <td colspan="18">
                <table class="grades__table">
                    <tr>
                        <td height="14" class="grades__blank"></td>
                        <td class="grades__blank"></td>
                        <td class="grades__blank"></td>
                        <td class="grades__blank"></td>
                        <td class="grades__blank"></td>
                        <td colspan="3" class="grades__label">Year Level:</td>
                        <td colspan="3" class="grades__label">
                            {{ $grades['gradelevel'] ?? '' }}</td>
                        <td colspan="3" class="grades__label">School Year:</td>
                        <td colspan="3" class="grades__label">{{ $schoolyear }}
                        </td>
                    </tr>
                    <tr>
                        <td height="14" class="grades__blank"></td>
                        <td colspan="4" rowspan="2" class="grades__label">SUBJECTS</td>
                        <td colspan="3" rowspan="2" class="grades__label">Semester<br>1</td>
                        <td colspan="3" rowspan="2" class="grades__label">Semester<br>2</td>
                        <td colspan="3" rowspan="2" class="grades__label">FINAL<br>GRADE</td>
                        <td colspan="3" rowspan="2" class="grades__label">LETTER<br>GRADE</td>
                        <td colspan="2" rowspan="2" class="grades__label">UNITS</td>
                    </tr>
                    <tr>
                        <td height="14" class="grades__blank"></td>
                    </tr>

                    @foreach($subjects[$grades['gradelevel']] as $subject)
                        @if(isset($grades[$subject->subjectname][1]["final"]) or isset($grades[$subject->subjectname][2]["final"]) or isset($grades[$subject->subjectname][3]["final"]) or isset($grades[$subject->subjectname][4]["final"]))
                            <tr>
                                <td height="14" class="grades__blank"></td>
                                <td colspan="4" class="grades__subject">{{ $subject->subjectname }}</td>
                                @if(isset($grades[$subject->subjectname][1]["final"]) and isset($grades[$subject->subjectname][2]["final"]))
                                    <td colspan="3"
                                        class="grades__final">{{ average($grades[$subject->subjectname][1]["final"], $grades[$subject->subjectname][2]["final"]) }}</td>
                                @else
                                    <td colspan="3" class="grades__final"></td>
                                @endif

                                @if(isset($grades[$subject->subjectname][3]["final"]) and isset($grades[$subject->subjectname][4]["final"]))
                                    <td colspan="3"
                                        class="grades__final">{{ average($grades[$subject->subjectname][3]["final"], $grades[$subject->subjectname][4]["final"]) }}</td>
                                @else
                                    <td colspan="3" class="grades__final"></td>
                                @endif

                                <td colspan="3"
                                    class="grades__final">{{ $grades[$subject->subjectname][5]["final"] ?? "" }}</td>
                                <td colspan="3" class="grades__final">
                                    @isset($grades[$subject->subjectname][5]["final"])
                                        {{ letterGrade($grades[$subject->subjectname][5]["final"]) }}
                                    @endisset
                                </td>
                                <td colspan="2"
                                    class="grades__final">{{ $grades[$subject->subjectname]["unit"] ?? "" }}</td>
                            </tr>
                        @endif
                    @endforeach

                    <tr>
                        <td height="14" class=grades__blank></td>
                    </tr>
                    <tr>
                        <td height="14" class="grades__blank"></td>
                        <td colspan="10" class="grades__average_label">Weighted General Average:</td>
                        <td colspan="3" class="grades__average_value">{{ $grades['generalaverage'] ?? "" }}</td>
                        <td colspan="3" class="grades__average_value">?</td>
                    </tr>
                    <tr>
                        <td height="14" class="grades__blank"></td>
                        <td colspan="10" class="grades__average_label">Weighted GPA:</td>
                        <td colspan="3" class="grades__average_value">?</td>
                    </tr>
                    <tr>
                        <td height="14" class="grades__blank"></td>
                        <td colspan="10" class="grades__average_label">Total Units:</td>
                        <td colspan="3" class="grades__average_value">{{ $grades['totalunits'] ?? "" }}</td>
                    </tr>
                    <tr>
                        <td height="14" class="grades__blank"></td>
                        <td colspan="10" class="grades__average_label">Remarks:</td>
                        <td colspan="3" class="grades__average_value">{{ $grades['generalremarks'] ?? "" }}</td>
                    </tr>
                </table>
            </td>

            @if($ctr==1)
                <td class="grades__blank"></td>
                <td class="grades__blank"></td>
            @endif

            @if($ctr==2)
                {!! "</tr>" !!}
                <tr>
                    <td height="14" class=grades__blank></td>
                </tr>
                @php($ctr = 0)
            @endif
            @php($ctr += 1)
        @endforeach

        <tr style='mso-height-source:userset;height:18.75pt'>
            <td colspan=12 class=sidenotetitle>LETTER GRADE POINTS</td>
        </tr>

        <tr style='mso-height-source:userset;height:19.5pt;'>
            <td colspan=2 class=blank>A+</td>
            <td colspan=5 class=blank>97 - 100</td>
            <td colspan=2 class=blank>C+</td>
            <td colspan=6 class=blank>77 - 79.99</td>
        </tr>

        <tr class=blank style='mso-height-source:userset;height:19.5pt'>
            <td colspan=2 class=blank>A</td>
            <td colspan=5 class=blank>93 - 96.99</td>
            <td colspan=2 class=blank>C</td>
            <td colspan=6 class=blank>73 - 76.99</td>
        </tr>

        <tr class=blank style='mso-height-source:userset;height:19.5pt'>
            <td colspan=2 class=blank>A-</td>
            <td colspan=5 class=blank>90 - 92.99</td>
            <td colspan=2 class=blank>C-</td>
            <td colspan=6 class=blank>70 - 72.99</td>
        </tr>

        <tr class=blank style='mso-height-source:userset;height:19.5pt'>
            <td colspan=2 class=blank>B+</td>
            <td colspan=5 class=blank>87 - 89.99</td>
            <td colspan=2 class=blank>D+</td>
            <td colspan=6 class=blank>67 - 69.99</td>
        </tr>

        <tr class=blank style='mso-height-source:userset;height:19.5pt'>
            <td colspan=2 class=blank>B</td>
            <td colspan=5 class=blank>83 - 86.99</td>
            <td colspan=2 class=blank>D</td>
            <td colspan=6 class=blank>63 - 66.99</td>
        </tr>

        <tr class=blank style='mso-height-source:userset;height:19.5pt'>
            <td colspan=2 class=blank>B-</td>
            <td colspan=5 class=blank>80 - 82.99</td>
            <td colspan=2 class=blank>D-</td>
            <td colspan=6 class=blank>60 - 62.99</td>
        </tr>

        <tr class=blank style='mso-height-source:userset;height:19.5pt'>
            <td colspan=2 class=blank></td>
            <td colspan=5 class=blank></td>
            <td colspan=2 class=blank>F</td>
            <td colspan=6 class=blank>Below 60</td>
        </tr>
    </table>
</div>
</body>

</html>
