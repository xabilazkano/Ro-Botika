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
            @if ($patient->rooms->isEmpty() || $patient->id === $patientroom->patient_id)
              <option value="{{$patient->id}}">{{$patient->name}}&nbsp;{{$patient->lastname}}</option>
            @else
              @foreach ($patient->rooms as $room)
                @if ($room->pivot->down_date < date('Y-m-d') && isset($room->pivot->down_date))
                  <option value="{{$patient->id}}">{{$patient->name}}&nbsp;{{$patient->lastname}}</option>
                @endif
              @endforeach
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
            <?php
              $camasOcupadas = 0;
              foreach ($patientsRooms as $patientRoom){
                if ($patientRoom->room_id == $room->id  && $patientRoom->up_date<=date('Y-m-d') && ($patientRoom->down_date >= date('Y-m-d') || !isset($patientRoom->down_date))){
                  $camasOcupadas++;
                }
              }
            ?>
            @if ($room->id == $patientroom->room_id)
              <option value="{{$room->id}}" selected>{{$room->id}}</option>
            @elseif ($camasOcupadas < 2)
              <option value="{{$room->id}}">{{$room->id}}</option>
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
    <div class="form-group row">
      <label for="disease" class="col-md-4 col-form-label text-md-right">{{ __('messages.enfermedad') }}</label>
      <div class="col-md-6">
        <input type="text" value="{{$patientroom->disease}}" class="form-control @error('disease') is-invalid @enderror" name="disease" id="disease">
        @error('disease')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="col-md-6 offset-md-4 text-center">
      <input type="submit" class="btn btn-primary"
      value="{{__('messages.Seleccionar cama')}}">
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
      if (desde === ""){
        $("#texto").show();
        $('#texto').text("{{__('messages.Inserta la fecha')}}");
        return false;
      }else{
        return true;
      }
    });
  });
</script>
</main>
@endsection
