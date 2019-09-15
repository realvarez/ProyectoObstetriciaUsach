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
@include('layouts.partials.modals.edit_category_modal')
@include('layouts.partials.modals.create_category_modal')
@include('layouts.partials.modals.create_category_modal')
@include('layouts.partials.modals.upload_file_modal')
@include('layouts.partials.modals.upload_youtube_link_modal')


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
