@extends('layouts.app')
@section('content')
    <h2>Paciente {{$patient->id}}</h2>
    <ul>
      <li>Id: {{$patient->id}}</li>
      <li>Número de la seguridad social: {{$patient->ss_number}}</li>
      <li>Nombre: {{$patient->name}}</li>
      <li>Apellidos: {{$patient->lastname}}</li>
      <li>Enfermedad: {{$patient->disease}}</li>
      @if (Auth::user()->hasRole("admin"))
        <li><a href="{{route('adminPatients.edit',$patient->id)}}">Edit</a></li>
        <li><a href="{{route('adminPatients.destroy',$patient->id)}}">Destroy</a></li>
      @endif
    </ul>
@endsection
