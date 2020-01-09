@extends('layouts.app')
@section('titulua', 'Asistencias')
@section('content')
<h2>Editar asistencia {{$assistance->id}}</h2>
<form id="editAssist" method="POST" action="{{route('adminAssistances.update',$assistance->id)}}">
  @csrf
  @method ('put')
  <div class="form-group row">
    <label for="patient" class="col-md-4 col-form-label text-md-right">Nombre del paciente</label>

    <div class="col-md-6">
      <select class="form-control @error('patient') is-invalid @enderror" name="patient">
        @foreach ($patients as $patient)
        <option value="{{$patient->id}}">{{$patient->name}}{{$patient->surname}}</option>
        @endforeach
      </select>

      @error('patient')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="nurse" class="col-md-4 col-form-label text-md-right">Nombre del enfermer@</label>
    <div class="col-md-6">
      <select class="form-control @error('nurse') is-invalid @enderror" name="nurse">
        @foreach ($nurses as $nurse)
        <option value="{{$nurse->id}}">{{$nurse->name}}{{$nurse->surname}}</option>
        @endforeach
      </select>

      @error('nurse')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="date" class="col-md-4 col-form-label text-md-right">Fecha estimada</label>
    <div class="col-md-6">
      <input type="date" name="date" class="form-control @error('date') is-invalid @enderror">

      @error('date')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
  </div>
  <div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4 text-center">
      <a href="{{route('assistMedicines.edit',$assistance->id)}}">Editar medicinas</a><br><br>
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
