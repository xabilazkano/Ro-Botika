@extends('admin.layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2 class="row">
    <span class="col-11">{{__('messages.Pacientes')}} - {{__('messages.Habitación')}}</span>
    @if (Auth::user()->hasRole("admin"))
    <a href="{{route('adminPatients.create')}}" class="col-1"><i class="fa fa-plus"></i></a>
    @endif
  </h2>
  <table class="table">
    <thead class="thead">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">{{ __('messages.Paciente') }}</th>
        <th scope="col">{{ __('messages.Habitacion') }}</th>
        <th scope="col">{{ __('messages.Cama') }}</th>
        <th scope="col">{{ __('messages.Desde') }}</th>
        <th scope="col">{{ __('messages.Hasta') }}</th>
        <th></th>
        @if (Auth::user()->hasRole("admin"))
        <th></th>
        <th></th>
        @endif
      </tr>
    </thead>
    <tbody>

      @foreach ($rooms as $room)
      @if (!$room->patients == null)
      @foreach ($room->patients as $patient)
      <tr>
        <td>{{$patient->pivot->id}}</td>
        <td>{{$patient->name}} {{$patient->lastname}}</td>
        <td>{{$room->room_number}}</td>
        <td>{{$patient->pivot->bed}}</td>
        <td>{{$patient->pivot->up_date}}</td>
        <td>{{$patient->pivot->down_date}}</td>
        <td><a href="{{route('adminPatientsRooms.show',$patient->pivot->id)}}"><i class="blackIcon fa fa-eye"></i></a></td>
        @if (Auth::user()->hasRole("admin"))
        <td><a href="{{route('adminPatientsRooms.edit',$patient->pivot->id)}}"><i class="blackIcon fa fa-edit"></i></a></td>
        <td>
          <form action="{{route('adminPatientsRooms.destroy',$patient->pivot->id)}}" method="post">
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
      @endif
      @endforeach


    </tbody>
  </table>
</main>
@endsection
