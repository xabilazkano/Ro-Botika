@extends('layouts.app')
@section('content')
<h2 class="row">
	<span class="col-11">Camas</span>
	@if (Auth::user()->hasRole("admin"))
	<a href="{{route('adminBeds.create')}}" class="col-1"><i class="fa fa-plus"></i></a>
	@endif
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
			@if (Auth::user()->hasRole("admin"))
			<th></th>
			<th></th>
			@endif
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
		@if (Auth::user()->hasRole("admin"))
		<td><a href="{{route('adminBeds.edit',$bed->id)}}"><i class="blackIcon fa fa-edit"></i></a></td>
		<td>
			<form method="post" action="{{route('adminBeds.destroy',$bed->id)}}">
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
	@if (Auth::user()->hasRole("admin"))
	<tr>
		<td><a href="{{route('adminBeds.create')}}">Create</a></td>
	</tr>
	@endif
</table>

@endsection
