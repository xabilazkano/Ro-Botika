@extends('layoutsAdmin.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
	<h2>{{__('messages.Editar medicinas de asistencia')}}</h2>
	@if (!is_null($assistance->medicines))
	<table class="table">
		<thead class="thead">
			<tr>
				<th>Id</th>
				<th></th>
			</tr>
		</thead>
		@foreach($assistance->medicines as $medicine)
		<tr>
			<td>{{$medicine->name}}</td>
			<td>
				<form method="post" action="{{route('medicineDestroy',[$assistance->id,$medicine->id])}}">
					@csrf
					<button type="submit" class="deleteIcon">
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
			<label for="medicine" class="col-md-4 col-form-label text-md-right">{{__('messages.Medicinas')}}</label>
			<div class="col-md-6">
				<select id="medicinas" multiple class="form-control @error('medicines') is-invalid @enderror" name="medicines[]">
					@foreach ($medicines as $medicine)
					<option value="{{$medicine->id}}">{{$medicine->name}}{{$medicine->surname}}</option>
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
				<input type="submit" class="btn btn-primary"
				value="{{__('messages.Añadir medicina')}}">
			</div>
		</div>
		<br>
		<div class="col-md-12 d-flex justify-content-center">
			<p id="texto" style="display:none"></p>
		</div>
	</form>
</main>
<script type="text/javascript">
	$(document).ready(function(){
		console.log("kaixo");
		$("#editarAsistencia").submit(function(){
			let medicinas = $('#medicines').val();
			console.log(medicinas);
			if (medicinas === ){
				$("#texto").show();
				$('#texto').val("Seleccione una medicina");
				return false;
			}else{
				return false;
			}
		});
	});
</script>
@endsection
