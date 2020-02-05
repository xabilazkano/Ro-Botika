@extends('admin.layoutsAdmin.app')
<?php
  session_start();
  $_SESSION['section']="medicines";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  	<h2>{{__('messages.Medicina')}}</h2>
  <table class="table">
    <thead class="thead">
      <tr>
        <th>Id</th>
        <th>{{__('messages.Nombre')}}</th>
        <th>{{__('messages.Cantidad')}}</th>
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
