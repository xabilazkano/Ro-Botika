@extends('layouts.app')
@section('titulua', __('messages.MEDICINAS'))
@section('content')
<div class="table-responsive">
  <table class="table table-striped table-bordered">
    <thead class="thead">
      <tr>
        <th>{{__('messages.Nombre')}}</th>
        <th>{{__('messages.Cantidad')}}</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($medicines as $medicine)
      <tr>
        <td>{{$medicine->name}}</td>
        <td>{{$medicine->amount}}</td>
        <td>
          <a href="{{route('medicines.show',$medicine->id)}}"><i class="blackIcon fa fa-eye"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script type="text/javascript">
$(document).ready( function () {
  $("table").DataTable();
} );

</script>
@endsection
