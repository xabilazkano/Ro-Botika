@extends('layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
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
</main>
@endsection
