@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach ($categories as $category)
        @if ($category->sons)
        <div class="card-box bg-success col-xs-12 col-md-6 col-lg-6 col-xl-4" style="position: relative; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <a href="javascript:;" cat_id="{{$category->id}}" class="button-favorite {{($category->favorite)?'selected':''}}" style=""><i class="fa fa-star" style="font-size: 20px;" aria-hidden="true"></i></a>
            <div class="toast {{$category->id}} add" style="position: absolute; top: 0; right: 0;">
                <div class="toast-body">
                    Agregando a favoritos
                </div>
            </div>
            <div class="toast {{$category->id}} adddone" style="position: absolute; top: 0; right: 0;">
                <div class="toast-body">
                    Agregado
                </div>
            </div>
            <div class="toast {{$category->id}} remove" style="position: absolute; top: 0; right: 0;">
                <div class="toast-body">
                    Quitando de favoritos
                </div>
            </div>
            <div class="toast {{$category->id}} removedone" style="position: absolute; top: 0; right: 0;">
                <div class="toast-body">
                    Quitado
                </div>
            </div>
            <a href="/category/{{$category->id}}" style="justify-content: center;">
                <h6 class="text-white text-uppercase m-b-20 text-center" style="text-shadow: 1px 1px 6px #185b6b;">
                    <i class="fas fa-folder" style="font-size: 20px;"></i>&nbsp&nbsp{{ucfirst($category->category_name)}}
                </h6>
            </a>
        </div>
        @else
        <div class="card-box bg-info col-xs-12 col-md-6 col-lg-6 col-xl-4" style="position: relative; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <a href="javascript:;" cat_id="{{$category->id}}" class="button-favorite {{($category->favorite)?'selected':''}}"><i class="fa fa-star" style="font-size: 20px;" aria-hidden="true"></i></a>
            <div class="toast {{$category->id}} add" style="position: absolute; top: 0; right: 0;">
                <div class="toast-body">
                    Agregando a favoritos
                </div>
            </div>
            <div class="toast {{$category->id}} adddone" style="position: absolute; top: 0; right: 0;">
                <div class="toast-body">
                    Agregado
                </div>
            </div>
            <div class="toast {{$category->id}} remove" style="position: absolute; top: 0; right: 0;">
                <div class="toast-body">
                    Quitando de favoritos
                </div>
            </div>
            <div class="toast {{$category->id}} removedone" style="position: absolute; top: 0; right: 0;">
                <div class="toast-body">
                    Quitado
                </div>
            </div>
            <a href="/category/{{$category->id}}" class="">
                <h6 class="text-white text-uppercase text-center" style="text-shadow: 1px 1px 6px #185b6b;">
                    <i class="fas fa-folder" style="font-size: 20px;"></i>&nbsp&nbsp{{ucfirst($category->category_name)}}</h6>
            </a>
        </div>
        @endif
        @endforeach
    </div>
    <div class="card" style="">
        <div class="card-body">
            <div class="table-responsive">
                <table id="table-documents" class="table table-bordered table-hover display">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Nombre Real</th>
                            <th>Tipo</th>
                            <th>Año</th>
                            <th style="text-align: center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                        <tr>
                            <td>{{$file->file_name}}</td>
                            <td>{{$file->file_real_name}}</td>
                            <td>{{$file->file_extension}}</td>
                            <td>{{$file->file_year}}</td>
                            <td style="text-align: center">

                                @if($file->storage_type == 2)


                                <a data-toggle="modal" data-target="#videoModal" style="color:black">
                                    <i class="fa fa-search bigfonts fa-2x" aria-hidden="true"></i>
                                </a>
                                <a href="/storage/{{$file->id}}" style="color:black">
                                    <i class="fa fa-download bigfonts fa-2x" aria-hidden="true"></i>
                                </a>

                                <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{$file->file_name}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body mb-0 p-0">
                                                {{-- {{dd($file->file_path)}} --}}
                                                <div class="embed-responsive embed-responsive-16by9 z-depth-1-half" id="video-embed">
                                                    <iframe class="embed-responsive-item" id="videoModal" src="{{$file->file_path}}" allowfullscreen></iframe>

                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="close-modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @else

                                <a href="/stream/{{$file->id}}" style=" color:black">
                                    <i class="fa fa-search bigfonts fa-2x" aria-hidden="true"></i>
                                </a>
                                <a href="/storage/{{$file->id}}" style="color:black">
                                    <i class="fa fa-download bigfonts fa-2x" aria-hidden="true"></i>
                                </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade custom-modal" id="categoryEditModal" tabindex="-1" role="dialog" aria-labelledby="categoryEditModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="form_for_cat_update" method="post" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="modal-body">@csrf
                    <div class="form-group">
                        <label for="category_name">Nuevo nombre de la categoría</label>
                        <input data-toggle="tooltip" data-placement="right" title="Ingrese el nombre que tendrá la categoría" type="text" name="category_name" placeholder="Ingrese el nombre">
                    </div>
                    @if (count($errors) > 0)
                    <div style="margin-top: 20px;" class="alert alert-danger" lang="es">
                        <strong>Ups!</strong> Ha ocurrido un error al crear la categoria
                    </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary "><i class="fas fa-long-arrow-alt-up"></i> Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade custom-modal" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="categoryModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nueva Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">@csrf
                    <div class="form-group">
                        <label>Seleccione una categoría padre:</label>
                        <a data-toggle="popover" title="Categoría padre" data-content="Cada categoría, puede contener subcategorías. Si desea crear una subcategoría, seleccione la categoría que la contendrá. Si no desea crear una subcategoría, seleccione &quot; Nueva Categoría&quot" style="cursor: pointer; color: grey !important; margin-right: 10px;" class="button"><i class="fas fa-question-circle"></i></a>
                        <select data-toggle="tooltip" data-placement="right" title="Seleccione a la categoría a la que pertenece o seleccione nueva categoría" name="superior_category_id" class="form-control form-control-sm ">
                            <option id="superior_category_id" value="0">Categoría Nueva</option>
                            @foreach ($all_categories as $category)
                            <option id="superior_category_id" {{(isset($_category) && $category->id == $_category->id)?'selected':''}} value="{{$category->id}}">{{ucfirst($category->category_name)}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="category_name">Nombre de la categoría</label>
                        <input data-toggle="tooltip" data-placement="right" title="Ingrese el nombre que tendrá la categoría" type="text" name="category_name" class="form-control " id="category_name" placeholder="Ingrese el nombre">
                    </div>
                    @if (count($errors) > 0)
                    <div style="margin-top: 20px;" class="alert alert-danger" lang="es">
                        <strong>Ups!</strong> Ha ocurrido un error al crear la categoria
                    </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary "><i class="fas fa-long-arrow-alt-up"></i> Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal SUBIR ARCHIVO -->
<div class="modal fade custom-modal" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModal" aria-hidden="true">
    {{$modal=1}}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir archivo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row container">
                        <div class="form-group row">
                            <input class="col-md-8 col-lg-8 col-xl-8" type="file" name="file" id="file" multiple="" required="">
                            <div style="margin-top: 20px;" class="col-md-8 col-lg-8 col-xl-8">
                                <label>Seleccione una categoría:</label>
                                <select data-toggle="tooltip" data-placement="right" title="Ingrese la categoría a la que pertenece el documento" name="category_id" class="form-control form-control-sm " required="">
                                    @foreach ($all_categories as $category)
                                    <option id="category_id" {{(isset($_category) && $category->id == $_category->id)?'selected':''}} value="{{$category->id}}">{{ucfirst($category->category_name)}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-top: 20px; " class="col-md-4 col-lg-4 col-xl-4">
                                <label>Año</label>
                                <input type="number" min="2016" max="2030" step="1" name="file_year" data-toggle="tooltip" data-placement="right" title="Ingrese el año del documento" class="form-control form-control-sm" required="">
                            </div>
                            <div style="margin-top: 20px; " class="col-md-4 col-lg-4 col-xl-4">
                                <label>Tags</label>
                                <input type="text" name="file_tags" id='file_tags' data-toggle="tooltip" data-placement="right" title="Ingrese tags del documento" class="form-control form-control-sm" data-role="tagsinput">
                            </div>
                            @if (count($errors) > 0)
                            <div style="margin-top: 20px;" class="alert alert-danger">
                                <strong>Ups!</strong> Ha ocurrido un error con la subida de su documento <br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary pull-right"><i class="fas fa-long-arrow-alt-up"></i> Subir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal SUBIR LINK -->
<div class="modal fade custom-modal" id="linkModal" tabindex="-1" role="dialog" aria-labelledby="linkModal" aria-hidden="true">
    {{$modal=2}}
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir Link</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('files.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row container">
                        <div class="form-group row">
                            <div style="margin-top: 20px;" class="col-md-8 col-lg-8 col-xl-8">
                                <label>Link de youtube:</label>
                                <a data-toggle="popover" title="Tipos de link" data-content="El formato de los links que se pueden subir son los siguientes:" style="cursor: pointer; color: grey !important; margin-right: 10px;" class="button"><i class="fas fa-question-circle"></i></a>

                                <input type="text" name="file_link" id='file_link' data-toggle="tooltip" data-placement="right" title="Ingrese link de youtube" class="form-control form-control-sm" required="">
                            </div>
                            <div style="margin-top: 20px;" class="col-md-8 col-lg-8 col-xl-8">

                                <label>Seleccione una categoría:</label>
                                <select data-toggle="tooltip" data-placement="right" title="Ingrese la categoría a la que pertenece el documento" name="category_id" class="form-control form-control-sm ">
                                    @foreach ($all_categories as $category)
                                    <option id="category_id" {{(isset($_category) && $category->id == $_category->id)?'selected':''}} value="{{$category->id}}">{{ucfirst($category->category_name)}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div style="margin-top: 20px; " class="col-md-4 col-lg-4 col-xl-4">
                                <label>Año</label>
                                <input type="number" min="2016" max="2030" step="1" name="file_year" data-toggle="tooltip" data-placement="right" title="Ingrese el año del documento" class="form-control form-control-sm">
                            </div>
                            <div style="margin-top: 20px; " class="col-md-4 col-lg-4 col-xl-4">
                                <label>Tags</label>
                                <input type="text" name="file_tags" id='file_tags' data-toggle="tooltip" data-placement="right" title="Ingrese tags del documento" class="form-control form-control-sm" data-role="tagsinput">
                            </div>
                            @if (count($errors) > 0)
                            <div style="margin-top: 20px;" class="alert alert-danger">
                                <strong>Ups!</strong> Ha ocurrido un error con la subida de su documento <br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary pull-right"><i class="fas fa-long-arrow-alt-up"></i> Subir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";

    $('input.typeahead').typeahead({

        source: function(query, process) {

            return $.get(path, {
                query: query
            }, function(data) {

                return process(data);

            });

        }

    });
</script>
@endsection
