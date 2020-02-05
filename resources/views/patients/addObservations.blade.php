@extends('layouts.app')
@section('titulua', 'Pacientes')
@section('content')

<form class="" action="{{route('storeObservations',$patient->id)}}" method="post">
	@csrf
	<div class="form-group row">
		<label for="observations" class="col-md-4 col-form-label text-md-right">{{__('messages.observations')}}</label>
		<div class="col-md-6">
			<textarea class="form-control @error('observations') is-invalid @enderror" name="observations">
				{{$patient->observations}}
			</textarea>
			@error('observations')
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
