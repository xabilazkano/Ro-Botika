<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.layoutsAdmin.head')
<body>
  @include('admin.layoutsAdmin.nav')
  <div class="container-fluid pb-5">
    <div class="row">
        @include('admin.layoutsAdmin.sideNav')
        @yield('content')
        @include('admin.layoutsAdmin.footer')
      </div>

  </div>
  @include('admin.layoutsAdmin.footer')
</body>
</html>
