@extends('reports.templates._layouts.T2-T4')

@section('content')
    <tr style='mso-height-source:userset;height:18.75pt'>
        <td colspan=20 rowspan=2 height=50 class=titles width=210
            style='height:37.5pt;width:160pt'>SUBJECTS
        </td>
        <td colspan=10 class=titles>QUARTER</td>
        <td colspan=6 rowspan=2 class=titles width=70 style='width:52pt'>FINAL<br>GRADE
        </td>
        <td colspan=7 rowspan=2 class=titles>REMARKS</td>
        <td class=blank></td>
        <td colspan=12 rowspan="14">
            @include('reports.templates._snippets.card_score_board')
        </td>
    </tr>{{-- TABLE HEADERS --}}
    <tr style='mso-height-source:userset;height:19.5pt;'>
        <td colspan=5 height=26 class=quarter style='height:19.5pt;'>Midterm</td>
        <td colspan=5 class=quarter style='border-left:none'>Finals</td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:19.5pt'>
        <td colspan=43 height=26 class=subjects style='height:19.5pt;font-weight: bold;padding-left: 5px;'>Core
            Subjects
        </td>
        <td class=blank></td>
    </tr>

    @for($ctr = 0; $ctr<count($minor); $ctr++)
        @if($minor[$ctr]->user_id != "")
            <tr style='mso-height-source:userset;height:16.5pt'>
                <td colspan=20 height=26 class=subjects width=225
                    style='height:19.5pt;width:171pt;padding-left: 10px;'>
                    {{ $minor[$ctr]->subjecttitle }}</td>
                <td colspan=3 class=finalGrade>
                    {{ $grades[$minor[$ctr]->subjectname][$quarters[1]]['rawfinal'] ?? '' }}
                </td>
                <td colspan=2 class=finaleffort>
                    <sub class="effort">
                        {{ $grades[$minor[$ctr]->subjectname][$quarters[1]]['effort'] ?? '' }}
                    </sub>
                </td>
                @if($quarters[2] == 4 and getSchoolYear() == "2019-2020")
                    <td colspan=5 class=finalGrade
                        style="font-size: 13px; text-align: center; font-style: italic; ">
                        {{ $grades[$minor[$ctr]->subjectname][4]['remarks'] ?? 'P' }}
                    </td>
                @else
                    <td colspan=3 class=finalGrade>
                        {{ $grades[$minor[$ctr]->subjectname][$quarters[2]]['rawfinal'] ?? '' }}
                    </td>
                    <td colspan=2 class=finaleffort>
                        <sub class="effort">
                            {{ $grades[$minor[$ctr]->subjectname][$quarters[2]]['effort'] ?? '' }}
                        </sub>
                    </td>
                @endif
                <td colspan=4 class=finalGrade style="text-align: center;">
                    {{ $grades[$minor[$ctr]->subjectname][5]['rawfinal'] ?? '' }}
                </td>
                <td colspan=2 class=finaleffort>
                    <sub class="effort">
                        {{ $grades[$minor[$ctr]->subjectname][5]['effort'] ?? '' }}
                    </sub>
                </td>
                <td colspan=7 class=remarks>
                    {{ $grades[$minor[$ctr]->subjectname]['remarks'] ?? '' }}
                </td>
            </tr>
        @endif
    @endfor

    <tr class=blank style='mso-height-source:userset;height:19.5pt'>
        <td colspan=43 height=26 class=subjects width=540
            style='height:19.5pt;width:407pt;font-weight: bold;padding-left: 5px;'>
            Applied and Specialized Subjects
        </td>
    </tr>

    @for($ctr = 0; $ctr<count($core); $ctr++)
        @if($core[$ctr]->user_id != "")
            <tr style='mso-height-source:userset;height:16.5pt'>
                <td colspan=20 height=26 class=subjects width=225
                    style='height:19.5pt; width:171pt; padding-left: 10px;'>
                    {{ $core[$ctr]->subjecttitle }}</td>
                <td colspan=3 class=finalGrade>
                    {{ $grades[$core[$ctr]->subjectname][$quarters[1]]['rawfinal'] ?? '' }}</td>
                <td colspan=2 class=finaleffort><sub class="effort">
                        {{ $grades[$core[$ctr]->subjectname][$quarters[1]]['effort'] ?? '' }}</sub>
                </td>
                @if($quarters[2] == 4 and getSchoolYear() == "2019-2020")
                    <td colspan=5 class=finalGrade
                        style="font-size: 13px; text-align: center; font-style: italic; ">
                        {{ $grades[$core[$ctr]->subjectname][4]['remarks'] ?? 'P' }}
                    </td>
                @else
                    <td colspan=3 class=finalGrade>
                        {{ $grades[$core[$ctr]->subjectname][$quarters[2]]['rawfinal'] ?? '' }}
                    </td>
                    <td colspan=2 class=finaleffort><sub class="effort">
                            {{ $grades[$core[$ctr]->subjectname][$quarters[2]]['effort'] ?? '' }}</sub>
                    </td>
                @endif
                <td colspan=4 class=finalGrade style="text-align: center;">
                    {{ $grades[$core[$ctr]->subjectname][5]['rawfinal'] ?? '' }}
                </td>
                <td colspan=2 class=finaleffort>
                    <sub class="effort">
                        {{ $grades[$core[$ctr]->subjectname][5]['effort'] ?? '' }}
                    </sub>
                </td>
                <td colspan=7 class=remarks>
                    {{ $grades[$core[$ctr]->subjectname]['remarks'] ?? '' }}</td>
            </tr>
        @endif
    @endfor
    <tr style='mso-height-source:userset;height:19.5pt'>
        <td colspan=20 height=26 class=subjects width=225 style='height:19.5pt;
  width:171pt'>&nbsp;DEPORTMENT
        </td>
        <td colspan=5 class=deportment
            style='width: 30px;'>{{ $grades['rawdeportment'][$quarters[1]] ?? '' }}</td>
        <td colspan=5 class=deportment
            style='width: 30px;'>{{ $grades['rawdeportment'][$quarters[2]] ?? '' }}</td>
        <td colspan=6 class=deportment style='width: 30px;'>{{ $grades['deportment'][5] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['deportment']['remarks'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;height:19.5pt'>
        <td colspan=30 height=26 class=generalaverage style='height:19.5pt'>GENERAL AVERAGE</td>
        <td colspan=6 class=finalGrade style="text-align: center;">{{ $grades['generalaverage'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['generalremarks'] ?? '' }}</td>
    </tr>
@endsection
