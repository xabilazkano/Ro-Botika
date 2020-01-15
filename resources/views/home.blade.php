@extends('layouts.app')
@section('content')
<section class="text-center">
  <div class="container d-flex align-content-around flex-wrap">

    <div class="col-md-6">
      <a href="{{route('assistances.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <i class="patienticon fas fa-medkit"></i>
          <h2>{{__('messages.ASISTENCIAS')}}</h2>
        </button>
      </a>
    </div>

    <div class="col-md-6">
      <a href="{{route('patients.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <i class="patienticon fas fa-user-injured"></i>
          <h2>{{ __('messages.PACIENTES')}}</h2>
        </button>
      </a>
    </div>
    <div class="col-md-6">
      <a href="{{route('rooms.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <i class="patienticon fas fa-procedures"></i>
          <h2>{{ __('messages.HABITACIONES')}}</h2>
        </button>
      </a>
    </div>
    <div class="col-md-6">
      <a href="{{route('medicines.index')}}">
        <button type="button" class="botonhome btn btn-secondary d-flex flex-row justify-content-around align-items-center">
          <i class="patienticon fas fa-pills"></i>
          <h2>{{__('messages.MEDICINAS')}}</h2>
        </button>
      </a>
    </div>
  </div>
</section>
@endsection
