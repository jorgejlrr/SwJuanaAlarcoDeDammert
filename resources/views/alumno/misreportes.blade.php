@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-md-6"></div>
    <div class="col-md-6">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card my-3">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Mis reportes
            </div>
            <div class="card-body">
                
                <a href="{{url('misnotas/'.$idalumno)}}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Boleta de notas</a>
            </div>
        </div>
    </div>
</div>

<div>
  <div><br>
    <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="card-columns cols-2">



        <div class="card">
                <div class="card-header">Graficos de Notas
                  <div class="card-header-actions">
                    <a class="card-header-action" href="http://www.chartjs.org" target="_blank">
                      <small class="text-muted">docs</small>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <canvas id="graficodenotas"></canvas>
                  </div>
                </div>
              </div>             

              <div class="card">
                <div class="card-header">Graficos de Notas
                  <div class="card-header-actions">
                    <a class="card-header-action" href="http://www.chartjs.org" target="_blank">
                      <small class="text-muted">docs</small>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <canvas id="graficodenotas3"></canvas>
                  </div>
                </div>
              </div>   

              <div class="card">
                <div class="card-header">Graficos de Notas
                  <div class="card-header-actions">
                    <a class="card-header-action" href="http://www.chartjs.org" target="_blank">
                      <small class="text-muted">docs</small>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <canvas id="graficodenotas2"></canvas>
                  </div>
                </div>
              </div> 

            </div>
          </div>
        </div>
  </div>
</div>
@endsection

@section('scripts')

<script src="{{asset('plantilla/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('plantilla/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('plantilla/node_modules/pace-progress/pace.min.js')}}"></script>
<script src="{{asset('plantilla/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('plantilla/node_modules/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('plantilla/node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js')}}"></script>
<script src="{{asset('plantilla/js/charts.js')}}"></script>




<script type="text/javascript">

<?php 
// $data = DB::table('asistencia')
//             ->select(DB::raw('count(asistencia.asis_id) AS aa'),'asis_fecha')
//             ->join('curso','curso.curs_id','asistencia.asis_idcurso')
//             ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
//             ->where('asistencia.asis_est','=','0')
//             ->where('asignatura.asig_id','=',$asig)
//             ->whereBetween('asis_fecha',[$finicio,$ffin])
//             ->groupBy('asis_fecha')
//             ->orderBy('asis_fecha','asc')
//             ->get();

$fechas = DB::table('asignatura')->orderBy('asig_nom')->where('asig_id','!=','8')->get();

$notas1= DB::table('notas')
            ->join('alumno','alumno.alum_id','notas.not_idalumno')
            ->join('curso','curso.curs_id','notas.not_idcurso')
            ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
            ->where('alum_dni','=',$idalumno)
            ->where('not_bimestre','=','1')
            ->orderBy('asig_nom','asc')
            ->get();

$notas2= DB::table('notas')
            ->join('alumno','alumno.alum_id','notas.not_idalumno')
            ->join('curso','curso.curs_id','notas.not_idcurso')
            ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
            ->where('alum_dni','=',$idalumno)
            ->where('not_bimestre','=','2')
            ->orderBy('asig_nom','asc')
            ->get();

$notas3= DB::table('notas')
            ->join('alumno','alumno.alum_id','notas.not_idalumno')
            ->join('curso','curso.curs_id','notas.not_idcurso')
            ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
            ->where('alum_dni','=',$idalumno)
            ->where('not_bimestre','=','3')
            ->orderBy('asig_nom','asc')
            ->get();

$notas4= DB::table('notas')
            ->join('alumno','alumno.alum_id','notas.not_idalumno')
            ->join('curso','curso.curs_id','notas.not_idcurso')
            ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
            ->where('alum_dni','=',$idalumno)
            ->where('not_bimestre','=','4')
            ->orderBy('asig_nom','asc')
            ->get();
?>







