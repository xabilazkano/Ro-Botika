@extends('layouts.app')

@section('content')
<h2>Pacientes</h2>
<table>
  <tr>
    <th>Id</th>
    <th>Número de la seguridad social</th>
    <th>Nombre</th>
    <th>Apellidos</th>
    <th>Enfermedad</th>
  </tr>
  @foreach ($patients as $patient)
  <tr>
    <td>{{$patient->id}}</td>
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
        <button type="submit" id="deleteIcon">
          <i class="fa fa-trash-o"></i>
        </button>
      </form>
    </td>
    @endif
  </tr>
  @endforeach
  @if (Auth::user()->hasRole("admin"))
  <tr>
    <td><a href="{{route('adminPatients.create')}}">Create</a></td>
  </tr>
  @endif
</table>
@endsection
