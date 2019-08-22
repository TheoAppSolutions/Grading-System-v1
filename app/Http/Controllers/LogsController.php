<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function logs($entry_id)
    {
        $log = Log::where('id', $entry_id)->first();
        $info = $log->info;
        $date = $log->created_at;
        $log = json_decode($log->description);

        return view('users.logs', compact('log', 'info', 'date'));
    }

    public function logs_clear($id)
    {
        $logs = new Log();
        $logs->where("user_id", $id)->delete();
    }
}
