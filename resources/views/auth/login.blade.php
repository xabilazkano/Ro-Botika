@extends('layouts.app')

@section('content')
<section class="text-center">
 <div class="container d-flex align-items-center flex-column">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{ __('messages.Iniciar sesión') }}</div>

      <div class="card-body">
        <form id="formulariologin" method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.Email') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.Contraseña') }}</label>

            <div class="col-md-6">
              <input id="contraseña" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row mb-0 col-10">
            <div class="col-md-8 offset-md-4">
              <input type="submit" class="btn btn-primary" value="{{ __('messages.Iniciar sesión') }}">
              <input type="text" class="form-control" id="texto" style="display:none" readonly>
            </div>
          </div>
        </form>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#formulariologin").submit(function(){
              let email = $('#email').val();
              let contraseña = $('#contraseña').val();
              if (email === "" || contraseña === ""){
                $("#texto").show();
                $('#texto').val("{{__('messages.Inserte todos los campos')}}");
                return false;
              }else{
                return true;
              }
            });
          });
        </script>
    </div>
    </div>
  </div>
</div>
</section>
@endsection
