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
                    $gradeset[$subject->subjectname][5]["final"] = number_format($gradeset[$subject->subjectname][5]["rawfinal"], 3);
                    $gradeset[$subject->subjectname][5]["effort"] = Formula::getFinalEffort(array_sum($subAverage['raweffort']), $gradeset['gradelevel']);
                    $gradeset[$subject->subjectname]["remarks"] = $gradeset[$subject->subjectname][5]["final"] >= 75 ? 'PASSED' : 'FAILED';

                    if (!$gradeset["disqualifyForHonors"]):
                        if (count($subAverage['final']) != 4 or $subject->subjectname != 'CHINESE' and $gradeset['gradelevel'] <= 10):
                            $gradeset["disqualifyForHonors"] = true;
                        elseif (count($subAverage['final']) != 2 or $gradeset['gradelevel'] >= 11):
                            $gradeset["disqualifyForHonors"] = true;
                        endif;
                    endif;

                    if (isset($units[$subject->subjectname]) and $lastSubjectname != $subject->subjectname):
                        $lastSubjectname = $subject->subjectname;
                        $gradeset[$subject->subjectname]['unit'] = number_format($units[$subject->subjectname]['unit'], 2);
                        $gradeset["finalave"][$subject->subjectname] = $gradeset[$subject->subjectname][5]["final"] * $units[$subject->subjectname]['unit'];

                        if ($gradeset['gradelevel'] <= 10):
                            $totalunits = $totalunits + $units[$subject->subjectname]['unit'];
                        elseif ($gradeset['gradelevel'] >= 11):
                            $totalunits = $totalunits + $units[$subject->subjectname]['unit'];
                        endif;

                        if (!$gradeset["disqualifyForEffort"]):
                            if ($subject->deportable == 1):
                                $gradeset["finaleffort"][$subject->subjectname] = $gradeset[$subject->subjectname][5]["effort"];
                                $gradeset["disqualifyForEffort"] = $gradeset[$subject->subjectname][5]["effort"] < 4 ? false : true; //Major Subject
                            elseif ($subject->deportable != 1 and $subject->subjectname != 'CHINESE'):
                                if ($subject->subjectname == 'LIVELIHOOD' or $subject->subjectname == 'COMPUTER'):
                                    $gradeset["disqualifyForEffort"] = $gradeset[$subject->subjectname][5]["effort"] <= 3 ? false : true; //Minor
                                endif;

                                if (isset($gradeset["MUSIC"][5]["effort"]) and isset($gradeset["ART"][5]["effort"]) and isset($gradeset["PE"][5]["effort"])):
                                    $add = $gradeset["MUSIC"][5]["effort"] + $gradeset["ART"][5]["effort"] + $gradeset["PE"][5]["effort"];
                                    $gradeset["disqualifyForEffort"] = $add >= 8 ? false : true;
                                endif;
                            endif;
                        endif;

                    endif;
                endif;
            endif;
        endforeach;

        if (getSchoolYear() != '2015-2016' and getSchoolYear() != '2016-2017' and $gradeset['gradelevel'] <= 10):
            unset($gradeset["finalave"]["CHINESE"]);
            $gradeset = Formula::getMAPEH_TLE($gradeset);
        endif;

        if (isset($gradeset['finalave'])):
            if ($totalunits >= 10):
                $gradeset = Formula::getGeneralAverage($gradeset, $totalunits);
            endif;
        endif;

        return $gradeset;
    }

    public static function getMAPEH_TLE($gradeset)
    {
        for ($ctr = 1; $ctr <= 5; $ctr++):
            if (isset($gradeset["MUSIC"][$ctr]["final"]) and isset($gradeset["ART"][$ctr]["final"]) and isset($gradeset["PE"][$ctr]["final"])):
                if (!empty($gradeset["MUSIC"][$ctr]["final"]) and !empty($gradeset["ART"][$ctr]["final"]) and !empty($gradeset["PE"][$ctr]["final"])):
                    $gradeset["MAPEH"][$ctr]["rawfinal"] = number_format(($gradeset["MUSIC"][$ctr]["rawfinal"] + $gradeset["ART"][$ctr]["rawfinal"] + $gradeset["PE"][$ctr]["rawfinal"]) / 3, 3);
                    $gradeset["MAPEH"][$ctr]["final"] = number_format(($gradeset["MUSIC"][$ctr]["final"] + $gradeset["ART"][$ctr]["final"] + $gradeset["PE"][$ctr]["final"]) / 3, 3);
                    if ($ctr != 5):
                        $gradeset["MAPEH"][$ctr]["final"] = round($gradeset["MAPEH"][$ctr]["final"]) <= 0 ? '' : round($gradeset["MAPEH"][$ctr]["final"]);
                    endif;
                endif;
            endif;

            if (isset($gradeset["LIVELIHOOD"][$ctr]["final"]) and isset($gradeset["COMPUTER"][$ctr]["final"])):
                if (!empty($gradeset["LIVELIHOOD"][$ctr]["final"]) and !empty($gradeset["COMPUTER"][$ctr]["final"])):
                    $gradeset["TLE"][$ctr]["rawfinal"] = number_format((($gradeset["LIVELIHOOD"][$ctr]["rawfinal"] * 2) + $gradeset["COMPUTER"][$ctr]["rawfinal"]) / 3, 3);
                    $gradeset["TLE"][$ctr]["final"] = number_format((($gradeset["LIVELIHOOD"][$ctr]["final"] * 2) + $gradeset["COMPUTER"][$ctr]["final"]) / 3, 3);
                    if ($ctr != 5):
                        $gradeset["TLE"][$ctr]["final"] = round($gradeset["TLE"][$ctr]["final"]) <= 0 ? '' : round($gradeset["TLE"][$ctr]["final"]);
                    endif;
                endif;
            endif;
        endfor;

        if (isset($gradeset["MAPEH"][5])):
            $gradeset["MAPEH"]["remarks"] = $gradeset["MAPEH"][5]["final"] > 75 ? 'PASSED' : 'FAILED';
            /*$gradeset["finalave"]["MAPEH"] = $gradeset["MAPEH"][5]["rawfinal"] * 3;
            unset($gradeset["finalave"]["ART"]);
            unset($gradeset["finalave"]["MUSIC"]);
            unset($gradeset["finalave"]["PE"]);*/
        endif;

        if (isset($gradeset["TLE"][5])):
            $gradeset["TLE"]["remarks"] = $gradeset["TLE"][5]["final"] > 75 ? 'PASSED' : 'FAILED';
            /*$gradeset["finalave"]["TLE"] = $gradeset["TLE"][5]["rawfinal"] * 3;
            unset($gradeset["finalave"]["COMPUTER"]);
            unset($gradeset["finalave"]["LIVELIHOOD"]);*/
        endif;

        return $gradeset;
    }

    public static function getGeneralAverage($gradeset, $totalunits)
    {
        $gradeset["generalaverage"] = array_sum($gradeset["finalave"]) / $totalunits;
        $gradeset["generalaverage"] = number_format($gradeset["generalaverage"], 3);
        $gradeset["generalremarks"] = $gradeset["generalaverage"] >= 75 ? 'PASSED' : 'FAILED';
        $gradeset["disqualifyForHonors"] = $gradeset["generalaverage"] < 92 ? true : false;
        if ($gradeset["generalremarks"] == "PASSED"):
            if ($gradeset['gradelevel'] <= 11):
                //$gradeset['eligible'] = ordinal(getNextGradeLevel($gradeset['gradelevel'])) . " Grade";
            else:
                $gradeset['eligible'] = "Graduate";
            endif;
        else:
            $gradeset['eligible'] = "";
        endif;
        return $gradeset;
    }

    public static function getFinalEffort($effortGrades, $gradelevel)
    {
        if ($gradelevel <= 10):
            if (getSchoolYear() == '2015-2016' or getSchoolYear() == '2016-2017'):
                if ($effortGrades >= 11 and $effortGrades <= 12):
                    $effortGrades = 3;
                elseif ($effortGrades >= 7 and $effortGrades <= 10):
                    $effortGrades = 2;
                elseif ($effortGrades >= 1 and $effortGrades <= 6):
                    $effortGrades = 1;
                endif;
            else:
                if ($effortGrades >= 19 and $effortGrades <= 20): // 5 5 5 5 / 5 5 5 4
                    $effortGrades = 5;
                elseif ($effortGrades >= 15 and $effortGrades <= 18): // 5 5 4 4 / 4 4 4 3
                    $effortGrades = 4;
                elseif ($effortGrades >= 11 and $effortGrades <= 14): // 4 4 3 3 / 3 3 3 2
                    $effortGrades = 3;
                elseif ($effortGrades >= 7 and $effortGrades <= 10): // 3 3 2 2 / 2 2 2 1
                    $effortGrades = 2;
                elseif ($effortGrades >= 1 and $effortGrades <= 6): // 2 2 1 1 / 1 1 1 1
                    $effortGrades = 1;
                endif;
            endif;
        elseif ($gradelevel >= 11):
            if (getSchoolYear() == '2015-2016' or getSchoolYear() == '2016-2017'):
                switch ($effortGrades):
                    case 6:
                        $effortGrades = 3;
                        break;
                    case 5:
                        $effortGrades = 2;
                        break;
                    case 4:
                        $effortGrades = 2;
                        break;
                    case 3:
                        $effortGrades = 1;
                        break;
                    case 2:
                        $effortGrades = 1;
                        break;
                    case 1:
                        $effortGrades = 1;
                        break;
                endswitch;
            else:
                switch ($effortGrades):
                    case 10:
                        $effortGrades = 5;
                        break;
                    case 9:
                        $effortGrades = 4.5;
                        break;
                    case 8:
                        $effortGrades = 4;
                        break;
                    case 7:
                        $effortGrades = 3.5;
                        break;
                    case 6:
                        $effortGrades = 3;
                        break;
                    case 5:
                        $effortGrades = 2.5;
                        break;
                    case 4:
                        $effortGrades = 2;
                        break;
                    case 3:
                        $effortGrades = 1.5;
                        break;
                    case 2:
                        $effortGrades = 2;
                        break;
                    case 1:
                        $effortGrades = 1;
                        break;
                endswitch;
            endif;
        endif;

        return $effortGrades;
    }

    public static function getDeportmentAverage($gradeset, $startCounter, $endCounter)
    {
        for ($quarter = $startCounter; $quarter <= $endCounter; $quarter++):
            if (isset($gradeset["deportment"][$quarter]) and $gradeset["deportment"][$quarter] > 0) :
                $gradeset["deportment"][$quarter] = array_sum($gradeset['deportment'][$quarter]) / count($gradeset['deportment'][$quarter]);
                $deportment = getDeportmentGrades($gradeset["student_id"]);
                $gradeset["deportment"][$quarter] = ($gradeset["deportment"][$quarter] + $deportment[$quarter]) / 2;
                $gradeset["deportment"][$quarter] = number_format($gradeset["deportment"][$quarter], 2);

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
