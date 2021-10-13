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

    @php($category = ['core', 'applied', 'specialized'])

    @foreach($category as $cat)
        @if(isset(${$cat}) and count(${$cat}) > 0)
            <tr class=blank style='mso-height-source:userset;height:19.5pt'>
                <td colspan=43 height=26 class=subjects style='height:19.5pt;font-weight: bold;padding-left: 5px;'>
                    {{ ucfirst($cat) }} Subjects
                </td>
                <td class=blank></td>
            </tr>

            @for($ctr = 0; $ctr<count(${$cat}); $ctr++)
                @if(${$cat}[$ctr]->user_id != "")
                    <tr style='mso-height-source:userset;height:16.5pt'>
                        <td colspan=20 height=26 class=subjects width=225
                            style='height:19.5pt;width:171pt;padding-left: 10px;'>
                            {{ ${$cat}[$ctr]->subjecttitle }}</td>
                        <td colspan=3 class=finalGrade>
                            {{ $grades[${$cat}[$ctr]->subjectname][$quarters[1]]['final'] ?? '' }}</td>
                        <td colspan=2 class=finaleffort><sub class="effort">
                                {{ $grades[${$cat}[$ctr]->subjectname][$quarters[1]]['effort'] ?? '' }}</sub>
                        </td>
                        <td colspan=3 class=finalGrade>
                            {{ $grades[${$cat}[$ctr]->subjectname][$quarters[2]]['final'] ?? '' }}</td>
                        <td colspan=2 class=finaleffort><sub class="effort">
                                {{ $grades[${$cat}[$ctr]->subjectname][$quarters[2]]['effort'] ?? '' }}</sub>
                        </td>
                        <td colspan=4 class=finalGrade>
                            {{ $grades[${$cat}[$ctr]->subjectname][5]['final'] ?? '' }}</td>
                        <td colspan=2 class=finaleffort><sub class="effort">
                                {{ $grades[${$cat}[$ctr]->subjectname][5]['effort'] ?? '' }}</sub></td>
                        <td colspan=7 class=remarks>
                            {{ $grades[${$cat}[$ctr]->subjectname]['remarks'] ?? '' }}</td>
                    </tr>
                @endif
            @endfor
        @endif
    @endforeach

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
    </tr>
    <tr style='mso-height-source:userset;height:19.5pt'>
        <td colspan=30 height=26 class=generalaverage style='height:19.5pt'>GENERAL AVERAGE</td>
        <td colspan=6 class=finalGrade style="text-align: center;">{{ $grades['generalaverage'] ?? '' }}</td>
        <td colspan=7 class=remarks>{{ $grades['generalremarks'] ?? '' }}</td>
    </tr>
@endsection
