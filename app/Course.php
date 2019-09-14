<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resume;

class Course extends Model
{
    protected $fillable = [
        'resume_id',
        'name',
        'start_year'
    ];

    public function is_from_resume(){
        $this->belongsTo(Resume::class);
    }
}
