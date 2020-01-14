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
          <i class="fas fa-procedures"></i>
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
          <i class="fas fa-person-booth"></i>
          {{__('messages.Pacientes')}} - {{__('messages.Habitaciones')}}
        </a>
      </li>
    </ul>

</nav>
