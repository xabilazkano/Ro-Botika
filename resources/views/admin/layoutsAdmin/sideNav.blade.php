<nav class="col-md-2 d-none d-md-block bg-light sidebar">

    <ul class="nav d-flex flex-column">
      <li class="nav-item">
        <a class="nav-link" href="{{route('assistances.index')}}">
          <i class="fas fa-medkit"></i>
          {{__('messages.Asistencias')}} <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('adminNurses.index')}}">
          <i class="fas fa-user-nurse"></i>
          {{__('messages.Enfermeros')}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('patients.index')}}">
          <i class="fas fa-user-injured"></i>
          {{__('messages.Pacientes')}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('rooms.index')}}">
          <i class="fas fa-person-booth"></i>
          {{__('messages.Habitaciones')}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('medicines.index')}}">
        <i class="fas fa-prescription-bottle"></i>
          {{__('messages.Medicinas')}}
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('adminPatientsRooms.index')}}">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
          {{__('messages.Pacientes')}} - {{__('messages.Habitaciones')}}
        </a>
      </li>
    </ul>

</nav>
