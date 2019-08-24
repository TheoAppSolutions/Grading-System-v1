<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Grade;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Units;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class GradesController extends Controller
{
    public function index()
    {
        $subjects = Subject::getAll();
        $subjectsList = Subject::all();
        $subjectUser = DB::table('subjects_user')->where('schoolyear', getSchoolYear())->get();
        $users = User::byType('', 1);
        $units = Units::getUnits();

        $list = [];
        $user_list = [];
        foreach ($subjectsList as $subject):
            $list[$subject->gradelevel][] = $subject;
        endforeach;

        foreach ($subjectUser as $subject):
            $user_list[$subject->subject_id]["user_id"] = $subject->user_id;
            $user_list[$subject->subject_id]["user2_id"] = $subject->user2_id;
        endforeach;

        $schoolyears = SchoolYear::all()->sortBy("schoolyear");

        return view('grading.index', compact(
            'subjects', 'users', 'units', 'list', 'user_list', 'schoolyears'
        ));
    }

    public function show_grade($subject_id)
    {
        $subject = Subject::bySubjectID($subject_id);

        $schoolyear = getSchoolYear();

        try { //If Invalid Schoolyear, then error in execution, return error notice
            $subject->gradelevel;
            $this->authorize('own-subject', $subject);
        } catch (\Exception $e) {
            notify()->flash('Error!', 'warning', [
                'timer' => 3000,
                'text' => 'Invalid School Year ' . $schoolyear . ' ',
            ]);
            return back();
        }

        $gradesModel = new Grade;
        $gradesModel->setTableName($subject->gradelevel);
        $grades = $gradesModel->bySubjectID($subject_id, $schoolyear);

        $candidateForSEA = Award::getSEA($subject_id, $schoolyear, $grades);
        $students = Student::bySubjectID($subject_id);

        foreach ($students as $student) :
            $studentNames[$student->student_id]["name"] = $student->lastname . ', ' . $student->firstname;
            $studentNames[$student->student_id]["gender"] = $student->gender;
        endforeach;

        return view('grading.show', compact('grades', 'subject', 'students', 'currentQuarter', 'studentNames', 'candidateForSEA'));
    }

    public function store_grade(Request $request)
    {
        $gradeModel = new Grade;
        $subject_id = $request->subject_id;
        $grades = $request->grades;
        $quarter = $request->quarter;

        $schoolyear = getSchoolYear();
        $user = AuthUser();
        $user_id = $user->id;
        $subject = Subject::bySubjectID($subject_id);
        $gradeModel->setTableName($subject->gradelevel);

        $json = [];
        $json["schoolyear"] = $schoolyear;
        $json["quarter"] = $quarter;
        $json["subjectname"] = $subject->subjectname;
        $json["gradelevel"] = $subject->gradelevel;
        $json["created_at"] = Carbon::now()->addHour(2);
        $logCount = 1;

        foreach ($grades as $ctr => $grade):
            //Search the database for the student record
            $database = $gradeModel->where([
                ['student_id', $grades[$ctr]['student_id']],
                ['subject_id', $subject_id],
                ['schoolyear', $schoolyear],
                ['quarter', $quarter]
            ])->first();

            $new['final'] = $grades[$ctr]['final'] > 0 ? $grades[$ctr]['final'] : 0;
            $new['effort'] = $grades[$ctr]['effort'] > 0 ? $grades[$ctr]['effort'] : 0;
            $new['deportment'] = isset($grades[$ctr]['deportment']) ? $grades[$ctr]['deportment'] > 0 ? $grades[$ctr]['deportment'] : 0 : 0;
            if ($database): //If a record is found then update
                $original['final'] = $database->final;
                $original['effort'] = $database->effort;
                $original['deportment'] = $database->deportment;
                $database->final = $new['final'];
                $database->effort = $new['effort'];
                $database->deportment = $new['deportment'];

                if ($database->isDirty()):
                    $logTrue = true;
                    $json["grades"][$logCount]["name"] = getStudentFullname($grades[$ctr]['student_id']);
                    $json["grades"][$logCount]["final"] = $new["final"];
                    $json["grades"][$logCount]["effort"] = $new['effort'];
                    $json["grades"][$logCount]["deportment"] = $new['deportment'];

                    if ($original['final'] != $new['final']):
                        $gradeModel->where('entry_id', $database->entry_id)
                            ->update(['final' => $new['final']]);
                        $json["grades"][$logCount]["final"] = $original['final'] . " => " . $new["final"];
                    endif;
                    if ($original['effort'] != $new['effort']):
                        $gradeModel->where('entry_id', $database->entry_id)
                            ->update(['effort' => $new['effort']]);
                        $json["grades"][$logCount]["effort"] = $original['effort'] . " => " . $new['effort'];
                    endif;
                    if ($original['deportment'] != $new['deportment']):
                        $gradeModel->where('entry_id', $database->entry_id)
                            ->update(['deportment' => $new['deportment']]);
                        $json["grades"][$logCount]["deportment"] = $original['deportment'] . " => " . $new['deportment'];
                    endif;
                    $logCount++;
                endif;

            else: //If the record is not found then create
                if ($new['final'] > 0 or $new['effort'] > 0 or $new['deportment'] > 0):
                    $gradeModel->insert([
                        'student_id' => $grades[$ctr]['student_id'],
                        'user_id' => $user_id,
                        'subject_id' => $subject_id,
                        'quarter' => $quarter,
                        'schoolyear' => $schoolyear,
                        'final' => $new['final'],
                        'effort' => $new['effort'],
                        'deportment' => $new['deportment']
                    ]);

                    $logTrue = true;
                    $json["grades"][$logCount]["name"] = getStudentFullname($grades[$ctr]['student_id']);
                    $json["grades"][$logCount]["final"] = $new["final"];
                    $json["grades"][$logCount]["effort"] = $new['effort'];
                    $json["grades"][$logCount]["deportment"] = $new['deportment'];
                    $logCount++;
                endif;
            endif;
        endforeach;
        $send = "";
        /*if ($logTrue):
            $log = new Log();
            $log->user_id = $user_id;
            $log->info = "Grades";
            $log->description = json_encode($json);
            $log->created_at = Carbon::now()->addHour(2);
            $log->save();

            $notification = checkEmailNotifications($user_id);
            if ($notification and $user->email):
                $to = $user->email;
                $emailSubject = "Grading Update (" . $subject->subjectname . ": " . $subject->gradelevel . ")";

                Mail::send(new GradeMail($to, $emailSubject, $log->id));

                $send = " w/ Email Reports";
            endif;
        endif;*/

        session()->flash('currentQuarter', $quarter);

        notify()->flash('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Grades Submitted Successfully' . $send,
        ]);

        return back();
    }

    public function show_import()
    {
        $currentQuarter = request('currentQuarter');

        return view('modal.import', compact('currentQuarter'));
    }

    public function import(Request $request)
    {
        $currentQuarter = $request->quarter;
        $quarter = $currentQuarter != 'midterm' ? $currentQuarter : getQuarter();
        $importData = explode(',', preg_replace('/\s+/', '', $request->import));

        $ctr = 0;
        $student_id = '';
        $import = [];

        foreach ($importData as $data):
            $ctr++;
            if ($ctr == 1) : //student_id
                $student_id = $data;
            elseif ($ctr == 2) : //midquarter grade
                /*if ($data == 16.67):
                    $temp = '';
                elseif ($data >= 100.):
                    $temp = 100;
                elseif (strlen($data) == 3):
                    $temp = substr($data, 0, -1);
                else:
                    $temp = $data;
                endif;
                $import[$student_id][$quarter]['midquarter'] = $temp;*/
            elseif ($ctr == 3) : //final grade
                if ($data == 16.67):
                    $temp = '';
                elseif ($data < 70 AND $data > 0):
                    $temp = '';
                elseif ($data >= 100.):
                    $temp = 100;
                elseif (strlen($data) == 3):
                    $temp = substr($data, 0, -1);
                else:
                    $temp = $data;
                endif;
                $import[$student_id][$quarter]['final'] = $temp;
            elseif ($ctr == 4) : //effort grade
                $import[$student_id][$quarter]['effort'] = $data;
            elseif ($ctr == 5) : //deportment grade
                if ($data >= 100.):
                    $temp = 100;
                elseif (strlen($data) == 3):
                    $temp = substr($data, 0, -1);
                else:
                    $temp = $data;
                endif;
                $import[$student_id][$quarter]['deportment'] = $temp;
                $ctr = 0;
                $student_id = '';
            endif;
        endforeach;

        session()->flash('import', $import);
        session()->flash('currentQuarter', $quarter);

        notify()->flash('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Grades Successfully Imported',
        ]);

        return back();
    }
}
