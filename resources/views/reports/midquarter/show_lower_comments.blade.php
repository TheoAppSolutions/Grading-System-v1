<table class="table">
    @if($subject->subjectname == 'ENGLISH')
        <tr>
            <td colspan="4" style="background-color: #b5d1ff"><h4>English</h4></td>
        </tr>
        <tr>
            <td><b>Language:</b> Knowing about the English language
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S1,'id' => 'S1','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Literature:</b> Understanding, appreciating, responding to, analysing and
                creating literary texts
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S2,'id' => 'S2','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Literacy:</b> Text in context and interacting with others
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S3,'id' => 'S3','isApplicable' => true])
            </td>
        </tr>

    @elseif($subject->subjectname == 'MATHEMATICS')
        <tr>
            <td colspan="4" style="background-color: #b5d1ff"><h4>Mathematics</h4></td>
        </tr>
        <tr>
            <td>Understanding math concepts</td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S1,'id' => 'S1','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td>Fluency</td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S2,'id' => 'S2','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td>Problem-solving</td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S3,'id' => 'S3','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td>Reasoning</td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S4,'id' => 'S4','isApplicable' => true])
            </td>
        </tr>

    @elseif($subject->subjectname == 'SCIENCE')
        <tr>
            <td colspan="4" style="background-color: #b5d1ff"><h4>Science</h4></td>
        </tr>
        <tr>
            <td>Science understanding</td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S1,'id' => 'S1','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td>Science as a human endeavour</td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S2,'id' => 'S2','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td>Science inquiry skills</td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S3,'id' => 'S3','isApplicable' => true])
            </td>
        </tr>

    @elseif($subject->subjectname == 'HASS')
        <tr>
            <td colspan="4" style="background-color: #b5d1ff"><h4>HASS</h4></td>
        </tr>
        <tr>
            <td><b>Knowledge and understanding:</b> Applies concepts of disciplinary
                thinking
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S1,'id' => 'S1','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Inquiry and skills:</b> Investigates events, developments, issues and
                phenomena, both historical and contemporary
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S2,'id' => 'S2','isApplicable' => true])
            </td>
        </tr>

    @elseif($subject->subjectname == 'HEALTH')
        <tr>
            <td colspan="4" style="background-color: #b5d1ff"><h4>HEALTH</h4></td>
        </tr>
        <tr>
            <td><b>Personal, social and community health:</b> Being healthy, safe and
                active
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S1,'id' => 'S1','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Personal, social and community health:</b> Communicating and
                interacting for health and well being
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S2,'id' => 'S2','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Personal, social and community health:</b> Contributing to healthy
                and active communities
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S3,'id' => 'S3','isApplicable' => true])
            </td>
        </tr>

    @elseif($subject->subjectname == 'P.E.')
        <tr>
            <td colspan="4" style="background-color: #b5d1ff"><h4>P.E.</h4></td>
        </tr>
        <tr>
            <td><b>Movement and physical activity:</b> Refining movement skills</td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S1,'id' => 'S1','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Movement and physical activity:</b> Developing movement concepts and
                strategies
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S2,'id' => 'S2','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Understanding movement:</b> Fitness and physical activity</td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S3,'id' => 'S3','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Learning through movement:</b> Critical and creative thinking in movement</td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S4,'id' => 'S4','isApplicable' => true])
            </td>
        </tr>

    @elseif($subject->subjectname == 'ICT/PRACTICAL SKILLS')
        <tr>
            <td colspan="4" style="background-color: #b5d1ff"><h4>ICT/PRACTICAL SKILLS</h4></td>
        </tr>
        <tr>
            <td><b>Design and Technologies:</b> Knowledge and understanding
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S1,'id' => 'S1','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Digital Technologies:</b> Knowledge and understanding
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S2,'id' => 'S2','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Design and Technologies:</b> Processes and production skills
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S3,'id' => 'S3','isApplicable' => true])
            </td>
        </tr>

    @elseif($subject->subjectname == 'ARTS')
        <tr>
            <td colspan="4" style="background-color: #b5d1ff"><h4>THE ARTS</h4></td>
        </tr>
        <tr>
            <td><b>Dance:</b> Communicates and expresses meaning through purposeful
                movement
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S1,'id' => 'S1','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Drama:</b> Uses body language, gesture and space to make meaning as
                performers and audience
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S2,'id' => 'S2','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Media Arts:</b> Use communications technologies to creatively explore,
                make and interpret stories about people, ideas and the world around
                them

            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S3,'id' => 'S3','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Music:</b> Composes and performs music from a diverse range of styles, traditions and contexts
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S4,'id' => 'S4','isApplicable' => true])
            </td>
        </tr>
        <tr>
            <td><b>Visual Arts:</b> Develops practical skills and critical thinking which inform their work as artists
                and audience.
            </td>
            <td>
                @include('grading._snippets.options_comments', ['comment' => $comments->S5,'id' => 'S5','isApplicable' => true])
            </td>
        </tr>

    @endif
</table>
