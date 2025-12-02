<?php

namespace App;

use App\Models\Units;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    public static function getFinalAveragePerSubject($gradeset, $subjects, $startCounter, $endCounter, $isAwardReport, $schoolyear)
    {
        $lastSubjectname = '';
        $totalunits = 0;
        $totalgpa = [];
        /*
         * Disqualification Indicators
         * */
        $gradeset["disqualifyForHonors"] = false;
        $gradeset["disqualifyForEffort"] = true;
        $gradeset["disqualifyForDeportment"] = false;
        $gradeset["isEligibleForNextGrade"] = false;

        foreach ($subjects as $subject) :
            /*
             * Loop through all subjects to get their final [5] grade
             * */
            $subAverage = [];
            if (isset($gradeset[$subject->subjectname][$endCounter]["final"]) and $gradeset[$subject->subjectname][$endCounter]["final"] != '' or $isAwardReport == true) :
                for ($quarter = $startCounter; $quarter <= $endCounter; $quarter++):
                    /*
                     * Loop through the grades per quarter
                     * */
                    if (isset($gradeset[$subject->subjectname][$quarter]["final"]) and $gradeset[$subject->subjectname][$quarter]["final"] != '') :
                        /*
                         * If the subject has a grade then insert the raw final grade
                         * */
                        $subAverage['final'][$quarter] = $gradeset[$subject->subjectname][$quarter]["rawfinal"];
                    endif;

                    if (isset($gradeset[$subject->subjectname][$quarter]["raweffort"]) and $gradeset[$subject->subjectname][$quarter]["raweffort"] != '') :
                        /*
                         * If the subject has a effort grade then insert the raw final grade
                         * */
                        $subAverage['raweffort'][$quarter] = $gradeset[$subject->subjectname][$quarter]["raweffort"];
                        $gradeset["disqualifyForEffort"] = $subAverage['raweffort'][$quarter] < 4 ? true : false; //Major Subject
                    endif;
                endfor;

                if (isset($subAverage['final']) and isset($subAverage['raweffort'])):
                    if ((count($subAverage['final']) == 4 and $schoolyear < 2025) or (count($subAverage['final']) == 2 and $schoolyear > 2024)):
                        $gradeset[$subject->subjectname][5]["rawfinal"] = array_sum($subAverage['final']) / count($subAverage['final']);
                        $gradeset[$subject->subjectname][5]["rawfinal"] = number_format($gradeset[$subject->subjectname][5]["rawfinal"], 2);
                        $gradeset[$subject->subjectname][5]["final"] = $gradeset[$subject->subjectname][5]["rawfinal"];

                        if ((count($subAverage['raweffort']) == 4 and $schoolyear < 2025) or (count($subAverage['raweffort']) == 2 and $schoolyear > 2024)):
                            $gradeset[$subject->subjectname][5]["effort"] = Formula::getFinalEffort(array_sum($subAverage['raweffort']), $schoolyear);
                            $gradeset["finaleffort"][$subject->subjectname] = $gradeset[$subject->subjectname][5]["effort"];
                            if ((count($subAverage['raweffort']) == 4 and $schoolyear < 2025) or (count($subAverage['raweffort']) == 2 and $schoolyear > 2024)):
                                $gradeset["disqualifyForEffort"] = $gradeset[$subject->subjectname][5]["effort"] < 4 ? true : false;
                            endif;
                        endif;

                        $gradeset[$subject->subjectname]["remarks"] = $gradeset[$subject->subjectname][5]["final"] >= 60 ? 'PASSED' : 'FAILED';

                        if (!$gradeset["disqualifyForHonors"]):
                            if ((count($subAverage['final']) != 4 and $schoolyear < 2025) or (count($subAverage['final']) != 2 and $schoolyear > 2024)):
                                $gradeset["disqualifyForHonors"] = true;
                            endif;
                        endif;

                        if (isset($gradeset[$subject->subjectname]['unit']) and $lastSubjectname != $subject->subjectname):
                            $lastSubjectname = $subject->subjectname;
                            $gradeset["finalave"][$subject->subjectname] = $gradeset[$subject->subjectname][5]["final"] * $gradeset[$subject->subjectname]['unit'];

                            if ($gradeset[$subject->subjectname]['unit'] > 0):
                                $totalunits += $gradeset[$subject->subjectname]['unit'];
                                $gradeset[$subject->subjectname]['unit'] = number_format($gradeset[$subject->subjectname]['unit'], 2);
                                $gradeset[$subject->subjectname]["grade_point"] = number_format(letterGrade($gradeset[$subject->subjectname][5]["final"])['gpa'] * $gradeset[$subject->subjectname]["unit"], 2);
                                $totalgpa[] = $gradeset[$subject->subjectname]["grade_point"];
                            else:
                                $gradeset[$subject->subjectname]['unit'] = 0;
                            endif;
                        endif;
                        endif;
                endif;
            endif;
        endforeach;

        if (isset($gradeset['finalave']) and $totalunits > 1):
            $gradeset = Formula::getGeneralAverage($gradeset, $totalunits, $totalgpa);
        endif;

        return $gradeset;
    }

    public static function getGeneralAverage($gradeset, $totalunits, $totalgpa)
    {
        /*
         * Compute General Average
         * */
        $gradeset["totalunits"] = number_format($totalunits, 2);
        $gradeset["totalgpa"] = number_format(array_sum($totalgpa) / $totalunits, 2);
        $gradeset["generalaverage"] = array_sum((array)$gradeset["finalave"]) / $totalunits;
        $gradeset["generalaverage"] = number_format($gradeset["generalaverage"], 3);
        $gradeset["generalremarks"] = $gradeset["generalaverage"] >= 60 ? 'PASSED' : 'FAILED';
        $gradeset["disqualifyForHonors"] = $gradeset["generalaverage"] < 90 ? true : false;

        return $gradeset;
    }

    public static function getFinalEffort($effortGrades, $schoolyear)
    {
        $return = 0;
        if ($schoolyear > 2024):
            $return = $effortGrades / 2;
        elseif ($schoolyear < 2025):
            $return = $effortGrades / 4;
        endif;

        return $return;
    }

    public static function getDeportmentAverage($gradeset, $schoolyear, $startCounter = 1, $endCounter = 4)
    {
        for ($quarter = $startCounter; $quarter <= $endCounter; $quarter++):
            if (isset($gradeset["deportment"][$quarter]) and $gradeset["deportment"][$quarter] > 0) :
                $gradeset["deportment"][$quarter] = array_sum($gradeset['deportment'][$quarter]) / count($gradeset['deportment'][$quarter]);
                $gradeset["rawdeportment"][$quarter] = number_format($gradeset["deportment"][$quarter], 3);
                $gradeset["deportment"][$quarter] = round($gradeset["deportment"][$quarter]);
            endif;
        endfor;

        if (isset($gradeset["deportment"][$endCounter]) and $gradeset["deportment"][$endCounter] > 0) :
            if (count($gradeset["deportment"]) == 4 and $schoolyear < 2025 or count($gradeset['deportment']) == 2 and $schoolyear > 2024):
                $gradeset["deportment"][5] = array_sum($gradeset["rawdeportment"]) / count($gradeset["rawdeportment"]);
                $gradeset["deportment"][5] = number_format($gradeset["deportment"][5], 3);
            endif;
        endif;

        return $gradeset;
    }
}
