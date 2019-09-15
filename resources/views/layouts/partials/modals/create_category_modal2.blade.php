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
                                @foreach (json_decode(constant('list_categories')) as $category)
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