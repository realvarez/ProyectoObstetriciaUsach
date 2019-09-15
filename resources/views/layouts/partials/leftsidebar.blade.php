@if(\Request::route()->getName() != 'login' && \Request::route()->getName() != 'firstUsePassword')
    <div class="left main-sidebar">
        <div class="sidebar-inner leftscroll">
            <div id="sidebar-menu">
                <ul>
                    <li class="submenu">
                        <a href="/"><i class="fas fa-home"></i><span>Home</span></a>
                    </li>
                    @if(Auth::user()->has_permission('administrar'))
                    <li class="submenu">
                        <a href="javascript:;"><i class="fas fa-cogs"></i><span>Administración</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="/roles"><i class="fas fa-user-tag"></i></i>Roles</a></li>
                            <li><a href="/users"><i class="fas fa-user-cog"></i>Usuarios</a></li>
                        </ul>
                    </li>
                    @endif
                    <li class="submenu">
                        <a href="javascript:;"><i class="fas fa-cogs"></i><span>Académicos</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="/academics"><i class="fa fa-list-alt"></i></i>Lista de académicos</a></li>
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:;"><i class="fas fa-folder-open"></i><span>Favoritos</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" id="favorite_list">
                            @foreach (Auth::user()->favorite_categories as $category)
                            <li><a href="/category/{{$category->id}}"><i class="fa fa-list-alt" aria-hidden="true"></i>{{ucfirst($category->category_name)}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="submenu">
                        <a href="javascript:;"><i class="fas fa-folder-open"></i><span>Últimas Visitadas</span><span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            {{-- Lista historial de categorias visitadas --}}
                            @foreach (Auth::user()->recorded_categories_tolist() as $category)
                            <li><a href="/category/{{$category->id}}"><i class="fa fa-list-alt" aria-hidden="true"></i>{{ucfirst($category->category_name)}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="submenu">
                        <a data-toggle="modal" data-target="#newcategoryModal" style="cursor: pointer;"><i class="fas fa-folder-plus"></i><span>Nueva categoría</span></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    @include('layouts.partials.modals.create_category_modal')
@endif