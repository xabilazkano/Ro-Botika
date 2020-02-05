@extends('admin.layoutsAdmin.app')
<?php
  $_SESSION['section']="nurses";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2 class="row">
    <span class="col-11">{{__('messages.Enfermeros')}}</span>
    @if (Auth::user()->hasRole("admin"))
    <a href="{{route('adminNurses.create')}}" class="col-1"><i class="fas fa-plus"></i></a>
    @endif
  </h2>
  <div class="table-responsive">
  <table class="table">
    <thead class="thead">
      <tr>
        <th>{{__('messages.Nombre')}}</th>
        <th>{{__('messages.Apellidos')}}</th>
        <th>{{__('messages.Email')}}</th>
        <th>{{__('messages.Número de teléfono')}}</th>
        <th></th>
        @if (Auth::user()->hasRole("admin"))
        <th></th>
        <th></th>
        @endif
      </tr>
    </thead>
    @foreach ($nurses as $nurse)
    <tr>
      <td>{{$nurse->name}}</td>
      <td>{{$nurse->lastname}}</td>
      <td>{{$nurse->email}}</td>
      <td>{{$nurse->phone_number}}</td>
      <td>
        <a href="{{route('adminNurses.show',$nurse->id)}}"><i class="blackIcon fas fa-eye"></i></a>
      </td>
      @if (Auth::user()->hasRole("admin"))
      <td><a href="{{route('adminNurses.edit',$nurse->id)}}"><i class="blackIcon fas fa-edit"></i></a>
      </td>
      <td>
        <form method="post" action="{{route('adminNurses.destroy',$nurse->id)}}">
          @csrf
          @method('DELETE')
          <button type="submit" class="deleteIcon">
            <i class="fas fa-trash-alt"></i>
          </button>
        </form>
      </td>
      @endif
    </tr>
    @endforeach
  </table>
</div>
</main>

<script type="text/javascript">
$(document).ready(function() {
    $('table').DataTable();
} );
</script>
@endsection
