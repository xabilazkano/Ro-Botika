@extends('admin.layoutsAdmin.app')
<?php
  $_SESSION['section']="medicines";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2 class="row">
    <span class="col-11">{{__('messages.Medicinas')}}</span>
    @if (Auth::user()->hasRole("admin"))
    <a href="{{route('adminMedicines.create')}}" class="col-1"><i class="fa fa-plus"></i></a>
    @endif
  </h2>
  <table class="table">
    <thead class="thead">
      <tr>
        <th>Id</th>
        <th>{{__('messages.Nombre')}}</th>
        <th>{{__('messages.Cantidad')}}</th>
        <th></th>
        @if (Auth::user()->hasRole("admin"))
        <th></th>
        <th></th>
        @endif
      </tr>
    </thead>
    @foreach ($medicines as $medicine)
    <tr>
      <td>{{$medicine->id}}</td>
      <td>{{$medicine->name}}</td>
      <td>{{$medicine->amount}}</td>
      <td>
        <a href="{{route('medicines.show',$medicine->id)}}"><i class="blackIcon fa fa-eye"></i></a>
      </td>
      @if (Auth::user()->hasRole("admin"))
      <td><a href="{{route('adminMedicines.edit',$medicine->id)}}"><i class="blackIcon fa fa-edit"></i></a>
      </td>
      <td>
        <form method="post" action="{{route('adminMedicines.destroy',$medicine->id)}}">
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
  </table>
</main>
@endsection
