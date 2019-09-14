@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3><i class="fa fa-table"></i> Usuarios en el sistema</h3>
                    Se encuentran listados los distintos roles que pueden tener los usuarios en el sistema,
                    para asignar permisos entrar a configurar.
                </div>
                <div class="col-md-2" style="display: flex; align-items: center; justify-content: center;">
                    <a href="javascript:;" class="btn btn-primary" data-target="#newUserModal" data-toggle="modal">Nuevo Usuario</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-xl table-hover">
                <thead>
                    <tr>
                        <th scope="col">Usuario</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Ultimo Ingresos</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td><a style="color:black" href="">{{ucfirst($user->name)}}</a></td>
                        <td><a style="color:black" href="/roles/{{$user->role->id}}">{{ucfirst($user->role->role_name)}}</a></td>
                        <td>
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" onclick="changeState({{$user->id}})" {{($user->status)?'checked':''}}>
                                <span class="custom-control-indicator"></span>
                            </label>
                        </td>
                        <td></td>
                        <td>
                            <a href="/users/{{$user->id}}" class="mx-3" style="color:black">
                                <i class="fa fa-search fa-2x"></i>
                            </a>
                            <a href="javascript:;" class="mx-3" style="color:black" data-target="#UpdateUserModal" data-toggle="modal" name="update_user" id="{{$user->id}}_update">
                                <i class="fas fa-user-edit fa-2x"></i>
                            </a>
                            <a href="javascript:;" class="mx-3" style="color:black" data-target="#confirmUserDelete" data-toggle="modal" name="destroy_user" id="{{$user->id}}_destroy">
                                <i class="fas fa-trash-alt fa-2x"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade custom-modal" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Crear Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="avatar_image">Imagen de nuevo usuario</label>
                        <input class="col-md-8 col-lg-8 col-xl-8" type="file" accept="image/*" capture="camera" name="avatar_image" id="avatar_image_new">
                    </div>
                    <div class="form-group">
                        <label for="name">Ingrese nombre de usuario *</label>
                        <input type="text" class="form-control" name="name" id="name_new" aria-describedby="name" placeholder="Nombre usuario" required="">
                        <small class="form-text text-muted ml-3">El nombre del usuario a crear</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Ingrese nombre de usuario *</label>
                        <input type="e-mail" name="email" class="form-control" id="email_new" aria-describedby="email" placeholder="example@usach.cl" required="">
                        <small class="form-text text-muted ml-3">Correo de acceso del nuevo usuario, Se le enviara un correo para confirmar</small>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Rol para nuevo usuario *</label>
                        <select name="role_id" id="role_id_new" class="form-control form-control-sm">
                            <option>Seleccióne un rol para el usuario nuevo</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted ml-3">Rol de nuevo usuario</small>
                    </div>
                    <small class="form-text text-muted ml-3">* Obligatorio</small>
                </div>
                <div class="modal-footer">
                    @csrf
                    <button class="btn btn-secondary" data-dismiss="modal">Volver</button>
                    <button class="btn btn-primary" type="submit"><span class="btn-label"><i class="fa fa-check"></i></span>Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade custom-modal" id="UpdateUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Modificar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="form_for_update" method="POST">
                @method('PUT')
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Ingrese nombre de usuario *</label>
                        <input type="text" class="form-control" name="name" id="name_updated" aria-describedby="name" placeholder="Nombre usuario" required="">
                        <small class="form-text text-muted ml-3">El nombre del usuario a crear</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Ingrese nombre de usuario *</label>
                        <input type="e-mail" name="email" class="form-control" id="email_updated" aria-describedby="email" placeholder="example@usach.cl" required="">
                        <small class="form-text text-muted ml-3">Correo de acceso del nuevo usuario, Se le enviara un correo para confirmar</small>
                    </div>
                    <div class="form-group">
                        <label for="role_id">Rol para nuevo usuario *</label>
                        <select name="role_id" id="role_id_updated" class="form-control form-control-sm">
                            <option>Seleccióne un rol para el usuario nuevo</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted ml-3">Rol de nuevo usuario</small>
                    </div>
                    <small class="form-text text-muted ml-3">* Obligatorio</small>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Volver</button>
                    <button class="btn btn-primary" type="submit"><span class="btn-label"><i class="fa fa-check"></i></span>Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="confirmUserDelete" tabindex="-1" role="dialog" aria-labelledby="confirmUserDelete" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Eliminar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('users.destroy',$user->id)}}" id="form_for_delete" method="POST">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <p id="delete-message"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit"><span class="btn-label"><i class="fa fa-check"></i></span>Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
