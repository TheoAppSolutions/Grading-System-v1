<table class="table">
    <tr>
        <td>Performance
            <select title="" class="form-control select" id="WSS1">
                <option value="0" {{ isset($comments->WSS2)?$comments->WSS2==0?'selected':'':'' }}>
                </option>
                <option value="3" {{ isset($comments->WSS1)?$comments->WSS1==3?'selected':'':'' }}>
                    Excellent
                </option>
                <option value="2" {{ isset($comments->WSS1)?$comments->WSS1==2?'selected':'':'' }}>
                    Satisfactory
                </option>
                <option value="1" {{ isset($comments->WSS1)?$comments->WSS1==1?'selected':'':'' }}>
                    Unsatisfactory
                </option>
            </select>
        </td>
        <td>Behavior
            <select title="" class="form-control select" id="WSS2">
                <option value="0" {{ isset($comments->WSS2)?$comments->WSS2==0?'selected':'':'' }}>
                </option>
                <option value="3" {{ isset($comments->WSS2)?$comments->WSS2==3?'selected':'':'' }}>
                    Excellent
                </option>
                <option value="2" {{ isset($comments->WSS2)?$comments->WSS2==2?'selected':'':'' }}>
                    Satisfactory
                </option>
                <option value="1" {{ isset($comments->WSS2)?$comments->WSS2==1?'selected':'':'' }}>
                    Unsatisfactory
                </option>
            </select>
        </td>
    </tr>
    <tr>
        <td colspan="4" class="alert-info" style="text-align: left;">Additional Comments</td>
    </tr>
    <tr class="alert-success">
        <td><input title="" type="checkbox" class="comment" id="S1"
                   value="{{ $comments->S1 or '0' }}">
            Works for academic excellence
        </td>
        <td><input title="" type="checkbox" class="comment" id="S2"
                   value="{{ $comments->S2 or '0' }}">
            Shows academic improvement
        </td>
    </tr>
    <tr class="alert-success">
        <td><input title="" type="checkbox" class="comment" id="S3"
                   value="{{ $comments->S3 or '0' }}">
            Participates effectively
        </td>
        <td><input title="" type="checkbox" class="comment" id="S4"
                   value="{{ $comments->S4 or '0' }}">
            Positive attitude and effort
        </td>
    </tr>
    <tr class="alert-success">
        <td><input title="" type="checkbox" class="comment" id="S5"
                   value="{{ $comments->S5 or '0' }}">
            Makes connections and applies knowledge
        </td>
        <td><input title="" type="checkbox" class="comment" id="S6"
                   value="{{ $comments->S6 or '0' }}">
            Displays good study skills
        </td>
    </tr>
    <tr class="alert-success">
        <td><input title="" type="checkbox" class="comment" id="S7"
                   value="{{ $comments->S7 or '0' }}">
            Works well in group activities
        </td>
        <td>&nbsp;</td>
    </tr>
    <tr class="alert-danger">
        <td><input title="" type="checkbox" class="comment" id="S8"
                   value="{{ $comments->S8 or '0' }}">
            Appears disorganized
        </td>
        <td><input title="" type="checkbox" class="comment" id="S9"
                   value="{{ $comments->S9 or '0' }}">
            Quality of work declining
        </td>
    <tr class="alert-danger">
        <td><input title="" type="checkbox" class="comment" id="S10"
                   value="{{ $comments->S10 or '0' }}">
            Does not bring materials/follow instructions
        </td>
        <td><input title="" type="checkbox" class="comment" id="S11"
                   value="{{ $comments->S11 or '0' }}">
            Inconsistent effort
        </td>
    <tr class="alert-danger">
        <td><input title="" type="checkbox" class="comment" id="S12"
                   value="{{ $comments->S12 or '0' }}">
            Needs to participate more in discussions
        </td>
        <td><input title="" type="checkbox" class="comment" id="PSR1"
                   value="{{ $comments->PSR1 or '0' }}">
            Difficulty in making connections and applying knowledge
        </td>
    <tr class="alert-danger">
        <td><input title="" type="checkbox" class="comment" id="PSR2"
                   value="{{ $comments->PSR2 or '0' }}">
            Has difficulty in exams
        </td>
        <td><input title="" type="checkbox" class="comment" id="PSR3"
                   value="{{ $comments->PSR3 or '0' }}">
            Unable to maintain attentiveness throughout entire class period
        </td>
    </tr>
</table>