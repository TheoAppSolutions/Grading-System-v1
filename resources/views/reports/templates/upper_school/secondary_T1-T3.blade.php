@php($height = "height:17.25pt")

@extends('reports.templates._layouts.T1-T3')

@section('content')
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=9 class=subjectLabel>English</td>
        <td colspan=8 class=teacherName>{{ $grades['ENGLISH']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['ENGLISH'][$quarter]['rawfinal'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=subjectLabel>Personal Development (Health)</td>
        <td colspan=8 class=teacherName>{{ $grades['HEALTH']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['HEALTH'][$quarter]['rawfinal'] ?? '' }}</td>
    </tr><!-- English/Health -->
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=17 class=commentLabel width=408><b>Language:</b>
            <span>Knowing about the English language</span>
        </td>
        <td colspan=2 class=commentValue width=48>{{ $comments['ENGLISH']['S1'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 rowspan=2 class=commentLabel width=408>
            <b>Personal, social and community health:</b>
            <span> Being healthy, safe and active</span></td>
        <td colspan=2 rowspan=2 class=commentValue width=48>{{ $comments['HEALTH']['S1'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=17 rowspan=2 height=46 class=commentLabel width=408>
            <b>Literature:</b><span> Understanding,
                    appreciating, responding to, analysing and creating literary texts</span></td>
        <td colspan=2 rowspan=2 class=commentValue width=48>{{ $comments['ENGLISH']['S2'] ?? '' }}
        </td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 rowspan=2 class=commentLabel width=408>
            <b>Personal, social and community health:</b>
            <span>Communicating and interacting for health and wellbeing</span></td>
        <td colspan=2 rowspan=2 class=commentValue width=48>{{ $comments['HEALTH']['S2'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=17 class=commentLabel width=408><b>Literacy:</b>
            <span> Text in context and interacting with others</span></td>
        <td colspan=2 class=commentValue width=48>{{ $comments['ENGLISH']['S3'] ?? '' }}
        </td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 rowspan=2 class=commentLabel width=408>
            <b>Personal, social and community health:</b>
            <span> Contributing to healthy and active communities</span></td>
        <td colspan=2 rowspan=2 class=commentValue width=48>{{ $comments['HEALTH']['S3'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=9 class=subjectLabel>Mathematics</td>
        <td colspan=8 class=teacherName>{{ $grades['MATHEMATICS']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['MATHEMATICS'][$quarter]['rawfinal'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
    </tr><!-- Math -->
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=17 class=commentLabel width=408>Understanding math concepts
        </td>
        <td colspan=2 class=commentValue width=48>{{ $comments['MATHEMATICS']['S1'] ?? '' }}</td>

    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=17 class=commentLabel width=408>Fluency
        </td>
        <td colspan=2 class=subjectGrade width=48>{{ $comments['MATHEMATICS']['S2'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=subjectLabel>P.E.</td>
        <td colspan=8 class=teacherName>{{ $grades['P.E.']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['P.E.'][$quarter]['rawfinal'] ?? '' }}</td>
    </tr><!-- P.E. -->
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=17 class=commentLabel width=408>Problem-solving
        </td>
        <td colspan=2 class=commentValue width=48>{{ $comments['MATHEMATICS']['S3'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 class=commentLabel width=408><b>Movement and
                physical activity:</b> Refining movement skills
        </td>
        <td colspan=2 class=commentValue width=48>{{ $comments['P.E.']['S1'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=17 class=commentLabel width=408>Reasoning
        </td>
        <td colspan=2 class=commentValue width=48>{{ $comments['MATHEMATICS']['S4'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 rowspan=2 class=commentLabel width=408><b>Movement
                and physical activity:</b> Developing movement concepts and strategies
        </td>
        <td colspan=2 rowspan=2 class=commentValue width=48>{{ $comments['P.E.']['S2'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=9 class=subjectLabel>Science</td>
        <td colspan=8 class=teacherName>{{ $grades['SCIENCE']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade width=48>{{ $grades['SCIENCE'][$quarter]['rawfinal'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 class=commentLabel width=408><b>Understanding
                movement:</b> Fitness and physical activity
        </td>
        <td colspan=2 class=commentValue width=48>{{ $comments['P.E.']['S3'] ?? '' }}</td>
    </tr><!-- Science -->
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=17 class=commentLabel width=408>Science understanding
        </td>
        <td colspan=2 class=subjectGrade width=48>{{ $comments['SCIENCE']['S1'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 rowspan=2 class=commentLabel width=408><b>Learning
                through movement:</b> Critical and creative thinking in movement
        </td>
        <td colspan=2 rowspan=2 class=commentValue width=48>{{ $comments['P.E.']['S4'] ?? '' }}</td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=17 class=commentLabel width=408>Science as a human endeavour
        </td>
        <td colspan=2 class=commentValue width=48>{{ $comments['SCIENCE']['S2'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
    </tr>
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=17 class=commentLabel width=408>Science inquiry skills
        </td>
        <td colspan=2 class=commentValue width=48>{{ $comments['SCIENCE']['S3'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
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
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=subjectLabel>ICT/Practical Skills</td>
        <td colspan=8 class=teacherName>{{ $grades['ICT/PRACTICAL SKILLS']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade width=48>{{ $grades['ICT/PRACTICAL SKILLS'][$quarter]['rawfinal'] ?? '' }}</td>
    </tr><!-- ICT -->
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=9 class=subjectLabel>Agriculture</td>
        <td colspan=8 class=teacherName>{{ $grades['AGRICULTURE']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['AGRICULTURE'][$quarter]['rawfinal'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 class=commentLabel width=408><b>Design and Technologies:</b>
            <span> Knowledge and understanding</span></td>
        <td colspan=2 class=commentValue width=48>{{ $comments['ICT/PRACTICAL SKILLS']['S1'] ?? '' }}</td>
    </tr><!-- Agriculture -->
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=9 class=subjectLabel>Business Studies</td>
        <td colspan=8 class=teacherName>{{ $grades['BUSINESS STUDIES']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['BUSINESS STUDIES'][$quarter]['rawfinal'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 class=commentLabel width=408><b>Digital Technologies:</b>
            <span> Knowledge and understanding</span></td>
        <td colspan=2 class=commentValue width=48>{{ $comments['ICT/PRACTICAL SKILLS']['S2'] ?? '' }}</td>
    </tr><!-- Business Studies -->
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=9 class=subjectLabel>Civics/Geography</td>
        <td colspan=8 class=teacherName>{{ $grades['CIVICS/GEOGRAPHY']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['CIVICS/GEOGRAPHY'][$quarter]['rawfinal'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 class=commentLabel width=408><b>Design and Technologies:</b>
            <span> Processes and production skills.</span></td>
        <td colspan=2 class=commentValue width=48>{{ $comments['ICT/PRACTICAL SKILLS']['S3'] ?? '' }}</td>
    </tr><!-- Civics -->
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=9 class=subjectLabel>CRE</td>
        <td colspan=8 class=teacherName>{{ $grades['CRE']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['CRE'][$quarter]['rawfinal'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
    </tr><!-- CRE -->
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=9 class=subjectLabel>History</td>
        <td colspan=8 class=teacherName>{{ $grades['HISTORY']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['HISTORY'][$quarter]['rawfinal'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=9 class=subjectLabel>The Arts</td>
        <td colspan=8 class=teacherName>{{ $grades['ARTS']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['ARTS'][$quarter]['rawfinal'] ?? '' }}</td>
    </tr><!-- History/Arts -->
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=9 class=subjectLabel>Making a Living/Home Economics</td>
        <td colspan=8 class=teacherName>{{ $grades['MAKING A LIVING']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['MAKING A LIVING'][$quarter]['rawfinal'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
        <td colspan=17 rowspan=2 class=commentLabel width=408>
            <b>Dance: </b><span>Communicates and
                    expresses meaning through purposeful movement</span></td>
        <td colspan=2 rowspan=2 class=commentValue width=48>{{ $comments['ARTS']['S1'] ?? '' }}</td>
    </tr><!-- Making A Living -->
    <tr style='mso-height-source:userset;{!! $height !!}'>
        <td colspan=9 class=subjectLabel>Elective (Music Private Lessons)</td>
        <td colspan=8 class=teacherName>{{ $grades['MUSIC']['teacher'] ?? 'N/A' }}</td>
        <td colspan=2 class=subjectGrade>{{ $grades['MUSIC'][$quarter]['rawfinal'] ?? '' }}</td>
        <td class=blank></td>
        <td class=blank></td>
        <td class=blank></td>
    </tr><!-- Music -->
@endsection
