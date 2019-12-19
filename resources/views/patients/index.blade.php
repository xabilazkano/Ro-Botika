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
        <td><a href="{{route('patients.show',$patient->id)}}">Show</a></td>
        @if (Auth::user()->hasRole("admin"))
          <td><a href="{{route('adminPatients.edit',$patient->id)}}">Edit</a></td>
          <td>
            <form action="{{route('patients.destroy',$patient->id)}}" method="post">
              @csrf;
              @method('delete')
              <input type="submit" value="Destroy">
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
