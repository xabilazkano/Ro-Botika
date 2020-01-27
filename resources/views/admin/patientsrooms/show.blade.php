@extends('admin.layoutsAdmin.app')
<?php
  session_start();
  $_SESSION['section']="patientsRooms";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2 class="row">
    <span class="col-11">{{__('messages.Paciente')}} - {{__('messages.Habitación')}}</span>
  </h2>
  <table class="table">
    <thead class="thead">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">{{ __('messages.Paciente') }}</th>
        <th scope="col">{{ __('messages.Habitación') }}</th>
        <th scope="col">{{ __('messages.Cama') }}</th>
        <th scope="col">{{ __('messages.Desde') }}</th>
        <th scope="col">{{ __('messages.Hasta') }}</th>
      </tr>
    </thead>
    <tr>
      <td>{{$patientroom->id}}</td>
      @foreach ($patient->rooms as $room)
      @if ($room->pivot->id === $patientroom->id)
      <td>{{$patient->id}}</td>
      <td>{{$room->id}}</td>
      <td>{{$patient->pivot->bed}}</td>
      <td>{{$patient->pivot->up_date}}</td>
      <td>{{$patient->pivot->down_date}}</td>
      @endif
      @endforeach

    </th>
  </table>
</main>
@endsection
