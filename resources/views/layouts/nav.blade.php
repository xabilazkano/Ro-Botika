<!-- Navigation -->

<nav class="navbar navbar-expand-lg bg-secondary text-uppercase vertical" id="mainNav">
    <div class="container flex-column">
        <a class="navbar-brand js-scroll-trigger" href="{{route('welcome')}}">Ro-Botika</a>
        <div id="navbarResponsive">
            <ul class="navbar-nav ml-auto flex-column">
                <li class="nav-item mx-1 mx-lg-1">
                    <a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{route('welcome')}}">{{ __('messages.inicio') }}</a>
                </li>
                @guest
                <li class="nav-item mx-1 mx-lg-1">
                    <a style="color: #1abc9c" class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger login" href="#loginModal" data-toggle="modal">{{ __('messages.Iniciar sesión') }}</a>
                </li>
                @else
                @if (Auth::user()->hasVerifiedEmail())
                <li class="nav-item dropdown mx-1 mx-lg-1">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('homeAdmin')}}">
                          @if(Auth::user()->hasRole('admin'))
                              {{__('messages.Panel de administrador')}}
                          @else
                              {{__('messages.Panel estándar')}}
                          @endif
                        </a>
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
                @endif
                @endguest
                <li class="nav-item dropdown mx-1 mx-lg-1">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                         <span class="caret"><i class="fa fa-language"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ url('locale/en') }}">EN</a>
                        <a class="dropdown-item" href="{{ url('locale/es') }}">ES</a>
                        <a class="dropdown-item" href="{{ url('locale/eu') }}">EU</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
