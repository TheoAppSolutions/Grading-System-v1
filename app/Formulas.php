<?php

namespace App;

use App\Models\Units;
use Illuminate\Database\Eloquent\Model;

class Formula extends Model
{
    public static function getFinalAveragePerSubject($gradeset, $subjects, $startCounter, $endCounter, $isAwardReport)
    {
        $units = Units::getUnits();
        $lastSubjectname = '';
        $totalunits = 0;
        $gradeset["disqualifyForHonors"] = false;
        $gradeset["disqualifyForEffort"] = false;
        $gradeset["disqualifyForDeportment"] = false;
        $gradeset["isEligibleForNextGrade"] = true;

        foreach ($subjects as $subject) :
            $subAverage = [];
            if (isset($gradeset[$subject->subjectname][$endCounter]["final"]) and $gradeset[$subject->subjectname][$endCounter]["final"] != '' or $isAwardReport == true) :
                for ($quarter = $startCounter; $quarter <= $endCounter; $quarter++):
                    if (isset($gradeset[$subject->subjectname][$quarter]["final"]) and $gradeset[$subject->subjectname][$quarter]["final"] != '') :
                        $subAverage['final'][$quarter] = $gradeset[$subject->subjectname][$quarter]["rawfinal"];
                    endif;

                    if (isset($gradeset[$subject->subjectname][$quarter]["raweffort"]) and $gradeset[$subject->subjectname][$quarter]["raweffort"] != '') :
                        $subAverage['raweffort'][$quarter] = $gradeset[$subject->subjectname][$quarter]["raweffort"];
                        if (!$gradeset["disqualifyForEffort"]):
                            $gradeset["disqualifyForEffort"] = $subAverage['raweffort'][$quarter] < 4 ? false : true; //Major Subject
                        endif;
                    endif;
                endfor;

                if (isset($subAverage['final']) and isset($subAverage['raweffort'])):
                    $gradeset[$subject->subjectname][5]["rawfinal"] = array_sum($subAverage['final']) / count($subAverage['final']);
                    $gradeset[$subject->subjectname][5]["rawfinal"] = number_format($gradeset[$subject->subjectname][5]["rawfinal"], 2);
                    $gradeset[$subject->subjectname][5]["final"] = $gradeset[$subject->subjectname][5]["rawfinal"];
                    $gradeset[$subject->subjectname][5]["effort"] = Formula::getFinalEffort(array_sum($subAverage['raweffort']));
                    $gradeset[$subject->subjectname]["remarks"] = $gradeset[$subject->subjectname][5]["final"] >= 60 ? 'PASSED' : 'FAILED';

                    if (!$gradeset["disqualifyForHonors"]):
                        if (count($subAverage['final']) != 4):
                            $gradeset["disqualifyForHonors"] = true;
                        endif;
                    endif;

                    if (isset($units[$subject->subject_id]) and $lastSubjectname != $subject->subjectname):
                        $lastSubjectname = $subject->subjectname;
                        $gradeset[$subject->subjectname]['unit'] = number_format($units[$subject->subject_id]['unit'], 2);
                        $gradeset["finalave"][$subject->subjectname] = $gradeset[$subject->subjectname][5]["final"] * $units[$subject->subject_id]['unit'];

                        $totalunits += $units[$subject->subject_id]['unit'];

                        if (!$gradeset["disqualifyForEffort"]):
                            if ($subject->deportable == 1):
                                $gradeset["finaleffort"][$subject->subjectname] = $gradeset[$subject->subjectname][5]["effort"];
                                $gradeset["disqualifyForEffort"] = $gradeset[$subject->subjectname][5]["effort"] < 4 ? false : true; //Major Subject
                            endif;
                        endif;
                    endif;
                endif;
            endif;
        endforeach;

        if (isset($gradeset['finalave'])):
            $gradeset = Formula::getGeneralAverage($gradeset, $totalunits);
        endif;

        return $gradeset;
    }

    public static function getGeneralAverage($gradeset, $totalunits)
    {
        $gradeset["totalunits"] = number_format($totalunits, 2);
        $gradeset["generalaverage"] = array_sum($gradeset["finalave"]) / $totalunits;
        $gradeset["generalaverage"] = number_format($gradeset["generalaverage"], 3);
        $gradeset["generalremarks"] = $gradeset["generalaverage"] >= 60 ? 'PASSED' : 'FAILED';
        $gradeset["disqualifyForHonors"] = $gradeset["generalaverage"] < 92 ? true : false;

        return $gradeset;
    }

    public static function getFinalEffort($effortGrades)
    {
        return $effortGrades / 4;
    }

    public static function getDeportmentAverage($gradeset, $startCounter = 1, $endCounter = 4)
    {
        for ($quarter = $startCounter; $quarter <= $endCounter; $quarter++):
            if (isset($gradeset["deportment"][$quarter]) and $gradeset["deportment"][$quarter] > 0) :
                $gradeset["deportment"][$quarter] = array_sum($gradeset['deportment'][$quarter]) / count($gradeset['deportment'][$quarter]);
                $gradeset["rawdeportment"][$quarter] = number_format($gradeset["deportment"][$quarter], 3);
                $gradeset["deportment"][$quarter] = round($gradeset["deportment"][$quarter]);
            endif;
        endfor;

        if (isset($gradeset["deportment"][$endCounter]) and $gradeset["deportment"][$endCounter] > 0) :
            $gradeset["deportment"][5] = array_sum($gradeset["rawdeportment"]) / count($gradeset["rawdeportment"]);
            $gradeset["deportment"][5] = number_format($gradeset["deportment"][5], 3);
        endif;

        return $gradeset;
    }
}
