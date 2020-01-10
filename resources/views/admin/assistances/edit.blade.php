@extends('layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">

    <h2>Editar asistencia {{$assistance->id}}</h2>
    <form id="editAssist" method="POST" action="{{route('adminAssistances.update',$assistance->id)}}">
      @csrf
      @method ('put')
      <div class="form-group row">
        <label for="patient" class="col-md-4 col-form-label text-md-right">Nombre del paciente</label>

        <div class="col-md-6">
          <select class="form-control @error('patient') is-invalid @enderror" name="patient">
            @foreach ($patients as $patient)
              @if ($patient->id === $assistance->patient->id)
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
        <label for="nurse" class="col-md-4 col-form-label text-md-right">Nombre del enfermer@</label>
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
        <label for="date" class="col-md-4 col-form-label text-md-right">Fecha estimada</label>
        <div class="col-md-6">
          <input id="fecha" type="date" name="date" value="{{$assistance->estimated_date}}" class="form-control @error('date') is-invalid @enderror">

          @error('date')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

        <div class="col-md-6 offset-md-4 text-center">
          <a href="{{route('assistMedicines.edit',$assistance->id)}}">Editar medicinas</a><br><br>
        </div>


        <div class="col-md-6 offset-md-4 text-center">
          <input type="submit" class="btn btn-primary"
          value="Editar">
        </div>
        <br>
        <div class="col-md-12 d-flex justify-content-center">
          <p id="texto" style="display:none"></p>
        </div>
      </div>

    </form>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#editAssist").submit(function(){
          let fecha = $('#fecha').val();
          console.log(fecha);
          if (fecha === ""){
            $("#texto").show();
            $('#texto').text("Inserta una fecha estimada");
            return false;
          }else{
            return true;
          }
        });
      });
    </script>

</main>
@endsection
