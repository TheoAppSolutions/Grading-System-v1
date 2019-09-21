<?php

namespace App\Http\Controllers;

use App\Models\Excluded;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Units;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\User;
use Illuminate\Support\Facades\DB;

class SubjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware("check.role:Secretary,Principal");
    }

    public function index()
    {
        $subjects = Subject::getAll();

        $subjectUser = DB::table('subjects_user')->where('schoolyear', getSchoolYear())->get();
        $users = User::byType('', 1);
        $units = Units::getUnits();

        $user_list = [];
        foreach ($subjectUser as $subject):
            $user_list[$subject->subject_id]["user_id"] = $subject->user_id;
            $user_list[$subject->subject_id]["user2_id"] = $subject->user2_id;
        endforeach;

        $schoolyears = SchoolYear::all()->sortBy("schoolyear");

        return view('subjects.index', compact(
            'subjects', 'users', 'units', 'user_list', 'schoolyears'
        ));
    }

    public function create()
    {
        $users = User::byType('', 1);

        return view('subjects.create', compact('users'));
    }

    public function store(Request $request)
    {
        if ($request->subject_id == ''):
            $request->subject_id = substr(strtoupper(cleanString($request->subjectname)), 0, 4) . substr(strtoupper($request->gradelevel), 0, 2);
        endif;

        $subject = Subject::where('subject_id', $request->subject_id)->first();

        if (isset($subject->subject_id)):
            return back()->withErrors('Subject ID already taken, Please enter subject id manually');
        endif;

        Subject::insert([
            'subject_id' => strtoupper($request->subject_id),
            'subjectname' => strtoupper($request->subjectname),
            'subjecttitle' => strtoupper($request->subjecttitle),
            'gradelevel' => $request->gradelevel
        ]);

        Units::insert([
            'subject_id' => strtoupper($request->subject_id),
            'units' => $request->units,
            'schoolyear' => getSchoolYear()
        ]);

        \DB::table('subjects_user')->insert([
            'subject_id' => strtoupper($request->subject_id),
            'user_id' => $request->teacher1,
            'user2_id' => $request->teacher2,
            'schoolyear' => getSchoolYear()
        ]);

        notify('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Subject Submitted Successfully',
        ]);

        return back();
    }

    public function show($id)
    {
        $subject = Subject::bySubjectID($id);
        $users = User::byType('', 1);
        $units = Units::getUnits();

        $students = Student::getStudents("enrolled", $subject->gradelevel);

        $excluded = Excluded::where([
            ['subject_id', $subject->subject_id],
            ['schoolyear', getSchoolYear()]
        ])->get();

        return view('subjects.show', compact('subject', 'users', 'units', 'students', 'excluded'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $schoolyear = getSchoolYear();

        Subject::where('subject_id', $id)->update([
            'subjecttitle' => ucwords($request->subjecttitle)
        ]);

        \DB::table('subjects_user')->where([
            ['subject_id', $id],
            ['schoolyear', $schoolyear]
        ])->update([
            'user_id' => $request->user_id,
            'user2_id' => $request->user2_id,
            'section' => $request->section,
            'semester' => $request->semester
        ]);

        $result = \DB::table('subjects_units')->where([
            ['subject_id', $id],
            ['schoolyear', $schoolyear]
        ])->first();

        if ($result):
            \DB::table('subjects_units')->where([
                ['subject_id', $id],
                ['schoolyear', $schoolyear]
            ])->update([
                'units' => $request->units
            ]);
        else:
            \DB::table('subjects_units')->insert([
                'subject_id' => $id,
                'schoolyear' => $schoolyear,
                'units' => $request->units
            ]);
        endif;

        return back();
    }

    public function destroy($id)
    {
        Subject::where('subject_id', $id)->delete();
        Excluded::where('subject_id', $id)->delete();
        Units::where('subject_id', $id)->delete();
        \DB::table('subjects_user')->where('subject_id', $id)->delete();

        notify('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Subject Removed Successfully',
        ]);

        return redirect('subject');
    }

    public function massUpdate(Request $request, $id)
    {
        $subjects = $request->toArray();
        $schoolyear = getSchoolYear();

        foreach ($subjects['subject'] as $subject_id => $subject):
            if (!isset($subject['section'])):
                $subject['section'] = "";
            endif;

            if (!isset($subject['semester'])):
                $subject['semester'] = "";
            endif;

            $result = \DB::table('subjects_user')->where([
                ['subject_id', $subject_id],
                ['schoolyear', $schoolyear]
            ])->first();

            if (!$result):
                \DB::table('subjects_user')->insert([
                    'subject_id' => $subject_id,
                    'schoolyear' => $schoolyear,
                    'user_id' => $subject['user_id'],
                    'user2_id' => $subject['user2_id'],
                    'section' => $subject['section'],
                    'semester' => $subject['semester']
                ]);
            else:
                \DB::table('subjects_user')->where([
                    ['subject_id', $subject_id],
                    ['schoolyear', $schoolyear]
                ])->update([
                    'user_id' => $subject['user_id'],
                    'user2_id' => $subject['user2_id'],
                    'section' => $subject['section'],
                    'semester' => $subject['semester']
                ]);
            endif;

            $result = Units::where([
                ['subject_id', $subject_id],
                ['schoolyear', $schoolyear]
            ])->first();

            if (!$result):
                Units::insert([
                    'subject_id' => $subject_id,
                    'schoolyear' => $schoolyear,
                    'units' => $subject['unit']
                ]);
            else:
                $unit = $subject['unit'] != '' ? $subject['unit'] : 0;
                Units::where([
                    ['subject_id', $subject_id],
                    ['schoolyear', $schoolyear]
                ])->update(['units' => $unit]);
            endif;

        endforeach;

        notify('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Subject Updated Successfully',
        ]);

        return back();
    }

    public function soloUpdate(Request $request, $id)
    {
        $subject_id = $id;
        $subject = [];
        $subject['user_id'] = $request->user_id;
        $subject['user2_id'] = $request->user2_id;
        $subject['section'] = $request->section;
        $subject['semester'] = $request->semester;
        $schoolyear = getSchoolYear();

        $result = \DB::table('subjects_user')->where([
            ['subject_id', $subject_id],
            ['schoolyear', $schoolyear]
        ])->first();

        if (!$result):
            \DB::table('subjects_user')->insert([
                'subject_id' => $subject_id,
                'schoolyear' => $schoolyear,
                'user_id' => $subject['user_id'],
                'user2_id' => $subject['user2_id'],
                'section' => $subject['section'],
                'semester' => $subject['semester']
            ]);
        else:
            \DB::table('subjects_user')->where([
                ['subject_id', $subject_id],
                ['schoolyear', $schoolyear]
            ])->update([
                'user_id' => $subject['user_id'],
                'user2_id' => $subject['user2_id'],
                'section' => $subject['section'],
                'semester' => $subject['semester']
            ]);
        endif;

        $result = Units::where([
            ['subject_id', $subject_id],
            ['schoolyear', $schoolyear]
        ])->first();

        if (!$result):
            Units::insert([
                'subject_id' => $subject_id,
                'schoolyear' => $schoolyear,
                'units' => $subject['unit']
            ]);
        else:
            $unit = $subject['unit'] != '' ? $subject['unit'] : 0;
            Units::where([
                ['subject_id', $subject_id],
                ['schoolyear', $schoolyear]
            ])->update(['units' => $unit]);
        endif;
    }

    public function loadData(Request $request)
    {
        $schoolyear = getSchoolYear();

        $records = DB::table('subjects_user')
            ->join('subjects_units', 'subjects_units.subject_id', 'subjects_user.subject_id')
            ->where([["subjects_user.schoolyear", $request->schoolyear], ["subjects_units.schoolyear", $request->schoolyear]])
            ->get();

        $users = User::where('active', 1)->get();
        $user_data = [];

        foreach ($users as $user):
            $user_data[$user->id] = $user->active;
        endforeach;

        foreach ($records as $subject):
            $result = DB::table('subjects_user')
                ->where([
                    ['subject_id', $subject->subject_id],
                    ['schoolyear', $schoolyear]
                ])->first();

            if (!$result):
                DB::table('subjects_user')->insert([
                    'subject_id' => $subject->subject_id,
                    'schoolyear' => $schoolyear,
                    'user_id' => isset($user_data[$subject->user_id]) ? $subject->user_id : null,
                    'user2_id' => isset($user_data[$subject->user2_id]) ? $subject->user2_id : null
                ]);
            else:
                DB::table('subjects_user')->where([
                    ['subject_id', $subject->subject_id],
                    ['schoolyear', $schoolyear]
                ])->update([
                    'user_id' => isset($user_data[$subject->user_id]) ? $subject->user_id : null,
                    'user2_id' => isset($user_data[$subject->user2_id]) ? $subject->user2_id : null
                ]);
            endif;

            $result = Units::where([
                ['subject_id', $subject->subject_id],
                ['schoolyear', $schoolyear]
            ])->first();

            if (!$result):
                Units::insert([
                    'subject_id' => $subject->subject_id,
                    'schoolyear' => $schoolyear,
                    'units' => $subject->units
                ]);
            else:
                $result->units = $subject->units;
                $result->save();
            endif;
        endforeach;
    }

    public function exclude($id)
    {
        $schoolyear = getSchoolYear();

        $subject = Subject::where('subject_id', $id)
            ->first();

        $students = Student::getStudents("enrolled", $subject->gradelevel);

        $excluded = Excluded::where([
            ['subject_id', $subject->subject_id],
            ['schoolyear', $schoolyear]
        ])->get();

        $type = "modal";

        return view('subjects._modal.exclude', compact('students', 'excluded', 'id', 'type'));
    }

    public function excludeSubject(Request $request, $subject_id)
    {
        $schoolyear = getSchoolYear();
        $exclude_list = array_unique($request->exclude_list);

        $excluded = Excluded::where([
            ['subject_id', $subject_id],
            ['schoolyear', $schoolyear]
        ])->get(['student_id']);

        if ($excluded):
            $data = [];

            foreach ($excluded as $item):
                array_push($data, $item->student_id);
            endforeach;

            $exclude_list = array_filter($exclude_list);

            foreach ($exclude_list as $student_id):
                if (!in_array($student_id, $data)): //Checks if exclude list is not in the database
                    Excluded::insert([
                        "student_id" => $student_id,
                        "subject_id" => $subject_id,
                        "schoolyear" => $schoolyear
                    ]);
                endif;
            endforeach;

            $data = array_diff($data, $exclude_list);

            if (count($data) > 0):
                foreach ($data as $student_id):
                    Excluded::where([
                        ['subject_id', $subject_id],
                        ['student_id', $student_id],
                        ['schoolyear', $schoolyear]
                    ])->delete();
                endforeach;
            endif;
        endif;
    }
}
