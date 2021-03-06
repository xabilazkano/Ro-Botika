@extends('layouts.app')
@section('titulua', __('messages.PACIENTES'))
@section('content')
<div class="row">
	<div class="col-1">
		<a href="{{route('patients.index')}}"><i class="fa fa-arrow-left fa-3x text-dark"></i></a>
	</div>
</div>
<div class="table-responsive">
	<table class="table">
		<thead class="thead">
			<tr>
				<th scope="col">{{__('messages.numeross')}}</th>
				<th scope="col">{{__('messages.Nombre')}}</th>
				<th scope="col">{{__('messages.Apellido')}}</th>
			</tr>
		</thead>
		<tr>
			<td>{{$patient->ss_number}}</td>
			<td>{{$patient->name}}</td>
			<td>{{$patient->lastname}}</td>
		</th>
	</table>
</div><br><br>
<div class="row justify-content-center">
	<div class="observaciones col-8">
		<h2 class="row">
	    <span class="col-3">{{__('messages.observations')}}</span>

	    <a href="{{route('addObservations',$patient->id)}}" class="col-1"><i class="fas fa-plus"></i></a>

	  </h2>
		<p>{{$patient->observations}}</p>
	</div>
</div>
@endsection
