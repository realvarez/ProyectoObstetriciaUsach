@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach ($categories as $category)
            @if (isset($category->sons))
                <div class="card-box bg-success col-xs-12 col-md-6 col-lg-6 col-xl-4" style="position: relative; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                    <a href="javascript:;" cat_id="{{$category->id}}" class="button-favorite {{(isset($category->favorite))?'selected':''}}" style=""><i class="fa fa-star" style="font-size: 20px;" aria-hidden="true"></i>

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
                    <a href="javascript:;" cat_id="{{$category->id}}" class="button-favorite {{(isset($category->favorite))?'selected':''}}"><i class="fa fa-star" style="font-size: 20px;" aria-hidden="true"></i></a>
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
            <a data-toggle="modal" data-target="#newcategoryModal" class="" style="cursor: pointer;">
                <h6 class="text-white text-uppercase m-b-20 text-center" style="text-shadow: 1px 1px 6px #a87e2a;margin-top:23px;">
                <i class="fas fa-folder-plus" style="font-size: 20px;"></i>&nbsp&nbsp Nueva Categoría</h6>
            </a>
        </div>
    </div>
</div>
@include('layouts.partials.modals.create_category_modal')
@endsection
