<tr style='mso-height-source:userset;height:15.0pt'>
    <td colspan=20 height=20 class=commentstitle style='height:15.0pt'>AWARDS EARNED:</td>
    <td colspan=37 class=commentstitle>SUBJECT AREA:</td>
</tr>

@php($ctr=0)

<tr style='mso-height-source:userset;height:15.0pt'>
    <td colspan=8 height=20 class=checkmark style='height:15.0pt'>{!! $award['HIGHESTHONORS'] ?? '' !!}</td>
    <td colspan=9 class=comments>With Highest Honors</td>
    <td colspan=3 class=blank></td>

    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td colspan=8 height=20 class=checkmark style='height:15.0pt'>{!! $award['HIGHHONORS'] ?? '' !!}</td>
    <td colspan=9 class=comments>With High Honors</td>
    <td colspan=3 class=blank></td>

    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td colspan=8 height=20 class=checkmark style='height:15.0pt'>{!! $award['HONORS']  ?? '' !!}</td>
    <td colspan=9 class=comments>With Honors</td>
    <td colspan=3 class=blank></td>

    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td colspan=8 height=20 class=checkmark style='height:15.0pt'>{!! $award["DEPORTMENT"] ?? '' !!}</td>
    <td colspan=9 class=comments>Deportment</td>
    <td colspan=3 class=blank></td>

    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td colspan=8 height=20 class=checkmark style='height:15.0pt'>{!! $award['EFFORT'] ?? '' !!}</td>
    <td colspan=9 class=comments>Effort</td>
    <td colspan=3 class=blank></td>

    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td colspan=8 height=20 class=checkmark style='height:15.0pt'>{!! $attendance->PerfectAttendance ?? '' !!}</td>
    <td colspan=9 class=comments>Perfect Attendance</td>
    <td colspan=3 class=blank></td>

    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
</tr><tr style='mso-height-source:userset;height:15.0pt'>
    <td colspan=8 height=20 class=blank style='height:15.0pt'></td>
    <td colspan=9 class=blank></td>
    <td colspan=3 class=blank></td>

    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
</tr>
</tr><tr style='mso-height-source:userset;height:15.0pt'>
    <td colspan=8 height=20 class=blank style='height:15.0pt'></td>
    <td colspan=9 class=blank></td>
    <td colspan=3 class=blank></td>

    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
    @if(isset($subjects[$ctr]))
        @include('reports.templates._snippets.award_subject')
        @php($ctr++)
    @endif
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
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
<tr style='mso-height-source:userset;height:15.0pt'>
    <td colspan=17 height=20 class=commentstitle style='height:15.0pt'>GUIDELINES / PROTOCOL
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
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td colspan=24 height=20 class=comments style='height:15.0pt'>The Awards to Compute for the Recognition Ceremony
    </td>
    <td colspan=33 class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=commentstitle>A.&nbsp;</td>
    <td colspan=13 class=commentstitle>Academic Excellence Award:</td>
    <td colspan=41 class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td colspan=24 class=comments>With Highest Honors: 96 - 100%</td>
    <td colspan=28 class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td colspan=24 class=comments>With High Honors: 93 - 95.99%</td>
    <td colspan=28 class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td colspan=24 class=comments>With Honors: 90 - 92.99%</td>
    <td colspan=28 class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=commentstitle>B.&nbsp;</td>
    <td colspan=12 class=commentstitle>Subject Excellence Award:</td>
    <td colspan=42 class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td colspan=31 class=comments>Highest Cumulative Grade Average (per subject)<br>PE only: (1 male; 1 female)
    </td>
    <td colspan=21 class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=commentstitle>C.&nbsp;</td>
    <td colspan=11 class=commentstitle>Effort Excellence Award:</td>
    <td colspan=43 class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td colspan=36 class=comments>All 5's in final average of All Major Subjects<br>
        (All Major Subjects and sub-average for the non-academic subjects).
    </td>
    <td colspan=5 class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=commentstitle>D.&nbsp;</td>
    <td colspan=14 class=commentstitle>Deportment Excellence Award:</td>
    <td colspan=40 class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td colspan=36 class=comments>Any student getting an average of 90% and above with out any grade below 85%.
    </td>
    <td colspan=16 class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
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
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
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
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td colspan=18 rowspan=2 class=studentinfo style='border-bottom:1.0pt solid black'>
        {{ $homeroom ?? '' }}
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
    <td colspan=18 rowspan=2 class=studentinfo style='border-bottom:1.0pt solid black'>
        {{ $principal ?? '' }}
    </td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
</tr>
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
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
<tr style='mso-height-source:userset;height:15.0pt'>
    <td height=20 class=blank style='height:15.0pt'></td>
    <td class=blank></td>
    <td colspan=18 class=officelabel>Homeroom Teacher</td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td colspan=18 class=officelabel>Principal</td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
    <td class=blank></td>
</tr>
