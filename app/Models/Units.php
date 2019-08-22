<?php

namespace App\Models;

class Units extends Model
{
    protected $table = 'subjects_units';
    protected $primaryKey = 'entry_id';
    public $timestamps = false;

    public static function getUnits()
    {
        $units = Units::where('schoolyear', getSchoolYear())
            ->join('subjects', 'subjects.subject_id', 'subjects_units.subject_id')
            ->get();
        $unitset = [];

        foreach ($units as $unit):
            $unitset["$unit->subjectname"]['unit'] = $unit->units;
        endforeach;
        return $unitset;// TODO 2015-2016 Units
    }

    public static function renewUnits($schoolyear)
    {
        $units = Units::getUnits();

    }
}
