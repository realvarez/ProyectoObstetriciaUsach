@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3><i class="fa fa-table"></i> Roles del sistema</h3>
                    Se encuentran listados los distintos roles que pueden tener los usuarios en el sistema,
                    para asignar permisos entrar a configurar.
                </div>
                <div class="col-md-2" style="display: flex; align-items: center; justify-content: center;">
                    <a href="#custom-modal" class="btn btn-primary" data-target="#newRolModal" data-toggle="modal">Crear Rol</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-xl table-hover">
                <thead>
                    <tr>
                        <th scope="col">Rol</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Numero de Usuarios</th>
                        <th scope="col">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $rol)
                        <tr>
                            <td><a style="color:black" href="">{{ucfirst($rol->role_name)}}</a></td>
                            <td>Aqui deberia ir una descripción</td>
                            <td>{{$rol->cantUsers}}</td>
                            <td>
                                <a href="/roles/{{$rol->id}}" style="color:black"><i class="fa fa-search bigfonts fa-2x" aria-hidden="true"></i></a>
                                <a href="" style="color:black"><i class="fas fa-trash-alt fa-2x"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="modal fade custom-modal" id="newRolModal" tabindex="-1" role="dialog" aria-labelledby="newRolModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel2">Crear Rol</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data">

                <div class="modal-body">            @csrf

                        <div class="form-group">
                            <label for="nameRol">Ingrese nombre de rol</label>
                            <input type="text" name="nameRol" class="form-control" id="nameRol" aria-describedby="nameRol" placeholder="Nombre de rol" >
                            <small  class="form-text text-muted ml-3">El nombre que tendrá el rol a crear</small>
                        </div>
                        <div class="form-group">
                            <label for="descriptionRol">Descripción para el rol</label>
                            <input name="descriptionRol" type="text" class="form-control" id="descriptionRol" aria-describedby="descriptionRol" placeholder="Descripción del rol" required="">
                            <small class="form-text text-muted ml-3">Pequeña descripción para el rol</small>
                        </div>

                </div>
                    @if (count($errors) > 0)
                    <div style="margin-top: 20px;" class="alert alert-danger" lang="es">
                        <strong>Ups!</strong> Ha ocurrido un error al crear el rol
                    </div>
                    @endif
                    <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal">Volver</button>
                            <button type="submit" class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>Guardar</button>
                    </div>

            </form>

    </div>
    </div>
</div>
@endsection
