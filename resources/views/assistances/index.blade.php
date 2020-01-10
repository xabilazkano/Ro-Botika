@extends('layouts.app')
@section('titulua', 'Asistencias')
@section('content')
<h2 class="row">
	@if (Auth::user()->hasRole("admin"))
	<a href="{{route('adminAssistances.create')}}" class="col-1"><i class="fa fa-plus"></i></a>
	@endif
</h2>
<table class="table">
	<thead class="thead">
		<tr>
			<th>Id</th>
			<th>Nombre del paciente</th>
			<th>Nombre de la enfermera</th>
			<th>Fecha</th>
			<th>Medicinas</th>
			<th>Confirmado</th>
			<th></th>
			@if (Auth::user()->hasRole("admin"))
			<th></th>
			<th></th>
			@endif
		</tr>
	</thead>
	@foreach ($assistances as $assist)
	<tr>
		<td>{{$assist->id}}</td>
		<td>{{$assist->patient->name}}  {{$assist->patient->lastname}}</td>
		<td>{{$assist->user->name}} {{$assist->user->lastname}}</td>
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
		@if (Auth::user()->hasRole("admin"))
		<td><a href="{{route('adminAssistances.edit',$assist->id)}}"><i class="blackIcon fa fa-edit"></i></a>
		</td>
		<td>
			<form method="post" action="{{route('adminAssistances.destroy',$assist->id)}}">
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
@endsection
