<div class="headerbar">
    <div class="headerbar-left">
        <a href="/" ><img alt="Logo" src="{{asset('images/Escudo_USACH.svg')}}" style="height: 50px; margin-left: 10px;" /> <span class="titulo">ESCUELA DE OBSTETRICIA Y PUERICULTURA</span></a>
    </div>
    <nav class="navbar-custom">
        @auth
        <ul class="list-inline float-right mb-0">
            <li class="list-inline-item">
                <form action="{{route('search')}}" method="post">@csrf
                    <div class="searchbar">
                        <input class="search_input" type="text" name="query" placeholder="Buscar...">
                        <a href="#" class="search_icon"><i class="fas fa-search"></i></a>
                    </div>
                </form>
            </li>
            <li class="list-inline-item">
                <div class="list-inline-item">
                    
                </div>
            </li>
            <li class="list-inline-item dropdown ">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset(Auth::user()->avatar_image_path)}}" alt="Profile image" class="avatar-rounded">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
            </li>
        </ul>
        @endauth
    </nav>
</div>