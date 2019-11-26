<?php

namespace App\Models;

class Award extends Model
{
    protected $table = 'awards';

    public static function getAwardsForReportCard($student, $gradeset, $schoolyear = '')
    {
        if (!isset($student->student_id)):
            return false;
        endif;

        $awardRec = Award::where([
            ['student_id', $student->student_id],
            ['schoolyear', $schoolyear]
        ])
            ->join('subjects', 'subjects.subject_id', 'awards.subject_id')
            ->get();

        $award = [];
        foreach ($awardRec as $awards):
            $award["$awards->subjectname"] = checkMark();
        endforeach;

        if (isset($gradeset['generalaverage']) and $gradeset['generalaverage'] >= 96 and $gradeset["disqualifyForHonors"] != true):
            $award["HIGHESTHONORS"] = checkMark();
        elseif (isset($gradeset['generalaverage']) and $gradeset['generalaverage'] >= 93 and $gradeset["disqualifyForHonors"] != true):
            $award["HIGHHONORS"] = checkMark();
        elseif (isset($gradeset['generalaverage']) and $gradeset['generalaverage'] >= 90 and $gradeset["disqualifyForHonors"] != true):
            $award["HONORS"] = checkMark();
        endif;

        $award["DEPORTMENT"] = isset($gradeset['deportment'][5]) ? $gradeset['deportment'][5] >= 90 ? checkMark() : '' : '';

        if (isset($gradeset["disqualifyForEffort"])):
            $award["EFFORT"] = $gradeset["disqualifyForEffort"] == false ? checkMark() : '';
        endif;

        return $award;
    }

    public static function getSEA($subject_id, $schoolyear, $grades)
    {
        $schoolyear = getSchoolYear();

        $subject = Subject::bySubjectID($subject_id);
        $gradesModel = new Grade;
        $gradesModel->setTableName($subject->gradelevel);
        $grades = $gradesModel->bySubjectID($subject_id, $schoolyear);
        $students = Student::bySubjectID($subject_id);
        $studentGrades = [];
        $section = $subject->section;

        foreach ($students as $student):
            if (isset($grades[$student->student_id])):
                $studentGrades[$student->student_id] = $grades[$student->student_id][5]['final'];
            endif;
        endforeach;
        arsort($studentGrades);

        $studentGrades = array_slice($studentGrades, 0, 10, true);
        if ($subject->subjectname != 'PE'):

            $awards = Award::where([
                ['subject_id', $subject_id],
                ['schoolyear', $schoolyear]
            ])->first(); //Select

            $sectionAward = [];
            if ($subject->section != ''):
                $students = Student::bySubjectID($subject_id);
                foreach ($students as $student) :
                    if (isset($studentGrades[$student->student_id])):
                        $sectionAward[$student->student_id] = $studentGrades[$student->student_id];
                    endif;
                endforeach;
                arsort($sectionAward);
                $studentGrades = $sectionAward;
            endif;

            if ($awards): //if not blank
                $awards->student_id = key($studentGrades);
                $awards->save();
            else:
                $insert = $subject->section != '' ? [
                    'student_id' => key($studentGrades),
                    'subject_id' => $subject_id,
                    'schoolyear' => $schoolyear,
                    'gender' => '',
                    'section' => $section
                ] : [
                    'student_id' => key($studentGrades),
                    'subject_id' => $subject_id,
                    'schoolyear' => $schoolyear,
                    'gender' => '',
                    'section' => ''
                ];

                Award::create($insert);
            endif;

            $studentGrades["SEA"] = key($studentGrades);

        elseif ($subject->subjectname == 'PE'):
            $students = Student::bySubjectID($subject_id);

            foreach ($students as $student) :
                if (isset($studentGrades[$student->student_id])):
                    if ($student->gender == 'M'):
                        $seaMale[$student->student_id] = $studentGrades[$student->student_id];
                    elseif ($student->gender == 'F'):
                        $seaFemale[$student->student_id] = $studentGrades[$student->student_id];
                    endif;
                endif;
            endforeach;

            arsort($seaMale);
            arsort($seaFemale);

            $Male = Award::where([
                ['subject_id', $subject_id],
                ['schoolyear', $schoolyear],
                ['gender', "M"]
            ])->first();

            if ($Male):
                $Male->student_id = key($seaMale);
                $Male->save();
                $studentGrades["SEA"] = key($seaMale);
            else:
                Award::create([
                    'student_id' => key($seaMale),
                    'subject_id' => $subject_id,
                    'schoolyear' => $schoolyear,
                    'gender' => 'M',
                ]);
                $studentGrades["SEA"] = key($seaMale);
            endif;

            $Female = Award::where([
                ['subject_id', $subject_id],
                ['schoolyear', $schoolyear],
                ['gender', "F"]
            ])->first();

            if ($Female):
                $Female->student_id = key($seaFemale);
                $Female->save();
                $studentGrades["SEA2"] = key($seaFemale);
            else:
                Award::create([
                    'student_id' => key($seaFemale),
                    'subject_id' => $subject_id,
                    'schoolyear' => $schoolyear,
                    'gender' => 'F'
                ]);
                $studentGrades["SEA2"] = key($seaFemale);
            endif;
        endif;

        $grades = $studentGrades;

        return $grades;
    }

    public static function byGradelevel($gradelevel, $schoolyear = '')
    {
        $subjectsModel = new Subject;
        $schoolyear = $schoolyear != '' ? $schoolyear : getSchoolYear();
        $awards = $subjectsModel->leftJoin('awards', 'subjects.subject_id', 'awards.subject_id')
            ->leftJoin('subjects_user', 'subjects_user.subject_id', 'subjects.subject_id')
            ->where([
                ['subjects.gradelevel', $gradelevel],
                ['awards.schoolyear', $schoolyear]
            ])->get();

        $awardSet = [];
        foreach ($awards as $award):
            if ($award->subjectname == 'PE'):
                $gender = $award->gender == 'M' ? 'BOYS' : 'GIRLS';
                $awardSet[$award->student_id]["SEA"][] = preg_replace('/\s+/', ' ', $award->subjecttitle) . ' ' . $gender;
            else:
                $awardSet[$award->student_id]["SEA"][] = preg_replace('/\s+/', ' ', $award->subjecttitle);
            endif;
        endforeach;
        return $awardSet;
    }

}
