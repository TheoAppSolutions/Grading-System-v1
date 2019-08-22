<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Comments_Quarter as Comments;

class CommentsController extends Controller
{
    public function show($student_id)
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
    }}
