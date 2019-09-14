<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Resume;
class Hierarchy extends Model
{
    protected $fillable = ['name'];

    public function has_academics(){
        $this->hasMany(Resume::class);
    } 
    public $timestamps = false;
}
