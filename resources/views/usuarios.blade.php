@extends('layouts.app')
@section('content')
<section class="masthead text-center">
    <div class="container d-flex align-items-center flex-column">
        <ul>
            <li>
                <a href="{{route('usuarios.create')}}">{{__('messages.Añadir usuario')}}</a>
            </li>
        </ul><br>
        <table>
            <tr>
                <th>id</th>
                <th>{{__('messages.Nombre')}}</th>
                <th>{{__('messages.Apellido')}}</th>
                <th>{{__('messages.Email')}}</th>
                <th>{{__('messages.Número de teléfono')}}</th>
                <th>{{__('messages.Tipo de usuario')}}</th>
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
                    <a href="{{route('usuarios.delete',$usuario->id)}}">{{__('messages.Eliminar usuario')}}</a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</section>
@endsection
