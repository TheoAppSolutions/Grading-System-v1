<tr style='mso-height-source:userset;{{ $height }}'>
    <td colspan=8 class=months>{{ schema('attendance_type') }}</td>
    @for($ctr = 1; $ctr <= schema('attendance_count'); $ctr++)
        @if (schema('attendance_type') == "Term")
            <td colspan=4 class=months>{{ $ctr }}</td>
        @elseif (schema('attendance_type') == "Months")
            <td colspan=4 class=months>{{ substr(date('F', mktime(0, 0, 0, $ctr, 10)), 0, 3) }}</td>
        @endif
    @endfor
    <td colspan=4 class=months>Total
    </td>
    <td class=blank></td>
    <td class=blank></td>
</tr>
<tr style='mso-height-source:userset;{{ $height }}'>
    <td colspan=8 class=attendancelabel>School Days</td>
    @for($ctr = 1; $ctr <= schema('attendance_count'); $ctr++)
        <td colspan=4 class=attendance>{{ $days[$ctr] > 0 ? $days[$ctr] : ''  }}</td>
    @endfor
    <td colspan=4 class=attendance>{{ $days["total"] }}</td>
    <td class=blank></td>
    <td class=blank></td>
</tr>
<tr style='mso-height-source:userset;{{ $height }}'>
    <td colspan=8 class=attendancelabel>Days Present</td>
    @for($ctr = 1; $ctr <= schema('attendance_count'); $ctr++)
        <td colspan=4 class=attendance>{{ $days[$ctr] > 0 ? $attendance->{'P'.$ctr} : '' }}</td>
    @endfor
    <td colspan=4 class=attendance>{{ $days["total"] - $attendance->TotalAbsent }}</td>
    <td class=blank></td>
    <td class=blank></td>
</tr>
<tr style='mso-height-source:userset;{{ $height }}'>
    <td colspan=8 class=attendancelabel>Days Absent</td>
    @for($ctr = 1; $ctr <= schema('attendance_count'); $ctr++)
        <td colspan=4 class=attendance>{{ $days[$ctr] > 0 ? $attendance->{'A'.$ctr} : '' }}</td>
    @endfor
    <td colspan=4 class=attendance>{{ $attendance->TotalAbsent }}</td>
    <td class=blank></td>
    <td class=blank></td>
</tr>
<tr style='mso-height-source:userset;{{ $height }}'>
    <td colspan=8 class=attendancelabel>Days Tardy</td>
    @for($ctr = 1; $ctr <= schema('attendance_count'); $ctr++)
        <td colspan=4 class=attendance>{{ $days[$ctr] > 0 ? $attendance->{'T'.$ctr} : '' }}</td>
    @endfor
    <td colspan=4 class=attendance>{{ $attendance->TotalTardy }}</td>
    <td class=blank></td>
    <td class=blank></td>
</tr>