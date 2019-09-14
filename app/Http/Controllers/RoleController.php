<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Permission;
use App\Category;
class RoleController extends Controller
{
    public function __construct()
    {}


    public function index() {
        $data['roles']      = Role::all();
        foreach($data['roles'] as $rol){
            $rol->cantUsers = User::where('role_id', $rol->id)->count();
            //dd($rol->cantUsers);
        }
        return view('admin.roles.index', $data);
    }

    public function show($id) {
        $data['rol']                = Role::find($id);
        $data['permissions']        = Permission::all();
        $data['permissions_system'] = array();
        $data['permissions_resumes'] = array();
        $data['permissions_categories'] = array();

        $permissions_user = $data['rol']->has_permissions;

        foreach ($data['permissions'] as $permission){
            foreach ($permissions_user as $key => $_permission) {
                if ($permission->name == $_permission->name) {
                    $permission->has_permission = true;
                    unset($permissions_user[$key]);
                    break;
                }
            }
            switch($permission->type){
                case 1:
                    array_push($data['permissions_system'],$permission);
                    break;
                case 2:
                    array_push($data['permissions_categories'],$permission);
                    break;
                case 3:
                    array_push($data['permissions_resumes'],$permission);
                    break;
                default;
            }
        }
        return view('admin.roles.show', $data);
    }

    public function create() {

    }

    public function store(Request $request) {
        $role = new Role($request->all());
        $role->role_name = $request->nameRol;
        $role->description = $request->descriptionRol;

        $role->save();
        return redirect()->action('RoleController@index');

    }

    public function edit($id) {

    }

    public function update(Request $request, $id) {
        $rol                = Role::find($id);
        $rol_permissions    = $rol->has_permissions;
        $permissions_given  = $request->request->all();
        array_forget($permissions_given, '_token');
        array_forget($permissions_given, '_method');
        foreach ($rol_permissions as $key => $value) {
            if (!array_has($permissions_given, $value->name)){
                $rol->has_permissions()->detach($value->id);
                array_forget($permissions_given, $value->id);
            }
        }
        $permissions = Permission::all();
        foreach ($permissions_given as $key => $value) {
            $rol->has_permissions()->attach($permissions->firstWhere('name',$key)->id);
        }

        return redirect()->action('RoleController@show', ['id' => $id]);
    }

    public function destroy($id) {

    }
}
