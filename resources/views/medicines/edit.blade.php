@extends('layouts.app')
@section('content')
    <h2>Editar medicina {{$medicine->id}}</h2>
    <form class="" action="{{route('adminMedicines.update',$medicine->id)}}" method="post">
      @csrf
      @method('put')
      <label>Nombre: </label><input type="text" name="name" value="{{$medicine->name}}"><br>
      <label>Cantidad: </label><input type="number" name="amount" value="{{$medicine->amount}}"><br>
      <input type="submit" name="" value="Update">
    </form>
@endsection
