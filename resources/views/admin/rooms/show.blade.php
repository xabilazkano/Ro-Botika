@extends('layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
	  <h2>{{__('messages.Habitación')}}</h2>
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
		</tr>
	</table>
</main>
@endsection
