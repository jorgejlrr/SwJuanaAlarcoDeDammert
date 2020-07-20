@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Reporte mensual de asistencias</strong>
            </div>
            <div class="card-body">
            	<form method="post" action="{{url('recebirreporteasismensual')}}" id="elForm">
					@method('POST')
					{{ csrf_field() }}
					<div class="form-group row">
                        <label class="col-md-1 col-form-label">F. Inicio</label>
                        <div class="col-md-3">
                            <input class="form-control" type="date" name="finicio" id="infechaini" onChange="sinDomingos();" onblur="obtenerfechafinf1();" required >
                        </div>
                        <label class="col-md-1 col-form-label">F. Fin</label>
                        <div class="col-md-3">
                            <input class="form-control" type="date" name="ffin"  >
                        </div>
                    </div> 
                    <div class="form-group row">
                    	<label class="col-md-1 col-form-label">Curso</label>
                        <div class="col-md-3" >
                            <select name="idasig" class="form-control">
								                <option hidden>---Seleccione---</option>
                								<option value="1">Matemáticas</option>
                                <option value="2">Comunicación</option>
                                <option value="3">Ciencias Sociales</option>
                                <option value="4">Ciencia y Tecnologia</option>
                                <option value="5">Arte y Cultura</option>
                                <option value="6">Educacion Fisica</option>
                                <option value="7">Ingles</option>
							               </select>
                        </div>
                    </div>
					<div class="form-actions">
                        <input type="submit" value="Generar Reporte" id="elSubmit" class="btn btn-primary">
                        <a href="{{url('home')}}" class="btn btn-danger">Cancelar</a>
                    </div> 
				</form>
            </div>
        </div>
    </div>
</div>
             
<!-- <div>
  <div><br>
    <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="card-columns cols-2">

              <div class="card">
                <div class="card-header">Grafico de Asistencias de alumnos
                  <div class="card-header-actions">
                    <a class="card-header-action" href="http://www.chartjs.org" target="_blank">
                      <small class="text-muted">docs</small>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <canvas id="graficoasistenciatotal"></canvas>
                  </div>
                </div>
              </div> 




            </div>
          </div>
        </div>
  </div>
</div> -->

@endsection

@section('scripts')
<script type="text/javascript">
    
var elDate = document.getElementById('infechaini');
var elForm = document.getElementById('elForm');
var elSubmit = document.getElementById('elSubmit');

function sinDomingos(){
    var day = new Date(elDate.value ).getUTCDay();
    // Días 0-6, 0 es Domingo 6 es Sábado
    elDate.setCustomValidity(''); // limpiarlo para evitar pisar el fecha inválida
    if( day == 0 || day == 6 ){
       elDate.setCustomValidity('por favor seleccione otro día de Lunes a Viernes');
    } else {
       elDate.setCustomValidity('');
    }
    if(!elForm.checkValidity()) {elSubmit.click()};
}

function obtenerfechafinf1(){
    sinDomingos();
}

</script>

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
    function val() {
        d = document.getElementById("nbim").value;
        alert(d);
    }  





<?php 

$fechas = DB::table('asistencia')
            ->select(DB::raw('count(asis_id) AS aa'),'asis_fecha')
            ->where('asis_est','=','0')
            ->whereBetween('asis_fecha',['2020-05-04','2020-05-29'])
            ->groupBy('asis_fecha')
            ->get();

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
        label: 'Notas',
        backgroundColor: 'rgba(220, 220, 220)',
        borderColor: 'rgba(220, 220, 220)',
        pointBackgroundColor: 'rgba(220, 220, 220)',
        pointBorderColor: '#fff',
        data: []
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
                   minRotation: 90
        }
      }],
      yAxes: [{
        ticks: {
          beginAtZero: true,
                   max: 100,
                   stepSize: 0,
                   fontSize: 11
        }
      }],
    }
  }



  }); // eslint-disable-next-line no-unused-vars
</script>
@endsection