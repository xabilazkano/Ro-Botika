@extends('layouts.app')
@section('content')
<table class="table">
  <thead class="thead">
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Cantidad</th>
    </tr>
  </thead>
  <tr>
    <td>{{$medicine->id}}</td>
    <td>{{$medicine->name}}</td>
    <td>{{$medicine->amount}}</td>
  </tr>
</table>
@endsection
