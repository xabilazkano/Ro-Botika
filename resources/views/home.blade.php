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
                @if(Auth::user()->hasRole('admin'))
                    {{__('messages.mensajeInicioSesionAdmin')}}
                @else
                    {{__('messages.mensajeInicioSesionStandar')}}
                @endif
            </div>
        </div>
    </div>
</div>
</section>
@endsection
