<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Award;
use App\Models\SchoolYear;
use App\User;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Input;
use mikehaertl\wkhtmlto\Pdf as PDF;
use App\Models\Subject;
use App\Models\Attendance;
use App\Models\Comments_Quarter as Comments;
use App\Models\Comments_Midquarter as MidComments;
use App\Models\Homeroom;
use App\Models\Student;
use App\Models\Grade;
use ZipArchive;


class ReportController extends Controller
{
    /*----------------------------------------------------------*/
    public function report($student_id)
    {
        app('debugbar')->disable();
        $type = request('type');
        $quarter = request('term') ? request('term') : getQuarter();
        $semester = request('semester');

        $principal = Homeroom::getPrincipal();
        $attendance = new Attendance;
        $attendance = $attendance->byStudentID($student_id);
        $days = SchoolYear::getSchoolDays();
        $schoolyear = getSchoolYear();
        $student = Student::byStudentID($student_id);
        $section = $student->gradelevel <= 10 ? $student->section : '';
        $homeroom = Homeroom::byGradeLevel($student->gradelevel, $section);
        $homeroom_id = $homeroom['id'];
        $homeroom = $homeroom['name'];

        $gradesModel = new Grade;
        $gradesModel->setTableName($student->gradelevel);
        if ($schoolyear == '2019-2020'):
            $grades = $gradesModel->byStudentID($student_id, true, $schoolyear);
        else:
            $grades = $gradesModel->byStudentID($student_id, '', $schoolyear);
        endif;
        if ($student->gradelevel >= 1 and $student->gradelevel <= 10):
            $subjects = new Subject;
            $subjects = $subjects->byGradeLevelAndSection($student->gradelevel, $student->section, $semester);

            foreach ($subjects as $subject):
                if (!isset($subject->user_id)):
                    $grades[$subject->subjectname]['remarks'] = "N / A";
                else:
                    $grades[$subject->subjectname]['teacher'] = $subject->title . " " . $subject->firstname . " " . $subject->middlename . " " . $subject->lastname . " " . $subject->suffix;
                endif;
            endforeach;

            $subjects = $subjects->toArray();
        endif;

        if ($type == "midquarter"):
            $comments = new MidComments;
            $comments = $comments->byStudentID($student_id);
        elseif ($type == "quarter"):
            $comments = new Comments;
            $comments = $comments->byStudentID($student_id);
        endif;

        //$schoolyear_start = SchoolYear::where("active", 1)->first()->schoolyear_start;

        $award = Award::getAwardsForReportCard($grades, $schoolyear);

        if ($student->gradelevel >= 1 and $student->gradelevel <= 6): //Lower School
            if ($type == "midquarter"):
                return view('reports.templates.lower_school.primary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type', 'homeroom_id'));
            elseif ($type == "quarter"):
                if ($schoolyear == '2019-2020'):
                    return view('reports.templates.lower_school.primary_T2-T4(2020)', compact('award', 'student', 'grades', 'schoolyear', 'attendance', 'comments', 'days', 'homeroom', 'principal', 'type', 'homeroom_id'));
                elseif ($schoolyear == '2020-2021'):
                    return view('reports.templates.lower_school.primary_T2-T4(2021)', compact('student', 'grades', 'schoolyear', 'attendance', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type', 'homeroom_id'));
                else:
                    return view('reports.templates.lower_school.primary_T2-T4', compact('student', 'grades', 'schoolyear', 'attendance', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type', 'homeroom_id'));
                endif;
            endif;
        elseif ($student->gradelevel >= 7 and $student->gradelevel <= 10): //Upper School
            if ($type == "midquarter"):
                return view('reports.templates.upper_school.secondary_T1-T3', compact('student', 'grades', 'schoolyear', 'attendance', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type', 'homeroom_id'));
            elseif ($type == "quarter"):
                if ($schoolyear == '2019-2020'):
                    return view('reports.templates.upper_school.secondary_T2-T4(2020)', compact('award', 'student', 'grades', 'schoolyear', 'attendance', 'comments', 'days', 'homeroom', 'principal', 'type', 'homeroom_id'));
                else:
                    return view('reports.templates.upper_school.secondary_T2-T4', compact('student', 'grades', 'schoolyear', 'attendance', 'comments', 'homeroom', 'principal', 'quarter', 'days', 'subjects', 'award', 'type', 'homeroom_id'));
                endif;
            endif;
        elseif ($student->gradelevel >= 11 and $student->gradelevel <= 12): //Senior High
            $quarters[1] = $semester == 1 ? 1 : 3;
            $quarters[2] = $semester == 1 ? 2 : 4;

            $subjects = new Subject;
            $core = $subjects->byGradeLevelAndSection($student->gradelevel, "Core", '', $semester);
            $applied = $subjects->byGradeLevelAndSection($student->gradelevel, "Applied", "", $semester);
            $specialized = $subjects->byGradeLevelAndSection($student->gradelevel, "Specialized", $student->section, $semester);

            if ($type == "midquarter"):
                return view('reports.templates.senior_high.seniorhigh_T1-T3', compact('student', 'grades', 'quarter', 'comments', 'homeroom', 'principal', 'core', 'applied', 'specialized', 'type', 'homeroom_id'));
            elseif ($type == "quarter"):
                if ($schoolyear == '2019-2020'):
                    return view('reports.templates.senior_high.seniorhigh_T2-T4(2020)', compact('award', 'student', 'grades', 'schoolyear', 'attendance', 'comments', 'days', 'homeroom', 'principal', 'core', 'applied', 'specialized', 'semester', 'quarters', 'type', 'homeroom_id'));
                else:
                    return view('reports.templates.senior_high.seniorhigh_T2-T4', compact('award', 'student', 'grades', 'schoolyear', 'attendance', 'comments', 'days', 'homeroom', 'principal', 'core', 'applied', 'specialized', 'semester', 'quarters', 'type', 'homeroom_id'));
                endif;
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
                'margin-top' => 3,
                'margin-bottom' => 3
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
        $term = request("term");
        $schoolyear = getSchoolYear();
        $semester = request('semester');
        $students = Student::getStudents("enrolled", $gradelevel);

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
                'margin-top' => 3,
                'margin-bottom' => 3
            ));
        endif;

        foreach ($students as $student) :
            if (request("download") == "true"):
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
                        'margin-top' => 3,
                        'margin-bottom' => 3
                    ));
                endif;
            endif;

            if ($type == 'quarter'):
                $pdf->addPage(route('report.quarter', [$student->student_id, 'term=' . $term, 'schoolyear=' . $schoolyear, 'type=' . $type, 'semester=' . $semester]));
            elseif ($type == 'award'):
                $pdf->addPage(route('report.award', [$student->student_id, 'term=' . $term, 'schoolyear=' . $schoolyear, 'type=' . $type, 'semester=' . $semester]));
            elseif ($type == 'midquarter'):
                $pdf->addPage(route('report.midquarter', [$student->student_id, 'term=' . $term, 'schoolyear=' . $schoolyear, 'type=' . $type, 'semester=' . $semester]));
            endif;
            if (request("download") == "true"):
                $pdf->saveAs(public_path("/reports/" . $gradelevel . "/") . $student->lastname . ", " . $student->firstname . " " . $student->suffix . ".pdf");
            endif;
        endforeach;

        if (request("download") == "true"):
            $zip_file = public_path("reports/zip/") . ordinal($gradelevel) . " Grade " . ucwords($type) . '.zip';
            $zip = new ZipArchive();
            $zip->open($zip_file, ZipArchive::CREATE | \ZipArchive::OVERWRITE);

            $path = public_path("reports/" . $gradelevel . "/");
            $files = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path));
            foreach ($files as $name => $file) {
                // We're skipping all subfolders
                if (!$file->isDir() and $file->getFileName() != ".gitignore") {
                    $filePath = $file->getRealPath();

                    // extracting filename with substr/strlen
                    $relativePath = ordinal($gradelevel) . " Grade" . "/" . substr($filePath, strlen($path));

                    $zip->addFile($filePath, $relativePath);
                }
            }
            $zip->close();
            $file = new Filesystem();
            $file->cleanDirectory(public_path("reports/" . $gradelevel . "/"));
            return response()->download($zip_file);
        else:
            $pdf->send();
        endif;

        return back();
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
        return view('reports.templates.summary.subject_summary', compact('studentNames', 'schoolyear', 'subject', 'grade', 'students', 'teacher'));
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
