<?php

namespace App;

use App\Models\Homeroom;
use App\Models\Subject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'middlename',
        'title',
        'active',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function byType($type = '', $active = 1)
    {
        if ($active != -1):
            $where = $type != '' ? [
                ['roles.role_description', $type],
                ['active', $active]
            ] : [
                ['active', $active]
            ];
        elseif ($active == -1):
            $where = [];
        endif;

        $users = User::where($where)
            ->leftJoin('users_info', 'users_info.user_id', 'users.id')
            ->orderBy('lastname')
            ->whereNotIn('id', [1])
            ->get();

        return $users;
    }

    public static function byId($id)
    {
        $users = User::where('id', $id)
            ->leftJoin('users_info', 'users_info.user_id', 'users.id')
            ->leftJoin('users_settings', 'users_settings.user_id', 'users.id')
            ->first();

        $users->roles = User::getRoles($id);
        $users->homeroom = Homeroom::where('user_id', $id)->get();

        return $users;
    }

    public static function nameCollections($grades, $gradelevel)
    {
        $schoolyear = getSchoolYear();
        $users = Subject::where([
            ['subjects_user.schoolyear', $schoolyear],
            ['subjects.gradelevel', $gradelevel]
        ])
            ->join('subjects_user', 'subjects_user.subject_id', 'subjects.subject_id')
            ->join('users', 'users.id', 'subjects_user.user_id')
            ->select(
                'users.firstname',
                'users.lastname',
                'users.title',
                'subjects.subjectname'
            )
            ->get();

        foreach ($users as $user):
            $grades[$user->subjectname]['teacher'] = $user->title . ' ' . $user->firstname . ' ' . $user->lastname;
        endforeach;

        return $grades;
    }

    public static function getRoles($id)
    {
        $users = DB::table('users_roles')
            ->where('users_roles.user_id', $id)
            ->leftJoin('roles', 'roles.role_id', 'users_roles.role_id')
            ->orderBy('roles.role_id')
            ->select('role_description', 'color_template as color')
            ->get();

        return $users->toArray();
    }

    public static function getAllRoles()
    {
        $users = DB::table('users_roles')
            ->leftJoin('roles', 'roles.role_id', 'users_roles.role_id')
            ->orderBy('roles.role_id')
            ->select('role_description', 'user_id', 'color_template as color')
            ->get();

        $user_roles = [];

        foreach ($users as $user):
            $user_roles[$user->user_id][] = $user;
        endforeach;

        return $user_roles;
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
