@extends('admin.layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>{{__('messages.Añadir paciente')}}</h2>
  <form id="addPatient" action="{{route('adminPatients.store')}}" method="post">
    @csrf
    <div class="form-group row">
      <label for="ss_number" class="col-md-4 col-form-label text-md-right">{{ __('messages.numeross') }}</label>
      <div class="col-md-6">
        <input type="text" value="{{Request::old('ss_number')}}" class="form-control @error('ss_number') is-invalid @enderror" name="ss_number" id="ss_number">
        @error('ss_number')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Nombre') }}</label>
      <div class="col-md-6">
        <input type="text" value="{{Request::old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('messages.Apellido') }}</label>
      <div class="col-md-6">
        <input type="text" value="{{Request::old('lastname')}}" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="lastname">
        @error('lastname')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="disease" class="col-md-4 col-form-label text-md-right">{{ __('messages.enfermedad') }}</label>
      <div class="col-md-6">
        <input type="text" value="{{Request::old('disease')}}" class="form-control @error('disease') is-invalid @enderror" name="disease" id="disease">
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
        value="{{__('messages.Añadir')}}">
      </div>
    </div>
    <br>
    <div class="col-md-12 d-flex justify-content-center">
      <p class="red" id="texto" style="display:none"></p>
    </div>
  </form>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#addPatient").submit(function(){
        let name = $('#name').val();
        let lastname = $('#lastname').val();
        let ss_number = $('#ss_number').val();
        let disease = $('#disease').val();
        if (name === "" || lastname === ""|| ss_number === ""|| disease === ""){
          $("#texto").show();
          $('#texto').text("{{__('messages.Inserte todos los campos')}}");
          return false;
        }else if(!ss_number.match("^[0-9]{11}")){
          $("#texto").show();
          $('#texto').text("Inserte un número de la seguridad social válido");
          return false;
        }else{
          return true
        }
      });
    });
  </script>
</main>
@endsection
