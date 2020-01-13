@extends('layouts.app')
@section('titulua', 'Camas')
@section('content')
<h2 class="row">
</h2>
<table class="table">
	<thead class="thead">
		<tr>
			<th>ID</th>
			<th>Floor</th>
			<th>Room</th>
			<th>Bed</th>
			<th>Patient</th>
			<th></th>
		</tr>
	</thead>
	@foreach ($beds as $bed)
	<tr>
		<td>{{$bed->id}}</td>
		<td>{{$bed->floor}}</td>
		<td>{{$bed->room}}</td>
		<td>{{$bed->bed}}</td>
		<td>
			@foreach ($bed->patients as $patient)
			{{$patient->name}} {{$patient->surname}}
			@endforeach
		</td>
		<td><a href="{{route('beds.show',$bed->id)}}"><i class="blackIcon fa fa-eye"></i></a></td>
	</tr>
	@endforeach
</table>

@endsection
