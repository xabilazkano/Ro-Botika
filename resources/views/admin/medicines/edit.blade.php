@extends('admin.layoutsAdmin.app')
<?php
  session_start();
  $_SESSION['section']="medicines";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2>{{__('messages.Editar medicina')}}</h2>
  <form id="editMedicine" action="{{route('adminMedicines.update',$medicine->id)}}" method="post">
    @csrf
    @method('put')
    <div class="form-group row">
      <label for="name" class="col-md-4 col-form-label text-md-right">{{__('messages.Nombre')}}</label>
      <div class="col-md-6">
        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{$medicine->name}}">

        @error('name')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
    </div>
    <div class="form-group row">
      <label for="amount" class="col-md-4 col-form-label text-md-right">{{__('messages.Cantidad')}}</label>
      <div class="col-md-6">
        <input type="text" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount" value="{{$medicine->amount}}">

        @error('amount')
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
      $("#editMedicine").submit(function(){
        let name = $('#name').val();
        let amount = $('#amount').val();
        if (name === "" || amount === ""){
          $("#texto").show();
          $('#texto').text("{{__('messages.Inserte todos los campos')}}");
          return false;
        }else{
          return true
        }
      });
    });
  </script>
</main>
@endsection
