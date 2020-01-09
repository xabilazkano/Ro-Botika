@extends('layouts.app')
@section('titulua', 'Medicinas')
@section('content')
    <h2>Medicina {{$medicine->id}}</h2>
    <ul>
      <li>Id: {{$medicine->id}}</li>
      <li>Nombre: {{$medicine->name}}</li>
      <li>Cantidad: {{$medicine->amount}}</li>
      @if (Auth::user()->hasRole("admin"))
        <li><a href="{{route('adminMedicines.edit',$medicine->id)}}">Edit</a></li>
        <li><a href="{{route('adminMedicines.destroy',$medicine->id)}}">Destroy</a></li>
      @endif
    </ul>
@endsection
