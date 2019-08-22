@php($height = "height:17.25pt")

@extends('reports.templates._layouts.T1-T3')

@section('content')
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
        <td colspan=2 class=midquarterlabels>Grades</td>
        <td colspan=4 class=midquarterlabels>Remarks</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=2 class=midquarterlabels>Grades</td>
        <td colspan=4 class=midquarterlabels>Remarks</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=9 height=20 class=midquartersubjects style='height:15.0pt'>LANGUAGE ARTS - GRAMMAR
        </td>
        <td colspan=8 class=midquarterminor>{{ $grades['LANGUAGE']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers>{{ $grades['LANGUAGE'][$quarter]['midquarter'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=midquartersubjects>MATHEMATICS</td>
        <td colspan=8 class=midquarterminor>{{ $grades['MATH']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers>{{ $grades['MATH'][$quarter]['midquarter'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Uses correct sentence structure in
            oral/written form
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['LANGUAGE']['S1'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 class=midquartercomments>Comprehends math concepts</td>
        <td colspan=2 class=midquarterteachers>{{ $comments['MATH']['S1'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Uses capital letters and punctuation
            marks correctly
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['LANGUAGE']['S2'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 class=midquartercomments>Solves word problems</td>
        <td colspan=2 class=midquarterteachers>{{ $comments['MATH']['S2'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Expresses ideas in paragraph form
            clearly
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['LANGUAGE']['S3'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
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
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Applies spelling skills effectively
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['LANGUAGE']['S4'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
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
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Edits written words
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['LANGUAGE']['S5'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=midquartersubjects>CHRISTIAN FORMATION</td>
        <td colspan=8 class=midquarterminor>{{ $grades['CF']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers>{{ $grades['CF'][$quarter]['midquarter'] ?? '' }}</td>
        <td colspan=4 class=midquarterblock></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Uses proper strokes in handwriting
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['LANGUAGE']['S6'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 class=midquartercomments>Applies Biblical truths in daily living</td>
        <td colspan=2 class=midquarterteachers>{{ $comments['CF']['S1'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
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
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=9 height=20 class=midquartersubjects style='height:15.0pt'>LANGUAGE ARTS -
            READING
        </td>
        <td colspan=8 class=midquarterminor>{{ $grades['READING']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers
        >{{ $grades['READING'][$quarter]['midquarter'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=midquartersubjects>CIVICS and CULTURE</td>
        <td colspan=8 class=midquarterminor>{{ $grades['CIVICS']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers
        >{{ $grades['CIVICS'][$quarter]['midquarter'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Reads fluently
            with expression
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['READING']['S1'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 class=midquartercomments>Interprets symbols and reads the map/globe
            accurately
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['CIVICS']['S1'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Reads with
            meaning
        </td>
        <td colspan=6 class=midquartercomments></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 class=midquartercomments>Respects flexibility in adapting to cultural
            diversity in school
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['CIVICS']['S2'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt; padding-left: 30px;'>Word Level</td>
        <td colspan=2 class=midquarterteachers>{{ $comments['READING']['S2'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
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
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt; padding-left: 30px;'>Sentence Level</td>
        <td colspan=2 class=midquarterteachers>{{ $comments['READING']['S3'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=midquartersubjects>MINOR SUBJECTS:</td>
        <td colspan=14 class=midquarterblock></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt; padding-left: 30px;'>Text Level</td>
        <td colspan=2 class=midquarterteachers>{{ $comments['READING']['S4'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=midquarterminor>HELE</td>
        <td colspan=8 class=midquarterminor>{{ $grades['LIVELIHOOD']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers>
            @if($student->gradelevel >= 4)
                {{ $grades['LIVELIHOOD'][$quarter]['midquarter'] ?? '' }}
            @else
                {{ 'N / A' }}
            @endif
        </td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Uses new
            vocabulary in oral and written work
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['READING']['S5'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=midquarterminor>COMPUTER</td>
        <td colspan=8 class=midquarterminor>{{ $grades['COMPUTER']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers
        >{{ $grades['COMPUTER'][$quarter]['midquarter'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Responds to
            reading experiences
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['READING']['S6'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=midquarterminor>MUSIC</td>
        <td colspan=8 class=midquarterminor>{{ $grades['MUSIC']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers
        >{{ $grades['MUSIC'][$quarter]['midquarter'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
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
        <td colspan=9 class=midquarterminor>ART</td>
        <td colspan=8 class=midquarterminor>{{ $grades['ART']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers
        >{{ $grades['ART'][$quarter]['midquarter'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=9 height=20 class=midquartersubjects style='height:15.0pt'>FILIPINO</td>
        <td colspan=8 class=midquarterminor>{{ $grades['FILIPINO']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers
        >{{ $grades['FILIPINO'][$quarter]['midquarter'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=midquarterminor>PE</td>
        <td colspan=8 class=midquarterminor>{{ $grades['PE']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers>{{ $grades['PE'][$quarter]['midquarter'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Comprehends
            basic concepts at grade level
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['FILIPINO']['S1'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Applies knowledge in writing skills
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['FILIPINO']['S2'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=3 class=blank>Legend:</td>
        <td colspan=6 class=blank><b>3</b> - Highly Proficient,</td>
        <td colspan=4 class=blank><b>2</b> - Proficient,</td>
        <td colspan=10 class=blank><b>1</b> - Progressing Towards Standard</td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Can express ideas in oral form
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['FILIPINO']['S3'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
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
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=9 height=20 class=midquartersubjects style='height:15.0pt'>SCIENCE</td>
        <td colspan=8 class=midquarterminor>{{ $grades['SCIENCE']['teacher'] ?? '' }}</td>
        <td colspan=2 class=midquarterteachers
        >{{ $grades['SCIENCE'][$quarter]['midquarter'] ?? '' }}</td>
        <td colspan=4 class=midquarterteachers></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
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
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Makes
            inferences / formulates conclusions
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['SCIENCE']['S1'] ?? '' }}</td>
        <td colspan=4 class=midquartercomments></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
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
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Performs
            experiments independently
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['SCIENCE']['S2'] ?? '' }}</td>
        <td colspan=4 class=midquartercomments></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=7 class=nametitles>{{ $homeroom ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=7 class=nametitles>{{ $principal ?? '' }}</td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Answers
            high-order thinking questions
        </td>
        <td colspan=2 class=midquarterteachers>{{ $comments['SCIENCE']['S3'] ?? '' }}</td>
        <td colspan=4 class=midquartercomments></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=7 class=undertitle>Homeroom Teacher</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=7 class=undertitle>School Principal</td>
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
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td height=20 class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
        <td class=blank style="border-top: 2px solid black"></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartersubjects style='height:15.0pt'>PERSONAL AND SOCIAL RELATIONSHIPS
        </td>
        <td colspan=3 class=midquarterteachers>Language</td>
        <td colspan=3 class=midquarterteachers>Reading</td>
        <td colspan=3 class=midquarterteachers>Filipino</td>
        <td colspan=3 class=midquarterteachers>Science</td>
        <td colspan=3 class=midquarterteachers>Math</td>
        <td colspan=3 class=midquarterteachers>CF</td>
        <td colspan=3 class=midquarterteachers>Civics</td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Is attentive</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['LANGUAGE']['PSR1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['READING']['PSR1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['FILIPINO']['PSR1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['SCIENCE']['PSR1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['MATH']['PSR1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CF']['PSR1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CIVICS']['PSR1'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Cooperates willingly with teachers and
            peers
        </td>
        <td colspan=3 class=midquarterteachers>{{ $comments['LANGUAGE']['PSR2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['READING']['PSR2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['FILIPINO']['PSR2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['SCIENCE']['PSR2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['MATH']['PSR2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CF']['PSR2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CIVICS']['PSR2'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Shows respect for authority
        </td>
        <td colspan=3 class=midquarterteachers>{{ $comments['LANGUAGE']['PSR3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['READING']['PSR3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['FILIPINO']['PSR3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['SCIENCE']['PSR3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['MATH']['PSR3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CF']['PSR3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CIVICS']['PSR3'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Respects rights and property of others
        </td>
        <td colspan=3 class=midquarterteachers>{{ $comments['LANGUAGE']['PSR4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['READING']['PSR4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['FILIPINO']['PSR4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['SCIENCE']['PSR4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['MATH']['PSR4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CF']['PSR4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CIVICS']['PSR4'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Exercises self-control and
            self-discipline
        </td>
        <td colspan=3 class=midquarterteachers>{{ $comments['LANGUAGE']['PSR5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['READING']['PSR5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['FILIPINO']['PSR5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['SCIENCE']['PSR5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['MATH']['PSR5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CF']['PSR5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CIVICS']['PSR5'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartersubjects style='height:15.0pt'>WORK AND STUDY SKILLS
        </td>
        <td colspan=21 class=midquarterteachers></td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Follows directions
        </td>
        <td colspan=3 class=midquarterteachers>{{ $comments['LANGUAGE']['WSS1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['READING']['WSS1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['FILIPINO']['WSS1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['SCIENCE']['WSS1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['MATH']['WSS1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CF']['WSS1'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CIVICS']['WSS1'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Completes work on time
        </td>
        <td colspan=3 class=midquarterteachers>{{ $comments['LANGUAGE']['WSS2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['READING']['WSS2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['FILIPINO']['WSS2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['SCIENCE']['WSS2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['MATH']['WSS2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CF']['WSS2'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CIVICS']['WSS2'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Works independently
        </td>
        <td colspan=3 class=midquarterteachers>{{ $comments['LANGUAGE']['WSS3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['READING']['WSS3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['FILIPINO']['WSS3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['SCIENCE']['WSS3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['MATH']['WSS3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CF']['WSS3'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CIVICS']['WSS3'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Does his / her best in assigned tasks
        </td>
        <td colspan=3 class=midquarterteachers>{{ $comments['LANGUAGE']['WSS4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['READING']['WSS4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['FILIPINO']['WSS4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['SCIENCE']['WSS4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['MATH']['WSS4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CF']['WSS4'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CIVICS']['WSS4'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;height:15.0pt'>
        <td colspan=17 height=20 class=midquartercomments style='height:15.0pt'>Contributes to class discussions
        </td>
        <td colspan=3 class=midquarterteachers>{{ $comments['LANGUAGE']['WSS5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['READING']['WSS5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['FILIPINO']['WSS5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['SCIENCE']['WSS5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['MATH']['WSS5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CF']['WSS5'] ?? '' }}</td>
        <td colspan=3 class=midquarterteachers>{{ $comments['CIVICS']['WSS5'] ?? '' }}</td>
    </tr>
@endsection
