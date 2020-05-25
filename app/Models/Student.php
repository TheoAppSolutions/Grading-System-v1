<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Student extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'student_id';
    public $timestamps = false;

    public static function byStudentID($student_id, $schoolyear="")
    {
        $where = $schoolyear != "" ? [
            ['students.student_id', $student_id],
            ['enrollment.schoolyear', $schoolyear]
        ]
            : [['students.student_id', $student_id]];

        $student = Student::join('students_info', 'students_info.student_id', 'students.student_id')
            ->join('enrollment', 'enrollment.student_id', 'students.student_id')
            ->where($where)
            ->orderBy('enrollment.schoolyear', 'DESC')
            ->first();

        $student->next_gradelevel = getNextGradeLevel($student->gradelevel);
        $student->prev = 0;
        $student->next = 0;
        $student->next_notenrolled = 0;

        $enrolled = Student::getStudents("enrolled", $student->gradelevel, true);
        $notenrolled = Student::getStudents("notenrolled", $student->gradelevel, true);
        $graduates = Student::getStudents("graduates", "all", true);

        if (array_search($student_id, $graduates) !== false):
            $index = array_search($student_id, $graduates);
            $student->prev = isset($enrolled[$index - 1]) ? $enrolled[$index - 1] : '';
            $student->next = isset($enrolled[$index + 1]) ? $enrolled[$index + 1] : '';
            $student->gradelevel = "Graduate";
        elseif (array_search($student_id, $enrolled) !== false):
            $index = array_search($student_id, $enrolled);
            $student->prev = isset($enrolled[$index - 1]) ? $enrolled[$index - 1] : '';
            $student->next = isset($enrolled[$index + 1]) ? $enrolled[$index + 1] : '';
        elseif (array_search($student_id, $notenrolled) !== false):
            $index = array_search($student_id, $notenrolled);
            $student->next_notenrolled = isset($notenrolled[$index + 1]) ? $notenrolled[$index + 1] : '';
            if ($student->next_notenrolled == ''):
                $student->next_notenrolled = isset($notenrolled[$index - 1]) ? $notenrolled[$index - 1] : '';
            endif;
        endif;

        return $student;
    }

    public static function bySubjectID($subject_id, $section = "")
    {
        $subject = Subject::bySubjectID($subject_id);
        $students = Student::getStudents("enrolled", $subject->gradelevel, false, $section);

        return $students;
    }

    public static function getStudents($status = "all", $gradelevel = "all", $toArray = false, $section = "")
    {
        $schoolyear = getSchoolYear();
        switch ($status):
            case "all":
                $graduates = Student::getStudents("graduates", "all", true);
                $students = Student::join('students_info', 'students_info.student_id', 'students.student_id')
                    ->leftJoin('enrollment', 'enrollment.student_id', 'students.student_id')
                    ->orderBy('gender', 'DESC')
                    ->orderBy('lastname', 'ASC')
                    ->orderBy('schoolyear', 'DESC')
                    ->get();

                $old_student = [];
                foreach ($students as $key => $student):
                    if (isset($old_student[$student->student_id])):
                        $students->forget($key);
                    else:
                        $old_student[$student->student_id] = $student;
                    endif;
                    if (in_array($student->student_id, $graduates)) {
                        $student->gradelevel = "Graduate";
                    }
                endforeach;
                break;

            case "enrolled":
                $graduates = Student::getStudents("graduates", "all", true);
                $inactive = Student::getStudents("inactive", "all", true);
                $array = array_merge($graduates, $inactive);

                $where = $gradelevel == "all" ? [["enrollment.schoolyear", $schoolyear], ['students.active', 1]] :
                    [
                        ["enrollment.schoolyear", $schoolyear],
                        ["enrollment.gradelevel", $gradelevel],
                        ['students.active', 1]
                    ];

                if ($section):
                    array_push($where, ['students.section', $section]);
                endif;

                $students = DB::table("enrollment")
                    ->join('students', 'students.student_id', 'enrollment.student_id')
                    ->join('students_info', 'students_info.student_id', 'students.student_id')
                    ->where($where)
                    ->whereNotIn('enrollment.student_id', $array)
                    ->orderBy('gender', 'DESC')
                    ->orderBy('lastname', 'ASC')
                    ->get();

                if ($toArray):
                    $array = [];
                    foreach ($students as $item):
                        array_push($array, $item->student_id);
                    endforeach;
                    return $array;
                else:
                    return $students;
                endif;
                break;

            case "notenrolled":
                $nextgradelevel = $gradelevel != "all" ? getNextGradeLevel($gradelevel) : $gradelevel;

                $enrolled = Student::getStudents("enrolled", $nextgradelevel, true);
                $graduates = Student::getStudents("graduates", "all", true);
                $inactive = Student::getStudents("inactive", "all", true);

                $enrolled = array_merge($enrolled, $inactive, $graduates);

                $where = $gradelevel == "all" ? [['enrollment.schoolyear', '!=', $schoolyear], ['students.active', 1]] : [
                    ['enrollment.schoolyear', '!=', $schoolyear],
                    ['enrollment.gradelevel', $gradelevel]
                ];

                if ($section):
                    array_push($where, ['students.section', $section]);
                endif;

                $students = Student::join('students_info', 'students_info.student_id', 'students.student_id')
                    ->join('enrollment', 'enrollment.student_id', 'students.student_id')
                    ->where($where)
                    ->whereNotIn('students.student_id', $enrolled)
                    ->orderBy('gender', 'DESC')
                    ->orderBy('lastname', 'ASC')
                    ->orderBy('schoolyear', 'DESC')
                    ->get();

                $old_student = [];
                foreach ($students as $key => $student):
                    if (isset($old_student[$student->student_id])):
                        $students->forget($key);
                    else:
                        $old_student[$student->student_id] = $student;
                    endif;
                endforeach;

                if ($toArray):
                    $array = [];
                    foreach ($students as $item):
                        array_push($array, $item->student_id);
                    endforeach;
                    return $array;
                else:
                    return $students;
                endif;

                break;

            case "graduates":
                $students = DB::table("graduates")
                    ->join('students', 'students.student_id', 'graduates.student_id')
                    ->join('students_info', 'students_info.student_id', 'students.student_id')
                    ->get();

                if ($toArray):
                    $array = [];
                    foreach ($students as $item):
                        array_push($array, $item->student_id);
                    endforeach;
                    return $array;
                else:
                    return $students;
                endif;
                break;

            case "inactive":
                $graduates = Student::getStudents("graduates", "all", true);

                $students = Student::join('students_info', 'students_info.student_id', 'students.student_id')
                    ->join('enrollment', 'enrollment.student_id', 'students.student_id')
                    ->where('students.active', 0)
                    ->whereNotIn('students.student_id', $graduates)
                    ->orderBy('gender', 'DESC')
                    ->orderBy('lastname', 'ASC')
                    ->orderBy('schoolyear', 'DESC')
                    ->get();

                $old_student = [];
                foreach ($students as $key => $student):
                    if (isset($old_student[$student->student_id])):
                        $students->forget($key);
                    else:
                        $old_student[$student->student_id] = $student;
                    endif;
                endforeach;

                if ($toArray):
                    $array = [];
                    foreach ($students as $item):
                        array_push($array, $item->student_id);
                    endforeach;
                    return $array;
                else:
                    return $students;
                endif;
                break;
        endswitch;

        return $students;
    }
}
