<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

class FilesController extends Controller
{
    protected $filestorage;

    public function __construct()
    {
        $this->filestorage = \DB::table('filestorage');
    }

    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $id = AuthUser()->id;
        $hashedfilename = cleanString(bcrypt($request->filename));
        $path = public_path() . '/filestorage/' . $id ;

        if (!File::isDirectory($path)):
            File::makeDirectory($path);
        endif;

        if ($request->hasFile('fileToStore')) {
            $request->file('fileToStore')->storeAs('/filestorage/' . $id, $hashedfilename);
        }

        $this->filestorage->insert([
            'user_id' => $id,
            'filename' => $request->filename,
            'filetype' => $request->filetype,
            'hashedfilename' => $hashedfilename,
            'uploaded_at' => Carbon::now()
        ]);

        return back();
    }

    public function show($id)
    {
        $files = $this->filestorage->where('user_id', AuthUser()->id)->get();
        return view('users.filestorage', compact('files'));
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy(Request $request)
    {
        $file = $this->filestorage->where("id", $request->id)->first();
        $pathToFile = 'filestorage/' . $file->user_id . '/' . $file->hashedfilename;
        File::delete($pathToFile);
        $this->filestorage->where("id", $request->id)->delete();
    }

    public function download()
    {
        if (AuthUser()):
            $file = $this->filestorage->where('id', Input::get('file'))->first();

            if (AuthUser()->id == $file->user_id or AuthUser()->type == 'ADMIN'):
                $pathToFile = 'filestorage/' . AuthUser()->id . '/' . $file->hashedfilename;
                $name = $file->filename;
                return response()->download($pathToFile, $name);
            endif;
        endif;
        return false;
    }

    public function image_editor()
    {
        return view('forms.image_editor');
    }
}
