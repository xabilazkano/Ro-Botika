@extends('layouts.app')
@section('titulua', 'Habitaciones')
@section('content')
<table class="table">
	<thead class="thead">
		<tr>
			<th>ID</th>
			<th>Floor</th>
			<th>Room Number</th>
			<th>Beds</th>
			<th>Patients</th>
			<th></th>
			@if (Auth::user()->hasRole("admin"))
			<th></th>
			<th></th>
			@endif
		</tr>
	</thead>
	@foreach ($rooms as $room)
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
		<td><a href="{{route('rooms.show',$room->id)}}"><i class="blackIcon fa fa-eye"></i></a></td>
		@if (Auth::user()->hasRole("admin"))
		<td><a href="{{route('adminRooms.edit',$room->id)}}"><i class="blackIcon fa fa-edit"></i></a></td>
		<td>
			<form method="post" action="{{route('adminRooms.destroy',$room->id)}}">
				@csrf
				@method('DELETE')
				<button type="submit" class="deleteIcon">
					<i class="fa fa-trash-o"></i>
				</button>
			</form>
		</td>
		@endif
	</tr>
	@endforeach
</table>

@endsection
