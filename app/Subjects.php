<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resume;
class Subject extends Model
{
    protected $fillable = [
        'resume_id',
        'name',
        'code',
        'teoric_hours',
        'practical_hours',
        'semester',
    ];

    public function is_from_academic(){
        $this->belongsTo(Resume::class);
    }
}
