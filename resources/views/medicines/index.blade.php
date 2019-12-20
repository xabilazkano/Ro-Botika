@extends('layouts.app')
@section('content')
<div class="col-md-12">
	<table>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Amount</th>
		</tr>
		@foreach ($medicines as $medicine)
			<tr>
				<td>{{$medicine->id}}</td>
				<td>{{$medicine->name}}</td>
				<td>{{$medicine->amount}}</td>
			</tr>
		@endforeach
	</table>
</div>
@endsection