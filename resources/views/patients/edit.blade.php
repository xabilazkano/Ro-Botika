@extends('layouts.app')
@section('titulua', 'Pacientes')
@section('content')
    <h2>Editar paciente {{$patient->id}}</h2>
    <form class="" action="{{route('adminPatients.update',$patient->id)}}" method="post">
      @csrf
      @method('put')
      <label>Número de la seguridad social: </label><input type="text" name="ss_number" value="{{$patient->ss_number}}"><br>
      <label>Nombre: </label><input type="text" name="name" value="{{$patient->name}}"><br>
      <label>Apellidos: </label><input type="text" name="lastname" value="{{$patient->lastname}}"><br>
      <label>Disease: </label><input type="text" name="disease" value="{{$patient->disease}}"><br>
      <input type="submit" name="" value="Update">
    </form>
@endsection
