<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Formula;
use App\Models\Award;
use App\Models\SchoolYear;
use App\User;
use DebugBar\DebugBar;
use Illuminate\Support\Facades\Input;
use mikehaertl\wkhtmlto\Pdf as PDF;
use App\Models\Subject;
use App\Models\Attendance;
use App\Models\Comments_Quarter as Comments;
use App\Models\Comments_Midquarter as MidComments;
use App\Models\Homeroom;
use App\Models\Month;
use App\Models\Student;
use App\Models\Grade;


class ReportController extends Controller
{
    /*----------------------------------------------------------*/
    public function report($student_id)
    {
        app('debugbar')->disable();

        $type = request('type');
        $quarter = request('term');
        $semester = request('semester');

        $principal = Homeroom::getPrincipal();
        $attendance = new Attendance;
        $attendance = $attendance->byStudentID($student_id);
        $days = SchoolYear::getSchoolDays();
        $schoolyear = getSchoolYear();
        $student = Student::byStudentID($student_id);
        $homeroom = Homeroom::byGradeLevel($student->gradelevel);
        $gradesModel = new Grade;
        $gradesModel->setTableName($student->gradelevel);

        $grades = $gradesModel->byStudentID($student_id,'',$schoolyear);
        $subjects = new Subject;
        $subjects = $subjects->byGradeLevelAndSection($student->gradelevel);

        foreach ($subjects as $subject):
            if (!isset($subject->user_id)):
                $grades[$subject->subjectname]['remarks'] = "N / A";
            else:
                $grades[$subject->subjectname]['teacher'] = $subject->title . " " . $subject->firstname . " " . $subject->middlename . " " . $subject->lastname . " " . $subject->suffix;
            endif;
        endforeach;

        if ($quarter == "award"):
            $comments = new Award;
            $comments = $comments->getAwardsForReportCard($student, $grades, $schoolyear);
        elseif ($quarter == 1 or $quarter == 3):
            $comments = new MidComments;
            $comments = $comments->byStudentID($student_id);
        elseif ($quarter == 2 or $quarter == 4):
            $comments = new Comments;
            $comments = $comments->byStudentID($student_id);
        endif;

        $schoolyear_start = SchoolYear::where("active", 1)->first()->schoolyear_start;

        $award = Award::getAwardsForReportCard($student, $grades, $schoolyear);

        if ($student->gradelevel == "Prep" or $student->gradelevel == "Jr. Kindy"): //Pre School
            if ($quarter == "award"):
                return view('reports.templates.pre_school.primary_T2-T4', compact('schoolyear_start', 'student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            elseif ($quarter == 1 or $quarter == 3):
                return view('reports.templates.pre_school.primary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            elseif ($quarter == 2 or $quarter == 4):
                return view('reports.templates.pre_school.primary_T2-T4', compact('schoolyear_start', 'student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            endif;
        elseif ($student->gradelevel >= 1 and $student->gradelevel <= 6): //Lower School
            if ($quarter == "award"):
                return view('reports.templates.lower_school.primary_T2-T4', compact('schoolyear_start', 'student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            elseif ($quarter == 1 or $quarter == 3):
                return view('reports.templates.lower_school.primary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            elseif ($quarter == 2 or $quarter == 4):
                return view('reports.templates.lower_school.primary_T2-T4', compact('schoolyear_start', 'student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            endif;
        elseif ($student->gradelevel >= 7 and $student->gradelevel <= 10): //Upper School
            if ($quarter == "award"):
                return view('reports.templates.upper_school.secondary_T2-T4', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            elseif ($quarter == 1 or $quarter == 3):
                return view('reports.templates.upper_school.secondary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            elseif ($quarter == 2 or $quarter == 4):
                return view('reports.templates.upper_school.secondary_T2-T4', compact('student', 'grades', 'schoolyear', 'attendance', 'term', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type'));
            endif;
        endif;

        return false;
    }

    public function report_by_student($type, $student_id)
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
        $semester = request('semester');

        if ($type == 'award'):
            $student = Student::byStudentID($student_id);

            $gradesModel = new Grade;
            $gradesModel->setTableName($student->gradelevel);
            $subject = new Subject;
            $section = $student->section;

            $subjects = $subject->byGradeLevelAndSection($student->gradelevel, $section, $semester);
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

    public function report_by_gradelevel($type, $gradelevel)
    {
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

        $term = request("term");
        $schoolyear = getSchoolYear();
        $semester = request('semester');
        $students = Student::getStudents("enrolled", $gradelevel);

        foreach ($students as $student) :
            if ($type == 'quarter'):
                $pdf->addPage(route('report.quarter', [$student->student_id, 'term=' . $term, 'schoolyear=' . $schoolyear, 'type=' . $type, 'semester=' . $semester]));
            elseif ($type == 'award'):
                $pdf->addPage(route('report.award', [$student->student_id, 'term=' . $term, 'schoolyear=' . $schoolyear, 'type=' . $type, 'semester=' . $semester]));
            elseif ($type == 'midquarter'):
                $pdf->addPage(route('report.midquarter', [$student->student_id, 'term=' . $term, 'schoolyear=' . $schoolyear, 'type=' . $type, 'semester=' . $semester]));
            endif;
        endforeach;

        $pdf->send();

        return false;
    }

    /*----------------------------------------------------------*/
    public function summary($subject_id)
    {
        $schoolyear = getSchoolYear();
        $gradesModel = new Grade;

        $subject = Subject::bySubjectID($subject_id);
        $gradesModel->setTableName($subject->gradelevel);
        $grade = $gradesModel->bySubjectID($subject_id, $schoolyear);
        $teacher = User::find($subject->user_id);
        $students = Student::bySubjectID($subject_id);

        foreach ($students as $student) :
            $studentNames[$student->student_id]['name'] = $student->lastname . ', ' . $student->firstname;
            $studentNames[$student->student_id]['gender'] = $student->gender;
        endforeach;
        return view('reports.templates.summary.subject_summary', compact('studentNames', 'quarter', 'schoolyear', 'subject', 'grade', 'students', 'teacher'));
    }

    public function summary_by_subject($subject_id)
    {
        $pdf = new PDF(array(
            'no-outline',
            'page-size' => 'A4', //'Letter'
            'orientation' => 'Landscape', //'Landscape'
        ));

        $schoolyear = getSchoolYear();
        $subject = Subject::bySubjectID($subject_id);

        $pdf->addPage(route('report.subject', [$subject->subject_id, 'schoolyear=' . $schoolyear]));

        $pdf->send();
        return false;
    }

    public function summary_by_gradelevel($gradelevel)
    {
        $pdf = new PDF(array(
            'no-outline',
            'page-size' => 'A4', //'Letter'
            'orientation' => 'Landscape', //'Landscape'
        ));

        $subjects = new Subject;
        $subjects = $subjects->byGradeLevelAndSection($gradelevel);

        foreach ($subjects as $subject) :
            if (isset($subject->user_id)):
                $pdf->addPage(route('report.subject', [$subject->subject_id, 'schoolyear=' . request('schoolyear')]));
            endif;
        endforeach;

        $pdf->send();
        return false;
    }

    /*----------------------------------------------------------*/
    public function download_cover($category, $level = '')
    {
        $pathToFile = '';
        $name = '';

        if ($category == 'midquarter' and $level != 'senior') :
            $pathToFile = 'storage/covers/CoverMidQuarter(1-10).pdf';
            $name = 'Cover MidQuarter Lower-Upper School.pdf';
        elseif ($category == 'quarter' and $level != 'senior') :
            $pathToFile = 'storage/covers/CoverQuarter(1-10).pdf';
            $name = 'Cover Quarter Lower-Upper School.pdf';
        elseif ($category == 'midquarter' and $level == 'senior') :
            $pathToFile = 'storage/covers/CoverMidQuarter(11-12).pdf';
            $name = 'Cover MidQuarter SeniorHigh School.pdf';
        elseif ($category == 'quarter' and $level == 'senior') :
            $pathToFile = 'storage/covers/CoverQuarter(11-12).pdf';
            $name = 'Cover SeniorHigh School.pdf';
        elseif ($category == 'record') :
            $pathToFile = 'storage/RecordBook.xlsx';
            $name = 'Record Book Template 7-24-17.xlsx';
        endif;

        return response()->download($pathToFile, $name);
    }
}
