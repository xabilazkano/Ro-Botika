@extends('admin.layoutsAdmin.app')
<?php
  session_start();
  $_SESSION['section']="assistances";
?>
@section('content')

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
	<div class="table-responsive">
		<h2>{{__('messages.Asistencia')}}</h2>
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
					<i class="blackIcon fa fa-question"></i>
					@else
					<i class="confirm blackIcon fa fa-check"></i>
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
	</div>
	</main
	@endsection
