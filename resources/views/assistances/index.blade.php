@extends('layouts.app')
@section('titulua', __('messages.ASISTENCIAS'))
@section('content')
<table class="table">
	<thead class="thead">
		<tr>
			<th>{{__('messages.Paciente')}}</th>
			<th>{{__('messages.Habitación')}}</th>
			<th>{{__('messages.Enfermera')}}</th>
			<th>{{__('messages.Fecha')}}</th>
			<th>{{__('messages.Medicinas')}}</th>
			<th>{{__('messages.Confirmado')}}</th>
			<th></th>
			<th>{{__('messages.Movercarro')}}</th>
		</tr>
	</thead>
	@foreach ($assistances as $assist)
		@if ($assist->estimated_date === date('Y-m-d'))
			<tr>
				<td><a href="{{route('patients.show', $assist->patient->id)}}">{{$assist->patient->name}} {{$assist->patient->lastname}}</a></td>
				<td><a href="{{route('rooms.show', $assist->room_id)}}">{{$assist->room_id}}</a></td>
				<td>{{$assist->user->name}}</td>
				<td>{{$assist->estimated_date}}</td>
				<td>
					@foreach ($assist->medicines as $medicine)
					<a href="{{route('medicines.show', $medicine->id)}}">{{$medicine->name}}</a><br>
					@endforeach
				</td>
				<td>
					@if (is_null($assist->confirmed))
					<i class=" blackIcon fa fa-question"></i>
					@else
					<i class=" confirm fa fa-check"></i>
					@endif
				</td>
				<td>
					<a href="{{route('assistances.show', $assist->id)}}"><i class="blackIcon fa fa-eye"></i></a>
				</td>
				<td>
					<div id="{{$assist->id}}">
						<a href="{{route('assistances.ir', $assist->id)}}">
								<button type="button" name="button" class="btn btn-secondary botonir">{{__('messages.Asistir')}}</button>
						</a>
					</div>
				</td>
			</tr>
		@endif
	@endforeach
</table>
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
									var url = ''
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
											console.log(htmlCode + " " + assistanceId);
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
@endsection
