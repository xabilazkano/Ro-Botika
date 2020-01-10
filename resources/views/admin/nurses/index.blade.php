@extends('layouts.app')

@section('content')
<h2 class="row">
  <span class="col-11">Enfermeros</span>
  @if (Auth::user()->hasRole("admin"))
  <a href="{{route('adminNurses.create')}}" class="col-1"><i class="fa fa-plus"></i></a>
  @endif
</h2>
<table class="table">
  <thead class="thead">
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>Email</th>
      <th>Número de teléfono</th>
      <th></th>
      @if (Auth::user()->hasRole("admin"))
      <th></th>
      <th></th>
      @endif
    </tr>
  </thead>
  @foreach ($nurses as $nurse)
  <tr>
    <td>{{$nurse->id}}</td>
    <td>{{$nurse->name}}</td>
    <td>{{$nurse->lastname}}</td>
    <td>{{$nurse->email}}</td>
    <td>{{$nurse->phone_number}}</td>
    <td>
      <a href="{{route('adminNurses.show',$nurse->id)}}"><i class="blackIcon fa fa-eye"></i></a>
    </td>
    @if (Auth::user()->hasRole("admin"))
    <td><a href="{{route('adminNurses.edit',$nurse->id)}}"><i class="blackIcon fa fa-edit"></i></a>
    </td>
    <td>
      <form method="post" action="{{route('adminNurses.destroy',$nurse->id)}}">
        @csrf
        @method('DELETE')
        <button type="submit" class="deleteIcon">
          <i class="fa fa-trash-o"></i>
        </button>
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
