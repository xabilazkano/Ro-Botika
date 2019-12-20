@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<a href="{{route('adminBeds.create')}}">Add bed</a><br><br>
	<table>
		<tr>
			<th>ID</th>
			<th>Floor</th>
			<th>Room</th>
			<th>Bed</th>
			<th>Patient</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
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
			<td><a href="{{route('adminBeds.edit',$bed->id)}}"><i class="fa fa-edit"></i></a></td>
			<td>
				<form method="post" action="{{route('adminBeds.destroy',$bed->id)}}">
					@csrf
					@method('DELETE')
					<button type="submit" class="btn btn-success">
						<i class="fa fa-trash-alt"></i>
					</button>
				</form>
			</td>
		</tr>
		@endforeach
	</table>
</div>
@endsection
