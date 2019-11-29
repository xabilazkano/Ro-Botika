@extends('layouts.app')

@section('content')
<section class="masthead text-center">
 <div class="container d-flex align-items-center flex-column">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header">{{ __('messages.Modificar') }}</div>

      <div class="card-body">
        <form method="POST" action="{{ route('usuarios.update',Auth::user()->id) }}">
          @csrf
          @method('PUT')

          <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Nombre') }}</label>

            <div class="col-md-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>

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
              <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ Auth::user()->lastname}}" required autocomplete="lastname" autofocus>

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
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.Email') }}</label>

            <div class="col-md-6">
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

              @error('password')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('messages.Número de teléfono') }}</label>

            <div class="col-md-6">
              <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ Auth::user()->phone_number }}" required autocomplete="new-phone-number">

              @error('phone_number')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <div class="col-md-6">
              <label for="radio" class="col-md-6 col-form-label text-md-right">{{ __('messages.Tipo de usuario') }}</label>
            </div>
            <div id="radio" class="col-md-10">
              <input id="standar" type="radio"  name="type" checked value="standar"> {{__('messages.Estándar')}}
              <input id="admin" type="radio"  name="type" value="admin"> Admin
            </div>
          </div>

          <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('messages.Modificar') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</section>
@endsection
