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
          <?php
          $cantidadLibre = $medicine->amount;
            foreach ($assistances as $assistance) {
              if ($assistance->confirmed == 0 && $assistance->estimated_date >= date('Y-m-d') && !$assistance->medicines->isEmpty()){
                foreach ($assistance->medicines as $assistanceMedicine) {
                  if ($medicine->id == $assistanceMedicine->id){
                    $cantidadLibre = $cantidadLibre - $assistanceMedicine->pivot->amount;
                  }
                }
              }
            }
          ?>
      		<tr>
      			<td>{{$medicine->name}} ({{$cantidadLibre}})</td>
      			<td>
              <input type="number" name="{{$medicine->id}}" id="amount" value="" min="1" max="{{$cantidadLibre}}">
      			</td>
      		</tr>
    		@endforeach
    	</table>
      <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-6">
          <input type="hidden" name="patient" value="{{$assistance->patient_id}}">
          <input type="hidden" name="nurse" value="{{$assistance->user_id}}">
          <input type="hidden" name="date" value="{{$assistance->estimated_date}}">
          <input type="submit" class="btn btn-primary" value="{{__('messages.Añadir asistencia')}}">
        </div>
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
