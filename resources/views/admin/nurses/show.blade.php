@extends('layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>Enfermero {{$nurse->id}}</h2>
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
</main>
@endsection
