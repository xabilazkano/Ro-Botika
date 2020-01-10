@extends('layouts.app')
@section('titulua', 'Pacientes')
@section('content')
<div class="row">
	<div class="col-1">
		<a href="{{route('patients.index')}}"><i class="fa fa-arrow-left fa-2x text-dark"></i></a>
	</div>
	<div class="col-11">
		<h2>Paciente {{$patient->id}}</h2>
	</div>
</div>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Número S.S.</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Enfermedad</th>
    </tr>
  </thead>
  <tr>
    <td scope="row">{{$patient->id}}</td>
    <td>{{$patient->ss_number}}</td>
    <td>{{$patient->name}}</td>
    <td>{{$patient->lastname}}</td>
    <td>{{$patient->disease}}</td>
  </th>
</table>
@endsection
