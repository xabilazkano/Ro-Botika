@extends('layouts.app')
@section('content')
<table class="table">
  <thead class="thead">
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Email</th>
      <th>Número de teléfono</th>
    </tr>
  </thead>
  <tr>
    <td>{{$nurse->id}}</td>
    <td>{{$nurse->name}}</td>
    <td>{{$nurse->lastname}}</td>
    <td>{{$nurse->email}}</td>
    <td>{{$nurse->phone_number}}</td>
  </tr>
</table>
@endsection
