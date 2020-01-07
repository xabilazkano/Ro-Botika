@extends('layouts.app')

@section('content')
<section class="masthead text-center">
  <div class="container d-flex align-content-around flex-wrap">

    <div class="col-md-6">
      <a href="{{route('assistances.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <i class="patienticon fa fa-stethoscope"></i>
          <h2>ASISTENCIAS</h2>
        </button>
      </a>
    </div>

    <div class="col-md-6">
      <a href="{{route('patients.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <i class="patienticon fa fa-user"></i>
          <h2>PACIENTES</h2>
        </button>
      </a>
    </div>

    @if (Auth::user()->hasRole("nurse"))
    <div class="col-md-6">
      <a href="{{route('beds.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <i class="patienticon fa fa-home"></i>
          <h2>CAMAS</h2>
        </button>
      </a>
    </div>
    <div class="col-md-6">
      <a href="{{route('medicines.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <i class="patienticon fa fa-list-alt"></i>
          <h2>STOCK</h2>
        </button>
      </a>
    </div>
    @endif

    @if (Auth::user()->hasRole("admin"))
    <div class="col-md-4">
      <a href="{{route('beds.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <i class="patienticon fa fa-home"></i>
          <h2>CAMAS</h2>
        </button>
      </a>
    </div>
    <div class="col-md-4">
      <a href="{{route('medicines.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <i class="patienticon fa fa-list-alt"></i>
          <h2>STOCK</h2>
        </button>
      </a>
    </div>
    <div class="col-md-4">
      <a href="{{route('adminNurses.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <h2>ENFERMER@S</h2>
        </button>
      </a>
    </div>
    @endif

  </div>
</section>
@endsection
