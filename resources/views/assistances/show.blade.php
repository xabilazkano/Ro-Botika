@extends('layouts.app')
@section('titulua', __('messages.ASISTENCIAS'))
@section('content')
<div class="row">
	<div class="col-1">
		<a href="{{route('assistances.index')}}"><i class="fa fa-arrow-left fa-2x text-dark"></i></a>
	</div>

</div>
<table class="table">
	<thead class="thead">
		<tr>
			<th>Id</th>
			<th>{{__('messages.Paciente')}}</th>
			<th>{{__('messages.Enfermera')}}</th>
			<th>{{__('messages.Fecha')}}</th>
			<th>{{__('messages.Medicinas')}}</th>
			<th>{{__('messages.Confirmado')}}</th>
		</tr>
	</thead>
	<tr>
		<td>{{$assist->id}}</td>
		<td>{{$assist->patient->name}} {{$assist->patient->lastname}}</td>
		<td>{{$assist->user->name}} {{$assist->user->lastname}}</td>
		<td>{{$assist->estimated_date}}</td>
		<td>
			@foreach ($assist->medicines as $medicine)
			{{$medicine->name}}
			@endforeach
		</td>
		<td>
			@if (is_null($assist->confirmed))
			<a href="{{route('assistances.index')}}"><i class="blackIcon fa fa-question"></i></a>
			@else
			<a href="{{route('assistances.index')}}"><i class="confirm blackIcon fa fa-check"></i></a>
			@endif
		</td>
	</tr>
</table><br><br>

@if (is_null($assist->confirmed))
<form action="{{route('confirmAssist',$assist->id)}}" method="post">
	@csrf

	<div class="col-md-6 offset-md-5">
		<input type="submit" class="btn btn-primary"
		value="{{__('messages.Confirmar asistencia')}}">
	</div>
</form>
@endif


@endsection
