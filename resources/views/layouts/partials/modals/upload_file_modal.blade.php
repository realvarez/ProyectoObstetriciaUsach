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
                                        @foreach (json_decode(constant('list_categories')) as $category)
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