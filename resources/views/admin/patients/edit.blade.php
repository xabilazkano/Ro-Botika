@extends('layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>Editar paciente {{$patient->id}}</h2>
  <form class="" action="{{route('adminPatients.update',$patient->id)}}" method="post">
    @csrf
    @method('put')
    <div class="form-group row">
      <label for="ss_number" class="col-md-4 col-form-label text-md-right">Número de la sefuridad social</label>
      <div class="col-md-6">
        <input type="text" value="{{$patient->ss_number}}" class="form-control @error('ss_number') is-invalid @enderror" name="ss_number">
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
        <input type="text" value="{{$patient->name}}" class="form-control @error('name') is-invalid @enderror" name="name">
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
        <input type="text" value="{{$patient->lastname}}" class="form-control @error('lastname') is-invalid @enderror" name="lastname">
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
        <input type="text" value="{{$patient->disease}}" class="form-control @error('disease') is-invalid @enderror" name="disease">
        @error('disease')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-6">
        <input type="submit" class="btn btn-primary"
        value="Editar">
      </div>
    </div>
  </form>
</main>
@endsection
