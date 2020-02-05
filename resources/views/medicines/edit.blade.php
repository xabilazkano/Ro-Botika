@extends('layouts.app')
@section('titulua', 'Medicinas')
@section('content')
<div class="col-md-14 text-center">
	<form class="" action="{{route('adminMedicines.update',$medicine->id)}}" method="post">
		@csrf
		@method('put')
		<div class="form-group row">
			<label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
			<div class="col-md-6">
				<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$medicine->name}}">

				@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="amount" class="col-md-4 col-form-label text-md-right">Cantidad</label>
			<div class="col-md-6">
				<input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" value="{{$medicine->amount}}">

				@error('amount')
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
</div>
@endsection
