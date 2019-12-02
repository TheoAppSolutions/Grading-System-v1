<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\Excluded;
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
            notify('Error!', 'warning', [
                'timer' => 3000,
                'text' => 'Invalid School Year ' . $schoolyear . ' ',
            ]);
            return back();
        }

        $gradesModel = new Grade;
        $gradesModel->setTableName($subject->gradelevel);
        $grades = $gradesModel->bySubjectID($subject_id, $schoolyear);

        //$candidateForSEA = Award::getSEA($subject_id, $schoolyear, $grades);
        $students = Student::bySubjectID($subject_id);

        $excluded = Excluded::where([
            ['subject_id', $subject_id],
            ['schoolyear', $schoolyear]
        ])->get(['student_id']);

        $exclude_list = [];
        if ($excluded):

            foreach ($excluded as $item):
                array_push($exclude_list, $item->student_id);
            endforeach;
        endif;

        foreach ($students as $student) :
            $studentNames[$student->student_id]["name"] = $student->lastname . ', ' . $student->firstname;
            $studentNames[$student->student_id]["gender"] = $student->gender;
        endforeach;

        return view('grading.show', compact('grades', 'exclude_list', 'subject', 'students', 'studentNames', 'candidateForSEA'));
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

        notify('Success!', 'success', [
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
                if ($data == 16.67):
                    $temp = '';
                elseif ($data >= 100.):
                    $temp = 100;
                elseif (strlen($data) == 3):
                    $temp = substr($data, 0, -1);
                else:
                    $temp = $data;
                endif;
                $import[$student_id][$quarter]['midquarter'] = $temp;
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

        notify('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Grades Successfully Imported',
        ]);

        return back();
    }

    public function sea_show($subject_id)
    {
        $schoolyear = getSchoolYear();

        $subject = Subject::bySubjectID($subject_id);
        $gradesModel = new Grade;
        $gradesModel->setTableName($subject->gradelevel);
        $grades = $gradesModel->bySubjectID($subject_id, $schoolyear);
        $students = Student::bySubjectID($subject_id);
        $studentGrades = [];
        $section = $subject->section;

        foreach ($students as $student):
            if (isset($grades[$student->student_id][5]['final'])):
                $studentGrades[$student->student_id] = $grades[$student->student_id][5]['final'];
            endif;
        endforeach;
        arsort($studentGrades);

        $grades = array_slice($studentGrades, 0, 10, true);

        foreach ($students as $student):
            $studentNames[$student->student_id] = $student;
        endforeach;

        return view('grading._snippets.sea', compact('grades', 'studentNames'));
    }

    public function sea_save(Request $request, $subject_id)
    {
        $subject_id = $request->subject_id;
        $student_id = $request->student_id;
        $student_id2 = $request->student_id2;
        $schoolyear = getSchoolYear();
        $subject = Subject::bySubjectID($subject_id);

        if ($subject->subjectname == 'PE' or $subject->subject_id == 'LIVE07' or $subject->subject_id == 'LIVE08'):
            if ($student_id != ''):
                $where = [
                    ['subject_id', $subject_id],
                    ['schoolyear', $schoolyear],
                    ['gender', "M"]
                ];
                $award = Award::where($where)->first();
                $student = Student::byStudentID($student_id);

                if (!$award):
                    $award = new Award;
                    $award->student_id = $student->student_id;
                    $award->subject_id = $subject_id;
                    $award->schoolyear = $schoolyear;
                    $award->gender = $student->gender;
                    $award->section = $student->section;
                    $award->save();
                else:
                    $award->student_id = $student->student_id;
                    $award->save();
                endif;
            endif;
            if ($student_id2 != ''):
                $where = [
                    ['subject_id', $subject_id],
                    ['schoolyear', $schoolyear],
                    ['gender', "F"]
                ];
                $award2 = Award::where($where)->first();
                $student2 = Student::byStudentID($student_id2);

                if (!$award2):
                    $award2 = new Award;
                    $award2->student_id = $student2->student_id;
                    $award2->subject_id = $subject_id;
                    $award2->schoolyear = $schoolyear;
                    $award2->gender = $student2->gender;
                    $award2->section = $student2->section;
                    $award2->save();
                else:
                    $award2->student_id = $student2->student_id;
                    $award2->save();
                endif;
            endif;
        else:
            $where = [
                ['subject_id', $subject_id],
                ['schoolyear', $schoolyear]
            ];

            $award = Award::where($where)->first();
            $student = Student::byStudentID($student_id);

            if (!$award):
                $award = new Award;
                $award->student_id = $student->student_id;
                $award->subject_id = $subject_id;
                $award->schoolyear = $schoolyear;
                $award->gender = $student->gender;
                $award->section = $student->section;
                $award->save();
            else:
                $award->student_id = $student->student_id;
                $award->save();
            endif;
        endif;
    }

    public function setSEA(Request $request)
    {
        $subject_id = $request->subject_id;
        $student_id = $request->student_id;
        $schoolyear = getSchoolYear();

        $student = Student::byStudentID($student_id);
        $subject = Subject::bySubjectID($subject_id);

        $where = $subject->subjectname == 'PE' ? [
            ['subject_id', $subject_id],
            ['schoolyear', $schoolyear],
            ['gender', "M"]
        ] : [
            ['subject_id', $subject_id],
            ['schoolyear', $schoolyear]
        ];

        $award = Award::where($where)->first();

        if (!$award):
            $award = new Award;
            $award->student_id = $student->student_id;
            $award->subject_id = $subject_id;
            $award->schoolyear = $schoolyear;
            $award->gender = $student->gender;
            $award->section = $student->section;
            $award->save();
        else:
            $award->student_id = $student->student_id;
            $award->save();
        endif;

        if ($subject->subjectname == 'PE'):
            $student_id2 = $request->student_id2;
            $where = [
                ['subject_id', $subject_id],
                ['schoolyear', $schoolyear],
                ['gender', "F"]
            ];
            $award2 = Award::where($where)->first();
            $student2 = Student::byStudentID($student_id2);

            if (!$award2):
                $award2 = new Award;
                $award2->student_id = $student2->student_id;
                $award2->subject_id = $subject_id;
                $award2->schoolyear = $schoolyear;
                $award2->gender = $student2->gender;
                $award2->section = $student2->section;
                $award2->save();
            else:
                $award2->student_id = $student2->student_id;
                $award2->save();
            endif;
        endif;
    }

}
