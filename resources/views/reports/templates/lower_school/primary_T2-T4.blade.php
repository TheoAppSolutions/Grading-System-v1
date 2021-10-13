@php($height = "height:18.0pt;")

@extends('reports.templates._layouts.T2-T4')

@section('content')
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 rowspan=2 height=50 class=titles width=210
            style='height:37.5pt;width:160pt'>SUBJECTS
        </td>
        <td colspan=16 class=titles>QUARTERLY</td>
        <td colspan=6 rowspan=2 class=titles width=70 style='width:52pt'>FINAL<br>
            GRADE
        </td>
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
  width:160pt'>&nbsp;LANGUAGE
        </td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }}
                class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>{{ $grades['LANGUAGE'][$ctr]['final'] ?? '' }}</td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort><span class="effort">{{ $grades['LANGUAGE'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks>{{ $grades['LANGUAGE']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- LANGUAGE --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt; width:160pt'>&nbsp;READING</td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['READING'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['READING'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks>{{ $grades['READING']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- READING --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt; width:160pt'>&nbsp;FILIPINO</td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['FILIPINO'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['FILIPINO'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks>{{ $grades['FILIPINO']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- FILIPINO --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;  width:160pt'>&nbsp;SCIENCE</td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['SCIENCE'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['SCIENCE'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks>{{ $grades['SCIENCE']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- SCIENCE --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt; width:160pt'>&nbsp;MATHEMATICS</td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['MATH'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['MATH'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks>{{ $grades['MATH']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- MATHEMATICS --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;CHRISTIAN FORMATION</td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['CF'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['CF'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks>{{ $grades['CF']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank></td>
    </tr>{{-- CHRISTIAN FORMATION --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt; width:160pt'>&nbsp;CIVICS AND CULTURE</td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['CIVICS'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['CIVICS'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks>{{ $grades['CIVICS']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- CIVICS AND CULTURE --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;<b>MAPEH</b></td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['MAPEH'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['MAPEH'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks></td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- MAPE --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;&nbsp;&nbsp;&nbsp;Music</td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['MUSIC'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['MUSIC'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks>{{ $grades['MUSIC']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- MUSIC --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;&nbsp;&nbsp;&nbsp;Art</td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['ART'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['ART'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks>{{ $grades['ART']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- ARTS --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;&nbsp;&nbsp;&nbsp;Physical Education & Health
        </td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['PE'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['PE'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks>{{ $grades['PE']['remarks'] ?? '' }}</td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- PHYSICAL EDUCATION --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;<b>TLE</b>
        </td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['TLE'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['TLE'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks></td>
        <td colspan=1 class=blank>&nbsp;</td>
    </tr>{{-- TLE --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;&nbsp;&nbsp;&nbsp;HELE
        </td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['LIVELIHOOD'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['LIVELIHOOD'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
        <td colspan=7 class=remarks>{{ $grades['LIVELIHOOD']['remarks'] ?? '' }}</td>
    </tr>{{-- LIVELIHOOD EDUCATION --}}
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=16 height=25 class=subjects width=210 style='height:18.75pt;
  width:160pt'>&nbsp;&nbsp;&nbsp;&nbsp;Computer Education
        </td>
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 3: 4 }} class=finalgrade {{ $ctr < 5 ? "width=40" : "" }}>
                {{ $grades['COMPUTER'][$ctr]['final'] ?? '' }}
            </td>
            <td colspan={{ $ctr < 5 ? 1: 2 }} class=finaleffort>
                <span class="effort">{{ $grades['COMPUTER'][$ctr]['effort'] ?? '' }}</span>
            </td>
        @endfor
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
        @for($ctr = 1; $ctr <= 5; $ctr++)
            <td colspan={{ $ctr < 5 ? 4: 6 }} class=deportment {{ $ctr < 5 ? "width=40": "" }} style='width:30pt'>{{ $grades['deportment'][$ctr] ?? '' }}</td>
        @endfor
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
