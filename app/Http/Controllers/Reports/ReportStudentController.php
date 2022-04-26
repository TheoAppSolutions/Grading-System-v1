<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Award;
use App\Models\Grade;
use App\Models\Homeroom;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Comments_Quarter as Comments;
use App\Models\Comments_Midquarter as MidComments;
use mikehaertl\wkhtmlto\Pdf as PDF;

class ReportStudentController extends Controller
{
    public function report($student_id)
    {
        $principal = Homeroom::getPrincipal();
        $semester = request("semester");
        $attendance = new Attendance();
        $attendance = $attendance->byStudentID($student_id);
        $days = SchoolYear::getSchoolDays();
        $schoolyear = getSchoolYear();
        $type = request('type');
        $quarter = request('term');
        $student = Student::byStudentID($student_id);
        $homeroom = Homeroom::byGradeLevel($student->gradelevel);
        $gradesModel = new Grade();
        $gradesModel->setTableName($student->gradelevel);

        $grades = $gradesModel->byStudentID($student_id);
        $subjects = new Subject();
        $subjects = $subjects->byGradeLevelAndSection($student->gradelevel, '', $semester);

        foreach ($subjects as $subject):
            if (!isset($subject->user_id)):
                $grades[$subject->subjectname]['remarks'] = "N / A";
            else:
                $grades[$subject->subjectname]['teacher'] = $subject->title . " " . $subject->firstname . " " . $subject->middlename . " " . $subject->lastname . " " . $subject->suffix;
            endif;
        endforeach;

        if ($quarter == 1 or $quarter == 3):
            $comments = new MidComments;
            $comments = $comments->byStudentID($student_id);
        elseif ($quarter == 2 or $quarter == 4):
            $comments = new Comments;
            $comments = $comments->byStudentID($student_id);
        endif;

        $subjects = $subjects->toArray();
        $award = Award::getAwardsForReportCard($grades, $schoolyear);

        if ($student->gradelevel == "Prep" or $student->gradelevel == "Kindy"): //Pre School
            if ($quarter == 1 or $quarter == 3):
                return view('reports.templates.pre_school.primary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            elseif ($quarter == 2 or $quarter == 4):
                return view('reports.templates.pre_school.primary_T2-T4', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            endif;
        elseif ($student->gradelevel >= 1 and $student->gradelevel <= 6): //Lower School
            if ($quarter == 1 or $quarter == 3):
                return view('reports.templates.lower_school.primary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            elseif ($quarter == 2 or $quarter == 4):
                return view('reports.templates.lower_school.primary_T2-T4', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            endif;
        elseif ($student->gradelevel >= 7 and $student->gradelevel <= 10): //Upper School
            if ($quarter == 1 or $quarter == 3):
                return view('reports.templates.upper_school.secondary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            elseif ($quarter == 2 or $quarter == 4):
                return view('reports.templates.upper_school.secondary_T2-T4', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            endif;
        elseif ($student->gradelevel >= 11 and $student->gradelevel <= 12): //Senior High School
            if ($quarter == 1 or $quarter == 3):
                return view('reports.templates.upper_school.secondary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            elseif ($quarter == 2 or $quarter == 4):
                return view('reports.templates.upper_school.secondary_T2-T4', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            endif;
        endif;

        return false;
    }

    public function by_student($type, $student_id)
    {
        $term = request("term");
        $semester = request("semester");
        $schoolyear = getSchoolYear();

        if ($type == 'midquarter'):
            $pdf = new PDF(array(
                'no-outline',
                'page-size' => 'A4', //'Letter'
                'orientation' => 'Landscape', //'Landscape'
            ));
        else:
            $pdf = new PDF(array(
                'no-outline',
                'page-size' => 'A4', //'Letter'
                'orientation' => 'Portrait', //'Landscape'
            ));
        endif;

        if ($type == 'award'):
            $student = Student::byStudentID($student_id);

            $gradesModel = new Grade;
            $gradesModel->setTableName($student->gradelevel);
            $subject = new Subject;

            $subjects = $subject->byGradeLevelAndSection($student->gradelevel);
            foreach ($subjects as $subject):
                $grade = $gradesModel->bySubjectID($subject->subject_id, $schoolyear);
                Award::getSEA($subject->subject_id, $schoolyear, $grade);
            endforeach;
        endif;

        if ($type == 'quarter'):
            $pdf->addPage(route('report.quarter', [$student_id, 'term=' . $term, 'schoolyear=' . $schoolyear, 'type=' . $type, 'semester=' . $semester]));
        elseif ($type == 'award'):
            $pdf->addPage(route('report.award', [$student_id, 'term=' . $term, 'schoolyear=' . $schoolyear, 'type=' . $type, 'semester=' . $semester]));
        elseif ($type == 'midquarter'):
            $pdf->addPage(route('report.midquarter', [$student_id, 'term=' . $term, 'schoolyear=' . $schoolyear, 'type=' . $type, 'semester=' . $semester]));
        endif;

        $pdf->send();

        return false;
    }

    public function by_gradelevel($type, $gradelevel)
    {
        $term = request("term");
        $schoolyear = getSchoolYear();

        if ($type == 'midquarter'):
            $pdf = new PDF(array(
                'no-outline',
                'page-size' => 'A4', //'Letter'
                'orientation' => 'Landscape', //'Landscape'
            ));
        else:
            $pdf = new PDF(array(
                'no-outline',
                'page-size' => 'A4', //'Letter'
                'orientation' => 'Portrait', //'Landscape'
            ));
        endif;

        $students = Student::getStudents("enrolled", $gradelevel);

        foreach ($students as $student) :
            $pdf->addPage(route('report.quarter', [$student->student_id, 'schoolyear=' . $schoolyear, 'term=' . $term, 'type=' . $type]));
        endforeach;

        $pdf->send();

        return false;
    }
}
