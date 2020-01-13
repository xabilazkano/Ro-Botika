@extends('admin.layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>{{__('messages.Editar enfermera')}}</h2>
  <form id="editNurse" action="{{route('adminNurses.update',$nurse->id)}}" method="post">
    @csrf
    @method('put')
    <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">{{__('messages.Nombre')}}</label>
      <div class="col-md-6">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$nurse->name}}" id="name">

        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="lastname" class="col-md-4 col-form-label text-md-right">{{__('messages.Apellidos')}}</label>
      <div class="col-md-6">
        <input type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$nurse->lastname}}" id="lastname">

        @error('lastname')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-md-4 col-form-label text-md-right">{{__('messages.Email')}}</label>
      <div class="col-md-6">
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$nurse->email}}" id="email">

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
        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$nurse->email}}" id="password">

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
        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{$nurse->phone_number}}" id="phone_number">

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
        value="{{__('messages.Editar')}}">
      </div>
    </div>
    <br>
    <div class="col-md-12 d-flex justify-content-center">
      <p class="red" id="texto" style="display:none"></p>
    </div>
  </form>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#editNurse").submit(function(){
        let name = $('#name').val();
        let lastname = $('#lastname').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let phone_number = $('#phone_number').val();
        if (name === "" || lastname === ""|| email === ""|| password === ""|| phone_number === ""){
          $("#texto").show();
          $('#texto').text("{{__('messages.Inserte todos los campos')}}");
          return false;
        }else if(!email.match("^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$")){
          $("#texto").show();
          $('#texto').text("Inserte un correo electrónico válido");
          return false;
        }else if(password.length < 8){
          $("#texto").show();
          $('#texto').text("{{__('messages.La contraseña debe contener como mínimo 8 caractéres')}}");
          return false;
        }else if(isNaN(phone_number) || phone_number.length < 9 || phone_number.length > 9){
          $("#texto").show();
          $('#texto').text("{{__('messages.Inserte un número de teléfono válido')}}");
          return false;
        }else{
          return true
        }
      });
    });
  </script>
  @endsection
