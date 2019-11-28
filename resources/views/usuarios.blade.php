<!DOCTYPE html>
<html lang="en">
@include('layouts.head')
<body id="page-top">
        @include('layouts.nav')

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


    @include('layouts.footer')

    </body>
    </html>
