<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\SchoolYear;
use App\Models\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('test');
    }

    public function dashboard()
    {
        $sy_check = SchoolYear::first();
        if (!$sy_check):
            return view('admin.initialize');
        endif;

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

    public function fix()
    {
        $fix = request("fix");
        if ($fix == "remove duplicates"):
            $counter = 0;
            for ($i = 1; $i <= 12; $i++):
                $duplicateRecords = DB::table('grades_' . $i)->select('subject_id', 'quarter', 'student_id')
                    ->selectRaw('count(*) as `occurences`')
                    ->groupBy('subject_id', 'quarter', 'student_id')
                    ->having('occurences', '>', 1)
                    ->get();

                $counter += count($duplicateRecords);

                foreach ($duplicateRecords as $record):
                    $duplicate = DB::table('grades_' . $i)->where([
                        ['subject_id', $record->subject_id],
                        ['student_id', $record->student_id],
                        ['quarter', $record->quarter]
                    ])->first();

                    DB::table('grades_' . $i)->where('entry_id', $duplicate->entry_id)->delete();
                endforeach;
            endfor;
        endif;

        /*for ($gradelevel = 11; $gradelevel <= 12; $gradelevel++):
            $gradesModel = new Grade;
            $gradesModel->setTableName($gradelevel);
            $grades = DB::table('grades_' . $gradelevel . ' as grades')->join('subjects_user', 'subjects_user.subject_id', 'grades.subject_id')
                ->where(['grades.schoolyear' => '2019-2020', 'subjects_user.schoolyear' => '2019-2020', 'subjects_user.semester' => 2])
                ->select('entry_id', 'quarter', 'semester', 'grades.subject_id', 'student_id')
                ->orderBy('subject_id')
                ->get();

            foreach ($grades as $grade):
                if ($grade->quarter == 1):
                    DB::table('grades_' . $gradelevel)
                        ->where('entry_id', $grade->entry_id)
                        ->update(['quarter' => 3]);
                elseif ($grade->quarter == 2):
                    DB::table('grades_' . $gradelevel)
                        ->where('entry_id', $grade->entry_id)
                        ->update(['quarter' => 4]);
                endif;
            endforeach;
        endfor;*/

        return redirect('/');
    }

    public function test()
    {
        $section = getSections();
    }

    public function databaseIntegrate($schoolyear)
    {

    }
}
