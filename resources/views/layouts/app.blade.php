<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('layouts.head')
<body>
  <div class="row">
    <div class="col-3">
      @include('layouts.nav')
    </div>
    <div class="col-9 content">
      @include('layouts.modals')
      <main class="py-4">
        @yield('content')
      </main>
    </div>
  </div>
</body>
</html>
