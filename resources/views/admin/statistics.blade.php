@extends('admin.layoutsAdmin.app')
<?php
$_SESSION['section']="statistics";
?>
@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 pb-5">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['', 'Occupied beds'],
      ['{{__("messages.Occupied")}}',    {{$occupied}}],
      ['{{__("messages.Free")}}',     {{$free}}],

    ]);

    var options = {
      title: '{{__("messages.Occupation")}}'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }


  google.charts.load("current", {packages:['corechart']});
  google.charts.setOnLoadCallback(drawColumnChart);
  function drawColumnChart() {
    var data = google.visualization.arrayToDataTable([
      ["Medicine", "{{__('messages.Cantidad')}}", { role: "style" } ],

      @foreach ($medicines as $medicine)
      ["{{$medicine->name}}", {{$medicine->amount}}, "color: #76A7FA"],
      @endforeach

    ]);

    var view = new google.visualization.DataView(data);
    view.setColumns([0, 1,
      { calc: "stringify",
      sourceColumn: 1,
      type: "string",
      role: "annotation" },
      2]);

      var options = {
        title: "{{__('messages.Cantidad')}}",
        width: 1500,
        height: 600,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
    }





var ehuneko = "";
var besteak = "";
  $(document).ready(function(){
  $("#calcular").click(function(){
    var fecha = $("#fecha").val();
    var url = 'http://localhost:8000/api/grafica/'+fecha;
    $.get(url,function(data,status){
      if (status === "success"){

        if (data==="noregistros"){
          document.getElementById('pintatu').innerHTML = "<br><br><br><h4>No hay registros de este día</h4>";
        }else{
        besteak = 100-data;
        var datuak = google.visualization.arrayToDataTable([

          ['', 'Confirmed assistances'],
          ['{{__("messages.Confirmado")}}',    parseInt(data)],
          ['{{__("messages.Not confirmed")}}',     besteak],

        ]);

        var aukerak = {
          title: '{{__("messages.Assistances status")}}'
        };

        var grafika = new google.visualization.PieChart(document.getElementById('pintatu'));

        grafika.draw(datuak, aukerak);
      }

      }
      else{
        alert(status)
      }
    })
  })
});


    </script>
    <div class="row">
      <div class="col-6">
        <h1>{{__("messages.Percentage of occupation")}}</h1>
        <div id="piechart" style="width: 100%; height: 500px;"></div><br><br>
      </div>
      <div class="col-6">
        <h1>{{__("messages.Percentage of completed assistances")}}</h1>

        {{__("messages.Fecha")}}: <input type="date" id="fecha" name="date">
        <input type="submit" name="calcular" id="calcular" value="{{__("messages.Calcular")}}">
        <div id="pintatu" style="width: 100%; height: 500px;"></div>

      </div>
    </div>
    <h1>{{__("messages.Stock of medicines")}}</h1>
    <div  id="columnchart_values" style="width: 900px; height: 500px;"></div><br><br>
  </main>


  @endsection
