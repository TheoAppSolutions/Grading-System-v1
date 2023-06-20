<?php

namespace App\Http\Controllers;

use App\Models\UserSettings;
use App\User;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.role:Admin')->only('index', 'create', 'store', 'edit', 'destroy', 'status', 'logs_clear', 'roles');
    }

    public function index()
    {
        $users["Active"] = User::byType("");
        $users["Inactive"] = User::byType("", 0);
        $roles = User::getAllRoles();

        return view('users.index', compact('users', 'roles'));
    }

    public function create($id = '')
    {
        return view('users.create', compact('id'));
    }

    public function store(Request $request)
    {
        $validate = $this->validateUser('store');

        $user = new User;
        $user->firstname = strtoupper($validate['firstname']);
        $user->lastname = strtoupper($validate['lastname']);
        $user->middlename = strtoupper($validate['middlename']);
        $user->suffix = strtoupper($validate['suffix']);
        $user->title = $validate['title'];
        $user->password = bcrypt(getDefaultPword());
        $user->save();

        $userinfo = new UserInfo;
        $userinfo->insert([
            'user_id' => $user->id,
            'birthdate' => $validate['birthdate'],
            'contact' => $validate['contact'],
            'address' => $validate['address'],
            'email' => $validate['email']
        ]);

        notify('Success!', 'success', [
            'timer' => 3000,
            'text' => 'User Submitted Successfully',
        ]);

        return back();
    }

    public function edit($id)
    {

    }

    public function show($id)
    {
        $checker = User::where('id', $id)->first();
        if (!$checker):
            notify('Error!', 'error', [
                'timer' => 3000,
                'text' => 'No Record Found!',
            ]);

            return back();
        endif;

        $Auth_id = Auth::id();
        $admin = User::getRoles($Auth_id);
        $access = false;
        $teacher = false;
        $office = false;

        foreach ($admin as $item):
            if ($item->role_description == "Admin"):
                $access = true;
            endif;
        endforeach;

        if (!$access):
            if ($id != $Auth_id):
                notify('Error!', 'error', [
                    'timer' => 3000,
                    'text' => 'Unauthorized action.',
                ]);

                return back();
            endif;
        endif;

        $user = User::byId($id);

        /*$logs = Log::where('user_id', $id)->orderBy('created_at', 'DESC')->limit(50)->get();
        $files = Files::where('user_id', $id)->orderBy('uploaded_at')->get();*/

        return view('users.show', compact('user', 'teacher', 'office'));
    }

    public function update(Request $request, $id)
    {
        $validate = $this->validateUser('update', $id);

        User::where('id', $id)->update([
            'firstname' => strtoupper($validate['firstname']),
            'lastname' => strtoupper($validate['lastname']),
            'middlename' => strtoupper($validate['middlename']),
            'suffix' => strtoupper($validate['suffix']),
            'title' => $validate['title']
        ]);

        UserInfo::where('user_id', $id)->update([
            'birthdate' => $validate['birthdate'],
            'contact' => $validate['contact'],
            'address' => $validate['address'],
            'email' => $validate['email']
        ]);

        if ($request->removeAvatar == 'true'):
            Storage::delete('/images/profile/' . $id . '.jpg');
        endif;

        if ($request->hasFile('avatar')) :
            $this->image_resize($request->file('avatar'), $id, 'profile');
        endif;

        if ($request->removeSignature == 'true'):
            Storage::delete('/images/signatures/' . $id . '.png');
        endif;

        if ($request->hasFile('signature')) :
            $this->image_resize($request->file('signature'), $id, 'signatures');
        endif;

        notify('Success!', 'success', [
            'timer' => 3000,
            'text' => 'Updated Successfully',
        ]);

        return back();
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $profileimage = "images/profile/" . $id . ".jpg";
        if (file_exists($profileimage)) {
            unlink($profileimage);
        }
        DB::table('users')->where('id', $id)->delete();
        DB::table('users_info')->where('user_id', $id)->delete();
        DB::table('users_roles')->where('user_id', $id)->delete();
        DB::table('subjects_user')->where('user_id', $id)->update([
            'user_id' => null,
            'user2_id' => null
        ]);
    }

    /******************************************************************************************************************/

    public function activate(Request $request)
    {
        $user = User::find($request->id);
        $user->active = $user->active == 1 ? 0 : 1;
        $user->save();

        if ($user->active == 0):
            DB::table('users_roles')->where('user_id', $user->id)->update(['user_id' => 0]);
        endif;
    }

    public function roles()
    {
        $arrays = DB::table('users_roles')
            ->leftJoin('roles', 'roles.role_id', 'users_roles.role_id')
            ->get();

        $roles = [];

        foreach ($arrays as $role):
            $roles[$role->role_description] = $role->user_id;
        endforeach;

        $users = User::byType('', 1);

        return view("admin.roles", compact('roles', 'users'));
    }

    public function settings($id)
    {
        $settings = UserSettings::where('user_id', $id)->first();

        if ($settings):
            $settings = json_decode($settings->settings, true);
        else:
            $settings = ["email_notification" => 1, "auto_logout" => 1];
        endif;

        return view("users.settings", compact('settings'));
    }

    protected function validateUser($type, $id = "")
    {
        switch ($type):
            case 'store':
                return request()->validate([
                    'firstname' => ['required', 'max:255'],
                    'lastname' => ['required', 'max:255'],
                    'middlename' => ['nullable', 'string', 'max:255'],
                    'suffix' => ['nullable', 'string', 'max:255'],
                    'birthdate' => ['nullable', 'date'],
                    'title' => ['required'],
                    'email' => ['nullable', 'email', 'unique:users_info,email'],
                    'contact' => ['nullable', 'numeric'],
                    'address' => ['nullable', 'string', 'max:255']
                ]);
                break;
            case 'update':
                return request()->validate([
                    'firstname' => ['required', 'max:255'],
                    'lastname' => ['required', 'max:255'],
                    'middlename' => ['nullable', 'string', 'max:255'],
                    'suffix' => ['nullable', 'string', 'max:255'],
                    'birthdate' => ['nullable', 'date'],
                    'title' => ['required'],
                    'email' => ['nullable', 'email', 'unique:users_info,email,' . $id . ',user_id'],
                    'contact' => ['nullable', 'numeric', 'unique:users_info,contact,' . $id . ',user_id'],
                    'address' => ['nullable', 'string', 'max:255']
                ]);
                break;
        endswitch;
        return '';
    }

    protected function image_resize($file, $id, $location)
    {
        // open an image file
        $img = Image::make($file);

        // now you are able to resize the instance
        $img->resize(520, 520);

        // finally we save the image as a new file
        $fileType = $location == "profile" ? ".jpg" : ".png";
        $img->save('images/' . $location . '/' . $id . $fileType);
    }
}
