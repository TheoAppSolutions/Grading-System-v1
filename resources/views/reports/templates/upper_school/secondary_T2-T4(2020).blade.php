@php($height = "height:17.0pt;")

@extends('reports.templates._layouts.T2-T4')

@section('content')
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 rowspan=2 height=50 class=titles width=210
            style='height:37.5pt;width:160pt'>SUBJECTS
        </td>
        <td colspan=16 class=titles>QUARTERLY</td>
        <td colspan=6 rowspan=2 class=titles width=70 style='width:52pt'>FINAL<br> GRADE</td>
        <td colspan=7 rowspan=2 class=titles>REMARKS</td>
        <td colspan=1 class=blank></td>
        <td colspan=12 rowspan="14">
            @include('reports.templates._snippets.card_score_board')
        </td>
    </tr>{{-- TABLE HEADERS --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=4 height=25 class=quarter style='height:18.75pt;'>1</td>
        <td colspan=4 class=quarter>2</td>
        <td colspan=4 class=quarter>3</td>
        <td colspan=4 class=quarter>4</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- QUARTER HEADERS --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;ENGLISH
        </td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['ENGLISH'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['ENGLISH'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['ENGLISH'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['ENGLISH'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['ENGLISH'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['ENGLISH'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade style="font-size: 13px; text-align: center;" width=40>{{ $grades['ENGLISH'][4]['remarks'] ?? 'PASSED' }}</td>
        <td colspan=4 class=finalgrade>{{ $grades['ENGLISH'][5]['final'] ?? '' }}</td>
        <td colspan=2 class=finaleffort><span class="effort">{{ $grades['ENGLISH'][5]['effort'] ?? '' }}</span></td>
        <td colspan=7 class=remarks>{{ $grades['ENGLISH']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- ENGLISH --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt; width:160pt'>&nbsp;FILIPINO</td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['FILIPINO'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['FILIPINO'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['FILIPINO'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['FILIPINO'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['FILIPINO'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['FILIPINO'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade style="font-size: 13px; text-align: center;" width=40>{{ $grades['FILIPINO'][4]['remarks'] ?? 'PASSED' }}</td>
        <td colspan=4 class=finalgrade>{{ $grades['FILIPINO'][5]['final'] ?? '' }}</td>
        <td colspan=2 class=finaleffort><span class="effort">{{ $grades['FILIPINO'][5]['effort'] ?? '' }}</span></td>
        <td colspan=7 class=remarks>{{ $grades['FILIPINO']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- FILIPINO --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt; width:160pt'>&nbsp;SCIENCE</td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['SCIENCE'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['SCIENCE'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['SCIENCE'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['SCIENCE'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['SCIENCE'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['SCIENCE'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade style="font-size: 13px; text-align: center;" width=40>{{ $grades['SCIENCE'][4]['remarks'] ?? 'PASSED' }}</td>
        <td colspan=4 class=finalgrade>{{ $grades['SCIENCE'][5]['final'] ?? '' }}</td>
        <td colspan=2 class=finaleffort><span class="effort">{{ $grades['SCIENCE'][5]['effort'] ?? '' }}</span></td>
        <td colspan=7 class=remarks>{{ $grades['SCIENCE']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- SCIENCE --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;  width:160pt'>&nbsp;MATHEMATICS</td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['MATH'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['MATH'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['MATH'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['MATH'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['MATH'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['MATH'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade style="font-size: 13px; text-align: center;" width=40>{{ $grades['MATH'][4]['remarks'] ?? 'PASSED' }}</td>
        <td colspan=4 class=finalgrade>{{ $grades['MATH'][5]['final'] ?? '' }}</td>
        <td colspan=2 class=finaleffort><span class="effort">{{ $grades['MATH'][5]['effort'] ?? '' }}</span></td>
        <td colspan=7 class=remarks>{{ $grades['MATH']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- MATH --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt; width:160pt'>&nbsp;CHRISTIAN FORMATION
        </td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['CF'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['CF'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['CF'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['CF'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['CF'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['CF'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade style="font-size: 13px; text-align: center;" width=40>{{ $grades['CF'][4]['remarks'] ?? 'PASSED' }}</td>
        <td colspan=4 class=finalgrade>{{ $grades['CF'][5]['final'] ?? '' }}</td>
        <td colspan=2 class=finaleffort><span class="effort">{{ $grades['CF'][5]['effort'] ?? '' }}</span></td>
        <td colspan=7 class=remarks>{{ $grades['CF']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- CHRISTIAN FORMATION --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;CIVICS AND CULTURE
        </td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['CIVICS'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['CIVICS'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['CIVICS'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['CIVICS'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['CIVICS'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['CIVICS'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade style="font-size: 13px; text-align: center;" width=40>{{ $grades['CIVICS'][4]['remarks'] ?? 'PASSED' }}</td>
        <td colspan=4 class=finalgrade>{{ $grades['CIVICS'][5]['final'] ?? '' }}</td>
        <td colspan=2 class=finaleffort><span class="effort">{{ $grades['CIVICS'][5]['effort'] ?? '' }}</span></td>
        <td colspan=7 class=remarks>{{ $grades['CIVICS']['remarks'] ?? '' }}</td>
    </tr>{{-- CIVICS AND CULTURE --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;<b>MAPEH</b>
        </td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['MAPEH'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['MAPEH'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['MAPEH'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['MAPEH'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['MAPEH'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['MAPEH'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade width=40>{{ $grades['MAPEH'][4]['final'] ?? '' }}</td>
        <td colspan=6 class=finalgrade style="text-align: center;">{{ $grades['MAPEH'][5]['final'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['MAPEH']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- MAPEH --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt; width:160pt'>&nbsp;&nbsp;&nbsp;&nbsp;Music
        </td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['MUSIC'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['MUSIC'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['MUSIC'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['MUSIC'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['MUSIC'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['MUSIC'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade style="font-size: 13px; text-align: center;" width=40>{{ $grades['MUSIC'][4]['remarks'] ?? 'PASSED' }}</td>
        <td colspan=4 class=finalgrade>{{ $grades['MUSIC'][5]['final'] ?? '' }}</td>
        <td colspan=2 class=finaleffort><span class="effort">{{ $grades['MUSIC'][5]['effort'] ?? '' }}</span></td>
        <td colspan=7 class=remarks>{{ $grades['MUSIC']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- MUSIC --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;&nbsp;&nbsp;&nbsp;Art
        </td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['ART'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['ART'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['ART'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['ART'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['ART'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['ART'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade style="font-size: 13px; text-align: center;" width=40>{{ $grades['ART'][4]['remarks'] ?? 'PASSED' }}</td>
        <td colspan=4 class=finalgrade>{{ $grades['ART'][5]['final'] ?? '' }}</td>
        <td colspan=2 class=finaleffort><span class="effort">{{ $grades['ART'][5]['effort'] ?? '' }}</span></td>
        <td colspan=7 class=remarks>{{ $grades['ART']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- ART --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;&nbsp;&nbsp;&nbsp;Physical Education & Health
        </td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['PE'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['PE'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['PE'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['PE'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['PE'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['PE'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade style="font-size: 13px; text-align: center;" width=40>{{ $grades['PE'][4]['remarks'] ?? 'PASSED' }}</td>
        <td colspan=4 class=finalgrade>{{ $grades['PE'][5]['final'] ?? '' }}</td>
        <td colspan=2 class=finaleffort><span class="effort">{{ $grades['PE'][5]['effort'] ?? '' }}</span></td>
        <td colspan=7 class=remarks>{{ $grades['PE']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- PE --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;<b>TLE</b>
        </td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['TLE'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['TLE'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['TLE'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['TLE'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['TLE'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['TLE'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade width=40>{{ $grades['TLE'][4]['final'] ?? '' }}</td>
        <td colspan=6 class=finalgrade style="text-align: center;">{{ $grades['TLE'][5]['final'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['TLE']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- TLE --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;&nbsp;&nbsp;&nbsp;Livelihood Education
        </td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['LIVELIHOOD'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['LIVELIHOOD'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['LIVELIHOOD'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['LIVELIHOOD'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['LIVELIHOOD'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['LIVELIHOOD'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade style="font-size: 13px; text-align: center;" width=40>{{ $grades['LIVELIHOOD'][4]['remarks'] ?? 'PASSED' }}</td>
        <td colspan=4 class=finalgrade>{{ $grades['LIVELIHOOD'][5]['final'] ?? '' }}</td>
        <td colspan=2 class=finaleffort><span class="effort">{{ $grades['LIVELIHOOD'][5]['effort'] ?? '' }}</span></td>
        <td colspan=7 class=remarks>{{ $grades['LIVELIHOOD']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- LIVELIHOOD --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;&nbsp;&nbsp;&nbsp;Computer Education
        </td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['COMPUTER'][1]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['COMPUTER'][1]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['COMPUTER'][2]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['COMPUTER'][2]['effort'] ?? '' }}</span></td>
        <td colspan=3 class=finalgrade width=40>{{ $grades['COMPUTER'][3]['final'] ?? '' }}</td>
        <td colspan=1 class=finaleffort><span class="effort">{{ $grades['COMPUTER'][3]['effort'] ?? '' }}</span></td>
        <td colspan=4 class=finalgrade style="font-size: 13px; text-align: center;" width=40>{{ $grades['COMPUTER'][4]['remarks'] ?? 'PASSED' }}</td>
        <td colspan=4 class=finalgrade>{{ $grades['COMPUTER'][5]['final'] ?? '' }}</td>
        <td colspan=2 class=finaleffort><span class="effort">{{ $grades['COMPUTER'][5]['effort'] ?? '' }}</span></td>
        <td colspan=7 class=remarks>{{ $grades['COMPUTER']['remarks'] ?? '' }}</td>
    </tr>{{-- COMPUTER EDUCATION --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;ELECTIVE
        </td>
        <td colspan=3 class=finalgrade width=40 style='width:30pt'></td>
        <td colspan=1 class=finaleffort></td>
        <td colspan=3 class=finalgrade width=40 style='width:30pt'></td>
        <td colspan=1 class=finaleffort></td>
        <td colspan=3 class=finalgrade width=40 style='width:30pt'></td>
        <td colspan=1 class=finaleffort></td>
        <td colspan=3 class=finalgrade width=40 style='width:30pt'></td>
        <td colspan=1 class=finaleffort></td>
        <td colspan=4 class=finalgrade></td>
        <td colspan=2 class=finaleffort></td>
        <td colspan=7 class=remarks>&nbsp;</td>
    </tr>{{-- ELECTIVE --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;DEPORTMENT
        </td>
        <td colspan=4 class=deportment width=40 style='width:30pt'>{{ $grades['deportment'][1] ?? '' }}</td>
        <td colspan=4 class=deportment width=40 style='width:30pt'>{{ $grades['deportment'][2] ?? '' }}</td>
        <td colspan=4 class=deportment width=40 style='width:30pt'>{{ $grades['deportment'][3] ?? '' }}</td>
        <td colspan=4 class=deportment width=40 style='width:30pt'>{{ $grades['deportment'][4] ?? '' }}</td>
        <td colspan=6 class=deportment>{{ $grades['deportment'][5] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['deportment']['remarks'] ?? '' }}</td>
    </tr>{{-- DEPORTMENT --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;CLUB
        </td>
        <td colspan=3 class=finalgrade width=40 style='width:30pt'></td>
        <td colspan=1 class=finaleffort></td>
        <td colspan=3 class=finalgrade width=40 style='width:30pt'></td>
        <td colspan=1 class=finaleffort></td>
        <td colspan=3 class=finalgrade width=40 style='width:30pt'></td>
        <td colspan=1 class=finaleffort></td>
        <td colspan=3 class=finalgrade width=40 style='width:30pt'></td>
        <td colspan=1 class=finaleffort></td>
        <td colspan=3 class=finalgrade></td>
        <td colspan=3 class=finaleffort></td>
        <td colspan=7 class=remarks>&nbsp;</td>
    </tr>{{-- CLUB --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=32 height=25 class=generalaverage width=430 style='height:18.75pt;
  width:324pt'>GENERAL AVERAGE&nbsp;
        </td>
        <td colspan=6 class=finalgrade style="text-align: center;">{{ $grades['generalaverage'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['generalremarks'] ?? '' }}</td>
    </tr>{{-- GENERAL AVERAGE --}}
@endsection
