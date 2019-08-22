<?php

namespace App\Http\Controllers;

use App\Models\UserSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class SettingsController extends Controller
{
    public function change_settings(Request $request)
    {
        switch ($request->field_name):
            case "default_password":
                if ($request->field_value):
                    DB::table('settings')->where('field_name', $request->field_name)->update(["field_value" => $request->field_value]);
                else:
                    return "empty!";
                endif;
                break;
            case "login_enabled":
            case "report_enabled":
            case "email_enabled":
            case "file_storage_enabled":
                $setting = DB::table('settings')->where('field_name', $request->field_name)->first();

                if ($setting->field_value):
                    $setting->field_value = 0;
                else:
                    $setting->field_value = 1;
                endif;

                DB::table('settings')->where('field_name', $request->field_name)->update(["field_value" => $setting->field_value]);
                break;

            case "auto_logout":
            case "email_notification":
                $setting = new UserSettings;
                $setting = $setting->where('user_id', $request->field_value)->first();
                $settings = json_decode($setting->settings, true);

                if (isset($settings[$request->field_name])):
                    $settings[$request->field_name] = $settings[$request->field_name] == 1 ? 0 : 1;
                    $setting->settings = json_encode($settings);
                else:
                    $settings[$request->field_name] = 0;
                    $setting->settings = json_encode($settings);
                endif;
                $setting->save();
                break;

            default:
                DB::table('settings')->where('field_name', $request->field_name)->update(["field_value" => $request->field_value]);
                break;
        endswitch;

        return "true";
    }

    public function refresh()
    {
        Artisan::call("debugbar:clear");
        Artisan::call("optimize:clear");

        notify()->flash('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Clear Cache Successfully',
        ]);

        return back();
    }
}
