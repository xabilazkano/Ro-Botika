@extends('admin.layoutsAdmin.app')
<?php
  $_SESSION['section']="assistances";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <h2 class="row">
    <span class="col-11">{{__('messages.Asistencias')}}</span>
    @if (Auth::user()->hasRole("admin"))
    <a href="{{route('adminAssistances.create')}}" class="col-1"><i class="fas fa-plus"></i></a>
    @endif
  </h2>
  <div class="table-responsive">

    <!-- Tabla asistencias pasadas -->
    <h1>{{__('messages.AsistenciasPasadas')}}</h1>
    <table class="table">
      <thead class="thead">
        <tr>
          <th>{{__('messages.Paciente')}}</th>
          <th>{{__('messages.Enfermera')}}</th>
          <th>{{__('messages.Fecha')}}</th>
          <th>{{__('messages.Hora')}}</th>
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
      @if ($assist->estimated_date < date("Y-m-d") && $assist->confirmed != 1)
      <tr style="background-color:#ff6666">
        <td>{{$assist->patient->name}} {{$assist->patient->lastname}}</td>
        <td>{{$assist->user->name}}</td>
        <td>{{$assist->estimated_date}}</td>
        <td>{{$assist->hour}}</td>
        <td>
          @foreach ($assist->medicines as $medicine)
          {{$medicine->name}} x{{$medicine->pivot->amount}}<br>
          @endforeach
        </td>
        <td>
          @if ($assist->confirmed != 1)
          <i class=" blackIcon fas fa-question"></i>
          @else
          <i class=" confirm fas fa-check"></i>
          @endif
        </td>
        <td>
          <a href="{{route('assistances.show',$assist->id)}}"><i class="blackIcon fas fa-eye"></i></a>
        </td>
        @if (Auth::user()->hasRole("admin"))
        <td><a href="{{route('adminAssistances.edit',$assist->id)}}"><i class="blackIcon fas fa-edit"></i></a>
        </td>
        <td>
          <form method="post" action="{{route('adminAssistances.destroy',$assist->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="deleteIcon">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
        </td>
        @endif
      </tr>
      @endif
      @endforeach
    </table>

    <!-- Tabla asistencias actuales -->
    <h1>{{__('messages.AsistenciasActuales')}}</h1>
    <table class="table">
      <thead class="thead">
        <tr>
          <th>{{__('messages.Paciente')}}</th>
          <th>{{__('messages.Enfermera')}}</th>
          <th>{{__('messages.Fecha')}}</th>
          <th>{{__('messages.Hora')}}</th>
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
      <!-- Pendientes hoy -->
      @if ($assist->estimated_date == date("Y-m-d") && $assist->confirmed != '1')
      <tr>
        <td>{{$assist->patient->name}} {{$assist->patient->lastname}}</td>
        <td>{{$assist->user->name}}</td>
        <td>{{$assist->estimated_date}}</td>
        <td>{{$assist->hour}}</td>
        <td>
          @foreach ($assist->medicines as $medicine)
          {{$medicine->name}} x{{$medicine->pivot->amount}}<br>
          @endforeach
        </td>
        <td>
          @if (is_null($assist->confirmed))
          <i class=" blackIcon fas fa-question"></i>
          @else
          <i class=" confirm fas fa-check"></i>
          @endif
        </td>
        <td>
          <a href="{{route('assistances.show',$assist->id)}}"><i class="blackIcon fas fa-eye"></i></a>
        </td>
        @if (Auth::user()->hasRole("admin"))
        <td><a href="{{route('adminAssistances.edit',$assist->id)}}"><i class="blackIcon fas fa-edit"></i></a>
        </td>
        <td>
          <form method="post" action="{{route('adminAssistances.destroy',$assist->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="deleteIcon">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
        </td>
        @endif
      </tr>
      @endif
      @endforeach

      <!-- Hechas hoy -->
      @foreach ($assistances as $assist)
      @if ($assist->estimated_date == date("Y-m-d") && $assist->confirmed == '1')
      <tr>
        <td>{{$assist->patient->name}} {{$assist->patient->lastname}}</td>
        <td>{{$assist->user->name}}</td>
        <td>{{$assist->estimated_date}}</td>
        <td>{{$assist->hour}}</td>
        <td>
          @foreach ($assist->medicines as $medicine)
          {{$medicine->name}} x{{$medicine->pivot->amount}}<br>
          @endforeach
        </td>
        <td>
          @if (is_null($assist->confirmed))
          <i class=" blackIcon fas fa-question"></i>
          @else
          <i class=" confirm fas fa-check"></i>
          @endif
        </td>
        <td>
          <a href="{{route('assistances.show',$assist->id)}}"><i class="blackIcon fas fa-eye"></i></a>
        </td>
        @if (Auth::user()->hasRole("admin"))
        <td><a href="{{route('adminAssistances.edit',$assist->id)}}"><i class="blackIcon fas fa-edit"></i></a>
        </td>
        <td>
          <form method="post" action="{{route('adminAssistances.destroy',$assist->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="deleteIcon">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
        </td>
        @endif
      </tr>
      @endif
      @endforeach
    </table>

    <!-- Tabla asistencias Historicas -->
    <h1>{{__('messages.AsistenciasHistoricas')}}</h1>
    <table class="table">
      <thead class="thead">
        <tr>
          <th>{{__('messages.Paciente')}}</th>
          <th>{{__('messages.Enfermera')}}</th>
          <th>{{__('messages.Fecha')}}</th>
          <th>{{__('messages.Hora')}}</th>
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
      @if ($assist->estimated_date < date("Y-m-d") && $assist->confirmed == 1)
      <tr>
        <td>{{$assist->patient->name}} {{$assist->patient->lastname}}</td>
        <td>{{$assist->user->name}}</td>
        <td>{{$assist->estimated_date}}</td>
        <td>{{$assist->hour}}</td>
        <td>
          @foreach ($assist->medicines as $medicine)
          {{$medicine->name}} x{{$medicine->pivot->amount}}<br>
          @endforeach
        </td>
        <td>
          @if (is_null($assist->confirmed))
          <i class=" blackIcon fas fa-question"></i>
          @else
          <i class=" confirm fas fa-check"></i>
          @endif
        </td>
        <td>
          <a href="{{route('assistances.show',$assist->id)}}"><i class="blackIcon fas fa-eye"></i></a>
        </td>
        @if (Auth::user()->hasRole("admin"))
        <td><a href="{{route('adminAssistances.edit',$assist->id)}}"><i class="blackIcon fas fa-edit"></i></a>
        </td>
        <td>
          <form method="post" action="{{route('adminAssistances.destroy',$assist->id)}}">
            @csrf
            @method('DELETE')
            <button type="submit" class="deleteIcon">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form>
        </td>
        @endif
      </tr>
      @endif

      @endforeach
    </table>
  </div>
</main>

<script type="text/javascript">
$(document).ready(function() {
    $('table').DataTable();
} );
</script>
@endsection
