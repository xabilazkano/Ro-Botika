@extends('layouts.app')

@section('content')
  <h2>Enfermeros</h2>
  <table>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Email</th>
      <th>Número de teléfono</th>
    </tr>
    @foreach ($nurses as $nurse)
      <tr>
        <td>{{$nurse->id}}</td>
        <td>{{$nurse->name}}</td>
        <td>{{$nurse->lastname}}</td>
        <td>{{$nurse->email}}</td>
        <td>{{$nurse->phone_number}}</td>
        <td><a href="{{route('adminNurses.show',$nurse->id)}}">Show</a></td>
        @if (Auth::user()->hasRole("admin"))
          <td><a href="{{route('adminNurses.edit',$nurse->id)}}">Edit</a></td>
          <td>
            <form action="{{route('adminNurses.destroy',$nurse->id)}}" method="post">
              @csrf
              @method('delete')
              <input type="submit" value="Destroy">
            </form>
          </td>
        @endif
      </tr>
    @endforeach
    @if (Auth::user()->hasRole("admin"))
      <tr>
        <td><a href="{{route('adminNurses.create')}}">Create</a></td>
      </tr>
    @endif
  </table>
@endsection
