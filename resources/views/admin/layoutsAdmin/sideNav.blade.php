<nav class="col-md-2 d-none d-md-block bg-light sidebar">

    <ul class="nav d-flex flex-column">
      @if ($_SESSION["section"] === "assistances")
        <li class="nav-item">
          <a class="nav-link active" href="{{route('assistances.index')}}">
            <i class="fas fa-medkit"></i>
            {{__('messages.Asistencias')}} <span class="sr-only">(current)</span>
          </a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('assistances.index')}}">
            <i class="fas fa-medkit"></i>
            {{__('messages.Asistencias')}} <span class="sr-only">(current)</span>
          </a>
        </li>
      @endif
      @if ($_SESSION["section"] === "nurses")
        <li class="nav-item">
          <a class="nav-link active" href="{{route('adminNurses.index')}}">
            <i class="fas fa-user-nurse"></i>
            {{__('messages.Enfermeros')}}
          </a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('adminNurses.index')}}">
            <i class="fas fa-user-nurse"></i>
            {{__('messages.Enfermeros')}}
          </a>
        </li>
      @endif
      @if ($_SESSION["section"] === "patients")
        <li class="nav-item">
          <a class="nav-link active" href="{{route('patients.index')}}">
            <i class="fas fa-user-injured"></i>
            {{__('messages.Pacientes')}}
          </a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('patients.index')}}">
            <i class="fas fa-user-injured"></i>
            {{__('messages.Pacientes')}}
          </a>
        </li>
      @endif
      @if ($_SESSION["section"] === "rooms")
        <li class="nav-item">
          <a class="nav-link active" href="{{route('rooms.index')}}">
            <i class="fas fa-procedures"></i>
            {{__('messages.Habitaciones')}}
          </a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('rooms.index')}}">
            <i class="fas fa-procedures"></i>
            {{__('messages.Habitaciones')}}
          </a>
        </li>
      @endif
      @if ($_SESSION["section"] === "medicines")
        <li class="nav-item">
          <a class="nav-link active" href="{{route('medicines.index')}}">
          <i class="fas fa-pills"></i>
            {{__('messages.Medicinas')}}
          </a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('medicines.index')}}">
          <i class="fas fa-pills"></i>
            {{__('messages.Medicinas')}}
          </a>
        </li>
      @endif
      @if ($_SESSION["section"] === "patientsRooms")
        <li class="nav-item">
          <a class="nav-link active" href="{{route('adminPatientsRooms.index')}}">
            <i class="fas fa-person-booth"></i>
            {{__('messages.Pacientes')}} - {{__('messages.Habitaciones')}}
          </a>
        </li>
      @else
        <li class="nav-item">
          <a class="nav-link" href="{{route('adminPatientsRooms.index')}}">
            <i class="fas fa-person-booth"></i>
            {{__('messages.Pacientes')}} - {{__('messages.Habitaciones')}}
          </a>
        </li>
      @endif
    </ul>

</nav>
