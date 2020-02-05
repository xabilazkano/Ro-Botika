@extends('admin.layoutsAdmin.app')
<?php
$_SESSION['section']="rooms";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2 class="row">
    <span class="col-11">{{__('messages.Habitaciones')}}</span>
    @if (Auth::user()->hasRole("admin"))
    <a href="{{route('adminRooms.create')}}" class="col-1"><i class="fas fa-plus"></i></a>
    @endif
  </h2>
  <div class="table-responsive">
    <table class="table">
      <thead class="thead">
        <tr>
          <th>{{__('messages.planta')}}</th>
          <th>{{__('messages.numerohabitacion')}}</th>
          <th>{{__('messages.camas')}}</th>
          <th></th>
          @if (Auth::user()->hasRole("admin"))
          <th></th>
          <th></th>
          @endif
        </tr>
      </thead>
      @foreach ($rooms as $room)
      <tr>
        <td>{{$room->floor}}</td>
        <td>{{$room->id}}</td>
        <td>{{$room->beds}}</td>
        <td><a href="{{route('rooms.show',$room->id)}}"><i class="blackIcon fas fa-eye"></i></a></td>
        @if (Auth::user()->hasRole("admin"))
        <td><a href="{{route('adminRooms.edit',$room->id)}}"><i class="blackIcon fas fa-edit"></i></a></td>
        <td>
          <form method="post" action="{{route('adminRooms.destroy',$room->id)}}">
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
