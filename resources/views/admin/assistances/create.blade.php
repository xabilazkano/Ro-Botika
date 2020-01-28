@extends('admin.layoutsAdmin.app')
<?php
  session_start();
  $_SESSION['section']="assistances";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>{{__('messages.Añadir asistencia')}}</h2>
  <form id="addAssist" method="POST" action="{{route('adminAssistances.store')}}">
    @csrf
    <div class="form-group row">
      <label for="patient" class="col-md-4 col-form-label text-md-right">{{__('messages.Paciente')}}</label>

      <div class="col-md-6">
        <select class="form-control @error('patient') is-invalid @enderror" name="patient">
          @foreach ($patients as $patient)
            @foreach ($patient->rooms as $room)
              @if ($room->pivot->up_date <= date('Y-m-d') && ($room->pivot->down_date >= date('Y-m-d') || $room->pivot->down_date === null))
                <option value="{{$patient->id}}">{{$patient->name}}{{$patient->surname}}</option>
              @endif
            @endforeach
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
      <label for="nurse" class="col-md-4 col-form-label text-md-right">{{__('messages.Enfermera')}}</label>
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
      <label for="date" class="col-md-4 col-form-label text-md-right">{{__('messages.Fecha')}}</label>
      <div class="col-md-6">
        <input type="date" id="fecha" name="date" class="form-control @error('date') is-invalid @enderror">

        @error('date')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="medicine" class="col-md-4 col-form-label text-md-right">{{__('messages.Medicinas')}}</label>
      <div class="col-md-6">
        <select multiple class="form-control @error('medicines') is-invalid @enderror" name="medicines[]">
          @foreach ($medicines as $medicine)
          <option value="{{$medicine->id}}">{{$medicine->name}}{{$medicine->surname}}</option>
          @endforeach
        </select>

        @error('medicines')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-6">
        <input type="submit" class="btn btn-primary"
        value="{{__('messages.Añadir')}}">
      </div>
    </div><br>
    <div class="col-md-12 d-flex justify-content-center">
      <p class="red" id="texto" style="display:none"></p>
    </div>
  </form>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#addAssist").submit(function(){
        let fecha = $('#fecha').val();
        console.log(fecha);
        if (fecha === ""){
          $("#texto").show();
          $('#texto').text("{{__('messages.Inserta una fecha')}}");
          return false;
        }else{
          return true;
        }
      });
    });
  </script>
</main>
@endsection
