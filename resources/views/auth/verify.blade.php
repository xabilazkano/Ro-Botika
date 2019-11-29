@extends('layouts.app')

@section('content')
<section class="masthead text-center">
 <div class="container d-flex align-items-center flex-column">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('messages.Verificar email') }}</div>

        <div class="card-body">
          @if (session('resent'))
          <div class="alert alert-success" role="alert">
            {{ __('messages.mensajeVerificacion')}}
          </div>
          @endif

          {{ __('messages.mensajeVerificacion2') }}
          {{ __('messages.mensajeVerificacion3') }},
          <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('messages.mensajeVerificacion4') }}</button>.
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
