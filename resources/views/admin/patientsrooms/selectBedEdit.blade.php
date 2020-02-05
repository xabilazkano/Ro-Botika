@extends('admin.layoutsAdmin.app')
<?php
  session_start();
  $_SESSION['section']="patientsRooms";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>{{__('messages.Seleccionar cama')}}</h2>
    <form id="selectBed" method="POST" action="{{route('bedAddEdit', $patient_room->id)}}">
      @csrf
      <div class="form-group row">
        <label for="bed" class="col-md-4 col-form-label text-md-right">{{__('messages.Cama')}}</label>
        <div class="col-md-6">
          <select class="form-control @error('bed') is-invalid @enderror" name="bed">
            <?php
              $camaA = true;
              $camaB = true;
              foreach ($patientsRooms as $patientRoom){
                if ($patientRoom->room_id == $patient_room->room_id  && $patientRoom->up_date<=date('Y-m-d') && ($patientRoom->down_date >= date('Y-m-d') || !isset($patientRoom->down_date))){
                  if ($patientRoom->bed === "A"){
                    if ($patientRoom->bed != $patient_room->bed){
                      $camaA = false;
                    }
                  }
                  if ($patientRoom->bed === "B"){
                    if ($patientRoom->bed != $patient_room->bed){
                      $camaB = false;
                    }
                  }
                }
              }
            ?>
            @if($camaA)
              <option value="A">A</option>
            @endif
            @if($camaB)
              <option value="B">B</option>
            @endif
          </select>
          @error('bed')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="col-md-6 offset-md-4 text-center">
        <input type="submit" class="btn btn-primary"
        value="{{__('messages.Añadir')}}">
      </div>
    </div>
  </form>
</main>
@endsection
