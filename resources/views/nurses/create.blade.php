@extends('layouts.app')

@section('content')
  <h2>Añadir enfermero</h2>
  <form class="" action="{{route('adminNurses.store')}}" method="post">
    @csrf
    <label>Nombre: </label><input type="text" name="name" value=""><br>
    <label>Apellidos: </label><input type="text" name="lastname" value=""><br>
    <label>Email: </label><input type="email" name="email" value=""><br>
    <label>Número de teléfono: </label><input type="text" name="phone_number" value=""><br>

    <input type="submit" name="" value="Store">
  </form>
@endsection
