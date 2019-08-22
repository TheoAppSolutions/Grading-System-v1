<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\SchoolYear;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Comments_Quarter as Comments;

class HomeroomController extends Controller
{
    public function index()
    {
        $gradelevel = isset(request()->gradelevel) ? request()->gradelevel : "1";

        if ($gradelevel == "graduates"):
            $students = Student::getStudents("graduates");
        else:
            $students = Student::getStudents("enrolled", $gradelevel);
        endif;

        return view('reports.progress.index', compact('students', 'gradelevel'));
    }

    public function show($gradelevel)
    {
        $students = Student::getStudents("enrolled", $gradelevel);

        if ($students):
            return view('reports.progress.show', compact('students', 'gradelevel'));
        endif;
        return redirect('/');
    }

    public function summary()
    {
        $gradelevel = isset(request()->gradelevel) ? request()->gradelevel : "Prep";
        $subjects = Subject::getAll();

        return view('reports.summary.index', compact('subjects', 'gradelevel'));
    }

    public function showSummary()
    {
        $gradelevel = isset(request()->gradelevel) ? request()->gradelevel : "Prep";
        $subjects = Subject::getAll();

        return view('reports.summary.show', compact('subjects', 'gradelevel'));
    }

    /*----------------------------------------------------------------*/

    public function show_comments($student_id)
    {
        $schoolyear = getSchoolYear();
        $student = Student::byStudentID($student_id);
        $prev = $student->prev;
        $next = $student->next;
        $student_id = $student->student_id;

        $comments = Comments::where([
            ['student_id', $student_id],
            ['schoolyear', $schoolyear]
        ])->first();
        if ($comments):
            $comments->comments = json_decode($comments->comments);
        endif;

        return view('reports.quarter.show', compact('comments', 'student', 'prev', 'next'));
    }

    public function store_comments(Request $request)
    {
        $schoolyear = getSchoolYear();
        $comments = Comments::where([
            ['student_id', $request->student_id],
            ['schoolyear', $schoolyear]
        ])->first();

        if (!$comments):
            $comments = new Comments();
            $comments->student_id = $request->student_id;
            $comments->schoolyear = $schoolyear;
        endif;

        foreach ($request->comments as $key => $values):
            foreach ($values as $ctr => $value):
                $counter = $ctr + 1;
                $json[$key . $counter] = intval($value);
            endforeach;
        endforeach;

        $comments->comments = json_encode($json);
        $comments->save();
    }

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
        $days = json_decode($days->school_days);

        $student = Student::byStudentID($student_id);
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
    }
}
