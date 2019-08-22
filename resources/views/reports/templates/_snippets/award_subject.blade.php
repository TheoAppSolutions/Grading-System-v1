@if(isset($subjects[$ctr]))
    <td colspan=4 class=checkmark></td>
    <td colspan=10 class=comments>{{ $subjects[$ctr]["subjectname"] }}</td>
    <td class=blank></td>
@endif
