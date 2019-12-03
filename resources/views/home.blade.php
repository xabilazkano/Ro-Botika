@extends('layouts.app')

@section('content')
<section class="masthead text-center">
   <div class="container d-flex align-items-center flex-column">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif
                {{__('messages.mensajeInicioSesion') . Auth::user()->type_of_user}}
                @if(Auth::user()->hasRole('admin'))
                    Acceso como administrador
                @else
                    Acceso usuario
                @endif
                You are logged in!
            </div>
        </div>
    </div>
</div>
</section>
@endsection
