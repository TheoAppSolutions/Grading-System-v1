<?php

use App\Models\Homeroom;
use App\Models\SchoolYear;
use App\Models\Student;
use App\Models\Subject;
use App\User;
use Illuminate\Support\Facades\Auth;

function system_logo()
{
    $image = "images/logo.png";
    return url($image . '?' . time());
}

function profile_image($id = '')
{
    if ($id == ""):
        $id = Auth::id();
    endif;

    $imageID = "images/profile/" . $id . ".jpg";
    if (!file_exists($imageID)) :
        $imageID = "images/logo.png";
    endif;

    return url($imageID . '?' . time());
}

function student_image($id = '')
{
    $imageID = "images/students/" . $id . ".jpg";
    if (!file_exists($imageID)) :
        $imageID = "images/logo.png";
    endif;

    return url($imageID . '?' . time());
}

function getStudentFullname($student_id)
{
    $student = Student::find($student_id);
    $student = $student->firstname . ' ' . $student->lastname;

    return $student;
}

function AuthUser($id = "")
{
    if ($id) :
        $users = User::byId($id);
    else :
        $users = User::byId(Auth::user()->id);
    endif;

    return $users;
}

function getHomeroom($id)
{
    if (!session()->has('homeroom')):
        $homeroom = Homeroom::byUserID($id, getSchoolYear());

        if (count($homeroom) >= 1) :
            session()->put('homeroom', $homeroom);
        else:
            session()->put('homeroom', false);
        endif;
    endif;

    return session('homeroom');
}

function getSubjects($id)
{
    $subjects = Subject::byUserId($id, getSchoolYear());
    $subjects['has_subject'] = false;

    if (isset($subjects['subjects'])):
        $subjects['has_subject'] = true;
    endif;

    return $subjects;
}

function getSchoolYears()
{
    $schoolyears = SchoolYear::all();
    return $schoolyears;
}

function getSchoolYear($schoolyear = "")
{
    if (request('schoolyear')):
        $schoolyear = request('schoolyear');
    else:
        $schoolyear = SchoolYear::where('active', 1)->first()->schoolyear;
    endif;

    return $schoolyear;
}

function getStartMonth()
{
    $schoolyear_start = SchoolYear::where("active", 1)
        ->select('schoolyear_start')
        ->first();

    return $schoolyear_start->schoolyear_start;
}

function getQuarter()
{
    if (!session()->has('quarter')):
        $month = date('m', strtotime(now()));

        switch ($month):
            case '1' :
                $quarter = 1;
                break;
            case '2' :
                $quarter = 1;
                break;
            case '3' :
                $quarter = 1;
                break;
            case '4' :
                $quarter = 2;
                break;
            case '5' :
                $quarter = 2;
                break;
            case '6' :
                $quarter = 2;
                break;
            case '7' :
                $quarter = 3;
                break;
            case '8' :
                $quarter = 3;
                break;
            case '9' :
                $quarter = 3;
                break;
            case '10' :
                $quarter = 4;
                break;
            case '11' :
                $quarter = 4;
                break;
            case '12' :
                $quarter = 4;
                break;
        endswitch;
        session()->put('quarter', $quarter);
    endif;

    return session('quarter');
}

function getDefaultPword()
{
    return \DB::table('settings')->where('field_name', 'default_password')->first()->field_value;
}

function getSettings($field_name)
{
    return \DB::table('settings')->where('field_name', $field_name)->first()->field_value;
}

function getClient()
{
    $agent = new Jenssegers\Agent\Agent();

    $platform = [];

    $platform['browser'] = $agent->browser();
    $platform['browserVersion'] = $agent->version($platform['browser']);

    $platform['os'] = $agent->platform();
    $platform['osVersion'] = $agent->version($platform['os']);

    $platform['ipAddress'] = \Request::ip();

    return $platform;
}

function checkMark()
{
    return "<img src='" . url('checkmark.png') . "' style='height:20px;width:20px;'/>";
}

