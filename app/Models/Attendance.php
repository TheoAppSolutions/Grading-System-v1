<?php

namespace App\Models;

class Attendance extends Model
{
    protected $table = 'attendance';

    protected $primaryKey = 'entry_id';

    public function byStudentID($student_id)
    {
        $schoolyear = getSchoolYear();

        $term = SchoolYear::getSchoolDays($schoolyear);

        $attendance = Attendance::where([
            ['student_id', $student_id],
            ['schoolyear', $schoolyear]
        ])->first();

        if (!$attendance):
            $attendance = new Attendance;
            for ($ctr = 1; $ctr <= schema()->attendance_count; $ctr++):
                $A = "A" . $ctr;
                $T = "T" . $ctr;
                $attendance->{$A} = 0;//A = Absent
                $attendance->{$T} = 0;//T = Tardy
            endfor;
        else:
            $attendance->attendance = json_decode($attendance->attendance);
            foreach ($attendance->attendance as $ctr => $values):
                foreach ($values as $key => $value):
                    $attendance->{$key . $ctr} = $value;
                endforeach;
            endforeach;
        endif;

        $attendance->TotalAbsent = 0;
        $attendance->TotalTardy = 0;

        for ($ctr = 1; $ctr <= schema()->attendance_count; $ctr++):
            $P = "P" . $ctr;
            $A = "A" . $ctr;
            $T = "T" . $ctr;
            $N = "N" . $ctr;

            $attendance->{$N} = $attendance->{$A} != -1 ? '' : -1; //N = Null (Remove a schedule of a month)
            $attendance->{$P} = $attendance->{$N} != -1 ? $term[$ctr] - $attendance->{$A} : '';
            $attendance->{$A} = $attendance->{$N} != -1 ? $attendance->{$A} : '';
            $attendance->{$T} = $attendance->{$N} != -1 ? $attendance->{$T} : '';

            $attendance->TotalAbsent += intval($attendance->{$A});
            $attendance->TotalTardy += intval($attendance->{$T});
        endfor;

        return $attendance;
    }
}
