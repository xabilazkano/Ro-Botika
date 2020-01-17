@extends('layouts.app')
@section('titulua', __('messages.PACIENTES'))
@section('content')
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">{{ __('messages.numeross') }}</th>
      <th scope="col">{{ __('messages.Nombre') }}</th>
      <th scope="col">{{ __('messages.Apellido') }}</th>
      <th scope="col">{{ __('messages.enfermedad') }}</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    @foreach ($patients as $patient)
          <tr>
            <th scope="row">{{$patient->id}}</td>
              <td>{{$patient->ss_number}}</td>
              <td>{{$patient->name}}</td>
              <td>{{$patient->lastname}}</td>
              <td>{{$patient->disease}}</td>
              <td><a href="{{route('patients.show',$patient->id)}}"><i class="blackIcon fa fa-eye"></i></a></td>
            </tr>
      @endforeach
    </tbody>
  </table>
  @endsection
