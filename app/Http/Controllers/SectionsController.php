<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\SchoolYear;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionsController extends Controller
{
    public function index()
    {
        $currentSchoolYear = getSchoolYear();
        $schoolYears = SchoolYear::select("schoolyear")->get();
        $sections_records = DB::table('sections')
            ->where('schoolyear', $currentSchoolYear)
            ->orderBy('gradelevel')
            ->get();

        $sections = [];

        foreach ($sections_records as $record):
            $sections[$record->gradelevel][] = $record;
        endforeach;

        return view('admin.sections', compact('sections', 'currentSchoolYear', 'schoolYears'));
    }

    public function updateSections(Request $request)
    {
        foreach ($request->section_or_strand as $student_id => $section):
            Enrollment::where(["student_id" => $student_id, "schoolyear" => $request->schoolyear])
                ->update([
                    "section_or_strand" => $section
                ]);
        endforeach;

        return back();
    }

    public function update(Request $request)
    {
        foreach ($request->sections as $sections):
            $student = explode(',', $sections);

            if ($student[1]):
                $student_id = str_replace("section[", '', $student[0]);
                $student_id = str_replace("]", '', $student_id);

                /*Student::where('student_id', $student_id)->update([
                    'section' => $student[1]
                ]);*/
                $schoolyear = getSchoolYear();

                $section = \DB::table('students_section')
                    ->where([
                        ['student_id', $student_id],
                        ['schoolyear', $schoolyear]
                    ])
                    ->first();

                if ($section):
                    \DB::table('students_section')
                        ->where([
                            ['student_id', $student_id],
                            ['schoolyear', $schoolyear]
                        ])->update([
                            'section' => $student[1]
                        ]);
                else:
                    \DB::table('students_section')
                        ->insert([
                            'student_id' => $student_id,
                            'schoolyear' => $schoolyear,
                            'section' => $student[1]
                        ]);
                endif;
            endif;
        endforeach;
    }

    public function delete($section_id)
    {
        DB::table('sections')->where('entry_id', $section_id)->delete();

        return back();
    }

    public function store(Request $request)
    {
        DB::table('sections')->insert([
            'gradelevel' => $request->gradelevel,
            'section' => $request->section,
            'schoolyear' => $request->schoolyear
        ]);

        return back();
    }

    public function studentLists($schoolyear, $gradelevel)
    {
        $section_list = DB::table('sections')->where(["schoolyear" => $schoolyear, "gradelevel" => $gradelevel])->get();

        $students = Student::leftJoin("enrollment", "enrollment.student_id", "students.student_id")
            ->where(["schoolyear" => $schoolyear, "gradelevel" => $gradelevel])
            ->orderByDesc("gender")
            ->orderBy("lastname")
            ->get();

        return view("admin.student_sections", compact('students', 'section_list'));
    }
}

