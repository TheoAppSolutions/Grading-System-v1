<?php

namespace App\Models;

use Illuminate\Support\Facades\Input;

class SchoolYear extends Model
{
    protected $table = 'schoolyear';
    public $timestamps = false;

    public static function getSchoolYear()
    {
        $schoolyear = Input::get('schoolyear') != '' ? Input::get('schoolyear') : SchoolYear::where('active', 1)->first()->schoolyear;
        return $schoolyear;
    }

    public static function getSchoolYearNow()
    {
        $schoolyear = SchoolYear::where('active', 1)->first();
        return $schoolyear->schoolyear;
    }

    public static function getSchoolDays($schoolyear = "")
    {
        if ($schoolyear == ""):
            $schoolyear = self::getSchoolYear();
        endif;
        $days = SchoolYear::where('schoolyear', $schoolyear)->first();
        $days = json_decode($days->school_days);
        $array = [];
        $array["total"] = 0;
        if ($days):
            $ctr = 0;
            foreach ($days as $day):
                $ctr++;
                $array[$ctr] = $day;
                $array["total"] += $day;
            endforeach;
        else:
            for ($ctr = 1; $ctr <= schema("attendance_count"); $ctr++):
                $array[$ctr] = 0;
            endfor;
        endif;

        return $array;

    }
}
