<?php

namespace App\Models;

class UserSettings extends Model
{
    protected $table = 'users_settings';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
}
