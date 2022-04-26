<?php

namespace App\Http\Controllers;

use App\User;
use App\Models\Homeroom;
use App\Models\Month;
use App\Models\SchoolYear;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function homeroom()
    {
        $homeroom = Homeroom::where('schoolyear', getSchoolYear())->get();
        $users = User::byType('', 1);

        return view('office.homerooms', compact('homeroom', 'users'));
    }

    public function updatehomeroom(Request $request)
    {
        $schoolyear = $request->schoolyear;
        foreach ($request->gradelevel as $advisory => $user):
            $user['user_id'] = empty($user['user_id']) ? null : $user['user_id'];
            $user['user2_id'] = empty($user['user2_id']) ? null : $user['user2_id'];
            if ($advisory == 12):
                $advisory = "Prep";
            elseif ($advisory == 11):
                $advisory = "Kindy";
            endif;
            $homeroom = Homeroom::where([['schoolyear', $schoolyear], ['advisory', $advisory]])->first();
            $homeroom->user_id = $user['user_id'];
            $homeroom->user2_id = $user['user2_id'];
            $homeroom->save();
        endforeach;

        notify('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Homeroom Updated Successfully',
        ]);

        return back();
    }

    public function system_settings()
    {
        $schoolyears = SchoolYear::all();

        return view('admin.settings', compact('schoolyears'));
    }

    public function schema_setup()
    {
        return view('admin.schema');
    }

    public function database_manager()
    {
        dd("Not Yet Available");
    }

    /* Method: PATCH */
    public function update_roles(Request $request)
    {
        $roles = $request->role;
        foreach ($roles as $key => $value):
            $role_id = DB::table("roles")
                ->where("roles.role_description", $key)
                ->join("users_roles", "users_roles.role_id", "roles.role_id")
                ->first();

            if ($role_id):
                DB::table("users_roles")
                    ->where("role_id", $role_id->role_id)
                    ->update([
                        "user_id" => $value,
                        "role_id" => $role_id->role_id
                    ]);
            else:
                $role_id = DB::table("roles")
                    ->where("role_description", $key)
                    ->first();

                DB::table("users_roles")->insert([
                    "user_id" => $value,
                    "role_id" => $role_id->role_id
                ]);
            endif;
        endforeach;

        notify('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Updated Successfully',
        ]);

        return back();
    }
}
