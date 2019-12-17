@extends('layouts.app')
@section('content')
@if (Session::has('warning'))
<script>
//Muestra exista una notificación
$(function() {
    $('#errorModal').modal('show');
});
</script>
@endif
<section class="masthead text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image -->
        <img class="masthead-avatar" src="img/robot.png" alt="">
        <!-- Masthead Heading -->
        <h1 class="masthead-heading text-uppercase">Ro-Botika</h1>
        <!-- Icon Divider -->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading -->
        <p class="masthead-subheading font-weight-light">{{ __('messages.Carro medicinal automático') }}</p>

    </div>
</section>
<script type="text/javascript">
  $(document).ready(function() {
    $("#contactForm").submit(function(){
      nombre = $('#nameWelcome').val();
      email = $('#emailWelcome').val();
      mensaje = $('#message').val();
      if (nombre === "" || email === "" || mensaje === ""){
        $("#textoWelcome").show();
        $('#textoWelcome').val("{{__('messages.Inserte todos los campos')}}");
        return false;
      }else{
        return true;
      }
  	});
  });
</script>
@endsection
