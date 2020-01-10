@extends('layouts.app')
@section('titulua', 'Pacientes')
@section('content')
<table class="table">
  <thead class="thead">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Número S.S.</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Enfermedad</th>
      <th></th>
      @if (Auth::user()->hasRole("admin"))
      <th></th>
      <th></th>
      @endif
    </tr>
  </thead>
  <tbody>
    @foreach ($patients as $patient)
    <tr>
      <th scope="row">{{$patient->id}}</td>
        <td>{{$patient->ss_number}}</td>
        <td>{{$patient->name}}</td>
        <td>{{$patient->lastname}}</td>
        <td>{{$patient->disease}}</td>
        <td><a href="{{route('patients.show',$patient->id)}}"><i class="blackIcon fa fa-eye"></i></a></td>
        @if (Auth::user()->hasRole("admin"))
        <td><a href="{{route('adminPatients.edit',$patient->id)}}"><i class="blackIcon fa fa-edit"></i></a></td>
        <td>
          <form action="{{route('adminPatients.destroy',$patient->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="deleteIcon">
              <i class="fa fa-trash-o"></i>
            </button>
          </form>
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
  @endsection