function getLastStudentID()
{
    $id = DB::table('students')->orderBy('student_id', 'desc')->first();

    if (!$id):
        $id = 1;
    else:
        $id = $id->student_id;
    endif;

    return $id;
}

function cleanString($string)
{
    return preg_replace('/[^A-Za-z0-9\-]/', '', $string);
}

function removeWhiteSpaces($string)
{
    return trim(preg_replace('/\s+/', ' ', $string));
}

function consoleLog($data)
{
    echo "<script>console.log('{$data}');</script>";
}

function ordinal($number)
{
    $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');

    if ((($number % 100) >= 11) and (($number % 100) <= 12)) {
        return $number . 'th';
    } else {
        return $number . $ends[$number % 10];
    }
}

function sendEmail($to, $subject)
{
    Mail::send(new \App\Mail\GradeMail($to, $subject));
    return "Success";
}

function checkEmailNotifications($user_id)
{
    $user = \App\User::byId($user_id);
    return $user->email_grades;
}

function getRoles($user_id)
{
    $roles = DB::table('users_roles')->where('user_id', $user_id)
        ->leftJoin('roles', 'roles.role_id', 'users_roles.role_id')
        ->get();

    return $roles;
}

function getProjectStatus()
{
    $shell = shell_exec("git status");

    if (strpos($shell, 'up to date') == true or strpos($shell, 'up-to-date') == true) :
        $project_status = 'System is up to date';
    else:
        $project_status = 'System is outdated';
    endif;

    return $project_status;
}

function checkAdmin($user_id)
{
    if (!session()->has('checkadmin')):
        $roles = DB::table('users_roles')
            ->where([
                ['user_id', $user_id],
                ['roles.role_description', "Admin"]
            ])
            ->leftJoin('roles', 'roles.role_id', 'users_roles.role_id')
            ->first();

        if ($roles):
            session()->put('checkadmin', true);
        else:
            session()->put('checkadmin', false);
        endif;
    endif;

    return session('checkadmin');
}

function schema($value = "")
{
    if (!session()->has('schema')):
        $schema = "schema/" . env("SCHEMA_NAME") . ".json";
        $schema = json_decode(file_get_contents($schema));
        session()->put('schema', $schema);
    endif;

    $schema = session('schema');

    /*$schema = "schema/" . env("SCHEMA_NAME") . ".json";
    $schema = json_decode(file_get_contents($schema));*/

    if ($value != ""):
        $value = str_replace('_', '.', $value);
        $schema = $schema->{$value};
    endif;

    return $schema;
}

function features($value = "")
{
    /*if (!session()->has('schema')):
        $schema = "schema/" . env("SCHEMA_NAME") . ".json";
        $schema = json_decode(file_get_contents($schema));
        session()->put('schema', $schema);
    endif;

    $schema = session('schema');*/

    $schema = "schema/features.json";
    $schema = json_decode(file_get_contents($schema));

    if ($value != ""):
        $value = str_replace('_', '.', $value);
        $schema = $schema->{$value};
    endif;

    return $schema;
}

function getNextGradeLevel($gradelevel_source = "")
{
    $next = 0;
    $array = schema("gradelevel.category");
    foreach ($array as $gradelevel_category => $sub_category):
        foreach ($sub_category as $category => $gradelevel):
            $gradelevels[] = $gradelevel;
        endforeach;
    endforeach;

    if ($gradelevel_source):
        foreach ($gradelevels as $gradelevel):
            if ($next == 1):
                return $gradelevel;
                break;
            endif;
            if ($gradelevel_source == $gradelevel):
                $next = 1;
            endif;
            if ($gradelevel == array_key_last($gradelevels)):
                return "";
            endif;
        endforeach;
    else:
        $array = [];
        foreach ($gradelevels as $gradelevel):
            $array[$gradelevel] = getNextGradeLevel($gradelevel);
        endforeach;
        return $array;
    endif;
    return array_key_first($gradelevels);
}

function settings($field_name)
{
    if (!session()->has($field_name)):
        $setting = DB::table('settings')->where('field_name', $field_name)->first()->field_value;
        session()->put($field_name, $setting);
    endif;
    return session($field_name);
}

