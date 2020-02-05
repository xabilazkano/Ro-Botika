@extends('admin.layoutsAdmin.app')
<?php
  session_start();
  $_SESSION['section']="assistances";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
	<h2>{{__('messages.Seleccionar cantidad de medicinas de asistencia')}}</h2>
	@if (!is_null($assistance->medicines))
    <form method="post" id="selectAmount" action="{{route('selectAmount')}}">
      @csrf
    	<table class="table">
    		<thead class="thead">
    			<tr>
    				<th>{{__('messages.Nombre')}}</th>
            <th>{{__('messages.Cantidad')}}</th>
    				<th></th>
    			</tr>
    		</thead>
    		@foreach($medicines as $medicine)
      		<tr>
      			<td>{{$medicine->name}}</td>
      			<td>
              <input type="number" name="{{$medicine->id}}" id="amount" value="">
      			</td>
      		</tr>
    		@endforeach
    	</table>
      <div class="col-md-10 d-flex justify-content-center">
        <input type="hidden" name="patient" value="{{$assistance->patient_id}}">
        <input type="hidden" name="nurse" value="{{$assistance->user_id}}">
        <input type="hidden" name="date" value="{{$assistance->estimated_date}}">
    		<input type="submit" name="" value="{{__('messages.Añadir asistencia')}}">
    	</div>
    </form><br><br>
	@endif
	<div class="col-md-10 d-flex justify-content-center">
		<p class="red" id="texto" style="display:none"></p>
	</div>
	</form>
</main>
<script type="text/javascript">
	$(document).ready(function(){
		console.log("kaixo");
		$("#editarAsistencia").submit(function(){
			let medicinas = $('#medicines').val();
			console.log(medicinas);
			if (typeof(medicinas) === "undefined"){
				$("#texto").show();
				$('#texto').text("{{__('messages.Seleccione una medicina')}}");
				return false;
			}else{
				return true;
			}
		});
	});
</script>
@endsection
