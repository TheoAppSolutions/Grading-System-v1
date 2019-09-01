<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class StudentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.role:Secretary,Principal')->except('edit', 'update');
    }

    public function index()
    {
        $studentsArray = [];
        $status = request("status");
        $graduates = [];
        if ($status == "all" or $status == ""):
            $studentsArray['all'] = Student::getStudents("all");
            $graduates = Student::getStudents("graduates");
        elseif ($status == "enrolled"):
            $studentsArray['all'] = Student::getStudents("enrolled");
        elseif ($status == "notenrolled"):
            $studentsArray['all'] = Student::getStudents("notenrolled");
        elseif ($status == "inactive"):
            $studentsArray['all'] = Student::getStudents("inactive");
        elseif ($status == "graduates"):
            $studentsArray['all'] = Student::getStudents("graduates");
        endif;

        if ($status != "graduates" and $status != "all"):
            foreach ($studentsArray['all'] as $student):
                $studentsArray[$student->gradelevel][] = $student;
            endforeach;
        elseif ($status == "all"):
            foreach ($graduates as $student):
                $studentsArray['graduates'][$student->student_id] = $student;
            endforeach;
        endif;

        return view('students.index', compact('studentsArray'));
    }

    public function create()
    {
        $schoolyears = DB::table('schoolyear')->get();
        $currentSchoolyear = getSchoolYear();

        return view('students.create', compact('schoolyears', 'currentSchoolyear'));
    }

    public function store(Request $request)
    {
        if ($request->student_id):
            $student = Student::where('student_id', $request->student_id)
                ->orWhere([['firstname', ucwords($request->firstname)], ['lastname', ucwords($request->lastname)]])
                ->first();

            if ($student):
                if ($student->student_id == $request->student_id):
                    return back()->withInput($request->input())
                        ->withErrors('Student ID#:[' . $student->student_id . '] is already taken by "' . $student->firstname . ' ' . $student->lastname . '"');
                elseif ($student->lastname == ucwords($request->lastname) and $student->firstname == ucwords($request->firstname)):
                    return back()->withInput($request->input())
                        ->withErrors('Name Conflict: "' . $student->firstname . ' ' . $student->lastname . '" is already registered.');
                endif;
            endif;
        endif;

        $validate = $this->validateStudent('store');

        Student::insert([
            'student_id' => $validate['student_id'],
            'student_lrn' => isset($validate['student_lrn']) ? $validate['student_lrn'] : "",
            'firstname' => ucwords($validate['firstname']),
            'middlename' => ucwords($validate['middlename']),
            'lastname' => ucwords($validate['lastname']),
            'suffix' => ucwords($validate['suffix']),
            'gender' => $validate['gender'],
            'section' => isset($validate['section']) ? $validate['section'] : ""
        ]);

        $student_id = $validate['student_id'];

        DB::table('students_info')->insert([
            'student_id' => $validate['student_id'],
            'birthdate' => $validate['birthdate'],
            'contact' => $validate['contact'],
            'address' => $validate['address'],
            'email' => $validate['email']
        ]);

        $schoolyear = getSchoolYear();
        $gradelevel = $request->gradelevel;

        if ($request->gradelevel != "graduate"):
            $table = DB::table("enrollment")->where([["student_id", $student_id], ["schoolyear", $schoolyear]])->first();
            if (!$table):
                DB::table("enrollment")->insert([
                    "student_id" => $student_id,
                    "schoolyear" => $schoolyear,
                    "gradelevel" => $gradelevel
                ]);
            endif;
        else:
            $table = DB::table('graduates')->where('student_id', $student_id)->first();

            if (!$table):
                DB::table('graduates')->insert([
                    'student_id' => $student_id,
                    'graduated_at' => $schoolyear
                ]);
            endif;
        endif;

        if ($request->hasFile('avatar')) {
            $request->avatar->storeAs('students', $request->student_id . '.jpg');
        }

        notify()->flash('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Student Saved Successfully',
        ]);

        return back();
    }

    public function show($id)
    {
        $student = Student::byStudentID($id);
        if (!$student):
            return redirect()->route('student.index');
        endif;

        $graduate = DB::table('graduates')->where('student_id', $id)->first();

        if ($graduate):
            $graduate = 1;
        else:
            $graduate = 0;
        endif;

        return view('students.show', compact('student', 'graduate'));
    }

    public function show_modal($id)
    {
        $student = Student::byStudentID($id);

        return view('students._modal.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::byStudentID($id);

        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $schoolyear = getSchoolYear();
        $validate = $this->validateStudent('update');

        Student::where('student_id', $id)
            ->update([
                'student_lrn' => isset($validate['student_lrn']) ? $validate['student_lrn'] : "",
                'firstname' => ucwords($validate['firstname']),
                'middlename' => ucwords($validate['middlename']),
                'lastname' => ucwords($validate['lastname']),
                'suffix' => ucwords($validate['suffix']),
                'gender' => $validate['gender'],
                'section' => isset($validate['section']) ? $validate['section'] : ""
            ]);

        DB::table('students_info')
            ->where('student_id', $id)
            ->update([
                'birthdate' => $validate['birthdate'],
                'contact' => $validate['contact'],
                'address' => $validate['address'],
                'email' => $validate['email']
            ]);

        if ($request->gradelevel != "graduate"):
            DB::table('enrollment')
                ->where([['student_id', $id], ['schoolyear', $schoolyear]])
                ->update([
                    'gradelevel' => $request->gradelevel
                ]);

            $table = DB::table('graduates')->where('student_id', $id)->first();
            if ($table):
                DB::table('graduates')->where('student_id', $id)->delete();
            endif;
        else:
            $table = DB::table('graduates')->where('student_id', $id)->first();

            if (!$table):
                DB::table('graduates')->insert([
                    'student_id' => $id,
                    'graduated_at' => $schoolyear
                ]);
            endif;
        endif;

        if ($request->removeAvatar == 'true'):
            Storage::delete('/images/students/' . $id . '.jpg');
        endif;

        if ($request->hasFile('avatar')) :
            $this->image_resize($request->file('avatar'), $id);
        endif;

        notify()->flash('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Student Updated Successfully',
        ]);

        return back();
    }

    public function destroy(Request $request)
    {
        Student::where('student_id', $request->student_id)->delete();
        DB::table('students_info')->where('student_id', $request->student_id)->delete();
        DB::table('students_section')->where('student_id', $request->student_id)->delete();
        DB::table('enrollment')->where('student_id', $request->student_id)->delete();
    }

    public function activate(Request $request)
    {
        $student = Student::where('student_id', $request->id)->first();
        $student->active = $student->active == 1 ? 0 : 1;
        $student->save();
    }

    protected function validateStudent($type, $id = "")
    {
        switch ($type):
            case 'store':
                return request()->validate([
                    'student_id' => ['required', 'unique:students,student_id', 'max:255'],
                    'student_lrn' => ['nullable', 'unique:students,student_lrn', 'max:255'],
                    'firstname' => ['required', 'max:255'],
                    'lastname' => ['required', 'max:255'],
                    'middlename' => ['nullable', 'string', 'max:255'],
                    'suffix' => ['nullable', 'string', 'max:255'],
                    'birthdate' => ['nullable', 'date'],
                    'gender' => ['required'],
                    'email' => ['nullable', 'string', 'max:255'],
                    'contact' => ['nullable'],
                    'address' => ['nullable', 'string', 'max:255'],
                    'section' => ['nullable', 'string', 'max:255']
                ]);
                break;
            case 'update':
                return request()->validate([
                    'firstname' => ['required', 'max:255'],
                    'lastname' => ['required', 'max:255'],
                    'middlename' => ['nullable', 'string', 'max:255'],
                    'suffix' => ['nullable', 'string', 'max:255'],
                    'birthdate' => ['nullable', 'date'],
                    'gender' => ['required'],
                    'email' => ['nullable', 'string', 'max:255'],
                    'contact' => ['nullable'],
                    'address' => ['nullable', 'string', 'max:255'],
                    'section' => ['nullable', 'string', 'max:255']
                ]);
                break;
        endswitch;
        return '';
    }

    protected function image_resize($file, $id)
    {
        // open an image file
        $img = Image::make($file);

        // now you are able to resize the instance
        $img->resize(520, 520);

        // finally we save the image as a new file
        $img->save('images/students/' . $id . '.jpg');
    }
}
