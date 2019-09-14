<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Category;
use DB;
use Auth;
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password',
        'avatar_image_path',
        'status',
        'elimination_date',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function has_role(){
        return $this -> belongsTo(Role::class, 'role_id');
    }

    public function files_uploaded(){
        return $this -> hasMany('App\File');
    }

    public function is_academic(){
        return $this -> hasOne('App\Academic');
    }

    public function favorite_categories(){
        return $this -> belongsToMany(Category::class, 'categories_users');
    }

    public function record_categories(){
        return $this -> belongsToMany(Category::class, 'user_record');
    }

    public function recorded_categories_tolist(){
        $_user_records = DB::table('user_record')
                            ->select('category_id')
                            ->where('user_id',Auth::user()->id)
                            ->orderBy('id', 'desc')
                            ->distinct()->limit(7)->get();

        $categories_recorded = array();
        foreach ($_user_records as $value) {
            array_push($categories_recorded, Category::find($value->category_id));
        }
        return $categories_recorded;
    }

    public function has_permission($permission_name){
        foreach ($this->has_role->has_permissions as $permission) {
            if($permission->name == $permission_name)
                return true;
        }
        return false;
    }

    public function has_permission_redirect($permission_name){
        foreach ($this->has_role->has_permissions as $permission) {
            if($permission->name == $permission_name)
                return true;
        }
        return \redirect('HomeController@index');
    }
}
