<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Comments_Midquarter;
use App\Models\Comments_Quarter;
use App\Models\Enrollment;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Subject;
use App\Models\UserSettings;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class IntegrationController extends Controller
{
    public function initialize(Request $request)
    {
        $admin = User::find(1);
        if (Hash::check($request->password, $admin->password)):
            if ($request->hasFile('avatar')) :
                $request->file('avatar')->storeAs('/images/', 'logo.png');
            endif;

            $schoolyear = new SchoolYear;
            $schoolyear->active = 1;
            $schoolyear->schoolyear = $request->schoolyear;
            $schoolyear->schoolyear_start = $request->schoolyear_start;
            $schoolyear->schoolyear_end = $request->schoolyear_end;
            $schoolyear->days_settings = $request->days_settings;
            $schoolyear->save();

            notify()->flash('Success!', 'success', [
                'timer' => 3000,
                'text' => 'Welcome!',
            ]);

            return redirect('home');
        else:
            notify()->flash('Error!', 'warning', [
                'timer' => 3000,
                'text' => 'Admin Password Incorrect!',
            ]);
            return back();
        endif;

    }

    public function attendance_integration($schoolyear)
    {
        $rows = 0;
        $student_row = 0;
        $students = Student::all();

        foreach ($students as $student):
            $attendances = DB::table('attendance_old')->where([
                ['student_id', $student->student_id],
                ['schoolyear', $schoolyear]
            ])->first();

            if ($attendances):
                $attendance = new Attendance;
                $attendance->student_id = $student->student_id;
                $attendance->schoolyear = $schoolyear;
                $json = [];

                for ($ctr = 1; $ctr <= 12; $ctr++):
                    $A = "M" . $ctr . "A";
                    $T = "M" . $ctr . "T";
                    $json[$ctr]["A"] = intval($attendances->{$A}) > 0 ? intval($attendances->{$A}) : 0;
                    $json[$ctr]["T"] = intval($attendances->{$T}) > 0 ? intval($attendances->{$T}) : 0;
                endfor;

                $attendance->attendance = json_encode($json);
                if ($json):
                    $attendance->save();
                endif;
            endif;
            $student_row++;
        endforeach;

        return "Records: " . $rows . " Students: " . $student_row;
    }

    public function comments_midquarter($schoolyear)
    {
        $rows = 0;
        $student_row = 0;
        $students = Student::all();

        foreach ($schoolyear as $year):
            foreach ($students as $student):
                $comments_old = DB::table('comments_midquarter_old')->where([
                    ['student_id', $student->student_id],
                    ['schoolyear', $year]
                ])->get();

                if ($comments_old):
                    $comments = new Comments_Midquarter;
                    $comments->schoolyear = $year;
                    $comments->student_id = $student->student_id;
                    $comments->quarter = 1;

                    $json = [];

                    foreach ($comments_old as $old):
                        for ($ctr = 1; $ctr <= 12; $ctr++):
                            $A = "S" . $ctr;
                            $json[$old->subject_id][$A] = $old->{$A} > 0 ? $old->{$A} : 0;
                        endfor;

                        for ($ctr = 1; $ctr <= 5; $ctr++):
                            $A = "PSR" . $ctr;
                            $json[$old->subject_id][$A] = $old->{$A} > 0 ? $old->{$A} : 0;
                            $A = "WSS" . $ctr;
                            $json[$old->subject_id][$A] = $old->{$A} > 0 ? $old->{$A} : 0;
                        endfor;

                        $comments->comments = json_encode($json);
                        $rows++;
                    endforeach;

                    if ($json):
                        $comments->save();
                    endif;
                endif;
                $student_row++;
            endforeach;
        endforeach;

        return "Records: " . $rows . " Students: " . $student_row;
    }

    public function comments_quarter($schoolyear)
    {
        $rows = 0;
        $student_row = 0;
        $students = Student::all();

        foreach ($schoolyear as $year):
            foreach ($students as $student):
                $comments_old = DB::table('comments_quarter_old')->where([
                    ['student_id', $student->student_id],
                    ['schoolyear', $year]
                ])->get();

                if ($comments_old):
                    $comments = new Comments_Quarter;
                    $comments->schoolyear = $year;
                    $comments->student_id = $student->student_id;

                    $json = [];

                    foreach ($comments_old as $old):
                        for ($ctr = 1; $ctr <= 5; $ctr++):
                            $A = "A" . $ctr;
                            $json[$A] = $old->{$A} > 0 ? $old->{$A} : 0;
                        endfor;

                        for ($ctr = 1; $ctr <= 4; $ctr++):
                            $A = "B" . $ctr;
                            $json[$A] = $old->{$A} > 0 ? $old->{$A} : 0;
                            $A = "C" . $ctr;
                            $json[$A] = $old->{$A} > 0 ? $old->{$A} : 0;
                            $A = "D" . $ctr;
                            $json[$A] = $old->{$A} > 0 ? $old->{$A} : 0;
                        endfor;

                        for ($ctr = 1; $ctr <= 3; $ctr++):
                            $A = "E" . $ctr;
                            $json[$A] = $old->{$A} > 0 ? $old->{$A} : 0;
                        endfor;

                        for ($ctr = 1; $ctr <= 1; $ctr++):
                            $A = "F" . $ctr;
                            $json[$A] = $old->{$A} > 0 ? $old->{$A} : 0;
                        endfor;

                        $comments->comments = json_encode($json);
                        $rows++;
                    endforeach;

                    if ($json):
                        $comments->save();
                    endif;
                endif;
                $student_row++;
            endforeach;
        endforeach;
        return "Records: " . $rows . " Students: " . $student_row;
    }

    public function enrollment()
    {
        $students = Student::join('students_level', 'students_level.level_id', 'students.level_id')
            ->select('students.student_id',
                'students_level.schoolyear',
                'students_level.gradelevel')
            ->orderBy('students_level.schoolyear')
            ->get();

        foreach ($students as $student):
            $enrollment = new Enrollment;
            $enrollment->student_id = $student->student_id;
            $enrollment->schoolyear = $student->schoolyear;
            $enrollment->gradelevel = $student->gradelevel;

            $enrollment->save();
        endforeach;
    }

    public function schooldays()
    {
        $schoolyears = DB::table('months_old')->get();
        foreach ($schoolyears as $schoolyear):
            $json = [];
            for ($ctr = 1; $ctr <= 12; $ctr++):
                $day = "Day" . $ctr;
                array_push($json, $schoolyear->{$day});
            endfor;

            SchoolYear::where("schoolyear", $schoolyear->schoolyear)->update(["school_days" => json_encode($json)]);
        endforeach;
    }

    public function user_settings()
    {
        $users = User::select('id')->get();
        foreach ($users as $user):
            $settings = new UserSettings;
            $settings->user_id = $user->id;
            $settings->save();
        endforeach;
    }

    public function subject_units()
    {
        $schoolyear = "2018-2019";
        $subject_units = DB::table("subjects_units")
            ->where("schoolyear", $schoolyear)
            ->get();

        foreach ($subject_units as $unit):
            $subjects = Subject::where("subjectname", $unit->subjectname)->get();
            foreach ($subjects as $subject):
                DB::table("subjects_units_new")->insert([
                    "subjectname" => $subject->subject_id,
                    "weight" => $unit->weight,
                    "schoolyear" => $schoolyear
                ]);
            endforeach;
        endforeach;
    }

    public function refresh()
    {
        Artisan::call("debugbar:clear");
        Artisan::call("optimize:clear");

        notify()->flash('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Clear Cache Successfully',
        ]);

        return back();
    }
}
