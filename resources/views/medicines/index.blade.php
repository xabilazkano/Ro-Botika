@extends('layouts.app')

@section('content')
  <h2>Medicinas</h2>
  <table>
    <tr>
      <th>Id</th>
      <th>Nombre</th>
      <th>Cantidad</th>
    </tr>
    @foreach ($medicines as $medicine)
      <tr>
        <td>{{$medicine->id}}</td>
        <td>{{$medicine->name}}</td>
        <td>{{$medicine->amount}}</td>
        <td><a href="{{route('medicines.show',$medicine->id)}}">Show</a></td>
        @if (Auth::user()->hasRole("admin"))
          <td><a href="{{route('adminMedicines.edit',$medicine->id)}}">Edit</a></td>
          <td>
            <form action="{{route('adminMedicines.destroy',$medicine->id)}}" method="post">
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
        <td><a href="{{route('adminMedicines.create')}}">Create</a></td>
      </tr>
    @endif
  </table>
@endsection
