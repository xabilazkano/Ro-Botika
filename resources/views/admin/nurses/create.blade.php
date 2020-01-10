@extends('layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>Añadir enfermero</h2>
  <form class="" action="{{route('adminNurses.store')}}" method="post">
    @csrf
    <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
      <div class="col-md-6">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Request::old('name')}}">

        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="lastname" class="col-md-4 col-form-label text-md-right">Apellidos</label>
      <div class="col-md-6">
        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{Request::old('lastname')}}">

        @error('lastname')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
      <div class="col-md-6">
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Request::old('email')}}">

        @error('email')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
      <div class="col-md-6">
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">

        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="phone_number" class="col-md-4 col-form-label text-md-right">Número de teléfono</label>
      <div class="col-md-6">
        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{Request::old('phone_number')}}">

        @error('phone_number')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-6">
        <input type="submit" class="btn btn-primary"
        value="Añadir">
      </div>
    </div>
  </form>
</main>
@endsection
