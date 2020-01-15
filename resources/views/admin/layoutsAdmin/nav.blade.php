
<nav class="navbar navbar-dark fixed-top bg-dark p-0 shadow">
  <a class="navbar-brand bg-dark col-sm-3 col-md-2 mr-0" href="{{route('homeAdmin')}}">Ro-botika</a>
  <div class="col-2 d-flex flex-row justify-content-end">
    <div class="menueskubi btn-group btn-group-inline">
      <button class="btn" data-toggle="dropdown">
        <span class="caret"><i class="adminIcon fa fa-language fa-2x"></i> </span>
      </button>
      <ul class="dropdown-menu">
        <li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/en') }}">EN</a></li>
        <li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/es') }}">ES</a></li>
        <li><a tabindex="-1" class="dropdown-item" href="{{ url('locale/eu') }}">EUS</a></li>
      </ul>
    </div>
    <!-- FIN Idiomas -->
    <div class="menueskubi d-flex align-items-center mr-2 ml-5">

      <a tabindex="-1"  href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="caret"><i class="adminIcon fas fa-sign-out-alt fa-2x"></i> </span>
      </a>
      <form id="logout-form" action="{{route('logout')}}" method="POST" >
        @csrf
      </form>

    </div>
  </div>
</nav>
