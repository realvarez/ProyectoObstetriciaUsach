@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach ($categories as $category)
            @if ($category->sons)
                <div class="card-box bg-success col-xs-12 col-md-6 col-lg-6 col-xl-4" style="position: relative; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <a href="javascript:;" cat_id="{{$category->id}}" class="button-favorite {{($category->favorite)?'selected':''}}" style=""><i class="fa fa-star" style="font-size: 20px;" aria-hidden="true"></i>

                        </a>
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
                    <a href="category/{{$category->id}}" style="justify-content: center;">
                        <h6 class="text-white text-uppercase m-b-20 text-center"  style="text-shadow: 1px 1px 6px #185b6b;">
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
                    <a href="category/{{$category->id}}" class="" >
                        <h6 class="text-white text-uppercase text-center" style="text-shadow: 1px 1px 6px #185b6b;">
                        <i class="fas fa-folder" style="font-size: 20px;"></i>&nbsp&nbsp{{ucfirst($category->category_name)}}</h6>
                    </a>
                </div>
            @endif


        @endforeach
        <div class="card-box bg-warning col-xs-12 col-md-6 col-lg-6 col-xl-4" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
            <a data-toggle="modal" data-target="#categoryModal" class="" style="cursor: pointer;">
                <h6 class="text-white text-uppercase m-b-20 text-center" style="text-shadow: 1px 1px 6px #a87e2a;margin-top:23px;">
                <i class="fas fa-folder-plus" style="font-size: 20px;"></i>&nbsp&nbsp Nueva Categoría</h6>
            </a>
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
@endsection
