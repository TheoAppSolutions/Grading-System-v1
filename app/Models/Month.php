<?php

namespace App\Models;

class Month extends Model
{
    protected $table = 'Months_Terms';
    public $timestamps = false;

    public static function getMonths()
    {
        $schoolyear = getSchoolYear();
        //$term = Month::where('schoolyear', $schoolyear)->first();

        /*if (!$term):
            $term = new Month;

            for ($ctr = 1; $ctr <= 4; $ctr++):
                $term->{"term" . $ctr} = 0;
            endfor;
        else:
            $term->Total = 0;
            for ($ctr = 1; $ctr <= 4; $ctr++):
                $term->{"term" . $ctr} = $term->{"term" . $ctr} > 0 ? $term->{"term" . $ctr} : '';
                $term->Total += intval($term->{"term" . $ctr});
            endfor;
        endif;*/

        $term = new SchoolYear();

        $db = SchoolYear::where("active", 1)->first();
        $array = json_decode($db->school_days);

        if ($array):
            for ($loop = 0, $ctr = 1; $loop < count($array); $loop++, $ctr++):
                $term->{"term" . $ctr} = $array[$loop] > 0 ? $array[$loop] : '';
                $term->Total += intval($term->{"term" . $ctr});
            endfor;
        endif;

        return $term;
    }

    public static function getMonthsArray()
    {
        $term = self::getMonths();
        $termArray = [];

        for ($ctr = 1; $ctr <= 4; $ctr++):
            $termArray[$ctr] = $term->{"term" . $ctr} != '' ? $term->{"term" . $ctr} : 0;
        endfor;

        return $termArray;
    }
}
