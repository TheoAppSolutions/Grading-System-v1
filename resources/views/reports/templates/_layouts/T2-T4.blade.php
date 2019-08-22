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
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
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

        .sidenote {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
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

        .studentlabel {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 12.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: right;
            vertical-align: bottom;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .studentinfo {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
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
            border-bottom: .5pt solid windowtext;
            border-left: none;
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
            font-size: 10.0pt;
            font-weight: 400;
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

        .cardlabel {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            border: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .term {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
            font-weight: 700;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            border-top: .5pt solid windowtext;
            border-right: .5pt solid windowtext;
            border-bottom: none;
            border-left: .5pt solid windowtext;
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
            font-size: 12.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: right;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-bottom: .5pt solid windowtext;
            border-right: none;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .sidenotetitle {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
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

        .remarks {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            border-top: .5pt solid windowtext;
            border-right: .5pt solid windowtext;
            border-bottom: .5pt solid windowtext;
            border-left: .5pt solid windowtext;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .deportment {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
            font-weight: 400;
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

        .cardheader {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 16.0pt;
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

        .cardgeader2 {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: windowtext;
            font-size: 12.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: normal;
        }

        .schoolyear {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
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
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .subjecttitle {
            padding-top: 1px;
            padding-right: 5px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
            font-weight: 400;
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
            white-space: normal;
        }

        .attendance {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
            font-weight: 400;
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

        .commentstitle {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
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
            border-bottom: none;
        }

        .months {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
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

        .attendancelabel {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 12.0pt;
            font-weight: 400;
            font-style: italic;
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

        .comments {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
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

        .checkmark {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
            mso-ignore: padding;
            color: black;
            font-size: 11.0pt;
            font-weight: 400;
            font-style: normal;
            text-decoration: none;
            font-family: Arial, sans-serif;
            mso-font-charset: 0;
            mso-number-format: General;
            text-align: center;
            vertical-align: bottom;
            border-top: none;
            border-right: none;
            border-bottom: .5pt solid windowtext;
            border-left: none;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }

        .officelabel {
            padding-top: 1px;
            padding-right: 1px;
            padding-left: 1px;
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
            vertical-align: middle;
            mso-background-source: auto;
            mso-pattern: auto;
            white-space: nowrap;
        }
    </style>
</head>
<body>
<div align=center>
    <table border=0 cellpadding=0 cellspacing=0 width=930
           style='border-collapse:collapse;table-layout:fixed;width:682pt'>
        <col class=blank width=15 span=7 style='width:11pt'>
        <col class=blank width=15 style='width:11pt'>
        <col class=blank width=15 span=2 style='width:11pt'>
        <col class=blank width=15 style='width:11pt'>
        <col class=blank width=15 span=2 style='width:11pt'>
        <col class=blank width=15 style='width:11pt'>
        <col class=blank width=15 span=2 style='width:11pt'>
        <col class=blank width=15 style='width:11pt'>
        <col class=blank width=15 span=3 style='width:11pt'>
        <col class=blank width=15 style='width:11pt'>
        <col class=blank width=15 span=3 style='width:11pt'>
        <col class=blank width=15 style='width:11pt'>
        <col class=blank width=15 span=7 style='width:11pt'>
        <col class=blank width=15 style='width:11pt'>
        <col class=blank width=15 span=3 style='width:11pt'>
        <col class=blank width=15 style='width:11pt'>
        <col class=blank width=15 style='width:11pt'>
        <col class=blank width=15 span=2 style='width:11pt'>
        <col class=blank width=15 style='width:11pt'>
        <col class=blank width=15 span=5 style='width:11pt'>
        <col class=blank width=15 style='width:11pt'>
        <col class=blank width=15 span=5 style='width:11pt'>
        <col class=blank width=15 span=2 style='width:11pt'>
        <col class=blank width=15 span=8 style='width:11pt'>

        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=62 class=cardheader width=930>{{ schema('report_card')->{'school.name'} }}
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=62 class=cardgeader2 width=930>{{ schema('report_card')->{'address'} }}
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=62 class=cardgeader2>{{ schema('report_card')->{'address2'} }}
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=62 class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=62 class=cardheader>PROGRESS
                REPORT
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=62 class=schoolyear>School Year
                {{ getSchoolYear() }}
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=62 class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=4 class=studentlabel>Name:</td>
            <td colspan=20 class=studentinfo>{{ $student->lastname . ', ' . $student->firstname }}</td>
            <td class=blank></td>
            <td colspan=4 class=studentlabel>Gender:</td>
            <td colspan=2 class=studentinfo>{{ $student->gender }}</td>
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
            <td colspan=4 class=studentlabel>{{ schema('quarter_term') }}:</td>
            <td colspan=2 class=studentinfo>{{ $quarter }}</td>
            <td class=blank></td>
            <td colspan=7 class=studentlabel>Year Level:</td>
            <td colspan=6 class=studentinfo>{{ $student->gradelevel }}</td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
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
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=12 rowspan=2 height=48 class=cardlabel width=180>SUBJECTS
            </td>
            <td colspan=20 class=cardlabel>TERM</td>
            <td colspan=6 rowspan=2 class=cardlabel width=90 style='width:66pt'>FINAL<br>
                GRADE
            </td>
            <td colspan=5 rowspan=2 class=cardlabel>UNITS</td>

            <td colspan=7 rowspan=2 class=cardlabel>REMARKS</td>
            <td class=blank></td>
            <td colspan=16 class=sidenotetitle>LETTER GRADE POINTS</td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=5 class=term>1</td>
            <td colspan=5 class=term>2</td>
            <td colspan=5 class=term>3</td>
            <td colspan=5 class=term>4</td>
            <td class=blank></td>
            <td colspan=2 class=blank>A+</td>
            <td colspan=6 class=sidenote>97 - 100</td>
            <td class=blank></td>
            <td colspan=2 class=blank>C+</td>
            <td colspan=5 class=sidenote>77 - 79.99</td>
        </tr>

        @yield('content')

        <tr style='mso-height-source:userset;{{ $height }}'>
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
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
        </tr><!-- Blank -->

        @if($type == "award")
            @include('reports.footer_award')

        @else
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=28 class=commentstitle>ACADEMIC
                PERFORMANCE {{ $type }}
            </td>
            <td class=xl12017275></td>
            <td colspan=33 class=commentstitle>CONDUCT</td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark width=30>{!! $comments['A1'] > 0 ? checkMark() : '' !!}
            </td>
            <td colspan=26 class=comments width=390>{{ strip_tags(schema('comments_quarter')->{'ACADEMIC PERFORMANCE'}->A1) }}
            </td>
            <td class=blank width=15></td>
            <td colspan=2 class=checkmark width=30>{!! $comments['C1'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=31 class=comments width=465>{{ strip_tags(schema('comments_quarter')->{'CONDUCT'}->C1) }}
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['A2'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=26 class=comments>{{ strip_tags(schema('comments_quarter')->{'ACADEMIC PERFORMANCE'}->A2) }}</td>
            <td class=blank></td>
            <td colspan=2 class=checkmark>{!! $comments['C2'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=31 class=comments>{{ strip_tags(schema('comments_quarter')->{'CONDUCT'}->C2) }}
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['A3'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=26 class=comments width=390>{{ strip_tags(schema('comments_quarter')->{'ACADEMIC PERFORMANCE'}->A3) }}
            </td>
            <td class=blank></td>
            <td colspan=2 class=checkmark>{!! $comments['C3'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=31 class=comments>{{ strip_tags(schema('comments_quarter')->{'CONDUCT'}->C3) }}
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['A4'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=26 class=comments>{{ strip_tags(schema('comments_quarter')->{'ACADEMIC PERFORMANCE'}->A4) }}</td>
            <td class=blank></td>
            <td colspan=2 class=checkmark>{!! $comments['C4'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=31 class=comments>{{ strip_tags(schema('comments_quarter')->{'CONDUCT'}->C4) }}
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['A5'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=26 class=comments>{{ strip_tags(schema('comments_quarter')->{'ACADEMIC PERFORMANCE'}->A5) }}
            </td>
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
        <tr style='mso-height-source:userset;{{ $height }}'>
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
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=28 class=commentstitle>ATTITUDE</td>
            <td class=blank></td>
            <td colspan=33 class=commentstitle>NEEDING IMPROVEMENT</td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['B1'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=26 class=comments>{{ strip_tags(schema('comments_quarter')->{'ATTITUDE'}->B1) }}</td>
            <td class=blank></td>
            <td colspan=2 class=checkmark>{!! $comments['D1'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=31 class=comments>{{ strip_tags(schema('comments_quarter')->{'NEEDING IMPROVEMENT'}->D1) }}
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['B2'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=26 class=comments>{{ strip_tags(schema('comments_quarter')->{'ATTITUDE'}->B2) }}</td>
            <td class=blank></td>
            <td colspan=2 class=checkmark>{!! $comments['D2'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=31 class=comments>Not doing school work and seems not to care
                about doing
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['B3'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=26 class=comments>Doesn't volunteer often but is willing to
                take part
            </td>
            <td class=blank></td>
            <td colspan=2 class=blank>&nbsp;</td>
            <td colspan=31 class=comments>assignments; follow up is needed at home</td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=blank>&nbsp;</td>
            <td colspan=26 class=comments>in classwork when requested</td>
            <td class=blank></td>
            <td colspan=2 class=checkmark>{!! $comments['D3'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=31 class=comments>{{ strip_tags(schema('comments_quarter')->{'NEEDING IMPROVEMENT'}->D3) }}
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['B4'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=26 class=comments>{{ strip_tags(schema('comments_quarter')->{'ATTITUDE'}->B4) }}</td>
            <td class=blank></td>
            <td colspan=2 class=checkmark>{!! $comments['D4'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=31 class=comments>{{ strip_tags(schema('comments_quarter')->{'NEEDING IMPROVEMENT'}->D4) }}
            </td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
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
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=8 class=months>{{ schema('attendance_type') }}</td>
            @for($ctr = 1; $ctr <= schema('attendance_count'); $ctr++)
                @if (schema('attendance_type') == "Term")
                    <td colspan=4 class=months>{{ $ctr }}</td>
                @elseif (schema('attendance_type') == "Months")
                    <td colspan=4 class=months>{{ substr(date('F', mktime(0, 0, 0, $ctr, 10)), 0, 3) }}</td>
                @endif
            @endfor
            <td colspan=4 class=months>Total
            </td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=8 class=attendancelabel>School Days</td>
            @for($ctr = 1; $ctr <= schema('attendance_count'); $ctr++)
                <td colspan=4 class=attendance>{{ $days[$ctr] > 0 ? $days[$ctr] : ''  }}</td>
            @endfor
            <td colspan=4 class=attendance>{{ $days["total"] }}</td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=8 class=attendancelabel>Days Present</td>
            @for($ctr = 1; $ctr <= schema('attendance_count'); $ctr++)
                <td colspan=4 class=attendance>{{ $days[$ctr] > 0 ? $attendance->{'P'.$ctr} : '' }}</td>
            @endfor
            <td colspan=4 class=attendance>{{ $days["total"] - $attendance->TotalAbsent }}</td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=8 class=attendancelabel>Days Absent</td>
            @for($ctr = 1; $ctr <= schema('attendance_count'); $ctr++)
                <td colspan=4 class=attendance>{{ $days[$ctr] > 0 ? $attendance->{'A'.$ctr} : '' }}</td>
            @endfor
            <td colspan=4 class=attendance>{{ $attendance->TotalAbsent }}</td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=8 class=attendancelabel>Days Tardy</td>
            @for($ctr = 1; $ctr <= schema('attendance_count'); $ctr++)
                <td colspan=4 class=attendance>{{ $days[$ctr] > 0 ? $attendance->{'T'.$ctr} : '' }}</td>
            @endfor
            <td colspan=4 class=attendance>{{ $attendance->TotalTardy }}</td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
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
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=42 class=commentstitle>ATTENDANCE
                AND TARDY
            </td>
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
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['E1'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=38 class=comments>{{ strip_tags(schema('comments_quarter')->{'ATTENDANCE AND TARDY'}->E1) }}
            </td>
            <td colspan=20 class=studentinfo>{{ $homeroom ?? '' }}</td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['E2'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=38 class=comments>{{ strip_tags(schema('comments_quarter')->{'ATTENDANCE AND TARDY'}->E2) }}
            </td>
            <td colspan=20 class=officelabel>Homeroom Adviser</td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['E3'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=40 class=comments>{{ strip_tags(schema('comments_quarter')->{'ATTENDANCE AND TARDY'}->E3) }}
            </td>
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
        <tr style='mso-height-source:userset;{{ $height }}'>
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
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=40 class=commentstitle>OVERALL
                REQUEST
            </td>
            <td colspan=20 class=studentinfo>{{ $principal ?? '' }}</td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=2 class=checkmark>{!! $comments['F1'] > 0 ? checkMark() : '' !!}</td>
            <td colspan=38 class=comments>
                {{ strip_tags(schema('comments_quarter')->{'OVERALL REQUEST'}->F1) }}
            </td>
            <td colspan=20 class=officelabel>School Principal</td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
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
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
            <td class=blank></td>
        </tr>
        <tr style='mso-height-source:userset;{{ $height }}'>
            <td colspan=7 class=sidenotetitle>Eligible for:</td>
            <td colspan=12 class=studentinfo>&nbsp;</td>
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
        @endif
    </table>
</div>
</body>
</html>
