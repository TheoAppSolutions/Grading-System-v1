<?php

namespace App\Http\Controllers;

use App\Models\Homeroom;
use App\Models\Month;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Subject;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficeController extends Controller
{
    public function settings()
    {
        $homeroom = Homeroom::where('schoolyear', getSchoolYear())->get();
        $users = User::byType('', 1);
        $schoolyears = SchoolYear::all();
        $terms = Month::getMonths();
        $principal = DB::table('users_roles')->where('role_id', 2)->first();

        $homeroomArray = [];
        foreach ($homeroom as $item):
            $homeroomArray[$item->advisory] = $item;
        endforeach;

        return view('office.settings', compact('homeroomArray', 'users', 'schoolyears', 'terms', 'principal'));
    }

    public function homeroom_update(Request $request)
    {
        $schoolyear = $request->schoolyear;

        foreach ($request->homeroom as $advisory => $user):
            $homeroom = Homeroom::where([['schoolyear', $schoolyear], ['advisory', $advisory]])->first();
            if ($homeroom):
                $homeroom->user_id = $user;
                $homeroom->save();
            else:
                Homeroom::insert([
                    "advisory" => $advisory,
                    "user_id" => $user,
                    "section" => '',
                    "schoolyear" => $schoolyear
                ]);
            endif;
        endforeach;

        session()->forget('homeroom');

        notify()->flash('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Homeroom Updated Successfully',
        ]);

        return back();
    }

    public function schooldays_update(Request $request)
    {
        $array = [];
        foreach ($request->days as $day):
            if ($day):
                array_push($array, $day);
            else:
                array_push($array, 0);
            endif;
        endforeach;

        SchoolYear::where("schoolyear", $request->schoolyear)->update(["school_days" => json_encode($array)]);

        notify()->flash('Success!', 'success', [
            'timer' => 3000,
            'text' => 'School Days Updated Successfully',
        ]);

        return back();
    }

    public function report_student()
    {
        $students = Student::getStudents("all");

        $studentsArray = [];

        foreach ($students as $student):
            $studentsArray[$student->gradelevel][$student->student_id] = $student;
        endforeach;

        return view('reports.reportCard', compact('students', 'studentsArray'));
    }

    public function report_subject()
    {
        $subjects = Subject::getAll();
        $gradelevels = Subject::getGradelevels();

        return view('admin.reportSummary', compact('subjects', 'gradelevels'));
    }
}
