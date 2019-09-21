<?php

namespace App\Http\Controllers;

use App\Mail\ResetPassword;
use App\Models\Log;
use App\Models\UserInfo;
use Carbon\Carbon;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function _token()
    {
        $input = request('token');
        $user = User::where('remember_token', $input)->first();

        if ($user):
            $default = getDefaultPword();
            $user->password = bcrypt($default);
            $user->remember_token = cleanString(bcrypt($user->id));
            $user->save();

            Log::createEntryLog($user->id, 'Reset Password');

            return $default;
        endif;

        return "failed";
    }

    public function _reset(Request $request)
    {
        $email = $request->email;
        $user = UserInfo::where('email', $email)->first();

        if ($user):
            $user = User::where('id', $user->user_id)->first();
            try {
                Mail::send(new ResetPassword($user->remember_token));

                return "success";
            } catch (\Exception $ex) {
                return 'error';
            }

        endif;

        return 'error';
    }

    public function _check(Request $request)
    {
        $result = $request->password;
        $user = AuthUser();
        if (!Hash::check($result, $user->password)):
            $data = 'failed';
        else:
            $data = 'success';
        endif;

        return $data;
    }

    public function _update(Request $request)
    {
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $user = AuthUser();

        if (!Hash::check($old_password, $user->password)):
            notify('Error!', 'error', [
                'timer' => 3000,
                'text' => 'Password does not match in the database records',
            ]);

            return back();
        elseif ($old_password == $new_password):
            notify('Error!', 'error', [
                'timer' => 3000,
                'text' => 'Current password and new password should not be the same',
            ]);

            return back();
        endif;

        User::where('id', $user->id)->update([
            "password" => bcrypt($new_password)
        ]);

        notify('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Password Updated!',
        ]);

        return back();
    }

    public function _default(Request $request)
    {
        $user = User::find($request->id);
        $user->password = bcrypt(getDefaultPword());
        $user->save();
    }
}
