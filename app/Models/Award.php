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

        $schoolyear == '' ? getSchoolYear() : $schoolyear;

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

    public static function getSEA($subject_id, $schoolyear = "", $grades = "")
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
            if (isset($grades[$student->student_id][5]['final']) and $grades[$student->student_id][5]['final'] >= 90):
                $studentGrades[$student->student_id] = $grades[$student->student_id][5]['final'];
            endif;
        endforeach;


        if ($studentGrades):
            arsort($studentGrades);
            $studentGrades = array_slice($studentGrades, 0, 10, true);

            if ($subject->subjectname != 'P.E.'):
                $highest = 0;
                $collection = [];

                foreach ($studentGrades as $student_id => $score) :
                    if ($score > $highest):
                        $highest = $score;
                        $collection = [];
                        $collection[] = $student_id;
                    elseif ($score == $highest):
                        $collection[] = $student_id;
                    endif;
                endforeach;


                $awards = Award::where([
                    ['subject_id', $subject_id],
                    ['schoolyear', $schoolyear]
                ])->get();

                if (count($awards)):
                    foreach ($awards as $award):
                        /*
                         * Check if database record contains in the collection
                         * */
                        if (array_search($award->student_id, $collection) === false):
                            Award::where([
                                ['student_id', $award->student_id],
                                ['subject_id', $subject_id],
                                ['schoolyear', $schoolyear]
                            ])->delete();
                        endif;
                    endforeach;
                else:
                    foreach ($collection as $student_id):
                        Award::create([
                            'student_id' => $student_id,
                            'subject_id' => $subject_id,
                            'schoolyear' => $schoolyear,
                            'gender' => '',
                            'section' => ''
                        ]);
                    endforeach;
                endif;

            elseif ($subject->subjectname == 'P.E.'):
                $seaMale = [];
                $seaFemale = [];

                foreach ($students as $student) :
                    if (isset($studentGrades[$student->student_id])):
                        if ($student->gender == 'M'):
                            $seaMale[$student->student_id] = $studentGrades[$student->student_id];
                        elseif ($student->gender == 'F'):
                            $seaFemale[$student->student_id] = $studentGrades[$student->student_id];
                        endif;
                    endif;
                endforeach;

                if ($seaMale):
                    arsort($seaMale);
                    $highest = 0;
                    $collection = [];

                    foreach ($seaMale as $student_id => $score) :
                        $score = $studentGrades[$student_id];
                        if ($score > $highest):
                            $highest = $score;
                            $collection = [];
                            $collection[] = $student_id;
                        elseif ($score == $highest):
                            $collection[] = $student_id;
                        endif;
                    endforeach;

                    $awards = Award::where([
                        ['subject_id', $subject_id],
                        ['schoolyear', $schoolyear],
                        ['gender', "M"]
                    ])->get();

                    if (count($awards)):
                        foreach ($awards as $award):
                            /*
                             * Check if database record contains in the collection
                             * */
                            if (array_search($award->student_id, $collection) === false):
                                Award::where([
                                    ['student_id', $award->student_id],
                                    ['subject_id', $subject_id],
                                    ['schoolyear', $schoolyear]
                                ])->delete();
                            endif;
                        endforeach;
                    else:
                        foreach ($collection as $student_id):
                            Award::create([
                                'student_id' => $student_id,
                                'subject_id' => $subject_id,
                                'schoolyear' => $schoolyear,
                                'gender' => 'M',
                                'section' => ''
                            ]);
                        endforeach;
                    endif;

                endif;

                if ($seaFemale):
                    arsort($seaFemale);
                    $highest = 0;
                    $collection = [];

                    foreach ($seaFemale as $student_id => $score) :
                        $score = $studentGrades[$student_id];
                        if ($score > $highest):
                            $highest = $score;
                            $collection = [];
                            $collection[] = $student_id;
                        elseif ($score == $highest):
                            $collection[] = $student_id;
                        endif;
                    endforeach;

                    $awards = Award::where([
                        ['subject_id', $subject_id],
                        ['schoolyear', $schoolyear],
                        ['gender', "F"]
                    ])->get();

                    if (count($awards)):
                        foreach ($awards as $award):
                            /*
                             * Check if database record contains in the collection
                             * */
                            if (array_search($award->student_id, $collection) === false):
                                Award::where([
                                    ['student_id', $award->student_id],
                                    ['subject_id', $subject_id],
                                    ['schoolyear', $schoolyear]
                                ])->delete();
                            endif;
                        endforeach;
                    else:
                        foreach ($collection as $student_id):
                            Award::create([
                                'student_id' => $student_id,
                                'subject_id' => $subject_id,
                                'schoolyear' => $schoolyear,
                                'gender' => 'F',
                                'section' => ''
                            ]);
                        endforeach;
                    endif;
                endif;
            endif;
        endif;
        return '';
    }

    public static function byGradelevel($gradelevel, $schoolyear = '')
    {
        $subjectsModel = new Subject;
        $schoolyear = $schoolyear != '' ? $schoolyear : getSchoolYear();
        $awards = $subjectsModel->join('awards', 'subjects.subject_id', 'awards.subject_id')
            ->where([
                ['subjects.gradelevel', $gradelevel],
                ['awards.schoolyear', $schoolyear]
            ])->get();

        $awardSet = [];
        foreach ($awards as $award):
            if ($award->student_id):
                $awardSet[$award->student_id]['SEA'][] = preg_replace('/\s+/', ' ', $award->subjecttitle);
            endif;
        endforeach;
        return $awardSet;
    }

}
