<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User;

class Homeroom extends Model
{
    protected $table = 'homeroom';
    public $timestamps = false;

    public static function byGradeLevel($gradelevel)
    {
        $schoolyear = getSchoolYear();

        $records = Homeroom
            ::join('users', 'users.id', 'homeroom.user_id')
            ->where([
                ['homeroom.advisory', $gradelevel],
                ['homeroom.schoolyear', $schoolyear]
            ])
            ->select('users.title',
                'users.firstname',
                'homeroom.user_id',
                'users.lastname')
            ->first();

        if ($records):
            $homeroom['name'] = $records->title . ' ' . $records->firstname . ' ' . $records->lastname;
            $homeroom['id'] = $records->user_id;
        else:
            $homeroom['name'] = "";
            $homeroom['id'] = "";
        endif;

        return $homeroom;
    }

    public static function byUserID($user_id, $schoolyear = '')
    {
        $schoolyear = $schoolyear != '' ? $schoolyear : getSchoolYear();

        $homeroom = Homeroom::where([
            ['user_id', $user_id],
            ['schoolyear', $schoolyear]
        ])->get();

        return $homeroom;
    }

    public static function getPrincipal()
    {
        $pricipal_id = \DB::table('users_roles')->where('role_id', 2)->first();

        $principal = User::where('users.id', $pricipal_id->user_id)
            ->select('users.title',
                'users.firstname',
                'users.lastname')
            ->first();

        $principal = $principal->title . ' ' . $principal->firstname . ' ' . $principal->lastname;

        return $principal;
    }
}
