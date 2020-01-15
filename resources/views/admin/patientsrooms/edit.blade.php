@extends('admin.layoutsAdmin.app')
<?php
  session_start();
  $_SESSION['section']="patientsRooms";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>{{__('messages.Editar')}} {{__('messages.Paciente')}}-{{__('messages.Habitación')}}</h2>
  <form id="editPatientRoom" method="POST" action="{{route('adminPatientsRooms.update',$patientroom->id)}}">
    @csrf
    @method ('put')
    <div class="form-group row">
      <label for="patient" class="col-md-4 col-form-label text-md-right">{{__('messages.Paciente')}}</label>
      <div class="col-md-6">
        <select class="form-control @error('patient') is-invalid @enderror" name="patient">
          @foreach ($patients as $patient)
          @if ($patient->id === $patientroom->patient_id)
          <option value="{{$patient->id}}" selected="selected">{{$patient->name}}&nbsp;{{$patient->lastname}}</option>
          @else
          <option value="{{$patient->id}}">{{$patient->name}}&nbsp;{{$patient->lastname}}</option>
          @endif
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
      <label for="Room" class="col-md-4 col-form-label text-md-right">{{__('messages.Habitación')}}</label>
      <div class="col-md-6">
        <select class="form-control @error('room') is-invalid @enderror" name="room">
          @foreach ($rooms as $room)
          @if ($room->id === $patientroom->room_id)
          <option value="{{$room->id}}" selected="selected">{{$room->room_number}}</option>
          @else
          <option value="{{$room->id}}">{{$room->room_number}}</option>
          @endif
          @endforeach
        </select>
        @error('room')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="bed" class="col-md-4 col-form-label text-md-right">{{__('messages.Cama')}}</label>
      <div class="col-md-6">
        <select class="form-control @error('bed') is-invalid @enderror" name="bed">
          <option value="A">A</option>
          <option value="B">B</option>
        </select>
        @error('bed')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="desde" class="col-md-4 col-form-label text-md-right">{{__('messages.Desde')}}</label>
      <div class="col-md-6">
        <input type="date" class="form-control @error('desde') is-invalid @enderror" name="desde" id="desde" value="{{$patientroom->up_date}}">
        @error('desde')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="hasta" class="col-md-4 col-form-label text-md-right">{{__('messages.Hasta')}}</label>
      <div class="col-md-6">
        <input type="date" class="form-control @error('hasta') is-invalid @enderror" name="hasta" id="hasta" value="{{$patientroom->down_date}}">
        @error('hasta')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="col-md-6 offset-md-4 text-center">
      <input type="submit" class="btn btn-primary"
      value="{{__('messages.Editar')}}">
    </div>
    <br>
    <div class="col-md-12 d-flex justify-content-center">
      <p class="red" id="texto" style="display:none"></p>
    </div>
  </div>
</form>
<script type="text/javascript">
  $(document).ready(function(){
    $("#editPatientRoom").submit(function(){
      let desde = $('#desde').val();
      let hasta = $('#hasta').val();
      if (desde === "" || hasta === ""){
        $("#texto").show();
        $('#texto').text("{{__('messages.Inserta las dos fechas')}}");
        return false;
      }else{
        return true;
      }
    });
  });
</script>
</main>
@endsection
