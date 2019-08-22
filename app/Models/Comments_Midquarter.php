<?php

namespace App\Models;

class Comments_Midquarter extends Model
{
    protected $table = 'comments_midquarter';

    protected $primaryKey = 'entry_id';

    /**
     * Used for Generating Report Cards
     **/
    public function byStudentID($student_id)
    {
        $schoolyear = getSchoolYear();
        $quarter = 1;
        $array = [];

        $comments = Comments_Midquarter::where([
            ['student_id', $student_id],
            ['schoolyear', $schoolyear],
            ["quarter", $quarter]
        ])->first();

        if (!$comments):
            $comments = New Comments_Midquarter;
            $comments->student_id = $student_id;
            $comments->schoolyear = $schoolyear;
            $comments->quarter = $quarter;
        else:
            $comments->comments = json_decode($comments->comments);
            foreach ($comments->comments as $subject => $values):
                $subjects = Subject::bySubjectID($subject);
                if ($subjects->user_id):
                    foreach ($values as $key => $value):
                        if ($value > 0):
                            if ($subjects->gradelevel >= 11 and $subjects->gradelevel <= 12):
                                if (!isset($array[$subjects->subjectname]['additional'])):
                                    $array[$subjects->subjectname]['additional'] = "";
                                endif;
                                $array[$subjects->subjectname]['additional'] = $array[$subjects->subjectname]['additional'] . ' ' . $value;
                            elseif ($subjects->gradelevel >= 1 and $subjects->gradelevel <= 10):
                                $array[$subjects->subjectname][$key] = $value;
                            endif;
                        elseif (is_string($value)):
                            $array[$subjects->subjectname][$key] = $value;
                        endif;
                    endforeach;
                endif;
            endforeach;
        endif;

        return $array;
    }
}
