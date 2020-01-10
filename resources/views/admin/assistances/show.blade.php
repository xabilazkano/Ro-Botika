@extends('layoutsAdmin.app')

@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
	<div class="table-responsive">
		<h2>Asistencia</h2>
		<table class="table">
			<thead class="thead">
				<tr>
					<th>Id</th>
					<th>Nombre del paciente</th>
					<th>Nombre de la enfermera</th>
					<th>Fecha</th>
					<th>Medicinas</th>
					<th>Confirmado</th>
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
				value="Confirmar asistencia">
			</div>
		</form>
		@endif
	</div>
	</main
	@endsection
