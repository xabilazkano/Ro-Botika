<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ro-Botika</title>
    <!-- Custom fonts for this theme -->
    <link href="{{asset('css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Theme CSS -->
    <link href="{{asset('css/freelancer.min.css')}}" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Ro-Botika</a>
            <div id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-1 mx-lg-1">
                        <a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{route('home')}}">Inicio</a>
                    </li>
                    <li class="nav-item mx-1 mx-lg-1">
                        <a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{route('usuarios.index')}}">Usuarios</a>
                    </li>
                </div>
            </div>
        </nav>
       
        <!-- Contact Section -->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Form -->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                        <form name="sentMessage" id="contactForm" action="{{route('store')}}" method="post">
                            @csrf
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Name</label>
                                    <input class="form-control" name="name" type="text" placeholder="Name" >
                                    @if ($errors->has('name'))
                                    <b>{{$errors->first('name')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Lastname</label>
                                    <input class="form-control" name="lastname" type="text" placeholder="Lastname" >
                                    @if ($errors->has('lastname'))
                                    <b>{{$errors->first('lastname')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Email</label>
                                    <input class="form-control" name="email" type="text" placeholder="Email">
                                    @if ($errors->has('email'))
                                    <b>{{$errors->first('email')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Phone number</label>
                                    <textarea class="form-control" name="message" placeholder="Phone number" ></textarea>
                                    @if ($errors->has('phone_number'))
                                    <b>{{$errors->first('phone_number')}}</b>
                                    @endif
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>Type of user</label>
                                    <input class="form-control" name="name" type="text" placeholder="Type of user" >
                                    @if ($errors->has('type_of_user'))
                                    <b>{{$errors->first('type_of_user')}}</b>
                                    @endif
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer -->
        <footer class="footer text-center">
          <h4 class="text-uppercase mb-4">Redes sociales</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="">
            <i class="fa fa-facebook"></i>
        </a>
        <a class="btn btn-outline-light btn-social mx-1" href="">
            <i class="fa fa-twitter"></i>
        </a>
        <a class="btn btn-outline-light btn-social mx-1" href="">
            <i class="fa fa-linkedin"></i>
        </a>
    </footer>
</body>
</html>
