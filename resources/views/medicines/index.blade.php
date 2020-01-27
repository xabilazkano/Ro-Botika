@extends('layouts.app')
@section('titulua', __('messages.MEDICINAS'))
@section('content')
<table class="table">
  <thead class="thead">
    <tr>
      <th>{{__('messages.Nombre')}}</th>
      <th>{{__('messages.Cantidad')}}</th>
      <th></th>
    </tr>
  </thead>
  @foreach ($medicines as $medicine)
  <tr>
    <td>{{$medicine->name}}</td>
    <td>{{$medicine->amount}}</td>
    <td>
      <a href="{{route('medicines.show',$medicine->id)}}"><i class="blackIcon fa fa-eye"></i></a>
    </td>
  </tr>
  @endforeach
</table>
@endsection
