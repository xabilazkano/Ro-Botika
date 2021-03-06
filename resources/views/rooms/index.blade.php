@extends('layouts.app')
@section('titulua', __('messages.HABITACIONES'))
@section('content')
<div class="table-responsive">
<table class="table">
	<thead class="thead">
		<tr>
			<th>{{__('messages.planta')}}</th>
			<th>{{__('messages.numerohabitacion')}}</th>
			<th>{{__('messages.camas')}}</th>
			<th>{{__('messages.Pacientes')}}</th>
			<th></th>
		</tr>
	</thead>
	@foreach ($rooms as $room)
				<tr>
					<td>{{$room->floor}}</td>
					<td>{{$room->id}}</td>
					<td>{{$room->beds}}</td>
					<td>
					@foreach ($room->patients as $patient)
						@if ($patient->pivot->up_date <= date('Y-m-d') && ($patient->pivot->down_date >= date('Y-m-d') || $patient->pivot->down_date === null))
							<a href="{{route('patients.show',$patient->id)}}">{{$patient->name}} {{$patient->lastname}}</a><br>
						@endif
					@endforeach
				</td>
				<td><a href="{{route('rooms.show',$room->id)}}"><i class="blackIcon fa fa-eye"></i></a></td>
				</tr>
	@endforeach
</table>
</div>
<script type="text/javascript">
$(document).ready( function () {
    $("table").DataTable();
} );

</script>
@endsection
