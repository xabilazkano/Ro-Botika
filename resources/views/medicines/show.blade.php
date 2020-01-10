@extends('layouts.app')
@section('titulua', 'Medicinas')
@section('content')
<div class="row">
	<div class="col-1">
		<a href="{{route('medicines.index')}}"><i class="fa fa-arrow-left fa-2x text-dark"></i></a>
	</div>
	<div class="col-11">
		<h2></h2>
	</div>
</div>
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
