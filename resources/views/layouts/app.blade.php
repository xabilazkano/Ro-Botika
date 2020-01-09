<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.head')
<body>
  <div class="row">
    <div class="col-12 content">
      @include('layouts.nav')
      @include('layouts.modals')
      <main class="py-4">
        @yield('content')
      </main>
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
  </script>
</body>
</html>
