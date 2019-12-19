<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
<body>
  <div class="row">
    <div class="col-12 content">
      <main class="pt-4 pr-4 pl-4 pb-0">
        <section class="masthead text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image -->
                <img class="masthead-avatar mb-3" src="img/robot.png" style="height:135px;width:100px;margin-top:22px" alt="">
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
            <div class="container d-flex align-items-center flex-column" style="width:100%;">
                <p class="masthead-subheading font-weight-light mb-0">
                    {{ __('messages.inicioParrafo1') }}
                    <br><br>
                    {{ __('messages.inicioParrafo2') }}
                </p>
            </div>
        </section>
      </main>
    </div>
  </div>
</body>
</html>
