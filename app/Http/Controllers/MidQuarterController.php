<?php

namespace App\Http\Controllers;

use App\Models\Comments_Midquarter as Comments;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Student;

class MidQuarterController extends Controller
{
    public function show($subject_id, $student_id)
    {
        $subject = Subject::bySubjectID($subject_id);
        $student = Student::byStudentID($student_id);

        $prev = $student->prev;
        $next = $student->next;

        $schoolyear = getSchoolYear();
        $quarter = 1;

        $comments = Comments::where([
            ['student_id', $student_id],
            ['schoolyear', $schoolyear],
            ["quarter", $quarter]
        ])->first();

        if (!$comments):
            $comments = New Comments;
            $comments->student_id = $student_id;
            $comments->schoolyear = $schoolyear;
            $comments->quarter = $quarter;
            $comments->comments = [];
        else:
            if (isset(json_decode($comments->comments)->{$subject_id})):
                $comments = json_decode($comments->comments)->{$subject_id};
            endif;
        endif;

        if (schema('student')->{"senior.high.school"} and $subject->gradelevel >= 11 and $subject->gradelevel <= 12):
            return view('grading._snippets.midquarter_seniorhigh', compact('comments', 'schoolyear', 'subject', 'student', 'prev', 'next'));
        endif;

        return view('grading._snippets.midquarter_comments', compact('comments', 'schoolyear', 'subject', 'student', 'prev', 'next'));

    }

    public function store(Request $request)
    {
        $quarter = 1;
        $schoolyear = getSchoolYear();

        $comments = Comments::where([
            ['student_id', $request->student_id],
            ['schoolyear', $schoolyear],
            ["quarter", $quarter]
        ])->first();

        if (!$comments): //If MidQuarter Comments Does Not Exists then create new Instance
            $comments = New Comments;
            $comments->student_id = $request->student_id;
            $comments->schoolyear = $schoolyear;
            $comments->quarter = $quarter;
            $json = [];
        else:
            $json = json_decode($comments->comments, true);
        endif;

        if (isset($request->comments)):
            $counter = 0;
            foreach ($request->comments as $comment):
                $counter++;
                $json[$request->subject_id]["S" . $counter] = $comment;
            endforeach;
        endif;

        if (isset($request->PSR)):
            $counter = 0;
            foreach ($request->PSR as $comment):
                $counter++;
                $json[$request->subject_id]["PSR" . $counter] = $comment;
            endforeach;
        endif;

        if (isset($request->WSS)):
            $counter = 0;
            foreach ($request->WSS as $comment):
                $counter++;
                $json[$request->subject_id]["WSS" . $counter] = $comment;
            endforeach;
        endif;

        $comments->comments = json_encode($json);
        $comments->save();
    }
}
