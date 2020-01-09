@extends('layouts.app')
@section('titulua', 'Pacientes')
@section('content')
  <h2>Añadir paciente</h2>
  <form class="" action="{{route('adminPatients.store')}}" method="post">
    @csrf
    <label>Número de la seguridad social: </label><input type="text" name="ss_number" value=""><br>
    <label>Nombre: </label><input type="text" name="name" value=""><br>
    <label>Apellidos: </label><input type="text" name="lastname" value=""><br>
    <label>Enfermedad: </label><input type="text" name="disease" value=""><br>
    <input type="submit" name="" value="Store">
  </form>
@endsection
