<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Deportment;
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
        $section = request("section");
        $schoolyear = getSchoolYear();
        $students = Student::getStudents("enrolled", $gradelevel, false, $section);

        if ($students):
            $search = Deportment::where('schoolyear', $schoolyear)->get();
            $deportment = [];
            foreach ($search as $item):
                $deportment[$item->student_id] = $item->deportment;
            endforeach;

            return view('reports.progress.show', compact('students', 'gradelevel', 'deportment', 'section'));
        endif;
        return redirect('/');
    }

    public function summary()
    {
        $gradelevel = isset(request()->gradelevel) ? request()->gradelevel : 1;
        $subjects = Subject::getAll();

        return view('reports.summary.index', compact('subjects', 'gradelevel'));
    }

    public function showSummary()
    {
        $section = request("section");
        $gradelevel = isset(request()->gradelevel) ? request()->gradelevel : 1;
        $subjects = Subject::getAll("", $section);

        return view('reports.summary.show', compact('subjects', 'gradelevel', 'section'));
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

    /*----------------------------------------------------------------*/

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
                $json[$counter][$key] = $value > 0 ? $value : 0;
            endforeach;
        endforeach;

        $attendance->attendance = json_encode($json);
        $attendance->save();
    }

    /*----------------------------------------------------------------*/

    public function show_deportment($student_id)
    {
        $schoolyear = getSchoolYear();

        $deportments = Deportment::where([
            ['student_id', $student_id],
            ['schoolyear', $schoolyear]
        ])->get();

        $array = [];

        if ($deportments):
            foreach ($deportments as $deportment):
                $array[$deportment->quarter] = $deportment->deportment;
            endforeach;
        endif;

        $student = Student::byStudentID($student_id);
        $prev = $student->prev;
        $next = $student->next;
        $deportment = $array;
        return view('reports.quarter.deportment', compact('deportment', 'student', 'next', 'prev'));

    }

    public function store_deportment(Request $request, $student_id)
    {
        $schoolyear = getSchoolYear();
        $user_id = \Auth::id();
        $deportment_scores = $request->deportment;

        for ($quarter = 1; $quarter <= 4; $quarter++):
            if (isset($deportment_scores[$quarter])):
                $deportment_single = Deportment::where([
                    ['student_id', $student_id],
                    ['schoolyear', $schoolyear],
                    ['quarter', $quarter]
                ])->first();

                if ($deportment_single):
                    Deportment::where([
                        ['student_id', $student_id],
                        ['schoolyear', $schoolyear],
                        ['quarter', $quarter]
                    ])
                        ->update([
                            'deportment' => $deportment_scores[$quarter]
                        ]);
                else:
                    Deportment::insert([
                        'student_id' => $student_id,
                        'user_id' => $user_id,
                        'deportment' => $deportment_scores[$quarter],
                        'quarter' => $quarter,
                        'schoolyear' => $schoolyear,
                    ]);
                endif;
            else:
                Deportment::insert([
                    'student_id' => $student_id,
                    'user_id' => $user_id,
                    'deportment' => $deportment_scores[$quarter],
                    'quarter' => $quarter,
                    'schoolyear' => $schoolyear,
                ]);
            endif;
        endfor;
    }
}
