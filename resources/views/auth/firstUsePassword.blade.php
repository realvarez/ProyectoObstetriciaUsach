@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-header">
                        <h3><i class="fas fa-user-lock mr-2"></i></i>Bienvenido</h3>
                        Por motivos de seguridad, es necesario cambiar la contraseña inicial de tu cuenta, por favor elija su nueva contraseña
                    </div>
                    <form action="{{route('savePassword')}}" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="newPassword">Ingrese su nueva contraseña</label>
                                <input class="form-control col-md-8 col-lg-8 col-xl-8" type="password" name="password" id="newPassword">    
                            </div>
                            <div class="form-group">
                                <label for="newPasswordConfirmation">Repita la contraseña antes ingresada</label>
                                <input class="form-control col-md-8 col-lg-8 col-xl-8" type="password" name="passwordConfirmation" id="newPasswordConfirmation">    
                            </div>
                        </div>	
                        <div class="card-footer" style="display: flex; justify-content: flex-end;">
                            @csrf
                            <button class="btn btn-primary" type="submit"><span class="btn-label"><i class="fa fa-check"></i></span>Guardar</button>
                        </div>						
                    </form>
                </div>
            </div>
        </div>
    </div>  
@endsection