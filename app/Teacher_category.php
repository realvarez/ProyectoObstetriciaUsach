<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resume;
class Teacher_category extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;
    
    public function has_academics(){
        $this->hasMany(Resume::class);
    }
    
}
