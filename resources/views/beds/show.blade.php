@extends('layouts.app')
@section('content')
<div class="col-md-12">
	@foreach ($beds as $bed)
	ID: {{$bed->id}}<br><br>
	Floor: {{$bed->floor}}<br><br>
	Room: {{$bed->room}}<br><br>
	Bed: {{$bed->bed}}<br><br>
	Patient:
	@foreach ($bed->patient as $patient)
	{{$bed->patient->name}} {{$bed->patient->surname}}
	@endforeach
	@endforeach
</div>
@endsection