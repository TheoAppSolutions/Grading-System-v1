<?php

namespace App\Models;

class SchoolYear extends Model
{
    protected $table = 'schoolyear';
    public $timestamps = false;

    public static function getSchoolYear($field = "schoolyear")
    {
        $schoolyear = request('schoolyear');

        if ($schoolyear == ""):
            if (!session()->has('schoolyear')):
                $schoolyear = SchoolYear::where('active', 1)->first();
                session()->put('schoolyear', $schoolyear->schoolyear);
            else:
                $schoolyear = session('schoolyear');
            endif;
        elseif ($schoolyear != ""):
            $schoolyear = SchoolYear::where('schoolyear', $schoolyear)->first();
        endif;

        return $schoolyear->{$field};
    }

    public static function getSchoolDays()
    {
        $days = SchoolYear::getSchoolYear("school_days");
        $days = json_decode($days);
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
            for ($ctr = 1; $ctr <= schema("attendance.count"); $ctr++):
                $array[$ctr] = 0;
            endfor;
        endif;

        return $array;

    }
}
