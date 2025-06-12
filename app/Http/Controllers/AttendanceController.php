<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\SchoolYear;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function show_attendance($student_id)
    {
        $schoolyear = getSchoolYear();

        $attendance = Attendance::where([
            ['student_id', $student_id],
            ['schoolyear', $schoolyear]
        ])->first();

        if ($attendance):
            $attendance->attendance = json_decode($attendance->attendance);
        else:
            $attendance = new Attendance;
        endif;

        $days = SchoolYear::where('active', 1)->first();
        $days = $days->school_days ? json_decode($days->school_days) : [];

        $student = Student::byStudentID($student_id, $schoolyear);
        $prev = $student->prev;
        $next = $student->next;

        return view('reports.attendance.show', compact('attendance', 'student', 'days', 'next', 'prev'));
    }

    public function store_attendance(Request $request)
    {
        $schoolyear = getSchoolYear();

        $attendance = Attendance::where([
            ['student_id', $request->student_id],
            ['schoolyear', $schoolyear]
        ])->first();

        if (!$attendance):
            $attendance = new Attendance;
            $attendance->student_id = $request->student_id;
            $attendance->schoolyear = $schoolyear;
        endif;

        foreach ($request->attendance as $key => $values):
            foreach ($values as $ctr => $value):
                $counter = $ctr + 1;
                $json[$counter][$key] = intval($value) > 0 ? intval($value) : 0;
            endforeach;
        endforeach;

        $attendance->attendance = json_encode($json);
        $attendance->save();
    }}
