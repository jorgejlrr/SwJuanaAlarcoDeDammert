@extends('plantilla.plantilla')
@section('contenido')
           
<div>
  <div><br>
    <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="card-columns cols-2">

              <div class="card">
                <div class="card-header">Asistencias de alumnos del {{date("d/m/Y", strtotime($finicio))}} al {{date("d/m/Y", strtotime($ffin))}}
                  <div class="card-header-actions">
                    <a class="card-header-action" href="{{url('grafico')}}">
                      <i class="fa fa-mail-reply"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <canvas id="graficoasistenciatotal"></canvas>
                  </div>
                </div>
              </div> 
              <div class="card">
                <div class="card-header">RE-TEST vs POST-TEST
                  <div class="card-header-actions">
                    <a class="card-header-action" href="{{url('grafico')}}">
                      <i class="fa fa-mail-reply"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <canvas id="graficoretestvsposttest"></canvas>
                  </div>
                </div>
              </div> 
              <div class="card">
                <div class="card-header">RE-TEST (%Asistencia - Septiembre 2019)
                  <div class="card-header-actions">
                    <a class="card-header-action" href="{{url('grafico')}}">
                      <i class="fa fa-mail-reply"></i>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <canvas id="graficoretest"></canvas>
                  </div>
                </div>
              </div> 

@endsection

@section('scripts')

<script src="{{asset('plantilla/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('plantilla/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plantilla/node_modules/pace-progress/pace.min.js')}}"></script>
    <script src="{{asset('plantilla/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
<!--     <script src="{{asset('plantilla/node_modules/@coreui/coreui/dist/js/coreui.min.js')}}"></script>
 -->    <!-- Plugins and scripts required by this view-->
    <script src="{{asset('plantilla/node_modules/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('plantilla/node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js')}}"></script>
    <script src="{{asset('plantilla/js/charts.js')}}"></script>



<script type="text/javascript">

<?php 

$fechas = DB::table('asistencia')
            ->select(DB::raw('count(asis_id) AS aa'),'asis_fecha')
            ->whereBetween('asis_fecha',[$finicio,$ffin])
            ->groupBy('asis_fecha')
            ->orderBy('asis_fecha','asc')
            ->get();

$data = DB::table('asistencia')
            ->select(DB::raw('count(asistencia.asis_id) AS aa'),'asis_fecha')
            ->join('curso','curso.curs_id','asistencia.asis_idcurso')
            ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
            ->where('asistencia.asis_est','=','0')
            ->where('asignatura.asig_id','=',$asig)
            ->whereBetween('asis_fecha',[$finicio,$ffin])
            ->groupBy('asis_fecha')
            ->orderBy('asis_fecha','asc')
            ->get();

$query = DB::table('asistencia')
                ->select(DB::raw('count(asis_id) AS aa'),'asis_fecha')
                ->join('curso','curso.curs_id','asistencia.asis_idcurso')
                ->where('asis_est','=','0')
                ->where('curso.curs_idasig','=',$asig)
                ->whereBetween('asis_fecha',[$finicio,$ffin])
                ->groupBy('asis_fecha')
                ->orderBy('asis_fecha','asc')
                ->get();

$contador = DB::table('asistencia')
                    ->distinct('asis_fecha')
                    ->whereBetween('asis_fecha',[$finicio,$ffin])
                    ->count();

$acumulador =0;
foreach($data as $q){

    $acumulador = $acumulador + ($q->aa / 50 * 100);
}

$prom = ($acumulador / $contador); 

?>


  var lineChart = new Chart($('#graficoasistenciatotal'), {
    type: 'line',
    data: {
      labels: [
          <?php 
          foreach ($fechas as  $fecha) { ?>
            '<?php echo $fecha->asis_fecha; ?>',
            <?php } ?>  
      ],
      datasets: [{
        label: '%Asistencias',
        backgroundColor: 'rgba(123, 159, 255 , 0.2)',
        borderColor: 'rgba(123, 159, 255 , 1)',
        pointBackgroundColor: 'rgba(123, 159, 255  , 1)',
        pointBorderColor: 'rgba(123, 159, 255 , 1)',
        data: [
          <?php 
          foreach ($data as  $d) { ?>
            '<?php echo $d->aa/50*100; ?>',
            <?php } ?> 
        ]
      }, 
      ]
    },
    options: {
    scales: {
      xAxes: [{
        ticks: {
          beginAtZero: true,
                   max: 100,
                   stepSize: 0,
                   fontSize: 10,
                   maxRotation: 90,
                   minRotation: 15
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
                   max: 100,
                   stepSize: 25,
                   fontSize: 11,
                   callback: function(value){return value+ "%"}

        }
      }],
    }
  }
  }); // eslint-disable-next-line no-unused-vars
</script>
<script type="text/javascript">
    var lineChart = new Chart($('#graficoretest'), {
    type: 'line',
    data: {
      labels: [
        '02/09/2019',
        '03/09/2019',
        '04/09/2019',
        '05/09/2019',
        '06/09/2019',
        '09/09/2019',
        '10/09/2019',
        '11/09/2019',
        '12/09/2019',
        '13/09/2019',
        '16/09/2019',
        '17/09/2019',
        '18/09/2019',
        '19/09/2019',
        '20/09/2019',
        '23/09/2019',
        '24/09/2019',
        '25/09/2019',
        '26/09/2019',
        '27/09/2019'
      ],
      datasets: [{
        label: '%Asistencias',
        backgroundColor: 'rgba(123, 159, 255 , 0.2)',
        borderColor: 'rgba(123, 159, 255 , 1)',
        pointBackgroundColor: 'rgba(123, 159, 255  , 1)',
        pointBorderColor: 'rgba(123, 159, 255 , 1)',
        data: [
          56,
          56,
          58,
          60,
          52,
          54,
          58,
          56,
          54,
          58,
          50,
          54,
          58,
          54,
          54,
          58,
          54,
          54,
          56,
          54
        ]
      }, 
      ]
    },
    options: {
    scales: {
      xAxes: [{
        ticks: {
          beginAtZero: true,
                   max: 100,
                   stepSize: 0,
                   fontSize: 10,
                   maxRotation: 90,
                   minRotation: 15
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
                   min: 44,
                   max: 62,
                   stepSize: 2,
                   fontSize: 11,
                   callback: function(value){return value+ "%"}

        }
      }],
    }
  }
  }); // eslint-disable-next-line no-unused-vars
</script>
<script type="text/javascript">
  var doughnutChart = new Chart($('#graficoretestvsposttest'), {
  type: 'doughnut',
  data: {
    labels: ['Septiembre 2019', 'Mayo 2020'],
    datasets: [{
      data: [55, <?php echo $prom; ?>],
      backgroundColor: ['#FF6384', '#36A2EB'],
      hoverBackgroundColor: ['#FF6384', '#36A2EB']
    }]
  },
  options: {
    responsive: true
  }
}); // eslint-disable-next-line no-unused-vars
</script>

@endsection