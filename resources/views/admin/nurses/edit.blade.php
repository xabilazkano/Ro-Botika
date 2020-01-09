@extends('layouts.app')
@section('content')
    <h2>Editar enfermero {{$nurse->id}}</h2>
    <form class="" action="{{route('adminNurses.update',$nurse->id)}}" method="post">
      @csrf
      @method('put')
      <label>Nombre: </label><input type="text" name="name" value="{{$nurse->name}}"><br>
      <label>Apellidos: </label><input type="text" name="lastname" value="{{$nurse->lastname}}"><br>
      <label>Email: </label><input type="email" name="email" value="{{$nurse->email}}"><br>
      <label>Número de teléfono: </label><input type="text" name="phone_number" value="{{$nurse->phone_number}}"><br>
      <input type="submit" name="" value="Update">
    </form>
@endsection
