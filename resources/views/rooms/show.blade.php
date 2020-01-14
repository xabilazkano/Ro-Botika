@extends('layouts.app')
@section('titulua', __('messages.HABITACIONES'))
@section('content')
<div class="row">
	<div class="col-1">
		<a href="{{route('rooms.index')}}"><i class="fa fa-arrow-left fa-2x text-dark"></i></a>
	</div>

</div>
<div class="col-md-12">
	<table class="table">
		<thead class="thead">
			<tr>
				<th>Id</th>
				<th>{{__('messages.planta')}}</th>
				<th>{{__('messages.numerohabitacion')}}</th>
				<th>{{__('messages.camas')}}</th>
				<th>{{__('messages.Pacientes')}}</th>
				<th></th>
			</tr>
		</thead>
		<tr>
			<td>{{$room->id}}</td>
			<td>{{$room->floor}}</td>
			<td>{{$room->room_number}}</td>
			<td>{{$room->beds}}</td>
			<td>
				@foreach ($room->patients as $patient)
					@if ($patient->pivot->up_date <= date('Y-m-d') && $patient->pivot->down_date >= date('Y-m-d'))
						<a href="{{route('patients.show',$patient->id)}}">{{$patient->name}} {{$patient->lastname}}</a>&nbsp;&nbsp;
					@endif
				@endforeach
			</td>
		</tr>
	</table>
</div>
@endsection
