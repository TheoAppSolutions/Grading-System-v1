<?php

namespace App\Models;

use Carbon\Carbon;

class Log extends Model
{
    protected $table = 'logs';
    public $timestamps = true;

    public static function createEntryLog($id, $info)
    {
        $json = getClient();

        $log = new Log;
        $log->user_id = $id;
        $log->info = $info;
        $log->description = json_encode($json);
        $log->created_at = Carbon::now()->addHour(2);
        $log->save();
    }
}
