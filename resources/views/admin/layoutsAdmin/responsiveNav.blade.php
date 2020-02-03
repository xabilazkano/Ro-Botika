<div class="">
  @if ($_SESSION["section"] === "assistances")
    <a class="btn btn-outline-dark active w-100 sidebarBoton" href="{{route('assistances.index')}}">
      <i class="fas fa-medkit"></i>
      {{__('messages.Asistencias')}} <span class="sr-only">(current)</span>
    </a>
  @else
    <a class="btn btn-outline-dark w-100 border-0 sidebarBoton" href="{{route('assistances.index')}}">
      <i class="fas fa-medkit"></i>
      {{__('messages.Asistencias')}} <span class="sr-only">(current)</span>
    </a>
  @endif
  @if ($_SESSION["section"] === "nurses")
    <a class="btn btn-outline-dark active w-100 sidebarBoton" href="{{route('adminNurses.index')}}">
      <i class="fas fa-user-nurse"></i>
      {{__('messages.Enfermeros')}}
    </a>
  @else
    <a class="btn btn-outline-dark w-100 border-0 sidebarBoton" href="{{route('adminNurses.index')}}">
      <i class="fas fa-user-nurse"></i>
      {{__('messages.Enfermeros')}}
    </a>
  @endif
  @if ($_SESSION["section"] === "patients")
    <a class="btn btn-outline-dark active w-100 sidebarBoton" href="{{route('patients.index')}}">
      <i class="fas fa-user-injured"></i>
      {{__('messages.Pacientes')}}
    </a>
  @else
    <a class="btn btn-outline-dark w-100 border-0 sidebarBoton" href="{{route('patients.index')}}">
      <i class="fas fa-user-injured"></i>
      {{__('messages.Pacientes')}}
    </a>
  @endif
  @if ($_SESSION["section"] === "rooms")
    <a class="btn btn-outline-dark active w-100 sidebarBoton" href="{{route('rooms.index')}}">
      <i class="fas fa-procedures"></i>
      {{__('messages.Habitaciones')}}
    </a>
  @else
    <a class="btn btn-outline-dark w-100 border-0 sidebarBoton" href="{{route('rooms.index')}}">
      <i class="fas fa-procedures"></i>
      {{__('messages.Habitaciones')}}
    </a>
  @endif
  @if ($_SESSION["section"] === "medicines")
    <a class="btn btn-outline-dark active w-100 sidebarBoton" href="{{route('medicines.index')}}">
      <i class="fas fa-pills"></i>
      {{__('messages.Medicinas')}}
    </a>
  @else
    <a class="btn btn-outline-dark w-100 border-0 sidebarBoton" href="{{route('medicines.index')}}">
      <i class="fas fa-pills"></i>
      {{__('messages.Medicinas')}}
    </a>
  @endif
  @if ($_SESSION["section"] === "patientsRooms")
    <a class="btn btn-outline-dark active w-100 sidebarBoton" href="{{route('adminPatientsRooms.index')}}">
      <i class="fas fa-person-booth"></i>
      {{__('messages.Pacientes')}} - {{__('messages.Habitaciones')}}
    </a>
  @else
    <a class="btn btn-outline-dark w-100 border-0 sidebarBoton" href="{{route('adminPatientsRooms.index')}}">
      <i class="fas fa-person-booth"></i>
      {{__('messages.Pacientes')}} - {{__('messages.Habitaciones')}}
    </a>
  @endif
  @if ($_SESSION["section"] === "statistics")
    <a class="btn btn-outline-dark active w-100 sidebarBoton" href="{{route('statistics')}}">
      <i class="fas fa-chart-pie"></i>
      {{__('messages.Estadísticas')}}
    </a>
  @else
    <a class="btn btn-outline-dark w-100 border-0 sidebarBoton" href="{{route('statistics')}}">
      <i class="fas fa-chart-pie"></i>
      {{__('messages.Estadísticas')}}
    </a>
  @endif
</div>
