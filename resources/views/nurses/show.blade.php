@extends('layouts.app')
@section('content')
    <h2>Enfermero {{$nurse->id}}</h2>
    <ul>
      <li>Id: {{$nurse->id}}</li>
      <li>Nombre: {{$nurse->name}}</li>
      <li>Apellidos: {{$nurse->lastname}}</li>
      <li>Email: {{$nurse->email}}</li>
      <li>Número de teléfono: {{$nurse->phone_number}}</li>
      @if (Auth::user()->hasRole("admin"))
        <li><a href="{{route('adminNurses.edit',$nurse->id)}}">Edit</a></li>
        <li><a href="{{route('adminNurses.destroy',$nurse->id)}}">Destroy</a></li>
      @endif
    </ul>
@endsection
