<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AnnouncementsController extends Controller
{
    public function index()
    {
        $notifications = [];
        $announcements = \DB::table('announcements')->get();
        foreach ($announcements as $key => $announcement):
            foreach ($announcement as $tag => $value):
                $notifications["announcements"][$key][$tag] = $value;
                if ($tag == "from_user_id"):
                    $user = User::where('id', $value)->first();
                    $notifications["announcements"][$key][$tag] = $user->title . ' ' . $user->firstname . ' ' . $user->lastname;
                endif;
            endforeach;
        endforeach;

        return view('announcements.index', compact('notifications'));
    }

    public function create()
    {
        return view('announcements.modals.create');
    }

    public function store(Request $request)
    {
        \DB::table('announcements')->insert([
              "title" => $request->title,
              "description" => $request->description,
              "from_user_id" => $request->id,
              "date_start" => $request->start,
              "date_end" => $request->end,
          ]);
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        \DB::table('announcements')->where('entry_id', $id)->delete();

        return back();
    }
}
