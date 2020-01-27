@extends('admin.layoutsAdmin.app')
<?php
  session_start();
  $_SESSION['section']="patients";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>{{__('messages.Paciente')}}</h2>
  <table class="table">
    <thead class="thead">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">{{__('messages.numeross')}}</th>
        <th scope="col">{{__('messages.Nombre')}}</th>
        <th scope="col">{{__('messages.Apellido')}}</th>
        <th scope="col">{{__('messages.enfermedad')}}</th>
      </tr>
    </thead>
    <tr>
      <td scope="row">{{$patient->id}}</td>
      <td>{{$patient->ss_number}}</td>
      <td>{{$patient->name}}</td>
      <td>{{$patient->lastname}}</td>
      <td>{{$patient->disease}}</td>
    </th>
  </table><br><br>
  <div class="row justify-content-center">
  	<div class="observaciones col-8">
  		<h2>{{ __('messages.observations') }}</h2>
  		<p>{{$patient->observations}}</p>
  	</div>
  </div>
</main>
@endsection
