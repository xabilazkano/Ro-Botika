@extends('admin.layoutsAdmin.app')
<?php
  $_SESSION['section']="patients";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2 class="row">
    <span class="col-11">{{__('messages.Pacientes')}}</span>
    @if (Auth::user()->hasRole("admin"))
    <a href="{{route('adminPatients.create')}}" class="col-1"><i class="fas fa-plus"></i></a>
    @endif
  </h2>
  <table class="table">
    <thead class="thead">
      <tr>
        <th scope="col">{{ __('messages.numeross') }}</th>
        <th scope="col">{{ __('messages.Nombre') }}</th>
        <th scope="col">{{ __('messages.Apellido') }}</th>
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
        <td>{{$patient->ss_number}}</td>
        <td>{{$patient->name}}</td>
        <td>{{$patient->lastname}}</td>
        <td><a href="{{route('patients.show',$patient->id)}}"><i class="blackIcon fas fa-eye"></i></a></td>
        @if (Auth::user()->hasRole("admin"))
        <td><a href="{{route('adminPatients.edit',$patient->id)}}"><i class="blackIcon fas fa-edit"></i></a></td>
        <td>
          <form action="{{route('adminPatients.destroy',$patient->id)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="deleteIcon">
              <i class="fas fa-trash-o"></i>
            </button>
          </form>
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</main>
<script type="text/javascript">
$(document).ready(function() {
    $('table').DataTable();
} );
</script>
@endsection
