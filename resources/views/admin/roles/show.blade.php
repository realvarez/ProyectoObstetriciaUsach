@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <form method="POST" action="{{ route('roles.update',['id'=>$rol->id]) }}">
        @csrf @method('PUT')
            <div class="card mb-4">
                <div class="card-header">
                    <h3><i class="fa fa-table mr-2"></i>Permisos {{$rol->role_name}}</h3>
                    LIstado de permisos con los que cuenta el rol {{$rol->role_name}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Permisos de administración del sistema</h5>
                    <div class="row">
                        @foreach ($permissions_system as $permission)
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <input type="checkbox" name="{{$permission->name}}" id="{{$permission->name}}" @if($permission->has_permission){{'checked'}}@endif>
                                <label style="font-size:17px;" for="{{$permission->name}}">{{str_replace("_", " ", ucfirst($permission->name))}}</label>
                            </div>
                        @endforeach
                    </div>
                    <hr>
                    <h5 class="card-title mt-4">Permisos hoja de vida y currículums docentes</h5>
                    <div class="row">
                        @foreach ($permissions_resumes as $permission)
                            <div class="col-sm-12 col-md-6 col-lg-4">
                                <input type="checkbox" name="{{$permission->name}}" id="{{$permission->name}}" @if($permission->has_permission){{'checked'}}@endif>
                                <label style="font-size:17px;" for="{{$permission->name}}">{{str_replace("_", " ", ucfirst($permission->name))}}</label>
                            </div>
                        @endforeach
                    </div>
                    <hr>

                    <h5 class="card-title mt-4">Permisos categorias</h5>
                    <div class="row">
                        @foreach ($permissions_categories as $permission)
                            <div class="col-sm-12 col-md-6 col-lg-6">
                                <input type="checkbox" name="{{$permission->name}}" id="{{$permission->name}}" @if($permission->has_permission){{'checked'}}@endif>
                                <label style="font-size:17px;" for="{{$permission->name}}">{{str_replace("_", " ", ucfirst($permission->name))}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <div class="pull-right">
                        <a href="{{route('roles.index')}}" class="btn btn-secondary">Volver</a>
                        <button class="btn btn-primary"><span class="btn-label"><i class="fa fa-check"></i></span>Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
