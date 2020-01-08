@extends('layouts.app')

@section('content')
  <h2>Añadir medicina</h2>
  <form class="" action="{{route('adminMedicines.store')}}" method="post">
    @csrf
    <label>Nombre: </label><input type="text" name="name" value=""><br>
    <label>Cantidad: </label><input type="number" name="amount" value=""><br>

    <input type="submit" name="" value="Store">
  </form>
@endsection
