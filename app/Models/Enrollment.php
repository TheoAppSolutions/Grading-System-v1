<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $primaryKey = 'entry_id';
    protected $table = "enrollment";
    public $timestamps = false;

}
