@extends('reports.templates._layouts.T1-T3')

@section('content')
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
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
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td colspan=16 height=20 class=midquarterteachers width=384 style='height:15.0pt;width:288pt'>SUBJECT</td>
        <td colspan=7 class=midquarterteachers width=168 style='width:126pt'>TEACHER</td>
        <td colspan=4 class=midquarterteachers width=96 style='width:72pt'>MQ Grade</td>
        <td colspan=4 class=midquarterteachers width=96 style='width:72pt'>Performance</td>
        <td colspan=4 class=midquarterteachers width=96 style='width:72pt'>Behavior</td>
        <td colspan=13 class=midquarterteachers width=310 style='width:232pt'>Comments</td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td colspan=84 height=20 class=subjects style="font-weight: bold;">Core Subjects</td>
    </tr>
    @foreach($core as $subject)
        @php($grades["$subject->subjectname"]['teacher'] = $subject->title . ' ' . $subject->firstname . ' ' . $subject->lastname)
        @if (isset($grades["$subject->subjectname"]['teacher']))
            <tr class=blank style='mso-height-source:userset;height:15.0pt'>
                <td colspan=16 height=20 class=subjects>{{ $subject->subjecttitle ?? '' }}</td>
                <td colspan=7
                    class=subjects>{{ $grades["$subject->subjectname"]['teacher'] ?? '' }}</td>
                <td colspan=4 class=midquarterteachers
                    style="vertical-align: middle;">{{ $grades["$subject->subjectname"][$quarter]['midquarter'] ?? '' }}</td>
                <td colspan=4 class=midquarterteachers
                    style="vertical-align: middle;">{{ $comments["$subject->subjectname"]['performance'] ?? '' }}</td>
                <td colspan=4 class=midquarterteachers
                    style="vertical-align: middle;">{{ $comments["$subject->subjectname"]['behavior'] ?? '' }}</td>
                <td colspan=13 class=midquarterteachers
                    style="vertical-align: middle;">{{ $comments["$subject->subjectname"]['additional'] ?? '' }}</td>
            </tr>
        @endif
    @endforeach
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td colspan=84 height=20 class=subjects style="font-weight: bold;">Applied and Specialized Subjects</td>
    </tr>
    @foreach($specialized as $subject)
        @php($grades["$subject->subjectname"]['teacher'] = $subject->title . ' ' . $subject->firstname . ' ' . $subject->lastname)
        @if (isset($grades["$subject->subjectname"]['teacher']))
            <tr class=blank style='mso-height-source:userset;height:15.0pt'>
                <td colspan=16 height=20 class=subjects>{{ $subject->subjecttitle ?? '' }}</td>
                <td colspan=7 class=subjects>{{ $grades["$subject->subjectname"]['teacher'] ?? '' }}</td>
                <td colspan=4 class=midquarterteachers
                    style="vertical-align: middle;">{{ $grades["$subject->subjectname"][$quarter]['midquarter'] ?? '' }}</td>
                <td colspan=4 class=midquarterteachers
                    style="vertical-align: middle;">{{ $comments["$subject->subjectname"]['performance'] ?? '' }}</td>
                <td colspan=4 class=midquarterteachers
                    style="vertical-align: middle;">{{ $comments["$subject->subjectname"]['behavior'] ?? '' }}</td>
                <td colspan=13 class=midquarterteachers
                    style="vertical-align: middle;">{{ $comments["$subject->subjectname"]['additional'] ?? '' }}</td>
            </tr>
        @endif
    @endforeach
    @foreach($applied as $subject)
        @php($grades["$subject->subjectname"]['teacher'] = $subject->title . ' ' . $subject->firstname . ' ' . $subject->lastname)
        @if (isset($grades["$subject->subjectname"]['teacher']))
            <tr class=blank style='mso-height-source:userset;height:15.0pt'>
                <td colspan=16 height=20 class=subjects>{{ $subject->subjecttitle ?? '' }}</td>
                <td colspan=7 class=subjects>{{ $grades["$subject->subjectname"]['teacher'] ?? '' }}</td>
                <td colspan=4 class=midquarterteachers
                    style="vertical-align: middle;">{{ $grades["$subject->subjectname"][$quarter]['midquarter'] ?? '' }}</td>
                <td colspan=4 class=midquarterteachers
                    style="vertical-align: middle;">{{ $comments["$subject->subjectname"]['performance'] ?? '' }}</td>
                <td colspan=4 class=midquarterteachers
                    style="vertical-align: middle;">{{ $comments["$subject->subjectname"]['behavior'] ?? '' }}</td>
                <td colspan=13 class=midquarterteachers
                    style="vertical-align: middle;">{{ $comments["$subject->subjectname"]['additional'] ?? '' }}</td>
            </tr>
        @endif
    @endforeach

    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
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
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td colspan=3 height=20 class=blank style='height:15.0pt'>Legend:</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=4 class=blank>Comments:</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
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
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td height=20 class=blank style='height:15.0pt'></td>
        <td class=blank></td>
        <td colspan=18 class=blank>
            MQ Grade: 75 - 100, grades below 75 is reported as Failed
        </td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=remarks width=24 style='width:18pt'>1</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Works for academic excellence
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td height=20 class=blank style='height:15.0pt'></td>
        <td class=blank></td>
        <td colspan=18 class=blank width=432 style='width:324pt'>
            Performance and Behavior: reported as
        </td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=remarks width=24 style='border-top:none;width:18pt'>2</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Shows academic improvement
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td height=20 class=blank style='height:15.0pt'></td>
        <td class=blank></td>
        <td colspan=18 class=blank style="padding-left: 20px;"><b>E</b> (Excellent)</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=remarks width=24 style='border-top:none;width:18pt'>3</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Participates effectively
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td height=20 class=blank style='height:15.0pt'></td>
        <td class=blank></td>
        <td colspan=18 class=blank style="padding-left: 20px;"><b>S</b> (Satisfactory)</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=remarks width=24 style='border-top:none;width:18pt'>4</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Positive attitude and effort
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td height=20 class=blank style='height:15.0pt'></td>
        <td class=blank></td>
        <td colspan=18 class=blank style="padding-left: 20px;"><b>U</b> (Unsatisfactory)</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=remarks width=24 style='border-top:none;width:18pt'>5</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Makes connections and applies knowledge
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td height=20 class=blank style='height:15.0pt'></td>
        <td class=blank></td>
        <td colspan=18 class=blank>
            For Comments: please refer to the table on the right:
        </td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=remarks width=24 style='border-top:none;width:18pt'>6</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Displays good study skills
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
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
        <td class=remarks width=24 style='border-top:none;width:18pt'>7</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Works well in group activities
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
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
        <td class=remarks width=24 style='border-top:none;width:18pt'>8</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Appears disorganized
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
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
        <td class=remarks width=24 style='border-top:none;width:18pt'>9</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Quality of work declining
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
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
        <td class=remarks width=24 style='border-top:none;width:18pt'>10</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Does not bring materials/follow instructions
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td height=20 class=blank style='height:15.0pt'></td>
        <td class=centerlabels colspan="8" rowspan="3">
            {!! signatureTeacher($homeroom_id) !!}
        </td>
        <td class=blank></td>
        <td class=centerlabels colspan="8" rowspan="3">
            {!! signatureMiss() !!}
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
        <td class=remarks width=24 style='border-top:none;width:18pt'>11</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Inconsistent effort
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
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
        <td class=remarks width=24 style='border-top:none;width:18pt'>12</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Needs to participate more in discussions
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
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
        <td class=remarks width=24 style='border-top:none;width:18pt'>13</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Difficulty in making connections and applying knowledge
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td height=20 class=blank style='height:15.0pt'></td>
        <td colspan=8 class=nametitles>{{ $homeroom ?? '' }}</td>
        <td class=blank></td>
        <td colspan=8 class=nametitles>{{ $principal ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=remarks width=24 style='border-top:none;width:18pt'>14</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Has difficulty in exams
        </td>
        <td class=blank></td>
    </tr>
    <tr class=blank style='mso-height-source:userset;height:15.0pt'>
        <td height=20 class=blank style='height:15.0pt'></td>
        <td colspan=8 class=undertitle>Homeroom Teacher</td>
        <td class=blank></td>
        <td colspan=8 class=undertitle>Pricipal</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=remarks width=24 style='border-top:none;width:18pt'>15</td>
        <td colspan=18 class=subjects width=431 style='width:323pt'>
            Unable to maintain attentiveness throughout entire class period
        </td>
        <td class=blank></td>
    </tr>
@endsection
