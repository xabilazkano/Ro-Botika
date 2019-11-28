<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{route('welcome')}}">Ro-Botika</a>
        <div id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-1 mx-lg-1">
                    <a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{route('welcome')}}">{{ __('messages.inicio') }}</a>
                </li>
                <li class="nav-item mx-1 mx-lg-1">
                    <a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{route('usuarios.index')}}">{{ __('messages.usuarios') }}</a>
                </li>
                <li class="nav-item mx-1 mx-lg-1"><a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> EN</a></li>
                <li class="nav-item mx-1 mx-lg-1"><a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{ url('locale/es') }}" ><i class="fa fa-language"></i> ES</a></li>
                <li class="nav-item mx-1 mx-lg-1"><a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{ url('locale/eu') }}" ><i class="fa fa-language"></i> EU</a></li>
            </div>
        </div>
    </nav>
