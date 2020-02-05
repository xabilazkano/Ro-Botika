@extends('layouts.app')
@section('titulua', __('messages.PACIENTES'))
@section('content')
<div class="table-responsive">
  <table class="table">
    <thead class="thead">
      <tr>
        <th scope="col">{{ __('messages.numeross') }}</th>
        <th scope="col">{{ __('messages.Nombre') }}</th>
        <th scope="col">{{ __('messages.Apellido') }}</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($patients as $patient)
      @foreach ($patient->rooms as $room)
      @if ($room->pivot->up_date <= date('Y-m-d') && ($room->pivot->down_date >= date('Y-m-d') || $room->pivot->down_date === null))
      <tr>
        <td>{{$patient->ss_number}}</td>
        <td>{{$patient->name}}</td>
        <td>{{$patient->lastname}}</td>
        <td><a href="{{route('patients.show',$patient->id)}}"><i class="blackIcon fa fa-eye"></i></a></td>
      </tr>
      @endif
      @endforeach
      @endforeach
    </tbody>
  </table>
</div>
<script type="text/javascript">
$(document).ready( function () {
  $("table").DataTable();
} );

</script>
@endsection
