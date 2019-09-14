@if(\Request::route()->getName() != 'login')
<div class="col-xl-12">
    <div class="breadcrumb-holder">
        @switch(\Route::currentRouteName())
        @case('category.show')
        <h1 class="main-title float-left">
            <a href="/" class="breadcrumb-item" style="color:#212529;">Categorias</a>
            @if (isset($_category_father))
            @if ($_category_father->category_level != 1)
            <a class="breadcrumb-item" style="color:#212529;">...</a>
            @endif
            <a href="/category/{{$_category_father->id}}" class="breadcrumb-item" style="color:#212529;">{{ucfirst($_category_father->category_name)}}</a>
            @endif
            <a class="breadcrumb-item active" style="color:#212529;">{{ucfirst($_category->category_name)}}</a>
        </h1>
        <ol class="breadcrumb float-right" style="margin-right: 5em">
            <li style="margin-top: 0.35em">
                <a href="javascript:;" data-toggle="modal" data-target="#categoryEditModal" style="color:black; cursor: pointer; margin-right: 15px; padding: 2px !important;" id="{{$_category->id}}_update"><i class="fa fa-edit"></i> Editar categoría</a>
            </li>
            <li style="margin-top: 0.35em">
                <a data-toggle="modal" data-target="#categoryModal" style="color:black; cursor: pointer; margin-right: 15px; padding: 2px !important;"><i class="fas fa-folder-plus"></i> Nueva sub-categoría</a>
            </li>
            <li style="margin-top: 0.35em; margin-right: 0.2em"><i class="fas fa-upload"></i></li>
            <li>
                <div class="dropdown show" style="margin-top: 0.35em">
                    <a style="color:black; cursor: pointer; margin-right: 15px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Subir</a>

                    <div class="dropdown-menu" style="border:0em" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" style="color:black; cursor: pointer; margin-right: 15px;" data-toggle="modal" data-target="#fileModal" data-placement="right"> Subir Archivo</a>
                        <a class="dropdown-item" style="color:black; cursor: pointer; margin-right: 15px;" data-toggle="modal" data-target="#linkModal" data-placement="right"> Subir Link</a>
                    </div>
                </div>
            </li>
        </ol>
        @break
        @case('')
        <h1 class="main-title float-left">
            <a href="/" class="breadcrumb-item" style="color:#212529;">Categorias</a>
        </h1>
        <ol class="breadcrumb float-right">
            <li class="breadcrumb-item">Home</li>
        </ol>
        @break
        @case('roles.index')
        <h1 class="main-title float-left">
            <a href="/roles" class="breadcrumb-item" style="color:#212529;">Roles</a>
        </h1>
        <ol class="breadcrumb float-right">
            <li class="breadcrumb-item">Administración</li>
        </ol>
        @break
        @case('roles.show')
        <h1 class="main-title float-left">
            <a href="/roles" class="breadcrumb-item" style="color:#212529;">Roles</a>
            <a class="breadcrumb-item active" style="color:#212529;">{{$rol->role_name}}</a>
            <a class="breadcrumb-item active" style="color:#212529;">Permisos</a>
        </h1>
        <ol class="breadcrumb float-right">
            <li class="breadcrumb-item">Administración</li>
            <li class="breadcrumb-item">Roles</li>
        </ol>
        @break
        @case('users.index')
        <h1 class="main-title float-left">
            <a href="/roles" class="breadcrumb-item" style="color:#212529;">Usuarios</a>
        </h1>
        <ol class="breadcrumb float-right">
            <li class="breadcrumb-item">Administración</li>
            <li class="breadcrumb-item">Usuarios</li>
        </ol>
        @break
        @case('users.show')
        @break
        @case('firstUsePassword')
        <h1 class="main-title float-left">
            <a href="/roles" class="breadcrumb-item" style="color:#212529;">Cambio de contraseña nuevos usuarios</a>
        </h1>
        <ol class="breadcrumb float-right">
            <li class="breadcrumb-item">Administración</li>
            <li class="breadcrumb-item">Usuarios</li>
        </ol>
        @break
        @default
        @break
        @endswitch
        <div class="clearfix"></div>
    </div>
</div>
@endif
