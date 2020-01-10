@extends('layouts.app')

@section('content')
<section class="text-center">
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
    <div class="col-md-6">
      <a href="{{route('rooms.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <i class="patienticon fa fa-home"></i>
          <h2>HABITACIONES</h2>
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
  </div>
</section>
@endsection
