<?php

namespace App\Models;

use App\Formulas;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class Grade extends Model
{
    public $increments = false;

    protected $primaryKey = 'entry_id';
    protected $subjectModel = '';
    private $gradelevel = '';

    public function setTableName($gradelevel)
    {
        $this->table = 'grades_' . cleanString($gradelevel);
        $this->gradelevel = $gradelevel;
    }

    public function bySubjectID($subject_id, $schoolyear)
    {
        $gradeset = [];

        $records = Subject::
        join($this->table . ' as grades', 'grades.subject_id', 'subjects.subject_id')
            ->leftJoin('subjects_user', 'subjects_user.subject_id', 'subjects.subject_id')
            ->leftJoin('users', 'users.id', 'subjects_user.user_id')
            ->where([
                ['subjects.subject_id', $subject_id],
                ['grades.schoolyear', $schoolyear]
            ])
            ->select('subjects.subjectname',
                'subjects.subject_id',
                'subjects.gradelevel',
                'subjects_user.section',
                'users.lastname',
                'users.firstname',
                'grades.student_id',
                'grades.schoolyear',
                'grades.quarter',
                'grades.remarks',
                'grades.midquarter',
                'grades.final',
                'grades.effort',
                'grades.deportment')
            ->get();

        foreach ($records as $record) :
            $gradeset["gradelevel"] = $record->gradelevel;
            $gradeset["teachername"] = $record->firstname . ' ' . $record->lastname;
            $gradeset["subjectname"] = $record->subjectname;
            $gradeset["subject_id"] = $record->subject_id;
            $gradeset["$record->student_id"][$record->quarter]["midquarter"] = $record->midquarter > 0 ? $record->midquarter : '';
            $gradeset["$record->student_id"][$record->quarter]["final"] = $record->final > 0 ? $record->final : '';
            $gradeset["$record->student_id"][$record->quarter]["effort"] = $record->effort > 0 ? $record->effort : '';
            $gradeset["$record->student_id"][$record->quarter]["deportment"] = $record->deportment > 0 ? $record->deportment : '';
            $gradeset["$record->student_id"][$record->quarter]["remarks"] = $record->remarks;
        endforeach;

        // Getting the final average score per subject
        foreach ($records as $record) :
            $temp = [];
            for ($quarter = 1; $quarter <= 4; $quarter++):
                if (isset($gradeset["$record->student_id"][$quarter]["final"]) and $gradeset["$record->student_id"][$quarter]["final"] != '') :
                    $temp['final'][$quarter] = $gradeset["$record->student_id"][$quarter]["final"];
                    $temp['effort'][$quarter] = $gradeset["$record->student_id"][$quarter]["effort"];
                endif;
            endfor;
            if (isset($temp['final']) and isset($temp['effort'])):
                $gradeset["$record->student_id"][5]["final"] = array_sum($temp['final']) / count($temp['final']);
                $gradeset["$record->student_id"][5]["final"] = number_format($gradeset["$record->student_id"][5]["final"], 3);
                $gradeset["$record->student_id"][5]["effort"] = array_sum($temp['effort']) / count($temp['effort']);
                $gradeset["$record->student_id"][5]["effort"] = round($gradeset["$record->student_id"][5]["effort"]);

                $disqualifyForSEA = count($temp['final']) == 4 ? false : true;
                if ($gradeset["$record->student_id"][5]["final"] >= 92 and $disqualifyForSEA != true):
                    $gradeset["academicAward"]["$record->student_id"] = $gradeset["$record->student_id"][5]["final"];
                endif;
            endif;
        endforeach;

        return $gradeset;
    }// For Show Grades

    public function byStudentID($student_id, $isAwardReport = false, $schoolyear = "")
    {
        $schoolyear = $schoolyear == "" ? getSchoolYear() : $schoolyear;
        $gradeset = [];
        $student = Student::byStudentID($student_id);

        $records = Subject::
        leftJoin('subjects_user', 'subjects_user.subject_id', 'subjects.subject_id')
            ->leftJoin('users', 'users.id', 'subjects_user.user_id')
            ->join($this->table . ' as grades', 'grades.subject_id', 'subjects.subject_id')
            ->join('students', 'students.student_id', 'grades.student_id')
            ->where([
                ['grades.student_id', $student_id],
                ['grades.schoolyear', $schoolyear],
                ['subjects_user.schoolyear', $schoolyear]
            ])
            ->select('subjectname',
                'gradelevel',
                'users.title',
                'users.lastname',
                'users.firstname',
                'grades.student_id',
                'grades.schoolyear',
                'grades.quarter',
                'grades.midquarter',
                'grades.final',
                'grades.effort',
                'grades.deportment',
                'grades.remarks',
                'students.lastname as StudLastname',
                'students.firstname as StudFirstname',
                'students.student_id',
                'students.gender')
            ->orderBy('subjects.subjectname')
            ->get();

        foreach ($records as $record) :
            $gradeset["fullname"] = $record->StudLastname . ', ' . $record->StudFirstname;
            $gradeset["gradelevel"] = $record->gradelevel;
            $gradeset["student_id"] = $record->student_id;
            $gradeset["gender"] = $record->gender;
            if ($record->lastname != '' and $record->firstname != ''):
                if ($record->deportment > 0) :
                    $gradeset["deportment"][$record->quarter]["$record->subjectname"] = $record->deportment > 0 ? $record->deportment : '';
                endif;
                $gradeset["$record->subjectname"]["teacher"] = $record->title . $record->firstname . ' ' . $record->lastname;
                $gradeset["$record->subjectname"][$record->quarter]["remarks"] = $record->remarks;
                $gradeset["$record->subjectname"][$record->quarter]["midquarter"] = $record->midquarter > 0 ? $record->midquarter : '';
                $gradeset["$record->subjectname"][$record->quarter]["final"] = $record->final > 0 ? round($record->final) : '';
                $gradeset["$record->subjectname"][$record->quarter]["rawfinal"] = $record->final > 0 ? number_format($record->final, 2) : '';
                if ($record->final != '' or $isAwardReport == true) :
                    $gradeset["$record->subjectname"][$record->quarter]["effort"] = $record->effort > 0 ? round($record->effort) : '';
                    $gradeset["$record->subjectname"][$record->quarter]["raweffort"] = $record->effort > 0 ? $record->effort : '';
                endif;
            else:
                $gradeset["$record->subjectname"]["remarks"] = "N / A";
                $gradeset["$record->subjectname"][$record->quarter]["rawfinal"] = "N / A";
            endif;
        endforeach;

        if (isset($gradeset["student_id"])): //If no records in the grades database then do not execute computations
            $subjectList = Subject::byLevel($student->gradelevel);

            $startCounter = 1;
            $endCounter = 4;
            $semester = request('semester') == null ? 1 : request('semester');
            if ($student->gradelevel >= 11 and $semester == 1):
                $startCounter = 1;
                $endCounter = 2;
            elseif ($student->gradelevel >= 11 and $semester == 2):
                $startCounter = 3;
                $endCounter = 4;
            endif;

            $gradeset = Formulas::getFinalAveragePerSubject($gradeset, $subjectList, $startCounter, $endCounter, $isAwardReport);
            $gradeset = Formulas::getDeportmentAverage($gradeset, $startCounter, $endCounter);
            $gradeset = Subject::getExcludedSubjects($gradeset);
        endif;

        return $gradeset;
    }//For Report Cards

    public function byRecord($subject_id, $student_id, $quarter)
    {
        $record = DB::table($this->table)->where([
            ['subject_id', $subject_id],
            ['student_id', $student_id],
            ['quarter', $quarter]
        ])->first();

        return $record;
    }
}
