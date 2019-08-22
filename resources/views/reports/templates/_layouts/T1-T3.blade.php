<html>
<head>
    <title>{{ $student->lastname . ', ' . $student->firstname }}</title>
    <meta http-equiv=Content-Type content="text/html; charset=windows-1252">
    <style>
        table {
            mso-displayed-decimal-separator: "\.";
            mso-displayed-thousand-separator: "\,";
        }

        .blank {
            padding-right: 5px;
            padding-left: 5px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 10.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: bottom;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .positionLabel {
            padding-right: 5px;
            padding-left: 5px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 10.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            border-top: 1.5pt solid windowtext;
            border-right: none;
            border-bottom: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .positionName {
            padding-right: 5px;
            padding-left: 5px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 10.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .studentInformation {
            padding-right: 5px;
            padding-left: 5px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 12.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            border-top: none;
            border-right: none;
            border-bottom: 1.0pt solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .studentLabel {
            padding-right: 5px;
            padding-left: 5px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 10.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .commentLabel {
            padding-right: 5px;
            padding-left: 5px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 10.0pt;
            font-weight: 400;
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
            white-space: normal;
        }

        .commentValue {
            padding-right: 5px;
            padding-left: 5px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 10.0pt;
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
            white-space: normal;
        }

        .teacherName {
            padding-right: 5px;
            padding-left: 5px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 10.0pt;
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

        .subjectGrade {
            padding-right: 5px;
            padding-left: 5px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 10.0pt;
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
        }

        .subjectLabel {
            padding-right: 5px;
            padding-left: 5px;
            mso-ignore: padding;
            color: white;
            font-size: 10.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: bottom;
            border: .5pt solid windowtext;
            background: black;
            mso-pattern: black none;
            white-space: nowrap;
        }

        .legend {
            padding-right: 5px;
            padding-left: 5px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 10.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: left;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }
    </style>
</head>
<body>
<div align=center>
    <table border=0 cellpadding=0 cellspacing=0 style='border-collapse:collapse;table-layout:fixed;'>
        <col class=blank width=24 span=48 style='mso-width-source:userset;
 mso-width-alt:877;width:18pt'>

        <tr style='mso-height-source:userset;height:17.25pt'>
            <td colspan=2 class=studentLabel width=48>NAME:
            </td>
            <td colspan=15 class=studentInformation width=360>{{ $student->lastname }}, {{ $student->firstname }}</td>
            <td class=blank width=24></td>
            <td class=blank width=24></td>
            <td class=blank width=24></td>
            <td class=blank width=24></td>
            <td class=blank width=24></td>
            <td class=blank width=24></td>
            <td class=blank width=24></td>
            <td class=blank width=24></td>
            <td colspan=3 class=studentLabel width=72>GENDER:</td>
            <td colspan=2 class=studentInformation width=48>{{ $student->gender }}</td>
            <td colspan=3 class=studentLabel width=72>GRADE:</td>
            <td colspan=2 class=studentInformation width=48>{{ $student->gradelevel }}</td>
            <td colspan=3 class=studentLabel width=72>TERM:</td>
            <td colspan=2 class=studentInformation width=48>{{ $quarter }}</td>
        </tr><!-- Student Infromation -->
        <tr style='mso-height-source:userset;height:17.25pt'>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;height:17.25pt'>
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
            <td colspan=2 class=studentLabel>Grades</td>
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
            <td colspan=2 class=studentLabel>Grades</td>
        </tr><!-- Grades Label -->

        @yield('content')

        <tr style='mso-height-source:userset;height:17.25pt'>
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
            <td colspan=17 rowspan=2 class=commentLabel width=408>
                <b>Drama:</b><span> Uses body language,
                    gesture and space to make meaning as performers and audience</span></td>
            <td colspan=2 rowspan=2 class=commentValue width=48>{{ $comments['ARTS']['S2'] ?? '' }}</td>
        </tr>
        <tr style='mso-height-source:userset;height:17.25pt'>
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
        <tr style='mso-height-source:userset;height:17.25pt'>
            <td colspan=7 rowspan=2 height=44 class=positionName>{{ $homeroom }}</td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td colspan=7 rowspan=2 class=positionName>{{ $principal }}</td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td colspan=17 rowspan=2 class=commentLabel width=408>
                <b>Media Arts:</b><span> Use
                    communications technologies to creatively explore, make and interpret stories
                    about people, ideas and the world around them</span></td>
            <td colspan=2 rowspan=2 class=commentValue width=48>{{ $comments['ARTS']['S3'] ?? '' }}</td>
        </tr><!-- Homeroom/Principal Names -->
        <tr style='mso-height-source:userset;height:17.25pt'>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;height:17.25pt'>
            <td colspan=7 class=positionLabel>Homeroom
                Adviser
            </td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td colspan=7 class=positionLabel>Principal</td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td colspan=17 rowspan=2 class=commentLabel width=408>
                <b>Music:</b><span> Composes and performs
                    music from a diverse range of styles, traditions and contexts</span></td>
            <td colspan=2 rowspan=2 class=commentValue width=48>{{ $comments['ARTS']['S4'] ?? '' }}</td>
        </tr><!-- Homeroom/Principal Labels -->
        <tr style='mso-height-source:userset;height:17.25pt'>

            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;height:17.25pt'>
            <td colspan=2 class=legend>Legend:</td>
            <td colspan=6 class=legend>(3) - Highly Proficient</td>
            <td colspan=4 class=legend>(2) - Proficient</td>
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
            <td colspan=17 rowspan=2 class=commentLabel width=408>
                <b>Visual Arts:</b><span> Develops
                    practical skills and critical thinking<br>
                    which inform their work as artists and audience.</span></td>
            <td colspan=2 rowspan=2 class=commentValue width=48>{{ $comments['ARTS']['S5'] ?? '' }}</td>
        </tr><!-- Legend -->
        <tr style='mso-height-source:userset;height:17.25pt'>
            <td class=blank></td>
            <td class=blank></td>
            <td colspan=9 class=legend>(1) - Progressing Towards Standard</td>
            <td colspan=4 class=legend>(N/A) - Not Applicable</td>
        </tr><!-- Legend -->
    </table>
</div>
</body>
</html>
