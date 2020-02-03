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
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 ">
        <div class="col-1">
          <a class="text-dark fa-3x" data-toggle="dropdown" href="#">
            <i class="fa fa-bars"></i>
          </a>
          <ul class="dropdown-menu">

            <br>
            <li class="d-flex justify-content-center align-items-center">
              <a href="" style="text-align:center"><i class="fa fa-question-circle fa-3x text-dark"></i></a>
              <a href="#"><i class="fa fa-lock fa-3x text-dark" onclick="whenUserIdle()" style="text-align:center"></i></a>
            </li>
            <hr>
            <li class="text-center"><a tabindex="-1" class="landingpage nav-link py-0 px-0 px-lg-0 rounded js-scroll-trigger text-dark" href="{{route('landingpage')}}">Landing Page</a></li>
          </ul>
        </div>
      </main>
      @yield('content')
      @include('admin.layoutsAdmin.footer')
    </div>
  </div>
  @include('admin.layoutsAdmin.footer')
</body>
</html>
