<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
  <div class="container">
    <div class="row">
      <div class="col-12 content">
        @include('layouts.nav')
        @include('layouts.modals')
        <main class="py-4">
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
  var idleSeconds = 120;

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
    console.log('idle');
  }
  </script>

</body>
</html>
