@php($height = "height:18.0pt;")

@extends('reports.templates._layouts.T2-T4')

@section('content')
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 class=subjecttitle width=180>CRE</td>
        <td colspan=3 class=grade width=45>{{ $grades['CRE'][1]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['CRE'][1]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['CRE'][2]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['CRE'][2]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['CRE'][3]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['CRE'][3]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['CRE'][4]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['CRE'][4]['effort'] ?? '' }}</td>
        <td colspan=4 class=grade>{{ $grades['CRE'][5]['rawfinal'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['CRE'][5]['effort'] ?? '' }}</td>
        <td colspan=5 class=grade style="text-align: center;">{{ $grades['CRE']['unit'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['CRE']['remarks'] ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 class=subjecttitle width=180>English</td>
        <td colspan=3 class=grade width=45>{{ $grades['ENGLISH'][1]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ENGLISH'][1]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['ENGLISH'][2]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ENGLISH'][2]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['ENGLISH'][3]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ENGLISH'][3]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['ENGLISH'][4]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ENGLISH'][4]['effort'] ?? '' }}</td>
        <td colspan=4 class=grade>{{ $grades['ENGLISH'][5]['rawfinal'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ENGLISH'][5]['effort'] ?? '' }}</td>
        <td colspan=5 class=grade style="text-align: center;">{{ $grades['ENGLISH']['unit'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['ENGLISH']['remarks'] ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 class=subjecttitle width=180>HASS</td>
        <td colspan=3 class=grade width=45>{{ $grades['HASS'][1]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['HASS'][1]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['HASS'][2]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['HASS'][2]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['HASS'][3]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['HASS'][3]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['HASS'][4]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['HASS'][4]['effort'] ?? '' }}</td>
        <td colspan=4 class=grade>{{ $grades['HASS'][5]['rawfinal'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['HASS'][5]['effort'] ?? '' }}</td>
        <td colspan=5 class=grade style="text-align: center;">{{ $grades['HASS']['unit'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['HASS']['remarks'] ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 class=subjecttitle width=180>Health</td>
        <td colspan=3 class=grade width=45>{{ $grades['HEALTH'][1]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['HEALTH'][1]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['HEALTH'][2]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['HEALTH'][2]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['HEALTH'][3]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['HEALTH'][3]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['HEALTH'][4]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['HEALTH'][4]['effort'] ?? '' }}</td>
        <td colspan=4 class=grade>{{ $grades['HEALTH'][5]['rawfinal'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['HEALTH'][5]['effort'] ?? '' }}</td>
        <td colspan=5 class=grade style="text-align: center;">{{ $grades['HEALTH']['unit'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['HEALTH']['remarks'] ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 class=subjecttitle width=180>ICT/Practical Skills</td>
        <td colspan=3 class=grade width=45>{{ $grades['ICT/PRACTICAL SKILLS'][1]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ICT/PRACTICAL SKILLS'][1]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['ICT/PRACTICAL SKILLS'][2]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ICT/PRACTICAL SKILLS'][2]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['ICT/PRACTICAL SKILLS'][3]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ICT/PRACTICAL SKILLS'][3]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['ICT/PRACTICAL SKILLS'][4]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ICT/PRACTICAL SKILLS'][4]['effort'] ?? '' }}</td>
        <td colspan=4 class=grade>{{ $grades['ICT/PRACTICAL SKILLS'][5]['rawfinal'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ICT/PRACTICAL SKILLS'][5]['effort'] ?? '' }}</td>
        <td colspan=5 class=grade style="text-align: center;">{{ $grades['ICT/PRACTICAL SKILLS']['unit'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['ICT/PRACTICAL SKILLS']['remarks'] ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 class=subjecttitle width=180>Making a Living</td>
        <td colspan=3 class=grade width=45>{{ $grades['MAKING A LIVING'][1]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['MAKING A LIVING'][1]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['MAKING A LIVING'][2]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['MAKING A LIVING'][2]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['MAKING A LIVING'][3]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['MAKING A LIVING'][3]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['MAKING A LIVING'][4]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['MAKING A LIVING'][4]['effort'] ?? '' }}</td>
        <td colspan=4 class=grade>{{ $grades['MAKING A LIVING'][5]['rawfinal'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['MAKING A LIVING'][5]['effort'] ?? '' }}</td>
        <td colspan=5 class=grade style="text-align: center;">{{ $grades['MAKING A LIVING']['unit'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['MAKING A LIVING']['remarks'] ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 class=subjecttitle width=180>Mathematics</td>
        <td colspan=3 class=grade width=45>{{ $grades['MATHEMATICS'][1]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['MATHEMATICS'][1]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['MATHEMATICS'][2]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['MATHEMATICS'][2]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['MATHEMATICS'][3]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['MATHEMATICS'][3]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['MATHEMATICS'][4]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['MATHEMATICS'][4]['effort'] ?? '' }}</td>
        <td colspan=4 class=grade>{{ $grades['MATHEMATICS'][5]['rawfinal'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['MATHEMATICS'][5]['effort'] ?? '' }}</td>
        <td colspan=5 class=grade style="text-align: center;">{{ $grades['MATHEMATICS']['unit'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['MATHEMATICS']['remarks'] ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 class=subjecttitle width=180>P.E.
        </td>
        <td colspan=3 class=grade width=45>{{ $grades['P.E.'][1]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['P.E.'][1]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['P.E.'][2]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['P.E.'][2]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['P.E.'][3]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['P.E.'][3]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['P.E.'][4]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['P.E.'][4]['effort'] ?? '' }}</td>
        <td colspan=4 class=grade>{{ $grades['P.E.'][5]['rawfinal'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['P.E.'][5]['effort'] ?? '' }}</td>
        <td colspan=5 class=grade style="text-align: center;">{{ $grades['P.E.']['unit'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['P.E.']['remarks'] ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 class=subjecttitle width=180>Science
        </td>
        <td colspan=3 class=grade width=45>{{ $grades['SCIENCE'][1]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['SCIENCE'][1]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['SCIENCE'][2]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['SCIENCE'][2]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['SCIENCE'][3]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['SCIENCE'][3]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['SCIENCE'][4]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['SCIENCE'][4]['effort'] ?? '' }}</td>
        <td colspan=4 class=grade>{{ $grades['SCIENCE'][5]['rawfinal'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['SCIENCE'][5]['effort'] ?? '' }}</td>
        <td colspan=5 class=grade style="text-align: center;">{{ $grades['SCIENCE']['unit'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['SCIENCE']['remarks'] ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 class=subjecttitle width=180>The Arts
        </td>
        <td colspan=3 class=grade width=45>{{ $grades['ARTS'][1]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ARTS'][1]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['ARTS'][2]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ARTS'][2]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['ARTS'][3]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ARTS'][3]['effort'] ?? '' }}</td>
        <td colspan=3 class=grade width=45>{{ $grades['ARTS'][4]['final'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ARTS'][4]['effort'] ?? '' }}</td>
        <td colspan=4 class=grade>{{ $grades['ARTS'][5]['rawfinal'] ?? '' }}</td>
        <td colspan=2 class=effort>{{ $grades['ARTS'][5]['effort'] ?? '' }}</td>
        <td colspan=5 class=grade style="text-align: center;">{{ $grades['ARTS']['unit'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['ARTS']['remarks'] ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 rowspan=2 class=subjecttitle width=180>Elective (Music Private Lessons)
        </td>
        <td colspan=3 rowspan=2 class=grade width=45>{{ $grades['MUSIC'][1]['final'] ?? '' }}</td>
        <td colspan=2 rowspan=2 class=effort>{{ $grades['MUSIC'][1]['effort'] ?? '' }}</td>
        <td colspan=3 rowspan=2 class=grade width=45>{{ $grades['MUSIC'][2]['final'] ?? '' }}</td>
        <td colspan=2 rowspan=2 class=effort>{{ $grades['MUSIC'][2]['effort'] ?? '' }}</td>
        <td colspan=3 rowspan=2 class=grade width=45>{{ $grades['MUSIC'][3]['final'] ?? '' }}</td>
        <td colspan=2 rowspan=2 class=effort>{{ $grades['MUSIC'][3]['effort'] ?? '' }}</td>
        <td colspan=3 rowspan=2 class=grade width=45>{{ $grades['MUSIC'][4]['final'] ?? '' }}</td>
        <td colspan=2 rowspan=2 class=effort>{{ $grades['MUSIC'][4]['effort'] ?? '' }}</td>
        <td colspan=4 rowspan=2 class=grade>{{ $grades['MUSIC'][5]['rawfinal'] ?? '' }}</td>
        <td colspan=2 rowspan=2 class=effort>{{ $grades['MUSIC'][5]['effort'] ?? '' }}</td>
        <td colspan=5 rowspan=2 c style="text-align: center;" lass=grade>{{ $grades['MUSIC']['unit'] ?? '' }}</td>
        <td colspan=7 rowspan=2 rowspan=2 class=remarks>{{ $grades['MUSIC']['remarks'] ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=12 class=subjecttitle width=180>DEPORTMENT</td>
        <td colspan=5 class=deportment width=75>{{ $grades['deportment'][1] ?? '' }}</td>
        <td colspan=5 class=deportment width=75>{{ $grades['deportment'][2] ?? '' }}</td>
        <td colspan=5 class=deportment width=75>{{ $grades['deportment'][3] ?? '' }}</td>
        <td colspan=5 class=deportment width=75>{{ $grades['deportment'][4] ?? '' }}</td>
        <td colspan=6 class=attendance>{{ $grades['deportment'][5] ?? '' }}</td>
        <td colspan=5 class=grade></td>
        <td colspan=7 class=remarks></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=32 class=cardlabel width=480 style="text-align: right;">GENERAL AVERAGE
        </td>
        <td colspan=6 class=attendance>{{ $grades["generalaverage"] ?? '' }}</td>
        <td colspan=5 class=deportment>{{ $grades["totalunits"] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades["generalremarks"]  ?? '' }}</td>

        <td class=blank></td>
    </tr>
@endsection
