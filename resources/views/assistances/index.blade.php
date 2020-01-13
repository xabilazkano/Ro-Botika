@extends('layouts.app')
@section('titulua', __('messages.ASISTENCIAS'))
@section('content')
<table class="table">
	<thead class="thead">
		<tr>
			<th>Id</th>
			<th>{{__('messages.Paciente')}}</th>
			<th>{{__('messages.Enfermera')}}</th>
			<th>{{__('messages.Fecha')}}</th>
			<th>{{__('messages.Medicinas')}}</th>
			<th>{{__('messages.Confirmado')}}</th>
			<th></th>
		</tr>
	</thead>
	@foreach ($assistances as $assist)
		@if ($assist->estimated_date === date('Y-m-d'))
			<tr>
				<td>{{$assist->id}}</td>
				<td>{{$assist->patient->name}} {{$assist->patient->lastname}}</td>
				<td>{{$assist->user->name}}</td>
				<td>{{$assist->estimated_date}}</td>
				<td>
					@foreach ($assist->medicines as $medicine)
					{{$medicine->name}}
					@endforeach
				</td>
				<td>
					@if (is_null($assist->confirmed))
					<a href="{{route('assistances.index')}}"><i class=" blackIcon fa fa-question"></i></a>
					@else
					<a href="{{route('assistances.index')}}"><i class=" confirm fa fa-check"></i></a>
					@endif
				</td>
				<td>
					<a href="{{route('assistances.show',$assist->id)}}"><i class="blackIcon fa fa-eye"></i></a>
				</td>
			</tr>
		@endif
	@endforeach
</table>
@endsection
