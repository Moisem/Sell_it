<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm" >
    <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">
        <img src="{{asset('images/sellit.svg')}}" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.users')}}">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.productos')}}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.categorias')}}">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin')}}">Reportes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('emails')}}">Comentarios</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesion') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    <li>
                    @include('includes.fotoperfil')
                    </li>
            </ul>
        </div>
    </div></nav>
