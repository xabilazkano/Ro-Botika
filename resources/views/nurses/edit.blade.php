@extends('layouts.app')
@section('content')
<h2> {{$nurse->name}} {{$nurse->lastname}}</h2>
<form class="" action="{{route('adminNurses.update',$nurse->id)}}" method="post">
  @csrf
  @method('put')
  <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
    <div class="col-md-6">
      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$nurse->name}}">

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
      <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$nurse->lastname}}">

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
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$nurse->email}}">

      @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Número de teléfono</label>
    <div class="col-md-6">
      <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{$nurse->phone_number}}">

      @error('phone_number')
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
