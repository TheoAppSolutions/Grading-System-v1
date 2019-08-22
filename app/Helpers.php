<?php
//composer dump-autoload

use App\Models\SchoolYear;

function system_image()
{
    $image = "images/logo.png";
    return url($image . '?' . time());
}

function profile_image($id = '')
{
    if ($id == ""):
        $id = \Illuminate\Support\Facades\Auth::id();
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
    $student = \App\Models\Student::find($student_id);
    $student = $student->firstname . ' ' . $student->lastname;

    return $student;
}

function AuthUser($id = "")
{
    if ($id) :
        $users = \App\User::byId($id);
    else :
        $users = \App\User::byId(Auth::user()->id);
    endif;

    return $users;
}

function getHomeroom($id)
{
    $homeroom = \App\Models\Homeroom::byUserID($id, getSchoolYearNow());

    if (count($homeroom) >= 1) :
        return $homeroom;
    endif;

    return false;
}

function getSubjects($id)
{
    $subjects = \App\Models\Subject::byUserId($id, getSchoolYearNow());

    if (count($subjects)):
        $subjects['has'] = true;
        return $subjects;
    endif;

    $subjects['has'] = false;
    return $subjects;
}

function getSchoolYears()
{
    $schoolyears = SchoolYear::all();
    return $schoolyears;
}

function getSchoolYear($schoolyear = "")
{
    if ($schoolyear != ""):
        $schoolyear = SchoolYear::where("schoolyear", $schoolyear)->first();
        if ($schoolyear):
            return true;
        else:
            return false;
        endif;
    endif;
    return SchoolYear::getSchoolYear();
}

function getStartMonth(){
    $schoolyear_start = SchoolYear::where("active", 1)->first();
    return $schoolyear_start->schoolyear_start;
}

function getSchoolYearNow()
{
    return SchoolYear::getSchoolYearNow();
}

function getQuarter()
{
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

    return $quarter;
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

function returnForReportCard($row)
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
            $return = '<td class=blank></td>
                <td colspan=14 class=centerlabels>EFFORT GRADE</td>';
            break;
        case 5:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>5 - Exerting maximum effort</td>';
            break;
        case 6:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>4 - Exerting above satisfactory effort</td>';
            break;
        case 7:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>3 - Exerting satisfactory effort</td>';
            break;
        case 8:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>2 - Exerting below satisfactory effort</td>';
            break;
        case 9:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>1 - Exerting minimum effort</td>';
            break;
    endswitch;

    return $return;
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
    if ((($number % 100) >= 11) && (($number % 100) <= 13)) {
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
    $roles = DB::table('users_roles')
        ->where([
            ['user_id', $user_id],
            ['roles.role_description', "Admin"]
        ])
        ->leftJoin('roles', 'roles.role_id', 'users_roles.role_id')
        ->first();

    if ($roles):
        return true;
    endif;
    return false;
}

function schema()
{
    $schema = json_decode(file_get_contents("schema/layout.json"));
    return $schema;
}

function getNextGradeLevel($gradelevel_source = "")
{
    $next = 0;
    $array = schema()->gradelevel_category;
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

function settings($field_name){
    $settings = DB::table('settings')->where('field_name', $field_name)->first();
    return $settings->field_value;
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
            $return = '<td class=blank></td>
                <td colspan=14 class=centerlabels>EFFORT GRADE</td>';
            break;
        case 5:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>5 - Exerting maximum effort</td>';
            break;
        case 6:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>4 - Exerting above satisfactory effort</td>';
            break;
        case 7:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>3 - Exerting satisfactory effort</td>';
            break;
        case 8:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>2 - Exerting below satisfactory effort</td>';
            break;
        case 9:
            $return = '<td class=blank></td>
                <td colspan=14 class=blank>1 - Exerting minimum effort</td>';
            break;
    endswitch;
    return $return;
}