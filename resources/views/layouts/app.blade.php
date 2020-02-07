<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
  <div id="bloqueo" class="d-flex flex-column justify-content-center">
    <i class="blockicon fa fa-lock" style="text-align: center"></i>
    <img src="/img/logo.png"/>
    <p class="blockparrafo">Ro-Botika &copy;	2019-2020	<br> help@robotika.eus . +34 654 234 673</p>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-12 content">
        @include('layouts.nav')
        <main class="">
          @yield('content')
        </main>
      </div>
    </div>
  </div>

  <script>
  $(document).ready(function(){
    $('.dropdown-submenu a.test').on("click", function(e){
      $(this).next('ul').toggle();
      e.stopPropagation();
      e.preventDefault();
    });
  });

  // Temporizador de bloqueo de pantalla
  var idleSeconds = 240;

  $(function(){
    var idleTimer;
    function resetTimer(){
      clearTimeout(idleTimer);
      idleTimer = setTimeout(whenUserIdle,idleSeconds*1000);
    }
    $(document.body).bind('mousemove keydown click',resetTimer); //space separated events list that we want to monitor

    resetTimer(); // Start the timer when the page loads
  });

  function whenUserIdle(){
    $("#bloqueo").css("visibility", "visible");
  }

  $("#bloqueo").click(function() {
    $("#bloqueo").css("visibility", "hidden");
  })
  </script>
</body>
</html>
