@extends('layouts.app')
@section('content')
<div class="col-md-12">

	ID: {{$bed->id}}<br><br>
	Floor: {{$bed->floor}}<br><br>
	Room: {{$bed->room}}<br><br>
	Bed: {{$bed->bed}}<br><br>
	Patient:
	@foreach ($bed->patients as $patient)
	{{$patient->name}} {{$patient->surname}}
	@endforeach

</div>
@endsection