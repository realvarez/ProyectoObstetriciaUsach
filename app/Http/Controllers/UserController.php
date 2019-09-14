<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use Auth;
use App\Academic;
use App\Event;
use App\Resume;
use Mail;
use App\Mail\NewUsersNotification;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $data['users'] = User::all();
        $data['roles'] = Role::all();
        foreach ($data['users'] as $user)
            $user->role = Role::find($user->role_id);
        return view('admin.users.index', $data);
    }

    public function show($id)
    {
        // $user= User::find($id);
        // return $user;
    }



    public function create()
    { }

    public function store(Request $request)
    {
        $user = new User($request->all());
        $user->password = '$2y$10$6sMwLeM6t83G018kv.ftLOGI4pEso8HlAbRSj1WzTF1kcP8xTZkOm';

        if (isset($request->avatar_image)) {
            $route = 'images/avatars/';
            $path = Storage::putFileAs($route, $request->file('avatar_image'), $request->file('avatar_image')->getClientOriginalName());
        }
        $user->avatar_image_path = (isset($path)) ? $path : 'images/avatars/avatar.png';

        $user->save();
        //Mail::to($user->email)->send(new NewUsersNotification($user));
        $ifAcademic = Role::where('id',$user->role_id )->get()->values()->get(0);
        $roleName = $ifAcademic->role_name;
        if($roleName == 'Academico' ){
            $academic = new Academic($request->all());
            $aux= User::where('email',$user->email)->get()->values()->get(0);
            $newId = $aux->id;

            $academic->user_id = $newId;
            $academic->name = $user->name;
            $academic->save();

        }
        return redirect()->action('UserController@index');
    }

    public function edit($id)
    {
        dd($id);
        $user = User::find($id);
        return $user;
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->update($request->all());
        $ifAcademic = Role::where('id',$request->role_id )->get()->values()->get(0);
        $roleName = $ifAcademic->role_name;
        if($roleName == 'Academico' ){
            $academic = new Academic($request->all());
            $aux= User::where('email',$user->email)->get()->values()->get(0);
            $newId = $aux->id;

            $academic->user_id = $newId;
            $academic->name = $user->name;
            $academic->save();

        }
        return redirect()->action('UserController@index');
    }

    public function destroy($id)
    {
        $user=User::find($id);
        $ifAcademic = Role::where('id',$user->role_id )->get()->values()->get(0);
        $roleName = $ifAcademic->role_name;
        if($roleName == 'Academico' ){
            $academico=Academic::where('user_id',$user->id)->get()->values()->get(0);
            Resume::where('academic_id',$academico->id)->delete();
            Event::where('academic_id',$academico->id)->delete();
            $academicoDel=Academic::where('user_id',$user->id)->delete();
        }
        $user->delete();

        return redirect()->action('UserController@index');
    }

    public function getuser($id)
    {
        $user = User::find($id);
        unset($user->elimination_date, $user->id, $user->updated_at, $user->created_at, $user->email_verified_at);
        return $user;
    }

    public function changestate(Request $request)
    {
        if (!User::find($request->authUser)->has_permission('administrar_usuarios')) return 'error';
        $user = User::find($request->id_to_change);
        $user->status = ($user->status) ? 0 : 1;
        $user->save();
        return 'ok';
    }

    public function firstUseChangePasswordView()
    {
        return view('auth.firstUsePassword');
    }

    public function savePassword(Request $request)
    {
        if ($request->password == $request->passwordConfirmation) {
            $myUser = User::find(Auth::user()->id);
            $myUser->password = bcrypt($request->password);
            $myUser->save();
            return redirect()->action('HomeController@index');
        }
        $data['error'] = 'Las contraseñas deben coincidir';
        dump($request);
        return view('auth.firstUsePassword', $data);
    }
}
