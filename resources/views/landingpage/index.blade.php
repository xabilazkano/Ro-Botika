<!DOCTYPE html>
<html lang="en">
@include('landingpage.layouts.head')
<body id="page-top">
        @include('landingpage.layouts.nav')
        <section class="masthead text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image -->
                <img class="masthead-avatar mb-5" src="img/robot.png" alt="">
                <!-- Masthead Heading -->
                <h1 class="masthead-heading text-uppercase mb-0">Ro-Botika</h1>
                <!-- Icon Divider -->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading -->
                <p class="masthead-subheading font-weight-light mb-0">{{ __('messages.Carro medicinal automático') }}</p>

            </div>
        </section>
        <section class="masthead bg-primary">
            <div class="container d-flex align-items-center flex-column">
                <p class="masthead-subheading font-weight-light mb-0">
                    {{ __('messages.inicioParrafo1') }}
                    <br><br>
                    {{ __('messages.inicioParrafo2') }}
                </p>
            </div>
        </section>
        <!-- Contact Section -->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Form -->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                     <div class="card">
                        <div class="card-header">{{ __('messages.Contacta con nosotros') }}</div>

                        <div class="card-body">
                            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                            <form name="contactForm" id="contactForm" action="{{route('store')}}" method="post">
                                @csrf

                                <div class="form-group controls mb-0 pb-2">
                                    <label>{{__('messages.Nombre')}}</label>
                                    <input class="form-control" name="name" type="text" id="nameWelcome">
                                    @if ($errors->has('name'))
                                    <b>{{$errors->first('name')}}</b>
                                    @endif
                                </div>

                                <div class="form-group controls mb-0 pb-2">
                                    <label>{{__('messages.Email')}}</label>
                                    <input class="form-control" name="email" type="text" id="emailWelcome">
                                    @if ($errors->has('email'))
                                    <b>{{$errors->first('email')}}</b>
                                    @endif
                                </div>

                                <div class="form-group controls mb-0 pb-2">
                                    <label>{{__('messages.Mensaje')}}</label>
                                    <textarea class="form-control" name="message" id="message"></textarea>
                                    @if ($errors->has('message'))
                                    <b>{{$errors->first('message')}}</b>
                                    @endif
                                </div>

                                <br>
                                <div id="success"></div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary btn-xl" id="sendMessageButton" value="{{__('messages.Enviar')}}"><br><br>
                                    <input type="text" class="form-control" name="textoWelcome" id="textoWelcome" style="display:none" readonly>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
              }else if(!email.match("^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$")){
                $("#textoWelcome").show();
                $('#textoWelcome').val("{{__('messages.Inserte un correo electrónico válido')}}");
                return false;
              }else{
                return true;
              }
          	});
          });
        </script>
@include ('landingpage.layouts.footer')

</body>
</html>
