@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <div class="row">
                <div class="col-md-10">
                    <h3><i class="fa fa-table"></i> Académicos del sistema</h3>
                    Se encuentran listados los académicos con sus currículums y hojas de vida.
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-responsive-xl table-hover">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Currículum</th>
                        <th scope="col">Hoja de vida</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($academicos as $academic)
                        <tr>
                            <td><a style="color:black" href="">{{ucfirst($academic->name)}}</a></td>
                            <td>
                                <a href="/resumes/{{($academic->id)}}" style="color:black"><i class="fa fa-edit bigfonts fa-2x" aria-hidden="true"></i></a>
                            </td>
                            <td>
                                    <a href="/events/{{($academic->id)}}" style="color:black"><i class="fa fa-edit bigfonts fa-2x" aria-hidden="true"></i></a>
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
        <div class="modal-body">
            <form action="">
                <div class="form-group">
                    <label for="nameRol">Ingrese nombre de rol</label>
                    <input type="text" class="form-control" id="nameRol" aria-describedby="nameRol" placeholder="Nombre de rol" required="">
                    <small id="nameRol" class="form-text text-muted ml-3">El nombre que tendrá el rol a crear</small>
                </div>

                <div class="form-group">
                    <label for="nameRol">Descripción para el rol</label>
                    <input type="text" class="form-control" id="descriptionRol" aria-describedby="descriptionRol" placeholder="Descripción del rol" required="">
                    <small id="descriptionRol" class="form-text text-muted ml-3">Pequeña descripción para el rol</small>
                </div>

            </form>
        </div>
        <div class="modal-footer">
                <button class="btn btn-secondary" data-dismiss="modal">Volver</button>
                <button class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>Guardar</button>
        </div>
    </div>
    </div>
</div>
@endsection
