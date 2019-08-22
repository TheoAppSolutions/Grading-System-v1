<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Attendance_New;
use App\Models\Comments_Midquarter;
use App\Models\Comments_Quarter;
use App\Models\Student;
use App\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Symfony\Component\Process\Process;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('test');
    }

    public function dashboard()
    {
        $user = User::byId(Auth::id());

        $notifications = [];

        if ($user->email == ""):
            $notifications["system"]["email"] = "1";
        endif;

        $password = User::where("id", $user->id)->select("password")->first()->password;
        $defaultPword = getDefaultPword();

        if (Hash::check($defaultPword, $password)):
            $notifications["system"]["password"] = "1";
        endif;
        $announcements = DB::table('announcements')->get();
        foreach ($announcements as $key => $announcement):
            foreach ($announcement as $tag => $value):
                $notifications["announcements"][$key][$tag] = $value;
                if ($tag == "from_user_id"):
                    $user = User::where('id', $value)->first();
                    $notifications["announcements"][$key][$tag] = $user->title . ' ' . $user->firstname . ' ' . $user->lastname;
                endif;
            endforeach;
        endforeach;

        return view('dashboard', compact('notifications'));
    }

    public function test()
    {
        $schoolyear = ['2015-2016','2016-2017','2017-2018','2018-2019'];
        return $this->databaseIntegrate($schoolyear);
    }

    public function databaseIntegrate($schoolyear)
    {

    }
}
