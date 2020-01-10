@extends('layoutsAdmin.app')
@section('content')
<h2>Editar medicinas de asistencia {{$assistance->id}}</h2>
@if (!is_null($assistance->medicines))
<table>
	<tr>
		<th>Id</th>
	</tr>
	@foreach($assistance->medicines as $medicine)
	<tr>
		<td>{{$medicine->name}}</td>
		<td>
			<form id="destroyMedicine" method="post" action="{{route('medicineDestroy',[$assistance->id,$medicine->id])}}">
				@csrf
				<button type="submit" id="deleteIcon">
					<i class="fa fa-trash-o"></i>
				</button>
			</form>
		</td>
	</tr>
	@endforeach
</table><br><br>
@endif
<form id="editarAsistencia" method="POST" action="{{route('medicineAdd',$assistance->id)}}">
	@csrf
	<div class="form-group row">
		<label for="medicine" class="col-md-4 col-form-label text-md-right">Nombre del medicamento</label>
		<div class="col-md-6">
			<select id="medicines" class="form-control @error('medicine') is-invalid @enderror" name="medicine">
				@foreach ($medicines as $medicine)
				<option value="{{$medicine->id}}">{{$medicine->name}}</option>
				@endforeach
			</select>
			@error('medicine')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
      <input type="submit" class="btn btn-primary"
      value="Añadir medicina">
    </div>
  </div>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		console.log("kaixo")
		$("#editarAsistencia").submit(function(){
			let medicinas = $('#medicines').val();
			console.log("medicinas");
			/*if (medicinas.length === 1 && medicinas[0] === ""){
				$("#texto").show();
				$('#texto').val("Seleccione una medicina");
				return false;
			}*/
			return false;
		});
	});
</script>
@endsection
