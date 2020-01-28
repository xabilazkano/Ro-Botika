@extends('admin.layoutsAdmin.app')
<?php
  $_SESSION['section']="patientsRooms";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2 class="row">
    <span class="col-11">{{__('messages.Pacientes')}} - {{__('messages.Habitaciones')}}</span>
    @if (Auth::user()->hasRole("admin"))
    <a href="{{route('adminPatientsRooms.create')}}" class="col-1"><i class="fa fa-plus"></i></a>
    @endif
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
        <th scope="col">{{ __('messages.enfermedad') }}</th>
        <th></th>
        @if (Auth::user()->hasRole("admin"))
        <th></th>
        <th></th>
        @endif
      </tr>
    </thead>
    <tbody>

      @foreach ($patients as $patient)

      @foreach ($patient->rooms as $room)
      <tr>
        <td>{{$patientroom->id}}</td>
        <td>{{$patientroom->patient_id}}</td>
        <td>{{$patientroom->room_id}}</td>
        <td>{{$patientroom->bed}}</td>
        <td>{{$patientroom->up_date}}</td>
        <td>{{$patientroom->down_date}}</td>
        <td>{{$patientroom->disease}}</td>
        <td><a href="{{route('adminPatientsRooms.show',$patientroom->id)}}"><i class="blackIcon fa fa-eye"></i></a></td>
        @if (Auth::user()->hasRole("admin"))
        <td><a href="{{route('adminPatientsRooms.edit',$room->pivot->id)}}"><i class="blackIcon fa fa-edit"></i></a></td>
        <td>
          <form action="{{route('adminPatientsRooms.destroy',$room->pivot->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="deleteIcon">
              <i class="fa fa-trash-o"></i>
            </button>
          </form>
        </td>
        @endif
      </tr>
      @endforeach

      @endforeach


    </tbody>
  </table>
</main>
@endsection
