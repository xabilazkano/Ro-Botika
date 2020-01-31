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
      ['Occupied',    {{$occupied}}],
      ['Free',     {{$free}}],

    ]);

    var options = {
      title: 'Occupation'
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
  }


  google.charts.load("current", {packages:['corechart']});
  google.charts.setOnLoadCallback(drawColumnChart);
  function drawColumnChart() {
    var data = google.visualization.arrayToDataTable([
      ["Medicine", "Amount", { role: "style" } ],

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
        title: "Amount",
        width: 1500,
        height: 600,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
    }


    </script>
    <div class="row">
      <div class="col-6">
        <h1>Percentage of occupation</h1>
        <div id="piechart" style="width: 900px; height: 500px;"></div><br><br>
      </div>
      <div class="col-6">
        <h1>Percentage of completed assistances</h1>

        Fecha: <input type="date" id="date" name="date">
        <input type="submit" onclick="postJs()" name="calcular" id="calcular" value="Calcular">

      </div>
    </div>
    <h1>Stock of medicines</h1>
    <div  id="columnchart_values" style="width: 900px; height: 500px;"></div><br><br>
  </main>
  @endsection