function returnforCard($row)
{
    $return = '';
    switch ($row):
        case 0:
            $return = '<td class=blank></td>
                <td colspan=2 class=blank>A-</td>
                <td colspan=5 class=blank>96 - 95</td>
                <td colspan=2 class=blank>C-</td>
                <td colspan=6 class=blank>82 - 80</td>';
            break;

        case 1:
            $return = '<td class=blank></td>
                <td colspan=2 class=blank>B+</td>
                <td colspan=5 class=blank>94 - 93</td>
                <td colspan=2 class=blank>D</td>
                <td colspan=6 class=blank>79 - 76</td>';
            break;

        case 2:
            $return = '<td class=blank></td>
                <td colspan=2 class=blank>B-</td>
                <td colspan=5 class=blank>90 - 89</td>
                <td colspan=2 class=blank>D-</td>
                <td colspan=6 class=blank>75</td>';
            break;
        case 3:
            $return = '<td class=blank></td>
                <td colspan=2 class=blank>B</td>
                <td colspan=5 class=blank>92 - 91</td>
                <td colspan=2 class=blank>F</td>
                <td colspan=6 class=blank>74 - below</td>';
            break;
        case 4:
            $return = '<td class=blank></td>';
            break;
        case 5:
            $return = '<td class=blank></td>
                <td colspan=14 class=centerlabels>EFFORT GRADE</td>';
            break;
        case 6:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>5 - Exerting maximum effort</td>';
            break;
        case 7:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>4 - Exerting above satisfactory effort</td>';
            break;
        case 8:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>3 - Exerting satisfactory effort</td>';
            break;
        case 9:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>2 - Exerting below satisfactory effort</td>';
            break;
        case 10:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>1 - Exerting minimum effort</td>';
            break;
    endswitch;
    return $return;
}

function notify($message, $type, $option = [])
{
    session()->flash("notify", "true");

    session()->flash("notify.message", $message);
    session()->flash("notify.type", $type);

    foreach ($option as $key => $value):
        session()->flash("notify.option." . $key, $value);
    endforeach;
}

function average($value1, $value2)
{
    return ($value1 + $value2) / 2;
}

function letterGrade($grade)
{
    switch ($grade):
        case $grade >= 97 and $grade <= 100:
            $grade = ["letter" => "A+", "gpa" => 4];
            break;
        case $grade >= 93 and $grade <= 96.99:
            $grade = ["letter" => "A", "gpa" => 4];
            break;
        case $grade >= 90 and $grade <= 92.99:
            $grade = ["letter" => "A-", "gpa" => 3.7];
            break;
        case $grade >= 87 and $grade <= 89.99:
            $grade = ["letter" => "B+", "gpa" => 3.4];
            break;
        case $grade >= 83 and $grade <= 86.99:
            $grade = ["letter" => "B", "gpa" => 3.1];
            break;
        case $grade >= 80 and $grade <= 82.99:
            $grade = ["letter" => "B-", "gpa" => 2.8];
            break;
        case $grade >= 77 and $grade <= 79.99:
            $grade = ["letter" => "C+", "gpa" => 2.5];
            break;
        case $grade >= 73 and $grade <= 76.99:
            $grade = ["letter" => "C", "gpa" => 2.2];
            break;
        case $grade >= 70 and $grade <= 72.99:
            $grade = ["letter" => "C-", "gpa" => 1.9];
            break;
        case $grade >= 69 and $grade <= 69.99:
            $grade = ["letter" => "D+", "gpa" => 1.6];
            break;
        case $grade >= 63 and $grade <= 66.99:
            $grade = ["letter" => "D", "gpa" => 1.3];
            break;
        case $grade >= 60 and $grade <= 62.99:
            $grade = ["letter" => "D-", "gpa" => 1];
            break;
        case $grade < 60:
            $grade = ["letter" => "F", "gpa" => 0];
            break;
    endswitch;

    return $grade;
}
