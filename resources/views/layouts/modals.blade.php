<!-- The Modal -->
<div class="modal" id="registroModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">{{ __('messages.Registrarse') }}</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="registerForm" method="POST" action="{{route('register')}}">
          @csrf

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Nombre') }}</label>

            <div class="col-md-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}">

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
              <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}">

              @error('lastname')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.Email') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

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
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('messages.Confirmar contraseña') }}</label>

            <div class="col-md-6">
              <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
            </div>
          </div>

          <div class="form-group row">
            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('messages.Número de teléfono') }}</label>

            <div class="col-md-6">
              <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}">

              @error('phone_number')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="radio" class="col-md-7 col-form-label text-md-right">{{ __('messages.Tipo de usuario') }}</label>
            </div>
            <div id="radio" class="col-md-5">
              <input id="standar" type="radio"  name="type" checked value="standar">{{__('messages.Estándar')}}
              <input id="admin" type="radio"  name="type" value="admin"> Admin
            </div>
          </div>



          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <input type="submit" class="btn btn-primary"
                value="{{ __('messages.Registrarse')}}">
            </div><br><br><br>
            <div class="col-md-12 offset-md-12">
              <input type="text" class="form-control" id="textRegister" style="display:none" readonly>
            </div>
          </div>
        </form>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#registerForm").submit(function(){
              nombre = $('#name').val();
              apellido = $('#surname').val();
              email = $('#email').val();
              contraseña = $('#password').val();
              contraseña2 = $('#password_confirmation').val();
              numeroTelefono = $('#phone_number').val();
              if (nombre === "" || email === ""|| contraseña === ""|| apellido === ""|| contraseña2 === ""|| numeroTelefono === ""){
                $("#textRegister").show();
                $('#textRegister').val("{{__('messages.Inserte todos los campos')}}");
                return false;
              }else if(contraseña !== contraseña2){
                $("#textRegister").show();
                $('#textRegister').val("{{__('messages.Las contraseñas deben coincidir')}}");
                return false;
              }else if(isNaN(numeroTelefono) || numeroTelefono.length < 9 || numeroTelefono.length >9){
                $("#textRegister").show();
                $('#textRegister').val("{{__('messages.Inserte un número de teléfono válido')}}");
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
<!-- Modal Login-->
<div class="modal" id="loginModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">{{ __('messages.Iniciar sesión') }}</h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form id="loginForm" method="POST" action="{{route('login')}}">
          @csrf
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.Email') }}</label>
            <div class="col-md-6">
              <input id="emailLog" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">
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
              <input id="passwordLog" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <input type="submit" class="btn btn-primary" value="{{ __('messages.Iniciar sesión') }}">
            </div><br><br><br>
            <div class="col-md-12 offset-md-12">
              <input type="text" class="form-control" id="textLogin" style="display:none" readonly>
            </div>
          </div>
        </form>
        <script type="text/javascript">
          $(document).ready(function(){
            $("#loginForm").submit(function(){
              email = $('#emailLog').val();
              contraseña = $('#passwordLog').val();
              if (email === ""|| contraseña === ""){
                $("#textLogin").show();
                $('#textLogin').val("{{__('messages.Inserte todos los campos')}}");
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
<!-- Modal Error-->
<div class="modal" id="errorModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Error</h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      {{  Session::get('warning')}}
      
      </div>
    </div>
  </div>
</div>