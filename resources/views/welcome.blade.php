<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Freelancer - Start Bootstrap Theme</title>
    <!-- Custom fonts for this theme -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <!-- Theme CSS -->
    <link href="css/freelancer.min.css" rel="stylesheet">
</head>
<body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Ro-Botika</a>
            <div id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-1 mx-lg-1">
                        <a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Home</a>
                    </li>

                </div>
            </div>
        </nav>
        <!-- Masthead -->
        <section class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image -->
                <img class="masthead-avatar mb-5" src="img/robot.png" alt="">
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
                <p class="masthead-subheading font-weight-light mb-0">Automated Medical Trolley</p>
            </div>
        </section>

        <section class="masthead">
            <div class="container d-flex align-items-center flex-column">
                <p class="masthead-subheading font-weight-light mb-0">Automated Medical Trolley</p>
            </div>
            </section>
            <!-- Contact Section -->
            <section class="page-section" id="contact">
                <div class="container">
                    <!-- Contact Section Heading -->
                    <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Contact Us</h2>
                    <!-- Icon Divider -->
                    <div class="divider-custom">
                        <div class="divider-custom-line"></div>
                        <div class="divider-custom-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="divider-custom-line"></div>
                    </div>
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
                                        <label>Email Address</label>
                                        <input class="form-control" name="email" type="text" placeholder="Email Address">
                                        @if ($errors->has('email'))
                                        <b>{{$errors->first('email')}}</b>
                                        @endif
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                        <label>Message</label>
                                        <textarea class="form-control" name="message" placeholder="Message" ></textarea>
                                        @if ($errors->has('message'))
                                        <b>{{$errors->first('message')}}</b>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <div id="success"></div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Send</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Footer -->
            <footer class="footer text-center">
                <div class="container">
                    <div class="row">
                        <!-- Footer Social Icons -->
                        <div class="col-lg-4 mb-5 mb-lg-0">
                            <h4 class="text-uppercase mb-4">Around the Web</h4>
                            <a class="btn btn-outline-light btn-social mx-1" href="#">
                                <i class="fab fa-fw fa-facebook-f"></i>
                            </a>
                            <a class="btn btn-outline-light btn-social mx-1" href="#">
                                <i class="fab fa-fw fa-twitter"></i>
                            </a>
                            <a class="btn btn-outline-light btn-social mx-1" href="#">
                                <i class="fab fa-fw fa-linkedin-in"></i>
                            </a>
                            <a class="btn btn-outline-light btn-social mx-1" href="#">
                                <i class="fab fa-fw fa-dribbble"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </footer>
        </body>
        </html>