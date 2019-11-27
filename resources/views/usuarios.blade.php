<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Ro-Botika</title>
    <!-- Custom fonts for this theme -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
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
                        <a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{route('home')}}">Inicio</a>
                    </li>
                    <li class="nav-item mx-1 mx-lg-1">
                        <a class="nav-link py-3 px-3 px-lg-3 rounded js-scroll-trigger" href="{{route('usuarios.index')}}">Usuarios</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="masthead text-center">
        <div class="container d-flex align-items-center flex-column">
            <ul>
                <li>
                    <a href="{{route('usuarios.create')}}">Add user</a>
                </li>
            </ul><br>
            <table>
                <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>Type of user</th>
                    <th></th>
                </tr>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>
                        {{$usuario->id}}
                    </td>
                    <td>
                        {{$usuario->name}}
                    </td>
                    <td>
                        {{$usuario->lastname}}
                    </td>
                    <td>
                        {{$usuario->email}}
                    </td>
                    <td>
                        {{$usuario->phone_number}}
                    </td>
                    <td>
                        {{$usuario->type_of_user}}
                    </td>
                    <td>
                        <a href="{{route('usuarios.delete',$usuario->id)}}">Delete user</a>
                    </td>
                </tr>
                @endforeach
            </table>
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
