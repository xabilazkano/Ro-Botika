@extends('layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>{{__('messages.Enfermera')}}</h2>
  <table class="table">
    <thead class="thead">
      <tr>
        <th>Id</th>
        <th>{{__('messages.Nombre')}}</th>
        <th>{{__('messages.Apellidos')}}</th>
        <th>{{__('messages.Email')}}</th>
        <th>{{__('messages.Número de teléfono')}}</th>
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
