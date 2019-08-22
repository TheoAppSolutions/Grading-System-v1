<?php

namespace App\Models;

class Excluded extends Model
{
    public $incrementing = false;
    protected $table = 'subjects_excluded';
    protected $primaryKey = 'student_id';

    public static function byStudent($student_id, $schoolyear = '')
    {
        $schoolyear = $schoolyear == '' ? getSchoolYear() : $schoolyear;
        $excluded = Excluded::where([
            ['student_id', $student_id],
            ['schoolyear', $schoolyear]
        ])
            ->leftJoin('subjects', 'subjects.subject_id', 'subjects_excluded.subject_id')
            ->get();

        return $excluded;
    }

    public static function bySubjectID($subject_id, $schoolyear = '')
    {
        $schoolyear = $schoolyear == '' ? getSchoolYear() : $schoolyear;
        $excluded = Excluded::where([
            ['subject_id', $subject_id],
            ['schoolyear', $schoolyear]
        ])->get();

        return $excluded;
    }
}