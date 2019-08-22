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
        <td colspan=1 class=blank></td>
        <td colspan=12 class=centerlabels>LETTER GRADE POINTS</td>
    </tr>{{-- TABLE HEADERS --}}
    <tr style='mso-height-source:userset;height:19.5pt;'>
        <td colspan=5 height=26 class=quarter style='height:19.5pt;'>Midterm</td>
        <td colspan=5 class=quarter style='border-left:none'>Finals</td>
        <td class=blank></td>
        <td colspan=2 class=blank>A+</td>
        <td colspan=4 class=blank>100 - 99</td>
        <td class=blank></td>
        <td colspan=2 class=blank>C+</td>
        <td colspan=5 class=blank>88 - 86</td>
        <td colspan=7 class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:19.5pt'>
        <td colspan=43 height=26 class=subjects style='height:19.5pt;font-weight: bold;padding-left: 5px;'>Core Subjects
        </td>
        <td class=blank></td>
        <td colspan=2 class=blank>A</td>
        <td colspan=4 class=blank>98 - 97</td>
        <td class=blank></td>
        <td colspan=2 class=blank>C</td>
        <td colspan=5 class=blank>85 - 83</td>
        <td colspan=7 class=blank></td>
    </tr>
    @php($row = 0)
    @for($ctr = 0; $ctr<count($minor); $ctr++)
        @if($minor[$ctr]->user_id != "")
            @php($rowspan = strlen($minor[$ctr]->subjecttitle) > 35 ? 'rowspan=2' : '')
            <tr style='mso-height-source:userset;height:16.5pt'>
                <td colspan=20 height=26 class=subjects width=225
                    style='height:19.5pt;width:171pt;padding-left: 10px;' {{ $rowspan }}>
                    {{ $minor[$ctr]->subjecttitle }}</td>
                <td colspan=3 {{ $rowspan }} class=finalGrade>
                    {{ $grades[$minor[$ctr]->subjectname][$quarters[1]]['final'] ?? '' }}</td>
                <td colspan=2 {{ $rowspan }} class=finaleffort><sub class="effort">
                        {{ $grades[$minor[$ctr]->subjectname][$quarters[1]]['effort'] ?? '' }}</sub>
                </td>
                <td colspan=3 {{ $rowspan }} class=finalGrade>
                    {{ $grades[$minor[$ctr]->subjectname][$quarters[2]]['final'] ?? '' }}</td>
                <td colspan=2 {{ $rowspan }} class=finaleffort><sub class="effort">
                        {{ $grades[$minor[$ctr]->subjectname][$quarters[2]]['effort'] ?? '' }}</sub>
                </td>
                <td colspan=4 {{ $rowspan }} class=finalGrade>
                    {{ $grades[$minor[$ctr]->subjectname][5]['final'] ?? '' }}</td>
                <td colspan=2 {{ $rowspan }} class=finaleffort><sub class="effort">
                        {{ $grades[$minor[$ctr]->subjectname][5]['effort'] ?? '' }}</sub></td>
                <td colspan=7 {{ $rowspan }} class=remarks>
                    {{ $grades[$minor[$ctr]->subjectname]['remarks'] ?? '' }}</td>

                {!! returnforCard($row) !!}
                @php($row++)
            </tr>
            @if(strlen($minor[$ctr]->subjecttitle) > 36)
                <tr>
                    {!! returnforCard($row) !!}
                    @php($row++)
                </tr>
            @endif
        @endif
    @endfor

    <tr class=blank style='mso-height-source:userset;height:19.5pt'>
        <td colspan=43 height=26 class=subjects width=540
            style='height:19.5pt;width:407pt;font-weight: bold;padding-left: 5px;'>
            Applied and Specialized Subjects
        </td>
        {!! returnforCard($row) !!}
        @php($row++)
    </tr>

    @for($ctr = 0; $ctr<count($core); $ctr++)
        @if($core[$ctr]->user_id != "")
            <tr style='mso-height-source:userset;height:16.5pt'>
                <td colspan=20 height=26 class=subjects width=225
                    style='height:19.5pt; width:171pt; padding-left: 10px;'>
                    {{ $core[$ctr]->subjecttitle }}</td>
                <td colspan=3 class=finalGrade>
                    {{ $grades[$core[$ctr]->subjectname][$quarters[1]]['final'] ?? '' }}</td>
                <td colspan=2 class=finaleffort><sub class="effort">
                        {{ $grades[$core[$ctr]->subjectname][$quarters[1]]['effort'] ?? '' }}</sub>
                </td>
                <td colspan=3 class=finalGrade>
                    {{ $grades[$core[$ctr]->subjectname][$quarters[2]]['final'] ?? '' }}</td>
                <td colspan=2 class=finaleffort><sub class="effort">
                        {{ $grades[$core[$ctr]->subjectname][$quarters[2]]['effort'] ?? '' }}</sub>
                </td>
                <td colspan=4 class=finalGrade>
                    {{ $grades[$core[$ctr]->subjectname][5]['final'] ?? '' }}</td>
                <td colspan=2 class=finaleffort><sub class="effort">
                        {{ $grades[$core[$ctr]->subjectname][5]['effort'] ?? '' }}</sub></td>
                <td colspan=7 class=remarks>
                    {{ $grades[$core[$ctr]->subjectname]['remarks'] ?? '' }}</td>
                {!! returnforCard($row) !!}
            </tr>
            @php($row++)
            @if(strlen($core[$ctr]->subjecttitle) > 36)
                <tr>
                    {!! returnforCard($row) !!}
                    @php($row++)
                </tr>
            @endif
        @endif
    @endfor
    <tr style='mso-height-source:userset;height:19.5pt'>
        <td colspan=20 height=26 class=subjects width=225 style='height:19.5pt;
  width:171pt'>&nbsp;DEPORTMENT
        </td>
        <td colspan=5 class=deportment
            style='width: 30px;'>{{ $grades['deportment'][$quarters[1]] ?? '' }}</td>
        <td colspan=5 class=deportment
            style='width: 30px;'>{{ $grades['deportment'][$quarters[2]] ?? '' }}</td>
        <td colspan=6 class=deportment style='width: 30px;'>{{ $grades['deportment'][5] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['deportment']['remarks'] ?? '' }}</td>
        {!! returnforCard($row) !!}
        @php($row++)
    </tr>
    <tr style='mso-height-source:userset;height:19.5pt'>
        <td colspan=30 height=26 class=generalaverage style='height:19.5pt'>GENERAL AVERAGE</td>
        <td colspan=6 class=finalGrade style="text-align: center;">{{ $grades['generalaverage'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['generalremarks'] ?? '' }}</td>
    </tr>

@endsection
