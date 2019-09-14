<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Role;
class Permission extends Model
{
    protected $fillable = [
        'name',
        'type'
    ];

    public function belongRoles(){
        return $this -> belongsToMany(Role::class,'roles_permissions');
    }

}
