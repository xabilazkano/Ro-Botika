@extends('admin.layoutsAdmin.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2 class="row">
    <span class="col-11">{{__('messages.Asistencias')}}</span>
    @if (Auth::user()->hasRole("admin"))
    <a href="{{route('adminAssistances.create')}}" class="col-1"><i class="fa fa-plus"></i></a>
    @endif
  </h2>
  <div class="table-responsive">
    <table class="table">
      <thead class="thead">
        <tr>
          <th>Id</th>
          <th>{{__('messages.Paciente')}}</th>
          <th>{{__('messages.Enfermera')}}</th>
          <th>{{__('messages.Fecha')}}</th>
          <th>{{__('messages.Medicinas')}}</th>
          <th>{{__('messages.Confirmado')}}</th>
          <th></th>
          @if (Auth::user()->hasRole("admin"))
          <th></th>
          <th></th>
          @endif
        </tr>
      </thead>
      @foreach ($assistances as $assist)
      <tr>
        <td>{{$assist->id}}</td>
        <td>{{$assist->patient->name}} {{$assist->patient->lastname}}</td>
        <td>{{$assist->user->name}}</td>
        <td>{{$assist->estimated_date}}</td>
        <td>
          @foreach ($assist->medicines as $medicine)
          {{$medicine->name}}
          @endforeach
        </td>
        <td>
          @if (is_null($assist->confirmed))
          <a href="{{route('assistances.index')}}"><i class=" blackIcon fa fa-question"></i></a>
          @else
          <a href="{{route('assistances.index')}}"><i class=" confirm fa fa-check"></i></a>
          @endif
        </td>
        <td>
          <a href="{{route('assistances.show',$assist->id)}}"><i class="blackIcon fa fa-eye"></i></a>
        </td>
        @if (Auth::user()->hasRole("admin"))
        <td><a href="{{route('adminAssistances.edit',$assist->id)}}"><i class="blackIcon fa fa-edit"></i></a>
        </td>
        <td>
          <form method="post" action="{{route('adminAssistances.destroy',$assist->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="deleteIcon">
              <i class="fa fa-trash-o"></i>
            </button>
          </form>
        </td>
        @endif
      </tr>
      @endforeach
    </table>
  </div>
</main>
@endsection
