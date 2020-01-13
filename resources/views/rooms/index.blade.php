@extends('layouts.app')
@section('titulua', __('messages.HABITACIONES'))
@section('content')
<table class="table">
	<thead class="thead">
		<tr>
			<th>ID</th>
			<th>{{__('messages.planta')}}</th>
			<th>{{__('messages.numerohabitacion')}}</th>
			<th>{{__('messages.camas')}}</th>
			<th>{{__('messages.Pacientes')}}</th>
			<th></th>
		</tr>
	</thead>
	@foreach ($rooms as $room)
		@foreach ($room->patients as $patient)
			@if ($patient->pivot->up_date <= date('Y-m-d') && $patient->pivot->down_date >= date('Y-m-d'))
				<tr>
					<td>{{$room->id}}</td>
					<td>{{$room->floor}}</td>
					<td>{{$room->room_number}}</td>
					<td>{{$room->beds}}</td>
					<td><a href="{{route('patients.show',$patient->id)}}">{{$patient->name}} {{$patient->lastname}}</a></td>
					<td><a href="{{route('rooms.show',$room->id)}}"><i class="blackIcon fa fa-eye"></i></a></td>
				</tr>
			@endif
		@endforeach
	@endforeach
</table>
@endsection
