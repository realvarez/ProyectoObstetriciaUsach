<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigation extends Model
{
    protected $fillable = [
        'name',
        'resume_id',
        'founding',
        'duration',
        'adjudication_time'
    ];
    
}
