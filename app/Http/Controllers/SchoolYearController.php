<?php

namespace App\Http\Controllers;

use App\Models\Month;
use App\Models\SchoolYear;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SchoolYearController extends Controller
{
    public function index()
    {
        $schoolyears = SchoolYear::all()->sortBy("schoolyear");

        return view('schoolyear.index', compact('schoolyears'));
    }

    public function show($schoolyear)
    {
        $schoolyear = SchoolYear::where('schoolyear', $schoolyear)->first();

        if (!$schoolyear):
            return redirect()->route('schoolyear.index');
        endif;

        return view('schoolyear.show', compact('schoolyear'));
    }

    public function update(Request $request)
    {
        DB::table("schoolyear")->where("schoolyear", $request->schoolyear)
            ->update([
                "schoolyear_start" => $request->schoolyear_start,
                "schoolyear_end" => $request->schoolyear_end,
                "days_settings" => $request->days_settings,
                "card_template" => $request->card_template
            ]);

        notify()->flash('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Updated Successfully',
        ]);

        return back();
    }

    public function action(Request $request, $method)
    {
        $result = "";

        switch ($method):
            case 'create':
                $result = $this->_create($request);
                break;

            case 'check':
                $result = $this->_check($request);
                break;

            case 'month':
                $result = $this->_month($request);
                break;

            case 'activate':
                $this->_activate($request);
                break;

            case 'delete':
                $this->_delete($request);
                break;
        endswitch;

        return $result;
    }

    protected function _create($request)
    {
        $schoolyear = new SchoolYear;
        $schoolyear->active = 0;
        $schoolyear->schoolyear = $request->schoolyear;
        $schoolyear->schoolyear_start = 1;
        $schoolyear->schoolyear_end = 12;
        $schoolyear->save();
    }

    protected function _check($request)
    {
        $schoolyear = SchoolYear::where("schoolyear", $request->schoolyear)->first();
        if ($schoolyear):
            return "true";
        else:
            return "false";
        endif;
    }

    protected function _delete($request)
    {
        SchoolYear::where('schoolyear', $request->schoolyear)->delete();
    }

    protected function _activate(Request $request)
    {
        SchoolYear::where('active', 1)->update(['active' => 0]);
        SchoolYear::where('schoolyear', $request->schoolyear)->update(['active' => 1]);
    }

    protected function _month($request)
    {
        $schoolyear = $request->schoolyear;
        $month_start = $request->month;

        \DB::table('schoolyear')->where("schoolyear", $schoolyear)->update([
            'schoolyear_start' => $month_start
        ]);
    }

    public function _months()
    {
        $schoolyears = SchoolYear::all();
        $terms = Month::getMonths();
        $users = User::byType('', 1);

        return view('office.schooldays', compact('terms', 'schoolyears', 'users'));
    }

    public function months_patch(Request $request)
    {
        $schoolyear = getSchoolYear();
        $array = [];

        foreach ($request->Term as $term):
            if ($term):
                array_push($array, $term);
            else:
                array_push($array, 0);
            endif;
        endforeach;

        SchoolYear::where("active", 1)->update(["school_days" => json_encode($array)]);

        /*$database = Month::where([
            ['schoolyear', $schoolyear]
        ])->first();*/

        /*if ($database):
            Month::where('schoolyear', $schoolyear)->update([
                'term1' => $request->Term[1] != '' ? $request->Term[1] : 0,
                'term2' => $request->Term[2] != '' ? $request->Term[2] : 0,
                'term3' => $request->Term[3] != '' ? $request->Term[3] : 0,
                'term4' => $request->Term[4] != '' ? $request->Term[4] : 0
            ]);
        else:
            Month::insert([
                'schoolyear' => $schoolyear,
                'term1' => $request->Term[1] != '' ? $request->Term[1] : 0,
                'term2' => $request->Term[2] != '' ? $request->Term[2] : 0,
                'term3' => $request->Term[3] != '' ? $request->Term[3] : 0,
                'term4' => $request->Term[4] != '' ? $request->Term[4] : 0

            ]);
        endif;*/

        notify()->flash('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Months Updated Successfully',
        ]);

        return back();
    }
}
