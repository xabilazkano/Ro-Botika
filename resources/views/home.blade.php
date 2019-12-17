@extends('layouts.app')

@section('content')
<section class="masthead text-center">
   <div class="container d-flex align-items-center">
    <div class="col-md-6">
      <button type="button" class="btn btn-secondary d-flex flex-row">
        <i id="patienticon" class="fa fa-user" aria-hidden="true"></i>
        PACIENTES
      </button>
    </div>
    <div class="col-md-6">
      <button type="button" class="btn btn-secondary">Light</button>
    </div>
</div>
</section>
@endsection
