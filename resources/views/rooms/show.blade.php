@extends('layouts.app')
@section('titulua', __('messages.habitaciones'))
@section('content')
<div class="row">
	<div class="col-1">
		<a href="{{route('rooms.index')}}"><i class="fa fa-arrow-left fa-2x text-dark"></i></a>
	</div>
	<div class="col-11">
		<h2></h2>
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
				{{$patient->name}} {{$patient->surname}}
				@endforeach
			</td>
		</tr>
	</table>
</div>
@endsection
