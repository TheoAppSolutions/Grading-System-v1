<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Grade;
use App\Models\Student;
use App\Models\Subject;
use App\User;
use Illuminate\Http\Request;
use mikehaertl\wkhtmlto\Pdf as PDF;

class ReportSubjectController extends Controller
{
    public function summary($subject_id)
    {
        $schoolyear = getSchoolYear();
        $gradesModel = new Grade();

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

    public function by_subject($subject_id)
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

    public function by_gradelevel($gradelevel)
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
    }}
