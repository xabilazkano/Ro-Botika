
  <nav class="navbar navbar-dark fixed-top bg-dark p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Ro-botika</a>
    <ul class="navbar-nav px-3 d-flex d-flex flex-row">
      <li class="nav-item text-nowrap p-0 d-flex align-items-center">
        <a class="nav-link text-white" href="" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">{{ __('messages.Cerrar sesión') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" >
          @csrf
        </form>
      </li>
      <li class="nav-item text-nowrap">
        <div class="btn-group btn-group-inline">
          <button class="btn" data-toggle="dropdown">
          	<span class="caret"><i class="fa fa-language fa-2x text-white"></i></span>
          </button>
          <ul class="dropdown-menu">
          	<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/en') }}">EN</a></li>
          	<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/es') }}">ES</a></li>
          	<li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/eu') }}">EUS</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </nav>
  <script>
    $(document).ready(function(){
      $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
      });
    });
  </script>
