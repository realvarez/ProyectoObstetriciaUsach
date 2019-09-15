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