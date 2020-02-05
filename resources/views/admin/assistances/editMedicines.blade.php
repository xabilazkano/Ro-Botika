@extends('admin.layoutsAdmin.app')
<?php
  session_start();
  $_SESSION['section']="assistances";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
	<h2>{{__('messages.Editar medicinas de asistencia')}}</h2>
	@if (!is_null($assistance->medicines))
    <form id="modificarAsistencia" action="{{route('assistMedicines.update', $assistance->id)}}" method="post">
      @csrf
      @method('put')
      @if (!$assistance->medicines->isEmpty())
    	<table class="table">
        <thead class="thead">
          <tr>
            <th>{{__('messages.Nombre')}}</th>
            <th>{{__('messages.Cantidad')}}</th>
            <th></th>
          </tr>
        </thead>
    		@foreach($assistance->medicines as $medicine)
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
        		<td>{{$medicine->name}} ({{$medicine->amount}})</td>
            <td><input type="number" name="{{$medicine->id}}" id="amount" value="{{$medicine->pivot->amount}}" min="0" max="{{$cantidadLibre}}"></td>
        	</tr>
    		@endforeach
    	</table>
      @endif
  		<div class="form-group row mb-0">
  			<div class="col-md-6 offset-md-6">
  				<input type="submit" class="btn btn-primary" value="{{__('messages.Guardar cambios')}}">
  			</div>
  		</div><br><br>
    </form>
	@endif
	<form id="editarAsistencia" method="POST" action="{{route('selectAmountEdit',$assistance->id)}}">
		@csrf
		<div class="form-group row">
			<label for="medicine" class="col-md-4 col-form-label text-md-right">{{__('messages.Medicinas')}}</label>
			<div class="col-md-6">
				<select id="medicinas" multiple class="form-control @error('medicines') is-invalid @enderror" name="medicines[]">
					@foreach ($medicines as $medicine)
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
            @if ($cantidadLibre > 0)
              <option value="{{$medicine->id}}">{{$medicine->name}} ({{$cantidadLibre}})</option>
            @endif
          @endforeach
				</select>

				@error('medicines')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>
		<div class="form-group row mb-0">
			<div class="col-md-6 offset-md-6">
        <input type="hidden" name="patient" value="{{$assistance->patient_id}}">
        <input type="hidden" name="nurse" value="{{$assistance->user_id}}">
        <input type="hidden" name="date" value="{{$assistance->estimated_date}}">
				<input type="submit" class="btn btn-primary" value="{{__('messages.Añadir medicina')}}">
			</div>
		</div>
		<br>
		<div class="col-md-10 d-flex justify-content-center">
			<p class="red" id="texto" style="display:none"></p>
		</div>
	</form>
</main>
<script type="text/javascript">
	$(document).ready(function(){
		$("#editarAsistencia").submit(function(){
			let medicinas = $('#medicinas').val();
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
