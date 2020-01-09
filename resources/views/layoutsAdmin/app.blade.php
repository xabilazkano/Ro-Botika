<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layoutsAdmin.head')
<body>
  @include('layoutsAdmin.nav')
  <div class="container-fluid pb-5">
    <div class="row">
        @include('layoutsAdmin.sideNav')
        @yield('content')
        @include('layoutsAdmin.footer')
      </div>
  </div>
</body>
</html>
