@extends('layouts.app')
@section('titulua', 'Asistencias')
@section('content')
<div class="row">
	<div class="col-1">
		<a href="{{route('assistances.index')}}"><i class="fa fa-arrow-left fa-2x text-dark"></i></a>
	</div>
	<div class="col-11">
		<h2>Editar medicinas de asistencia {{$assistance->id}}</h2>
	</div>
</div>
@if (!is_null($assistance->medicines))
<table class="table">
	<thead class="thead">
		<tr>
			<th>Id</th>
			<th></th>
		</tr>
	</thead>
	@foreach($assistance->medicines as $medicine)
	<tr>
		<td>{{$medicine->name}}</td>
		<td>
			<form method="post" action="{{route('medicineDestroy',[$assistance->id,$medicine->id])}}">
				@csrf
				<button type="submit" class="deleteIcon">
					<i class="fa fa-trash-o"></i>
				</button>
			</form>
		</td>
	</tr>
	@endforeach
</table><br><br>
@endif
<form id="editAssist" method="POST" action="{{route('medicineAdd',$assistance->id)}}">
	@csrf
	<div class="form-group row">
		<label for="medicine" class="col-md-4 col-form-label text-md-right">Medicinas</label>
		<div class="col-md-6">
			<select multiple class="form-control @error('medicines') is-invalid @enderror" name="medicines[]">
				@foreach ($medicines as $medicine)
				<option value="{{$medicine->id}}">{{$medicine->name}}{{$medicine->surname}}</option>
				@endforeach
			</select>

			@error('medicines')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="form-group row mb-0">
		<div class="col-md-6 offset-md-4">
			<input type="submit" class="btn btn-primary"
			value="Añadir medicina">
		</div>
	</div>
</form>
@endsection
