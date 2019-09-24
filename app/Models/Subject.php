<?php

namespace App\Models;

class Subject extends Model
{
    public $incrementing = false;
    protected $table = 'subjects';
    protected $primaryKey = 'subject_id';
    public $timestamps = false;

    public static function bySubjectID($subject_id)
    {
        $schoolyear = getSchoolYear();

        $subject = Subject::where([
            ['subjects_user.subject_id', $subject_id],
            ['subjects_user.schoolyear', $schoolyear]
        ])
            ->leftJoin('subjects_user', 'subjects_user.subject_id', 'subjects.subject_id')
            ->first();

        $subject->units = Units::where([['schoolyear', $schoolyear], ['subject_id', $subject_id]])
            ->first()->units;

        return $subject;
    }

    public static function byUserId($user_id = '', $schoolyear = '')
    {
        $user_id = $user_id != '' ? $user_id : AuthUser()->id;
        $schoolyear = $schoolyear != '' ? $schoolyear : getSchoolYear();

        $subjects = Subject::join('subjects_user', 'subjects_user.subject_id', 'subjects.subject_id')
            ->where([['user_id', $user_id], ['schoolyear', $schoolyear]])
            ->orWhere([['user2_id', $user_id], ['schoolyear', $schoolyear]])
            ->orderBy('semester', 'ASC')
            ->orderBy('subjects.subject_id', 'ASC')
            ->get();

        $subjectList = [];
        foreach ($subjects as $subject):
            $subjectList['subjects'][$subject->subject_id] = $subject;
        endforeach;

        return $subjectList;
    }

    public static function getAll($schoolyear = "")
    {
        $schoolyear = $schoolyear != "" ? $schoolyear : getSchoolYear();
        $subjects = Subject::leftJoin('subjects_user', 'subjects_user.subject_id', 'subjects.subject_id')
            ->leftJoin('users', 'users.id', 'subjects_user.user_id')
            ->where('schoolyear', $schoolyear)
            ->select('subjects.*', 'subjects_user.*', 'users.lastname', 'users.firstname', 'users.id')
            ->orderBy('gradelevel', 'ASC')
            ->orderBy('subjects_user.section', 'ASC')
            ->orderBy('subjects_user.semester', 'ASC')
            ->orderBy('subjectname', 'ASC')
            ->get();

        $subjectList = [];

        foreach ($subjects as $subject):
            $subjectList[$subject->gradelevel][$subject->subjectname] = $subject;
        endforeach;

        return $subjectList;
    }

    public static function getGradelevels()
    {
        $gradelevels = Subject::leftJoin('subjects_user', 'subjects_user.subject_id', 'subjects.subject_id')
            ->where('schoolyear', getSchoolYear())
            ->select('gradelevel', 'user_id')
            ->groupBy('gradelevel', 'section')
            ->orderBy('gradelevel', 'ASC')
            ->get();
        return $gradelevels;
    }//For Report Card

    public function byGradeLevelAndSection($gradelevel, $section = "", $semester = "")
    {
        $schoolyear = getSchoolYear();
        $query = [
            ['subjects.gradelevel', $gradelevel],
            ['subjects_user.schoolyear', $schoolyear]
        ];

        if ($semester != ""):
            array_push($query, ["semester", $semester]);
        endif;

        if ($section != ""):
            array_push($query, ["section", $section]);
        else:
            array_push($query, ["section", ""]);
        endif;

        $subjects = Subject::where($query)
            ->leftJoin('subjects_user', 'subjects_user.subject_id', 'subjects.subject_id')
            ->leftJoin('users', 'users.id', 'subjects_user.user_id')
            ->select('subjects.*', 'subjects_user.*', 'users.lastname', 'users.firstname', 'users.middlename', 'users.suffix', 'users.id', 'users.title')
            ->orderBy('subjects.subjectname')
            ->get();

        return $subjects;
    }

    public static function byLevel($gradelevel)
    {
        $subjects = Subject::where('gradelevel', $gradelevel)
            ->select('subjectname', 'subject_id')
            ->groupBy('subjectname', 'subject_id')
            ->get();

        return $subjects;
    }

    public static function getExcludedSubjects($gradeset)
    {
        $excluded = Excluded::byStudent($gradeset["student_id"]);

        foreach ($excluded as $subject):
            $gradeset["$subject->subjectname"]["remarks"] = 'N / A';
        endforeach;

        if ($gradeset["gradelevel"] >= 1 and $gradeset["gradelevel"] <= 3):
            $gradeset["LIVELIHOOD"]["remarks"] = 'N / A';
            $gradeset["TLE"]["remarks"] = 'N / A';
        endif;

        return $gradeset;
    }
}
