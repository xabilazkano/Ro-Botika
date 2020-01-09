@extends('layouts.app')
@section('content')
<div class="col-md-14 text-center">
	<form action="{{route('adminBeds.update',$id)}}" method="post">
		@csrf
		@method('put')
		Floor: <input type="number" name="floor"><br><br>
		Room: <input type="number" name="room"><br><br>
		Bed: <input type="string" name="bed"><br><br>
		<input type="submit" name="send" value="Send">
	</form>
</div>
@endsection
