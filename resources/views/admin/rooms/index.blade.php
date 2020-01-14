@extends('admin.layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
	<h2 class="row">
		<span class="col-11">{{__('messages.Habitaciones')}}</span>
		@if (Auth::user()->hasRole("admin"))
		<a href="{{route('adminRooms.create')}}" class="col-1"><i class="fa fa-plus"></i></a>
		@endif
	</h2>
	<table class="table">
		<thead class="thead">
			<tr>
				<th>ID</th>
				<th>{{__('messages.planta')}}</th>
				<th>{{__('messages.numerohabitacion')}}</th>
				<th>{{__('messages.camas')}}</th>
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
</main>
@endsection
