<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('admin.layoutsAdmin.head')
<body>
  @include('admin.layoutsAdmin.nav')
  <div class="container-fluid pb-5">
    <div class="row d-flex">
      <nav class="col-md-2 col-sm-12 d-none d-md-block bg-light sidebar">
        @include('admin.layoutsAdmin.sideNav')
      </nav>
      <main role="main" class="col-12 d-md-none d-flex flex-wrap justify-content-center">
          @include('admin.layoutsAdmin.responsiveNav')
      </main>
      @yield('content')
      @include('admin.layoutsAdmin.footer')
    </div>
  </div>
  @include('admin.layoutsAdmin.footer')
</body>
</html>
