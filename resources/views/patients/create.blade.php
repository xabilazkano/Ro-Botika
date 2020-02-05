@extends('layouts.app')
@section('titulua', 'Pacientes')
@section('content')
<h2>Añadir paciente</h2>
<form class="" action="{{route('adminPatients.store')}}" method="post">
	@csrf
	<div class="form-group row">
		<label for="ss_number" class="col-md-4 col-form-label text-md-right">Número de la sefuridad social</label>
		<div class="col-md-6">
			<input type="text" value="{{Request::old('ss_number')}}" class="form-control @error('ss_number') is-invalid @enderror" name="ss_number">
			@error('ss_number')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
		<div class="col-md-6">
			<input type="text" value="{{Request::old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name">
			@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="lastname" class="col-md-4 col-form-label text-md-right">Apellido</label>
		<div class="col-md-6">
			<input type="text" value="{{Request::old('lastname')}}" class="form-control @error('lastname') is-invalid @enderror" name="lastname">
			@error('lastname')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="form-group row">
		<label for="disease" class="col-md-4 col-form-label text-md-right">Disease</label>
		<div class="col-md-6">
			<input type="text" value="{{Request::old('disease')}}" class="form-control @error('disease') is-invalid @enderror" name="disease">
			@error('disease')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="form-group row mb-0">
		<div class="col-md-6 offset-md-4">
			<input type="submit" class="btn btn-primary"
			value="Editar">
		</div>
	</div>
</form>
@endsection
