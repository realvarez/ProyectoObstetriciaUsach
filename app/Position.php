<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'resume_id',
        'name',
        'semanal_hours',
        'year',
    ];
}
