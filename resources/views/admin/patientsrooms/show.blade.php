@extends('admin.layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>{{__('messages.Paciente')}}</h2>
  <table class="table">
    <thead class="thead">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">{{ __('messages.Paciente') }}</th>
        <th scope="col">{{ __('messages.Habitacion') }}</th>
        <th scope="col">{{ __('messages.Cama') }}</th>
        <th scope="col">{{ __('messages.Desde') }}</th>
        <th scope="col">{{ __('messages.Hasta') }}</th>
      </tr>
    </thead>
    <tr>
      <td>{{$room->id}}</td>
      @foreach ($room->patients as $patient)
      @if ($patient->pivot->id === $patientroom->id)
      <td>{{$patient->id}}</td>
      <td>{{$room->room_number}}</td>
      <td>{{$patient->pivot->bed}}</td>
      <td>{{$patient->pivot->up_date}}</td>
      <td>{{$patient->pivot->down_date}}</td>
      @endif
      @endforeach

    </th>
  </table>
</main>
@endsection
