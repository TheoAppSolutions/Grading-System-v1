<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class JSONController extends Controller
{
    public function get_users()
    {
        $users = User::where(
            [
                ['lastname', '!=', 'ADMIN'],
                ['active', 1]
            ])
            ->orderBy('lastname')
            ->get();

        return $users;
    }

    public function get_subjects()
    {
        $user = request('user');

        return view('auth.subjectlist', compact('user'));
    }
}
