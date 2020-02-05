@extends('layouts.app')
@section('titulua', __('messages.MEDICINAS'))
@section('content')
<div class="row">
	<div class="col-1">
		<a href="{{route('medicines.index')}}"><i class="fa fa-arrow-left fa-3x text-dark"></i></a>
	</div>
</div>
<div class="table-responsive">
	<table class="table">
		<thead class="thead">
			<tr>
				<th>{{__('messages.Nombre')}}</th>
				<th>{{__('messages.Cantidad')}}</th>
			</tr>
		</thead>
		<tr>
			<td>{{$medicine->name}}</td>
			<td>{{$medicine->amount}}</td>
		</tr>
	</table>
</div>
@endsection
