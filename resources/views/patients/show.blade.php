@extends('layouts.app')
@section('titulua', __('messages.PACIENTES'))
@section('content')
<div class="row">
	<div class="col-1">
		<a href="{{route('patients.index')}}"><i class="fa fa-arrow-left fa-3x text-dark"></i></a>
	</div>
</div>
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">{{__('messages.numeross')}}</th>
      <th scope="col">{{__('messages.Nombre')}}</th>
      <th scope="col">{{__('messages.Apellido')}}</th>
      <th scope="col">{{__('messages.enfermedad')}}</th>
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
