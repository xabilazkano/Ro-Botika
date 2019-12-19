@extends('layouts.app')

@section('content')
<section class="masthead text-center">
   <div class="container d-flex align-items-center">
    <div class="col-md-6">
      <button type="button" class="btn btn-secondary d-flex flex-row justify-content-around align-items-center">
        <i class="patienticon fa fa-user"></i>
        <h2>PACIENTES</h2>
      </button>
    </div>
    <div class="col-md-6">
      <button type="button" class="btn btn-secondary d-flex flex-row justify-content-around align-items-center">
        <i class="patienticon fas fa-procedures"></i>
        <h2>CAMAS</h2>
    </div>
</div>
</section>
@endsection
