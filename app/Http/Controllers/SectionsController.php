<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class SectionsController extends Controller
{
    public function update(Request $request)
    {
        foreach ($request->sections as $sections):
            $student = explode(',', $sections);

            if ($student[1]):
                $student_id = str_replace("section[", '', $student[0]);
                $student_id = str_replace("]", '', $student_id);

                Student::where('student_id', $student_id)->update([
                    'section' => $student[1]
                ]);
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
}
