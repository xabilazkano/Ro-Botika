<!-- Navigation -->
<nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{{route('landingpage')}}">Ro-Botika</a>
        <div id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mx-1 mx-lg-1">
                    <a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{route('homeAdmin')}}">{{__('messages.Volver a la aplicación')}}</a>
                </li>
                <div class="btn-group btn-group-inline">
          				<button class="btn" data-toggle="dropdown">
          					<span class="caret"><i class="iconoIdiomas fa fa-language fa-2x"></i></span>
          				</button>
          				<ul class="dropdown-menu">
          					<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/en') }}">EN</a></li>
          					<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/es') }}">ES</a></li>
          					<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/eu') }}">EUS</a></li>
          				</ul>
          			</div>
            </div>
        </div>
    </nav>
