@extends('layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
	<table class="table">
		<thead class="thead">
			<tr>
				<th>Id</th>
				<th>Planta</th>
				<th>Habitación</th>
				<th>Camas</th>
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
</main>
@endsection