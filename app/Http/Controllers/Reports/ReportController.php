<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\Enrollment;
use App\Models\SchoolYear;
use App\User;
use mikehaertl\wkhtmlto\Pdf as PDF;
use App\Models\Subject;
use App\Models\Attendance;
use App\Models\Comments_Quarter as Comments;
use App\Models\Comments_Midquarter as MidComments;
use App\Models\Homeroom;
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

        $principal = Homeroom::getPrincipal();
        $attendance = new Attendance;
        $attendance = $attendance->byStudentID($student_id);
        $days = SchoolYear::getSchoolDays();
        $schoolyear = getSchoolYear();
        $student = Student::byStudentID($student_id, $schoolyear);
        $homeroom = Homeroom::byGradeLevel($student->gradelevel);

        $gradesModel = new Grade;
        $gradesModel->setTableName($student->gradelevel);
        $grades = $gradesModel->byStudentID($student_id, '', $schoolyear);

        $subjects = new Subject;
        $subjects = $subjects->byGradeLevelAndSection($student->gradelevel);

        foreach ($subjects as $subject):
            if (!isset($subject->user_id)):
                $grades[$subject->subjectname]['remarks'] = "N / A";
            else:
                $grades[$subject->subjectname]['teacher'] = $subject->title . " " . $subject->firstname . " " . $subject->middlename . " " . $subject->lastname . " " . $subject->suffix;
            endif;

            /*if ($quarter == "award"):
                Award::getSEA($subject->subject_id, $schoolyear, $grades[$subject->subjectname]);
            endif;*/
        endforeach;

        if ($quarter == "award"):
            $award = Award::getAwardsForReportCard($student, $grades, $schoolyear);
        elseif ($quarter == 1 or $quarter == 3):
            $comments = new MidComments;
            $comments = $comments->byStudentID($student_id);
        elseif ($quarter == 2 or $quarter == 4):
            $comments = new Comments;
            $comments = $comments->byStudentID($student_id);
        endif;

        $schoolyear_start = SchoolYear::where("active", 1)->first()->schoolyear_start;

        if ($student->gradelevel == "Prep" or $student->gradelevel == "Jr. Kindy"): //Pre School
            if ($quarter == "award"):
                return view('reports.templates.pre_school.primary_T2-T4', compact('schoolyear_start', 'student', 'grades', 'schoolyear', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type', 'attendance', 'days'));
            elseif ($quarter == 1 or $quarter == 3):
                return view('reports.templates.pre_school.primary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'type'));
            elseif ($quarter == 2 or $quarter == 4):
                return view('reports.templates.pre_school.primary_T2-T4', compact('schoolyear_start', 'student', 'grades', 'schoolyear', 'attendance', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'type'));
            endif;
        elseif ($student->gradelevel >= 1 and $student->gradelevel <= 6): //Lower School
            if ($quarter == "award"):
                return view('reports.templates.lower_school.primary_T2-T4', compact('schoolyear_start', 'student', 'grades', 'schoolyear', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type', 'attendance', 'days'));
            elseif ($quarter == 1 or $quarter == 3):
                return view('reports.templates.lower_school.primary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'type'));
            elseif ($quarter == 2 or $quarter == 4):
                return view('reports.templates.lower_school.primary_T2-T4', compact('schoolyear_start', 'student', 'grades', 'schoolyear', 'attendance', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'type'));
            endif;
        elseif ($student->gradelevel >= 7 and $student->gradelevel <= 10): //Upper School
            if ($quarter == "award"):
                return view('reports.templates.upper_school.secondary_T2-T4', compact('schoolyear_start', 'student', 'grades', 'schoolyear', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type', 'attendance', 'days'));
            elseif ($quarter == 1 or $quarter == 3):
                return view('reports.templates.upper_school.secondary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'type'));
            elseif ($quarter == 2 or $quarter == 4):
                return view('reports.templates.upper_school.secondary_T2-T4', compact('schoolyear_start', 'student', 'grades', 'schoolyear', 'attendance', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'type'));
            endif;
        endif;

        return false;
    }

    public function report_by_student($type, $student_id)
    {
        app('debugbar')->disable();
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
        app('debugbar')->disable();
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
        app('debugbar')->disable();
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

        return view('reports.templates.summary.subject_summary', compact('studentNames', 'schoolyear', 'subject', 'grade', 'students', 'teacher'));
    }

    public function summary_by_subject($subject_id)
    {
        app('debugbar')->disable();
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
        app('debugbar')->disable();
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

    public function summary_award($gradelevel)
    {
        app('debugbar')->disable();

        $schoolyear = getSchoolYear();

        $principal = Homeroom::getPrincipal();
        $homeroom = Homeroom::byGradeLevel($gradelevel);
        $days = SchoolYear::getSchoolDays();

        $students = Student::getStudents("enrolled", $gradelevel);

        $subjects = new Subject;
        $subjects = $subjects->byGradeLevelAndSection($gradelevel);

        foreach ($subjects as $subject):
            Award::getSEA($subject->subject_id);
        endforeach;

        $awards = Award::byGradelevel($gradelevel, $schoolyear);
        $gradesModel = new Grade;
        $gradesModel->setTableName($gradelevel);
        $attendanceModel = new Attendance;
        $attendance = [];

        foreach ($students as $student):
            $grades = $gradesModel->byStudentID($student->student_id, '', $schoolyear);
            $award[$student->student_id] = Award::getAwardsForReportCard($student, $grades);

            $awards[$student->student_id]["generalaverage"] = isset($grades["generalaverage"]) ? $grades["generalaverage"] : '';
            $awards[$student->student_id]["HIGHESTHONORS"] = isset($award[$student->student_id]["HIGHESTHONORS"]) ? true : false;
            $awards[$student->student_id]["HIGHHONORS"] = isset($award[$student->student_id]["HIGHHONORS"]) ? true : false;
            $awards[$student->student_id]["HONORS"] = isset($award[$student->student_id]["HONORS"]) ? true : false;
            $awards[$student->student_id]["DEPORTMENT"] = $award[$student->student_id]["DEPORTMENT"] ? true : false;
            $awards[$student->student_id]["DEPORTMENT_grade"] = isset($grades['deportment'][5]) ? $grades['deportment'][5] : '';
            $awards[$student->student_id]["EFFORT"] = $award[$student->student_id]["EFFORT"] ? true : false;

            $attendance[$student->student_id] = $attendanceModel->byStudentID($student->student_id)['PerfectAttendance'];
        endforeach;

        return view('reports.templates.summary.award_summary', compact('gradelevel', 'attendance', 'students', 'grades', 'schoolyear', 'homeroom', 'principal', 'days', 'awards'));
    }

    public function summary_award_by_gradelevel($gradelevel)
    {
        app('debugbar')->disable();
        $pdf = new PDF(array(
            'no-outline',
            'page-size' => 'A4', //'Letter'
            'orientation' => 'Landscape', //'Landscape'
        ));

        $pdf->addPage(route('report.award.summary.print', $gradelevel));

        $pdf->send();
        return false;
    }

    /*----------------------------------------------------------*/
    public function download_cover($category, $level = '')
    {
        app('debugbar')->disable();
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

    /*----------------------------------------------------------*/
    public function transcript($student_id)
    {
        app('debugbar')->disable();
        $student = Student::byStudentID($student_id);

        $gradelevels = Enrollment::where('student_id', $student_id)->get();
        $schoolyears = [];

        foreach ($gradelevels as $levels):
            if ($levels->gradelevel != 0):
                $subjects[$levels->gradelevel] = Subject::byLevel($levels->gradelevel);
                $gradesModel = new Grade;
                $gradesModel->setTableName($levels->gradelevel);
                $schoolyears[$levels->schoolyear] = $gradesModel->byStudentID($student_id, '', $levels->schoolyear);
            endif;
        endforeach;
        if (!isset($subjects)):
            dd("No Records available yet.");
        endif;

        return view('reports.transcript.tor', compact('student', 'schoolyears', 'subjects'));
    }

    public function generate_transcript($student_id)
    {
        app('debugbar')->disable();
        $pdf = new PDF([
            'no-outline',
            'print-media-type',
            'enable-smart-shrinking',
            'encoding' => 'UTF-8',
            'orientation' => 'Portrait',
            'page-width' => '8.5in',
            'page-height' => '11in',
            'margin-top' => '.5in',
            'margin-bottom' => '.5in',
            'margin-left' => '.5in',
            'margin-right' => '.5in',
            'footer-left' => '',
            'footer-right' => 'Page [page] of [topage]',
            'footer-font-name' => 'Arial',
            'footer-font-size' => '8',
            'title' => '',
            'ignoreWarnings' => true,
            'commandOptions' => ['useExec' => true],
        ]);

        $pdf->addPage($this->transcript($student_id));

        $pdf->send();
    }
}
