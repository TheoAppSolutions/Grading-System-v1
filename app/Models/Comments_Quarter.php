<?php

namespace App\Models;

class Comments_Quarter extends Model
{
    protected $table = 'comments_quarter';

    protected $primaryKey = 'entry_id';

    public function byStudentID($student_id)
    {
        $schoolyear = getSchoolYear();

        $comments = Comments_Quarter::where([
            ['student_id', $student_id],
            ['schoolyear', $schoolyear]
        ])->first();

        if ($comments):
            $comments->comments = json_decode($comments->comments, true);
        else:
            $comments = new Comments_Quarter();
            $comments->student_id = $student_id;
            $comments->schoolyear = $schoolyear;
            $comments->comments = [];
            $array = [];

            for ($ctr = 1; $ctr <= 5; $ctr++):
                $A = "A" . $ctr;
                $B = "B" . $ctr;
                $C = "C" . $ctr;
                $D = "D" . $ctr;
                $E = "E" . $ctr;
                $F = "F" . $ctr;

                $array[$A] = 0;
                $array[$B] = 0;
                $array[$C] = 0;
                $array[$D] = 0;
                $array[$E] = 0;
                $array[$F] = 0;
            endfor;

            $comments->comments = $array;
        endif;

        return $comments->comments;

    }
}
