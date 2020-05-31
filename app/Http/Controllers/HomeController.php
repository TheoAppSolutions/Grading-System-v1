<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Grade;
use App\Models\Homeroom;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Subject;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use mikehaertl\wkhtmlto\Pdf as PDF;

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

    public function test()
    {
        $pdf = new PDF(array(
            'no-outline',
            'page-size' => 'A4', //'Letter'
            'orientation' => 'Portrait', //'Landscape'
        ));

        $student_id = 1425;
        $student = Student::byStudentID($student_id);

        $gradelevels = Enrollment::where('student_id', $student_id)->get();
        $schoolyears = [];

        foreach ($gradelevels as $levels):
            $subjects[$levels->gradelevel] = Subject::byLevel($levels->gradelevel);
            $studenttemp = Student::byStudentID($student_id, $levels->schoolyear);
            $gradesModel = new Grade;
            $gradesModel->setTableName($studenttemp->gradelevel);
            $schoolyears[$levels->schoolyear] = $gradesModel->byStudentID($student_id, '', $levels->schoolyear);
        endforeach;

        /*$pdf->addPage(view('reports.transcript.tor', compact('student', 'schoolyears', 'subjects')));

        $pdf->send();*/

        return view('reports.transcript.tor', compact('student', 'schoolyears', 'subjects'));
    }

    public function databaseIntegrate($schoolyear)
    {

    }
}
