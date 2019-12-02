<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{route('welcome')}}">Ro-Botika</a>
        <div id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-1 mx-lg-1">
                    <a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{route('welcome')}}">{{ __('messages.inicio') }}</a>
                </li>
                <li class="nav-item mx-1 mx-lg-1"><a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> EN</a></li>
                <li class="nav-item mx-1 mx-lg-1"><a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{ url('locale/es') }}" ><i class="fa fa-language"></i> ES</a></li>
                <li class="nav-item mx-1 mx-lg-1"><a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{ url('locale/eu') }}" ><i class="fa fa-language"></i> EU</a></li>


                    @guest
        <li class="nav-item mx-1 mx-lg-1">
          <a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger login" href="#loginModal" data-toggle="modal">{{ __('messages.Iniciar sesión') }}</a>
        </li>
        @if (Route::has('register'))
        <li class="nav-item mx-1 mx-lg-1">
          <a style="color: #2c3e50" class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger bg-light registrate" href="#registroModal" data-toggle="modal">{{ __('messages.Registrarse') }}</a>
        </li>

        @endif
                @else
                <li class="nav-item dropdown mx-1 mx-lg-1">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                        <a class="dropdown-item" href="{{ route('usuarios.edit',Auth::user()->id) }}">
                            {{ __('messages.Modificar usuario') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('usuarios.delete',Auth::user()->id) }}">
                            {{ __('messages.Eliminar usuario') }}
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('messages.Cerrar sesión') }}
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</div>
</nav>
