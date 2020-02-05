@extends('layouts.app')
@section('titulua', __('messages.ASISTENCIAS'))
@section('content')
<div class="row">
	<div class="col-1">
		<a href="{{route('assistances.index')}}"><i class="fa fa-arrow-left fa-3x text-dark"></i></a>
	</div>

</div>
<div class="table-responsive">
	<table class="table">
		<thead class="thead">
			<tr>
				<th>{{__('messages.Paciente')}}</th>
				<th>{{__('messages.Habitación')}}</th>
				<th>{{__('messages.Enfermera')}}</th>
				<th>{{__('messages.Fecha')}}</th>
				<th>{{__('messages.Medicinas')}}</th>
				<th>{{__('messages.Confirmado')}}</th>
				<th>{{__('messages.Movercarro')}}</th>
			</tr>
		</thead>
		<tr>
		<td><a href="{{route('patients.show',$assist->patient->id)}}">{{$assist->patient->name}} {{$assist->patient->lastname}}</a></td>
		<td><a href="{{route('rooms.show', $assist->room_id)}}">{{$assist->room_id}}</a></td>
		<td>{{$assist->user->name}} {{$assist->user->lastname}}</td>
		<td>{{$assist->estimated_date}}</td>
		<td>
			@foreach ($assist->medicines as $medicine)
			<a href="{{route('medicines.show',$medicine->id)}}">{{$medicine->name}} x{{$medicine->pivot->amount}}</a><br>
			@endforeach
		</td>
		<td>
			@if (is_null($assist->confirmed))
			<i class="blackIcon fa fa-question"></i>
			@else
			<i class="confirm blackIcon fa fa-check"></i>
			@endif
		</td>
		<td>
			<div id="{{$assist->id}}">
				<a href="{{route('assistances.ir', $assist->id)}}">
						<button type="button" name="button" class="btn btn-secondary botonir">{{__('messages.Asistir')}}</button>
					</a>
				</div>
			</td>
		</tr>
	</table>
</div>
<script type="text/javascript">
$( document ).ready(function() {
	setInterval(cargarTabla, 500);
});
function cargarTabla(){
	$.ajax({
		url     : "{{ route('assistances.indexActualizandose')}}",
		method  : 'GET',
		success : function(r){
			let lista = r;
			let htmlCode = '';
			var assistanceId = '';
			var url = '';
			var enCamino = false;
			$.each(lista, function(index, item){
				htmlCode = `${item.chart_state}`;
				if (htmlCode == 1){
					enCamino = true;
				}
			});
			htmlCode = '';
			if (enCamino){
				$.each(lista, function(index, item){
					htmlCode = `${item.chart_state}`;
					assistanceId = `${item.id}`;
					if (htmlCode == 1){
						$('#' + assistanceId).html('<button type="button" name="button" class="btn btn-primary botonir">{{__("messages.En camino")}}</button>');
					}else{
						$('#' + assistanceId).html('');
					}
				});
			}else{
				$.each(lista, function(index, item){
					assistanceId = `${item.id}`;
					url = '{{route("assistances.ir",":id")}}';
					url = url.replace(':id', assistanceId);
					$('#' + assistanceId).html('<a href="' + url + '"><button type="button" name="button" class="btn btn-secondary botonir">{{__("messages.Asistir")}}</button></a>');
				});
			}
		}
	});
}
</script>
<br><br>

@if (is_null($assist->confirmed))
<form action="{{route('confirmAssist',$assist->id)}}" method="post">
	@csrf

	<div class="col-md-6 offset-md-3">
		<input type="submit" class="btn btn-primary"
		value="{{__('messages.Confirmar asistencia')}}">
	</div>
</form>
@endif


@endsection
