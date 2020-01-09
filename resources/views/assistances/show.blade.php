@extends('layouts.app')
@section('titulua', 'Asistencias')
@section('content')
<h2>Asistencia</h2>
<table>
	<tr>
		<th>Id</th>
		<th>Nombre del paciente</th>
		<th>Nombre de la enfermera</th>
		<th>Fecha</th>
		<th>Medicinas</th>
		<th>Confirmado</th>
	</tr>
	<tr>
		<td>{{$assist->id}}</td>
		<td>{{$assist->patient->name}}</td>
		<td>{{$assist->nurse_id}}</td>
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
¿Quieres confirmar la asistencia?
<form action="{{route('confirmAssist',$assist->id)}}" method="post">
	@csrf
	<input type="submit" value="Confirmar">
</form>
@endif


@endsection
