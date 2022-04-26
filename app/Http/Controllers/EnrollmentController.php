<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnrollmentController extends Controller
{
    public function enroll()
    {
        $students = Student::getStudents();

        $studentsArray = [];

        foreach ($students as $student):
            $studentsArray[$student->gradelevel][$student->student_id] = $student;
            $studentsArray["all"][] = $student;
        endforeach;

        return view('students.index', compact('students', 'studentsArray'));
    }

    public function enrollment($id)
    {
        $student = Student::byStudentID($id);
        $enrolled_years = DB::table("enrollment")->where("student_id", $student->student_id)->get();
        foreach ($enrolled_years as $endrolled):
            $gradesModel = new Grade;
            $gradesModel->setTableName($endrolled->gradelevel);
            $grades[$endrolled->schoolyear] = $gradesModel->byStudentID($id, false, $endrolled->schoolyear);
        endforeach;

        return view('students._modal.enrollment', compact('student', 'enrolled_years', 'grades'));
    }

    public function un_enrollment($id)
    {
        $student = Student::byStudentID($id);
        $enrolled_years = DB::table("enrollment")->where("student_id", $student->student_id)->get();
        foreach ($enrolled_years as $endrolled):
            $gradesModel = new Grade;
            $gradesModel->setTableName($endrolled->gradelevel);
            $grades[$endrolled->schoolyear] = $gradesModel->byStudentID($id, false, $endrolled->schoolyear);
        endforeach;

        return view('students._modal.enrollment', compact('student', 'enrolled_years', 'grades'));
    }

    public function enrollment_save(Request $request, $id)
    {
        $student_id = $request->student_id;
        $schoolyear = $request->schoolyear;
        $gradelevel = $request->gradelevel;
        $table = DB::table("enrollment")->where([["student_id", $student_id], ["schoolyear", $schoolyear]])->first();

        if (!$table):
            DB::table("enrollment")->insert([
                "student_id" => $student_id,
                "schoolyear" => $schoolyear,
                "gradelevel" => $gradelevel
            ]);
        endif;
    }

    public function enrollment_mass(Request $request)
    {
        $students = $request->enroll;
        $schoolyear = $request->schoolyear;
        foreach ($students as $student_id => $gradelevel):
            $table = DB::table("enrollment")->where([["student_id", $student_id], ["schoolyear", $schoolyear]])->first();

            if (!$table):
                DB::table("enrollment")->insert([
                    "student_id" => $student_id,
                    "schoolyear" => $schoolyear,
                    "gradelevel" => $gradelevel
                ]);
            endif;
        endforeach;

        return back();
    }

    public function show_import_student()
    {
        return view('students._modal.import');
    }

    public function import_student(Request $request)
    {
        $importData = explode('|', preg_replace('/\s+/', '', $request->import_code));
        $schoolyear = getSchoolYear();
        $errors = [];

        foreach ($importData as $key => $data):
            $import = explode(',', $importData[$key]);

            if ($import[0]):
                $student = Student::where('student_id', $import[0])
                    ->orWhere([['lastname', $import[1]], ['firstname', $import[2]]])
                    ->first();

                if (!$student):
                    $student = new Student;
                    $student->student_id = $import[0];
                    $student->lastname = $import[1];
                    $student->firstname = $import[2];
                    $student->middlename = $import[3];
                    $student->suffix = $import[4];
                    $student->gender = $import[5];
                    $student->save();

                    DB::table('students_info')->insert([
                        "student_id" => $import[0],
                        "contact" => $import[7],
                        "address" => $import[8],
                        "email" => $import[9]
                    ]);

                    if ($import[6] == "Kindy"):
                        $import[6] = "Kindy";
                    endif;

                    DB::table("enrollment")->insert([
                        "student_id" => $import[0],
                        "gradelevel" => $import[6],
                        "schoolyear" => $schoolyear
                    ]);
                else:
                    if ($import[0] != $student->student_id and $import[1] == $student->lastname and $import[2] == $student->firstname):
                        $errors[] = 'Name Conflict: "' . $import[2] . ' ' . $import[1] . '" is already registered.';
                    elseif ($import[1] != $student->lastname and $import[2] != $student->firstname):
                        $errors[] = 'Student ID#:[' . $import[0] . '] is already taken by "' . $student->firstname . ' ' . $student->lastname . '"';
                    endif;
                endif;
            endif;
        endforeach;

        if (count($errors)):
            notify('Success w/ errors!', 'warning', [
                'timer' => 3000,
                'text' => 'Some Students Imported Successfully',
            ]);

            return back()->withErrors($errors);
        endif;

        notify('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Students Imported Successfully',
        ]);

        return back();

    }

    public function change_status(Request $request)
    {
        $student = Student::where('student_id', $request->student_id)->first();

        if ($student->active):
            $student->active = 0;
        else:
            $student->active = 1;
        endif;
        $student->save();
    }
}