var lineChart = new Chart($('#graficodenotas'), {
  type: 'line',
  data: {
    labels: [
    <?php 
          foreach ($fechas as  $fecha) { ?>
            '<?php echo $fecha->asig_nom; ?>',
          <?php } ?>
            ],
    datasets: [{
      label: 'I Bimestre',
      backgroundColor: 'rgba(123, 159, 255 , 0.2)',
      borderColor: 'rgba(123, 159, 255 , 1)',
      pointBackgroundColor: 'rgba(123, 159, 255  , 1)',
      pointBorderColor: 'rgba(123, 159, 255 , 1)',
      data: [<?php 
          foreach ($notas1 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?> ]
    }, {
      label: 'II Bimestre ',
      backgroundColor: 'rgba(255, 123, 123, 0.2)',
      borderColor: 'rgba(255, 123, 123, 1)',
      pointBackgroundColor: 'rgba(255, 123, 123, 1)',
      pointBorderColor: 'rgba(255, 123, 123, 1)',
      data: [<?php 
          foreach ($notas2 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?>]
    },{
      label: 'III Bimestre',
      backgroundColor: 'rgba(98, 255, 212, 0.2)',
      borderColor: 'rgba(98, 255, 212, 1)',
      pointBackgroundColor: 'rgba(98, 255, 212, 1)',
      pointBorderColor: 'rgba(98, 255, 212, 1)',
      data: [<?php 
          foreach ($notas3 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?>]
    },{
      label: 'IVBimestre',
      backgroundColor: 'rgba(255, 230, 92, 0.2)',
      borderColor: 'rgba(255, 230, 92, 1)',
      pointBackgroundColor: 'rgba(255, 230, 92, 1)',
      pointBorderColor: 'rgba(255, 230, 92, 1)',
      data: [<?php 
          foreach ($notas4 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?>]
    }]
  },

  options: {



    scales: {

      xAxes: [{
        ticks: {

          beginAtZero: true,
                   max: 100,
                   stepSize: 0,
                   fontSize: 8,
                   maxRotation: 90,
                   minRotation: 10

        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
                   max: 20,
                   stepSize: 0,
                   fontSize: 11
        }
      }],
    }
  }

}); // eslint-disable-next-line no-unused-vars
</script>

<script type="text/javascript">
  var radarChart = new Chart($('#graficodenotas2'), {
  type: 'radar',
  data: {
    labels: [<?php 
          foreach ($fechas as  $fecha) { ?>
            '<?php echo $fecha->asig_nom; ?>',
          <?php } ?>
          ],
    datasets: [{
      label: 'I Bimestre',
      backgroundColor: 'rgba(123, 159, 255 , 0.2)',
      borderColor: 'rgba(123, 159, 255 , 1)',
      pointBackgroundColor: 'rgba(123, 159, 255  , 1)',
      pointBorderColor: 'rgba(123, 159, 255 , 1)',
      data: [<?php 
          foreach ($notas1 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?> ]
    }, {
      label: 'II Bimestre',
      backgroundColor: 'rgba(255, 123, 123, 0.2)',
      borderColor: 'rgba(255, 123, 123, 1)',
      pointBackgroundColor: 'rgba(255, 123, 123, 1)',
      pointBorderColor: 'rgba(255, 123, 123, 1)',
      data: [<?php 
          foreach ($notas2 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?>]
    },{
      label: 'III Bimestre',
      backgroundColor: 'rgba(98, 255, 212, 0.2)',
      borderColor: 'rgba(98, 255, 212, 1)',
      pointBackgroundColor: 'rgba(98, 255, 212, 1)',
      pointBorderColor: 'rgba(98, 255, 212, 1)',
      data: [<?php 
          foreach ($notas3 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?>]
    },{
      label: 'IV Bimestre',
      backgroundColor: 'rgba(255, 230, 92, 0.2)',
      borderColor: 'rgba(255, 230, 92, 1)',
      pointBackgroundColor: 'rgba(255, 230, 92, 1)',
      pointBorderColor: 'rgba(255, 230, 92, 1)',
      data: [<?php 
          foreach ($notas4 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?>]
    }]
  },
  options: {
    responsive: true
  }
}); // eslint-disable-next-line no-unused-vars
</script>

<script type="text/javascript">
  var radarChart = new Chart($('#graficodenotas3'), {
  type: 'bar',
  data: {
    labels: [<?php 
          foreach ($fechas as  $fecha) { ?>
            '<?php echo $fecha->asig_nom; ?>',
          <?php } ?>
          ],
    datasets: [{
      label: 'I Bimestre',
      backgroundColor: 'rgba(123, 159, 255 , 0.2)',
      borderColor: 'rgba(123, 159, 255 , 1)',
      pointBackgroundColor: 'rgba(123, 159, 255  , 1)',
      pointBorderColor: 'rgba(123, 159, 255 , 1)',
      data: [<?php 
          foreach ($notas1 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?> ]
    }, {
      label: 'II Bimestre',
      backgroundColor: 'rgba(255, 123, 123, 0.2)',
      borderColor: 'rgba(255, 123, 123, 1)',
      pointBackgroundColor: 'rgba(255, 123, 123, 1)',
      pointBorderColor: 'rgba(255, 123, 123, 1)',
      data: [<?php 
          foreach ($notas2 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?>]
    },{
      label: 'III Bimestre',
      backgroundColor: 'rgba(98, 255, 212, 0.2)',
      borderColor: 'rgba(98, 255, 212, 1)',
      pointBackgroundColor: 'rgba(98, 255, 212, 1)',
      pointBorderColor: 'rgba(98, 255, 212, 1)',
      data: [<?php 
          foreach ($notas3 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?>]
    },{
      label: 'IV Bimestre',
      backgroundColor: 'rgba(255, 230, 92, 0.2)',
      borderColor: 'rgba(255, 230, 92, 1)',
      pointBackgroundColor: 'rgba(255, 230, 92, 1)',
      pointBorderColor: 'rgba(255, 230, 92, 1)',
      data: [<?php 
          foreach ($notas4 as  $d) { ?>
            '<?php echo $d->not_promedio; ?>',
            <?php } ?>]
    }]
  },
  options: {



    scales: {

      xAxes: [{
        ticks: {

          beginAtZero: true,
                   max: 100,
                   stepSize: 0,
                   fontSize: 8,
                   maxRotation: 90,
                   minRotation: 10

        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
                   max: 20,
                   stepSize: 0,
                   fontSize: 11
        }
      }],
    }
  }
}); // eslint-disable-next-line no-unused-vars
</script>


@endsection