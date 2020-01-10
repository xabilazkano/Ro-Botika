@extends('layoutsAdmin.app')
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
	<form id="editRoom" action="{{route('adminRooms.update',$id)}}" method="post">
		@csrf
		@method('put')

		<div class="form-group row">
			<label for="floor" class="col-md-4 col-form-label text-md-right">Planta</label>
			<div class="col-md-6">
				<input type="text" class="form-control @error('floor') is-invalid @enderror" name="floor" value="{{$room->floor}}" id="floor">

				@error('floor')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="room" class="col-md-4 col-form-label text-md-right">Número de habitación</label>
			<div class="col-md-6">
				<input type="text" class="form-control @error('room') is-invalid @enderror" name="room" value="{{$room->room_number}}" id="room">

				@error('room')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>
		<div class="form-group row">
			<label for="beds" class="col-md-4 col-form-label text-md-right">Número de camas</label>
			<div class="col-md-6">
				<input type="text" class="form-control @error('beds') is-invalid @enderror" name="beds" value="{{$room->beds}}" id="bed">

				@error('beds')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
				@enderror
			</div>
		</div>

		<div class="form-group row mb-0">
			<div class="col-md-6 offset-md-6">
				<input type="submit" class="btn btn-primary"
				value="Editar">
			</div>
		</div>
    <br>
    <div class="col-md-12 d-flex justify-content-center">
      <p class="red" id="texto" style="display:none"></p>
    </div>
	</form>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#editRoom").submit(function(){
        let floor = $('#floor').val();
        let room = $('#room').val();
        let bed = $('#bed').val();
        if (floor === "" || room === "" || bed === ""){
          $("#texto").show();
          $('#texto').text("{{__('messages.Inserte todos los campos')}}");
          return false;
        }else{
          return true
        }
      });
    });
  </script>
</main>
@endsection
