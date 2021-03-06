@extends('admin.layoutsAdmin.app')
<?php
  session_start();
  $_SESSION['section']="assistances";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">

    <h2>{{__('messages.Editar asistencia')}}</h2>
    <form id="editAssist" method="POST" action="{{route('adminAssistances.update',$assistance->id)}}">
      @csrf
      @method ('put')
      <div class="form-group row">
        <label for="patient" class="col-md-4 col-form-label text-md-right">{{__('messages.Paciente')}}</label>

        <div class="col-md-6">
          <select class="form-control @error('patient') is-invalid @enderror" name="patient">
            @foreach ($patients as $patient)
              @foreach ($patient->rooms as $room)
                @if ($room->pivot->up_date <= date('Y-m-d') && ($room->pivot->down_date >= date('Y-m-d') || $room->pivot->down_date === null))
                  @if ($patient->id === $assistance->patient->id)
                    <option value="{{$patient->id}}" selected="selected">{{$patient->name}}&nbsp;{{$patient->lastname}}</option>
                  @else
                    <option value="{{$patient->id}}">{{$patient->name}}&nbsp;{{$patient->lastname}}</option>
                  @endif
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
              @if ($nurse->id === $assistance->user->id)
                <option value="{{$nurse->id}}" selected="selected">{{$nurse->name}}&nbsp;{{$nurse->lastname}}</option>
              @else
                <option value="{{$nurse->id}}">{{$nurse->name}}&nbsp;{{$nurse->lastname}}</option>
              @endif
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
          <input id="fecha" type="date" name="date" value="{{$assistance->estimated_date}}" class="form-control @error('date') is-invalid @enderror">

          @error('date')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
      <div class="form-group row">
        <label for="hour" class="col-md-4 col-form-label text-md-right">{{__('messages.Hora')}}</label>
        <div class="col-md-6">
          <input id="hora" type="time" name="hour" value="{{$assistance->hour}}" class="form-control @error('hour') is-invalid @enderror">

          @error('hour')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

        <div class="col-md-6 offset-md-4 text-center">
          <a href="{{route('assistMedicines.edit',$assistance->id)}}">{{__('messages.Editar medicinas')}}</a><br><br>
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
        $("#editAssist").submit(function(){
          let fecha = $('#fecha').val();
          let hora = $('#hora').val();
          if (fecha === "" || hora === ""){
            $("#texto").show();
            $('#texto').text("{{__('messages.Inserta una fecha y una hora para la asistencia')}}");
            return false;
          }else{
            return true;
          }
        });
      });
    </script>

</main>
@endsection
