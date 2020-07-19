<?php $nbim = "1";

?>
<?php

$aa_arte = DB::table('notas')->join('curso','curso.curs_id','not_idcurso')->where('not_promedio','>=','12')
                ->where('not_bimestre','=',$nbim)->where('curso.curs_idasig','=','5')->count(); 
$aa_cyt = DB::table('notas')->join('curso','curso.curs_id','not_idcurso')->where('not_promedio','>=','12')
                ->where('not_bimestre','=',$nbim)->where('curso.curs_idasig','=','4')->count(); 
$aa_cc = DB::table('notas')->join('curso','curso.curs_id','not_idcurso')->where('not_promedio','>=','12')
                ->where('not_bimestre','=',$nbim)->where('curso.curs_idasig','=','3')->count();
$aa_com = DB::table('notas')->join('curso','curso.curs_id','not_idcurso')->where('not_promedio','>=','12')
                ->where('not_bimestre','=',$nbim)->where('curso.curs_idasig','=','2')->count();
$aa_ef = DB::table('notas')->join('curso','curso.curs_id','not_idcurso')->where('not_promedio','>=','12')
                ->where('not_bimestre','=',$nbim)->where('curso.curs_idasig','=','6')->count();
$aa_in = DB::table('notas')->join('curso','curso.curs_id','not_idcurso')->where('not_promedio','>=','12')
                ->where('not_bimestre','=',$nbim)->where('curso.curs_idasig','=','7')->count();
$aa_mat = DB::table('notas')->join('curso','curso.curs_id','not_idcurso')->where('not_promedio','>=','12')
                ->where('not_bimestre','=',$nbim)->where('curso.curs_idasig','=','1')->count();
$fechas = DB::table('asignatura')->orderBy('asig_nom')->where('asig_id','!=','8')->get();





  $nro_alumnoprimero = DB::table('alumno')->where('alum_grad','=','7')->count();
  $nro_alumnosegundo = DB::table('alumno')->where('alum_grad','=','8')->count();
  $nro_alumnotercero = DB::table('alumno')->where('alum_grad','=','9')->count();
  $nro_alumnocuarto = DB::table('alumno')->where('alum_grad','=','10')->count(); 
  $nro_alumnoquinto = DB::table('alumno')->where('alum_grad','=','11')->count();
  // alumno sexo por año
  // 1er Año  Secundaria
  $nro_alumnoprimerosexoH = DB::table('alumno')
                    ->where('alum_sexo','=','1')
                    ->where('alum_grad','=','7')
                    ->count();  
  $nro_alumnoprimerosexoM = DB::table('alumno')
                    ->where('alum_sexo','=','0')
                    ->where('alum_grad','=','7')
                    ->count();
  // 2do Año  Secundaria
  $nro_alumnosegundosexoH = DB::table('alumno')
                    ->where('alum_sexo','=','1')
                    ->where('alum_grad','=','8')
                    ->count();  
  $nro_alumnosegundosexoM = DB::table('alumno')
                    ->where('alum_sexo','=','0')
                    ->where('alum_grad','=','8')
                    ->count();
  // 3er Año Secundaria
  $nro_alumnotercerosexoH = DB::table('alumno')
                    ->where('alum_sexo','=','1')
                    ->where('alum_grad','=','9')
                    ->count();  
  $nro_alumnotercerosexoM = DB::table('alumno')
                    ->where('alum_sexo','=','0')
                    ->where('alum_grad','=','9')
                    ->count();
  // 4to Año Secundaria
  $nro_alumnocuartosexoH = DB::table('alumno')
                    ->where('alum_sexo','=','1')
                    ->where('alum_grad','=','10')
                    ->count();  
  $nro_alumnocuartosexoM = DB::table('alumno')
                    ->where('alum_sexo','=','0')
                    ->where('alum_grad','=','10')
                    ->count();
  // 5to Año Secundaria
  $nro_alumnoquintosexoH = DB::table('alumno')
                    ->where('alum_sexo','=','1')
                    ->where('alum_grad','=','11')
                    ->count();  
  $nro_alumnoquintosexoM = DB::table('alumno')
                    ->where('alum_sexo','=','0')
                    ->where('alum_grad','=','11')
                    ->count();
  // Fin Secundaria

                //Inicio del nivel Primaria
  $nro_alumnoprimerop = DB::table('alumno')->where('alum_grad','=','1')->count();
  $nro_alumnosegundop = DB::table('alumno')->where('alum_grad','=','2')->count();
  $nro_alumnotercerop = DB::table('alumno')->where('alum_grad','=','3')->count();
  $nro_alumnocuartop = DB::table('alumno')->where('alum_grad','=','4')->count(); 
  $nro_alumnoquintop = DB::table('alumno')->where('alum_grad','=','5')->count();
  $nro_alumnosextop = DB::table('alumno')->where('alum_grad','=','6')->count();

  $total_alumnos_nivel_primaria=DB::table('alumno')->whereIn('alum_grad', [1,2,3,4,5,6])->count();
  $total_alumnos_nivel_secundaria=DB::table('alumno')->whereIn('alum_grad', [7,8,9,10,11])->count();

  // alumno sexo por año
  // 1er Año  Secundaria
  $nro_alumnoprimeropsexoH = DB::table('alumno')
                    ->where('alum_sexo','=','1')
                    ->where('alum_grad','=','1')
                    ->count();  
  $nro_alumnoprimeropsexoM = DB::table('alumno')
                    ->where('alum_sexo','=','0')
                    ->where('alum_grad','=','1')
                    ->count();
  // 2do Año  Secundaria
  $nro_alumnosegundopsexoH = DB::table('alumno')
                    ->where('alum_sexo','=','1')
                    ->where('alum_grad','=','2')
                    ->count();  
  $nro_alumnosegundopsexoM = DB::table('alumno')
                    ->where('alum_sexo','=','0')
                    ->where('alum_grad','=','2')
                    ->count();
  // 3er Año Secundaria
  $nro_alumnoterceropsexoH = DB::table('alumno')
                    ->where('alum_sexo','=','1')
                    ->where('alum_grad','=','3')
                    ->count();  
  $nro_alumnoterceropsexoM = DB::table('alumno')
                    ->where('alum_sexo','=','0')
                    ->where('alum_grad','=','3')
                    ->count();
  // 4to Año Secundaria
  $nro_alumnocuartopsexoH = DB::table('alumno')
                    ->where('alum_sexo','=','1')
                    ->where('alum_grad','=','4')
                    ->count();  
  $nro_alumnocuartopsexoM = DB::table('alumno')
                    ->where('alum_sexo','=','0')
                    ->where('alum_grad','=','4')
                    ->count();
  // 5to Año Secundaria
  $nro_alumnoquintopsexoH = DB::table('alumno')
                    ->where('alum_sexo','=','1')
                    ->where('alum_grad','=','5')
                    ->count();  
  $nro_alumnoquintopsexoM = DB::table('alumno')
                    ->where('alum_sexo','=','0')
                    ->where('alum_grad','=','5')
                    ->count();
  // 6to Año Secundaria
  $nro_alumnosextopsexoH = DB::table('alumno')
                    ->where('alum_sexo','=','1')
                    ->where('alum_grad','=','6')
                    ->count();  
  $nro_alumnosextopsexoM = DB::table('alumno')
                    ->where('alum_sexo','=','0')
                    ->where('alum_grad','=','6')
                    ->count();
  // Fin 

  $trab_data = DB::table('trabajador')
                  ->join('role_user','role_user.user_id','trabajador.trab_dni')
                  ->join('roles','roles.id','role_user.role_id')
                  ->where('trabajador.trab_dni','=',Auth::user()->usuario)->first();

  //total de asistencias mensual

  $total_asis_marzo = DB::table('asistencia')->whereBetween('asis_fecha', ['2020-03-01','2020-03-31'])->count();
  $total_asis_abril = DB::table('asistencia')->whereBetween('asis_fecha', ['2020-04-01','2020-04-31'])->count();
  $total_asis_mayo = DB::table('asistencia')->whereBetween('asis_fecha', ['2020-05-01','2020-05-31'])->count();
  $total_asis_junio = DB::table('asistencia')->whereBetween('asis_fecha', ['2020-06-01','2020-06-31'])->count();
  $total_asis_julio = DB::table('asistencia')->whereBetween('asis_fecha', ['2020-07-01','2020-07-31'])->count();
  $total_asis_agosto = DB::table('asistencia')->whereBetween('asis_fecha', ['2020-08-01','2020-08-31'])->count();
  $total_asis_setiembre = DB::table('asistencia')->whereBetween('asis_fecha', ['2020-09-01','2020-09-31'])->count();
  $total_asis_octubre = DB::table('asistencia')->whereBetween('asis_fecha', ['2020-10-01','2020-10-31'])->count();
  $total_asis_noviembre = DB::table('asistencia')->whereBetween('asis_fecha', ['2020-11-01','2020-11-31'])->count();
  $total_asis_diciembre = DB::table('asistencia')->whereBetween('asis_fecha', ['2020-12-01','2020-12-31'])->count();

?>
@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
@if(Auth::user()->hasrole('admin'))
  @if($trab_data->trab_est == 1)
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">

                  <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> 
                    <small></small>
                  </div>
                  <div class="card-body">
                    <div class="carousel slide" id="carouselExampleControls" data-ride="carousel">
                      <div class="carousel-inner">
                        <!-- primera imagen -->
                        <div class="carousel-item active">
                          <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" 
                          src="{{asset('img/ti.png')}}" 
                            data-holder-rendered="true"><center><a  href="{{url('pwrd')}}" class="btn btn-primary">Haga click Aqui</a></center>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
                                

                     
            </div>
        </div>
    </div> 

    <div class="card my-2">
      <div class="card-header py-2">
        <div class="d-sm-flex align-items-center justify-content-between my-1">
          <h1 class="h4 mb-0 text-gray-800">Bienvenido(a) : {{$trab_data->trab_ape.', '.$trab_data->trab_nom}} </h1>
          <h2 class="h4 mb-0 text-gray-800">Cargo: {{$trab_data->description}}  </h2>  
            <!-- inicio reloj -->
            <form name="form_reloj">
              <input type="text" name="reloj" size="10">
            </form>
            <!-- fin reloj -->            
        </div>
      </div>
    </div>

<div class="row mt-2">
    <div class="col-lg-12">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#primaria" role="tab" aria-controls="primaria">Nivel Primaria</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#secundaria" role="tab" aria-controls="secundaria">Nivel Secundaria</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="primaria" role="tabpanel">
                                        <!-- Nivel Primaria -->
    <!-- Cards N° de alumnos -->
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Total de Alumnos por Año (Nivel Primaria)</h6>
    </div>
    <div class="card-group">
      <!-- 1° de primaria -->
      <div class="card">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-people"></i>
          </div>
          <div class="text-value">{{$nro_alumnoprimerop}}</div>
          <small class="text-muted text-uppercase font-weight-bold">1° de Primaria</small><br>
          <small class="text-muted text-uppercase font-weight-bold">Hombres : {{$nro_alumnoprimeropsexoH}} |</small>        
          <small class="text-muted text-uppercase font-weight-bold">Mujeres : {{$nro_alumnoprimeropsexoM}}</small>          
        </div>
      </div>
      <!-- 2° de primaria -->
      <div class="card">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-people"></i>
          </div>
          <div class="text-value">{{$nro_alumnosegundop}}</div>
          <small class="text-muted text-uppercase font-weight-bold">2° de Primaria</small><br>
          <small class="text-muted text-uppercase font-weight-bold">Hombres : {{$nro_alumnosegundopsexoH}} |</small>        
          <small class="text-muted text-uppercase font-weight-bold">Mujeres : {{$nro_alumnosegundopsexoM}}</small>          
        </div>
      </div>
      <!-- 3° de primaria -->
      <div class="card">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-people"></i>
          </div>
          <div class="text-value">{{$nro_alumnotercerop}}</div>
          <small class="text-muted text-uppercase font-weight-bold">3° de Primaria</small><br>
          <small class="text-muted text-uppercase font-weight-bold">Hombres : {{$nro_alumnoterceropsexoH}} |</small>
          <small class="text-muted text-uppercase font-weight-bold">Mujeres : {{$nro_alumnoterceropsexoM}}</small>          
        </div>
      </div>
      <!-- 4° de primaria -->
      <div class="card">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-people"></i>
          </div>
          <div class="text-value">{{$nro_alumnocuartop}}</div>
          <small class="text-muted text-uppercase font-weight-bold">4° de Primaria</small><br>
          <small class="text-muted text-uppercase font-weight-bold">Hombres : {{$nro_alumnocuartopsexoH}} |</small>
          <small class="text-muted text-uppercase font-weight-bold">Mujeres :
           {{$nro_alumnocuartopsexoM}}</small>  
        </div>
      </div>
      <!-- 5° de primaria -->
      <div class="card">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-people"></i>
          </div>
          <div class="text-value">{{$nro_alumnoquintop}}</div>
          <small class="text-muted text-uppercase font-weight-bold">5° de Primaria</small><br>
          <small class="text-muted text-uppercase font-weight-bold">Hombres : {{$nro_alumnoquintopsexoH}} |</small>         
          <small class="text-muted text-uppercase font-weight-bold">Mujeres : 
          {{$nro_alumnoquintopsexoM}}</small>  
        </div>
      </div>
      <!-- 6° de primaria -->
      <div class="card">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-people"></i>
          </div>
          <div class="text-value">{{$nro_alumnosextop}}</div>
          <small class="text-muted text-uppercase font-weight-bold">6° de Primaria</small><br>
          <small class="text-muted text-uppercase font-weight-bold">Hombres : {{$nro_alumnosextopsexoH}} |</small>         
          <small class="text-muted text-uppercase font-weight-bold">Mujeres : {{$nro_alumnosextopsexoM}}</small>  
        </div>
      </div>
    </div>

            </div>
            <div class="tab-pane" id="secundaria" role="tabpanel">
<!-- Cards N° de alumnos -->
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Total de Alumnos por Año (Nivel Secundaria)</h6>
    </div>
    <div class="card-group">
      <!-- 1° de secundaria -->
      <div class="card">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-people"></i>
          </div>
          <div class="text-value">{{$nro_alumnoprimero}}</div>
          <small class="text-muted text-uppercase font-weight-bold">1° de secundaria</small><br>
          <small class="text-muted text-uppercase font-weight-bold">Hombres : {{$nro_alumnoprimerosexoH}} |</small>        
          <small class="text-muted text-uppercase font-weight-bold">Mujeres : {{$nro_alumnoprimerosexoM}}</small>          
        </div>
      </div>
      <!-- 2° de secundaria -->
      <div class="card">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-people"></i>
          </div>
          <div class="text-value">{{$nro_alumnosegundo}}</div>
          <small class="text-muted text-uppercase font-weight-bold">2° de secundaria</small><br>
          <small class="text-muted text-uppercase font-weight-bold">Hombres : {{$nro_alumnosegundosexoH}} |</small>        
          <small class="text-muted text-uppercase font-weight-bold">Mujeres : {{$nro_alumnosegundosexoM}}</small>          
        </div>
      </div>
      <!-- 3° de secundaria -->
      <div class="card">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-people"></i>
          </div>
          <div class="text-value">{{$nro_alumnotercero}}</div>
          <small class="text-muted text-uppercase font-weight-bold">3° de secundaria</small><br>
          <small class="text-muted text-uppercase font-weight-bold">Hombres : {{$nro_alumnotercerosexoH}} |</small>
          <small class="text-muted text-uppercase font-weight-bold">Mujeres : {{$nro_alumnotercerosexoM}}</small>          
        </div>
      </div>
      <!-- 4° de secundaria -->
      <div class="card">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-people"></i>
          </div>
          <div class="text-value">{{$nro_alumnocuarto}}</div>
          <small class="text-muted text-uppercase font-weight-bold">4° de secundaria</small><br>
          <small class="text-muted text-uppercase font-weight-bold">Hombres : {{$nro_alumnocuartosexoH}} |</small>
          <small class="text-muted text-uppercase font-weight-bold">Mujeres : {{$nro_alumnocuartosexoM}}</small>  
        </div>
      </div>
      <!-- 5° de secundaria -->
      <div class="card">
        <div class="card-body">
          <div class="h1 text-muted text-right mb-4">
            <i class="icon-people"></i>
          </div>
          <div class="text-value">{{$nro_alumnoquinto}}</div>
          <small class="text-muted text-uppercase font-weight-bold">5° de secundaria</small><br>
          <small class="text-muted text-uppercase font-weight-bold">Hombres : {{$nro_alumnoquintosexoH}} |</small>         
          <small class="text-muted text-uppercase font-weight-bold">Mujeres : {{$nro_alumnoquintosexoM}}</small>  
        </div>
      </div>      
    </div> 
    </div>   
  </div>
</div>

<div>
  <div><br>
    <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="card-columns cols-2">

              <div class="card" >
                <div class="card-header">Alumnos de Primaria
                  <div class="card-header-actions">
                    <a class="card-header-action"  target="_blank">
                      <small class="text-muted">PRIMARIA</small>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <canvas id="graficoprimaria"></canvas>
                  </div>
                <b>Total de Alumnos: {{$total_alumnos_nivel_primaria}}</b>  
                </div>
              </div>

              

              <div class="card">
                <div class="card-header">Nivel Primaria
                  <div class="card-header-actions">
                    <a class="card-header-action" target="_blank">
                      <small class="text-muted">PRIMARIA</small>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <canvas id="graficosexoprimaria"></canvas>
                  </div>
                </div>
              </div>

              <div class="card" >
                <div class="card-header">Alumnos de Secundaria
                  <div class="card-header-actions">
                    <a class="card-header-action"  target="_blank">
                      <small class="text-muted">SECUNDARIA</small>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <canvas id="graficosecundaria"></canvas>
                  </div>
                <b>Total de Alumnos: {{$total_alumnos_nivel_secundaria}}</b>  
                </div>
              </div>

              <div class="card">
                <div class="card-header">Nivel Secundaria
                  <div class="card-header-actions">
                    <a class="card-header-action" target="_blank">
                      <small class="text-muted">SECUNDARIA</small>
                    </a>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <canvas id="graficosexosecundaria"></canvas>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>
</div>

  @else
    <div class="d-sm-flex align-items-center justify-content-between my-4">
      <h1 class="h4 mb-0 text-gray-800">No tienes acceso </h1>
    </div>
  @endif
@endif

@if(Auth::user()->hasrole('secre'))
  @if($trab_data->trab_est == 1)
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">

                  <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> 
                    <small></small>
                  </div>
                  <div class="card-body">
                    <div class="carousel slide" id="carouselExampleControls" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" 
                          src="{{asset('img/ti.png')}}" 
                            data-holder-rendered="true"><center><a  href="{{url('pwrd')}}" class="btn btn-primary">Haga click Aqui</a></center>
                        </div>
<!--                         <div class="carousel-item">
                          <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" 
                          src="{{asset('img/diadelamadre2.png')}}"
                            data-holder-rendered="true">
                        </div> -->
<!--                         <div class="carousel-item">
                          <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]"
                           src="{{asset('img/diadelamadre3.png')}}"
                            data-holder-rendered="true">
                        </div> -->
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
                                

                     
            </div>
        </div>
    </div> 

    <div class="card my-2">
        <div class="card-header py-2">
          <div class="d-sm-flex align-items-center justify-content-between my-1">
            <h1 class="h4 mb-0 text-gray-800">Bienvenido(a) : {{$trab_data->trab_ape.', '.$trab_data->trab_nom}} </h1>
            <h2 class="h4 mb-0 text-gray-800">Cargo: {{$trab_data->description}}  </h2>  
              <!-- inicio reloj -->
              <form name="form_reloj">
                <input type="text" name="reloj" size="10">
              </form>
              <!-- fin reloj -->            
          </div>
        </div>
    </div>

    <!-- tabla detalle docente -->
    <div class="card-header py-3" >
      <h6 class="m-0 font-weight-bold">Datos básicos del docente</h6>
    </div>
    <table  class="table table-sm table-bordered" id="dataTable">
      <tr>
        <td>DNI</td>
        <td>{{$trab_data->trab_dni}}</td>
      </tr>
      <tr>
        <td>Apellidos</td>
        <td>{{$trab_data->trab_ape}}</td>
      </tr>
      <tr>
        <td>Nombres</td>
        <td>{{$trab_data->trab_nom}}</td>
      </tr>
      <tr>
        <td>Sexo</td>
        <td>
          @if ($trab_data->trab_sexo == 1)
              Masculino
          @else
              Femenino
          @endif
        </td>
      </tr>
      <tr>
        <td>Fecha de nacimiento</td>
        <td>{{date("d/m/Y", strtotime($trab_data->trab_fnac))}}</td>
      </tr>
    </table>
    <!-- fin tabla detalle alumno -->
  @else
    <div class="d-sm-flex align-items-center justify-content-between my-4">
      <h1 class="h4 mb-0 text-gray-800">No tienes acceso </h1>
    </div>
  @endif
@endif

@if(Auth::user()->hasrole('docen'))
  @if($trab_data->trab_est == 1)
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">

                  <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> 
                    <small></small>
                  </div>
                  <div class="card-body">
                    <div class="carousel slide" id="carouselExampleControls" data-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" 
                          src="{{asset('img/ti.png')}}" 
                            data-holder-rendered="true"><center><a  href="{{url('pwrd')}}" class="btn btn-primary">Haga click Aqui</a></center>
                        </div>
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>        

    <div class="card my-2">
        <div class="card-header py-2">
          <div class="d-sm-flex align-items-center justify-content-between my-1">
            <h1 class="h4 mb-0 text-gray-800">Bienvenido(a) : {{$trab_data->trab_ape.', '.$trab_data->trab_nom}} </h1>
            <h2 class="h4 mb-0 text-gray-800">Cargo: {{$trab_data->description}}  </h2>  
              <!-- inicio reloj -->
              <form name="form_reloj">
                <input type="text" name="reloj" size="10">
              </form>
              <!-- fin reloj -->            
          </div>
        </div>
    </div>

    <!-- tabla detalle docente -->
    <div class="card-header py-3" >
      <h6 class="m-0 font-weight-bold">Datos básicos del docente</h6>
    </div>
    <table  class="table table-sm table-bordered" id="dataTable">
      <tr>
        <td>DNI</td>
        <td>{{$trab_data->trab_dni}}</td>
      </tr>
      <tr>
        <td>Apellidos</td>
        <td>{{$trab_data->trab_ape}}</td>
      </tr>
      <tr>
        <td>Nombres</td>
        <td>{{$trab_data->trab_nom}}</td>
      </tr>
      <tr>
        <td>Sexo</td>
        <td>
          @if ($trab_data->trab_sexo == 1)
              Masculino
          @else
              Femenino
          @endif
        </td>
      </tr>
      <tr>
        <td>Fecha de nacimiento</td>
        <td>{{date("d/m/Y", strtotime($trab_data->trab_fnac))}}</td>
      </tr>
    </table>
    <!-- fin tabla detalle alumno -->
  @else
    <div class="d-sm-flex align-items-center justify-content-between my-4">
      <h1 class="h4 mb-0 text-gray-800">No tienes acceso </h1>
    </div>
  @endif
@endif


<?php 
  $alumnodatos = DB::table('alumno')
                  ->join('apoderado','apoderado.apod_id','alumno.alum_apod')
                  ->where('alumno.alum_dni','=',Auth::user()->usuario)->first();                          
?>
<?php 
  $alumnoventana = DB::table('alumno')
                  ->join('apoderado','apoderado.apod_id','alumno.alum_apod')
                  ->where('alumno.alum_dni','=',Auth::user()->usuario)->first();                          
?>
<!-- Home - Alumno -->
@if(Auth::user()->hasrole('alum'))
  @if($alumnodatos->alum_est == 1)
  <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">

                  <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> 
                    <small></small>
                  </div>
                  <div class="card-body">
                    <div class="carousel slide" id="carouselExampleControls" data-ride="carousel">
                      <div class="carousel-inner">
                        <!-- primera imagen -->
                        <div class="carousel-item active">
                          <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" 
                          src="{{asset('img/entregradenotas.png')}}" 
                            data-holder-rendered="true" ><center><a  href="{{url('misreportes/'.Auth::user()->usuario)}}" class="btn btn-primary">Haga click Aqui</a></center> 
                        </div>
                        
                        <!-- Segunda imagen -->   
                        <div class="carousel-item">
                          <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" 
                          src="{{asset('img/ti.png')}}"
                            data-holder-rendered="true"><center><a  href="{{url('pwrd')}}" class="btn btn-primary">Haga click Aqui</a></center>
                        </div>
                        <!-- tercera imagen -->   
                        <!-- <div class="carousel-item">
                          <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]"
                           src="{{asset('img/diadelamadre3.png')}}"
                            data-holder-rendered="true">
                        </div> -->
                      </div>
                      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                  </div>
                </div>
                                

                     
            </div>
        </div>
    </div> 

    <div class="card my-2">
      <div class="card-header py-2">
        <div class="d-sm-flex align-items-center justify-content-between my-1">
          <h1 class="h4 mb-0 text-gray-800">Bienvenido(a): {{$alumnodatos->alum_ape.', '.$alumnodatos->alum_nom}} </h1>
          <h2 class="h4 mb-0 text-gray-800">Grado: 
                              @if ($alumnodatos->alum_grad <= 6)
                                    {{$alumnodatos->alum_grad . '° de primaria'}}
                                @elseif($alumnodatos->alum_grad == 7)
                                    {{'1° de secundaria'}}
                                @elseif($alumnodatos->alum_grad == 8)
                                    {{'2° de secundaria'}}          
                                @elseif($alumnodatos->alum_grad == 9)
                                    {{'3° de secundaria'}}  
                                @elseif($alumnodatos->alum_grad == 10)
                                    {{'4° de secundaria'}}  
                                @elseif($alumnodatos->alum_grad == 11)
                                    {{'5° de secundaria'}}  
                                @else
                                    {{'Egresado'}}  
                              @endif
             </h2> 
            <!-- inicio reloj -->
            <form name="form_reloj">
              <input type="text" name="reloj" size="10">
            </form>
            <!-- fin reloj -->            
        </div>
      </div>
    </div>
    
    <!-- tabla detalle alumno -->
    <div class="card-header py-3" >
      <h6 class="m-0 font-weight-bold">Datos básicos del alumno(a)</h6>
    </div>
    <table  class="table table-sm table-bordered" id="dataTable">
      <tr>
        <td>DNI</td>
        <td>{{$alumnodatos->alum_dni}}</td>
      </tr>
      <tr>
        <td>Apellidos</td>
        <td>{{$alumnodatos->alum_ape}}</td>
      </tr>
      <tr>
        <td>Nombres</td>
        <td>{{$alumnodatos->alum_nom}}</td>
      </tr>
      <tr>
        <td>Sexo</td>
        <td>
          @if ($alumnodatos->alum_sexo == 1)
              Masculino
          @else
              Femenino
          @endif
        </td>
      </tr>
      <tr>
        <td>Grado</td>
        <td>
          @if ($alumnodatos->alum_grad <= 6)
                                    {{$alumnodatos->alum_grad . '° de primaria'}}
                                @elseif($alumnodatos->alum_grad == 7)
                                    {{'1° de secundaria'}}
                                @elseif($alumnodatos->alum_grad == 8)
                                    {{'2° de secundaria'}}          
                                @elseif($alumnodatos->alum_grad == 9)
                                    {{'3° de secundaria'}}  
                                @elseif($alumnodatos->alum_grad == 10)
                                    {{'4° de secundaria'}}  
                                @elseif($alumnodatos->alum_grad == 11)
                                    {{'5° de secundaria'}}  
                                @else
                                    {{'Egresado'}}  
                                @endif
        </td>
      </tr>
      <tr>
        <td>Fecha de nacimiento</td>
        <td>{{date("d/m/Y", strtotime($alumnodatos->alum_fnac))}}</td>
      </tr>
      <tr>
        <td>E-mail de boleta</td>
        <td>{{$alumnodatos->apod_email}}</td>
      </tr>
      <tr>
        <td>Apoderado(a)</td>
        <td>{{$alumnodatos->apod_nom.' '.$alumnodatos->apod_ape}}</td>
      </tr> 
    </table>
    <!-- fin tabla detalle alumno -->

    <!-- Inicio de imagen del 2020 -->
    <div align="center"><br>
      <a class="navbar-brand">
          <img  src="{{asset('img/anonuevo.png')}}" height="70px">
      </a>     
    </div> 
    <!-- fin de imagen 2020 -->

  @else
  <div class="d-sm-flex align-items-center justify-content-between my-4">
    <h1 class="h4 mb-0 text-gray-800">No tienes acceso</h1> 
  </div>
  @endif
@endif


@endsection

@section('scripts')
<script>
  function mueveReloj(){
      momentoActual = new Date()
      hora = momentoActual.getHours()
      minuto = momentoActual.getMinutes()
      segundo = momentoActual.getSeconds()
      horaImprimible = hora + " : " + minuto + " : " + segundo
      document.form_reloj.reloj.value = horaImprimible
      setTimeout("mueveReloj()",1000)
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
  var pieChart = new Chart($('#graficoprimaria'), {
  type: 'pie',
  data: {
    labels: ['1°de primaria','2°de primaria','3°de primaria','4°de primaria','5°de primaria','6°de primaria','Total de Alumnos'],
    datasets: [{
      data: [({{$nro_alumnoprimerop}}),({{$nro_alumnosegundop}}),({{$nro_alumnotercerop}}),({{$nro_alumnocuartop}}),({{$nro_alumnoquintop}}),({{$nro_alumnosextop}}),({{$total_alumnos_nivel_primaria}})],
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56','#77DD77','#6C4675','#E3E4E5','#00A6D6'],
      hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56','#77DD77','#6C4675','#E3E4E5','#00A6D6']
    }]
  },
  options: {
    responsive: true
  }
}); // eslint-disable-next-line no-unused-vars

</script>
<script type="text/javascript">
  var pieChart = new Chart($('#graficosecundaria'), {
  type: 'pie',
  data: {
    labels: ['1°de secundaria','2°de secundaria','3°de secundaria','4°de secundaria','5°de secundaria','Total de Alumnos'],
    datasets: [{
      data: [({{$nro_alumnoprimero}}),({{$nro_alumnosegundo}}),({{$nro_alumnotercero}}),({{$nro_alumnocuarto}}),({{$nro_alumnoquinto}}),({{$total_alumnos_nivel_secundaria}})],
      backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56','#77DD77','#E3E4E5','#00A6D6'],
      hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56','#77DD77','#E3E4E5','#00A6D6']
    }]
  },
  options: {
    responsive: true
  }
}); // eslint-disable-next-line no-unused-vars

</script>
<script type="text/javascript">
    var barChart = new Chart($('#graficosexoprimaria'), {
  type: 'bar',
  data: {
    labels: ['1°de Prim','2°de Prim','3°de Prim','4°de Prim','5°de Prim','6°de Prim'],
    datasets: [{
      label: 'Hombres',
      backgroundColor: 'rgba(220, 220, 220, 0.5)',
      borderColor: 'rgba(220, 220, 220, 0.8)',
      highlightFill: 'rgba(220, 220, 220, 0.75)',
      highlightStroke: 'rgba(220, 220, 220, 1)',
      data: [({{$nro_alumnoprimeropsexoH}}),({{$nro_alumnosegundopsexoH}}),({{$nro_alumnoterceropsexoH}}),({{$nro_alumnocuartopsexoH}}),({{$nro_alumnoquintopsexoH}}),({{$nro_alumnosextopsexoH}})]
    }, {
      label: 'Mujeres',
      backgroundColor: 'rgba(151, 187, 205, 0.5)',
      borderColor: 'rgba(151, 187, 205, 0.8)',
      highlightFill: 'rgba(151, 187, 205, 0.75)',
      highlightStroke: 'rgba(151, 187, 205, 1)',
      data: [({{$nro_alumnoprimeropsexoM}}),({{$nro_alumnosegundopsexoM}}),({{$nro_alumnoterceropsexoM}}),({{$nro_alumnocuartopsexoM}}),({{$nro_alumnoquintopsexoM}}),({{$nro_alumnosextopsexoM}})]
    }]
  },
  options: {
    responsive: true
  }
}); // eslint-disable-next-line no-unused-vars
</script>
<script type="text/javascript">
    var barChart = new Chart($('#graficosexosecundaria'), {
  type: 'bar',
  data: {
    labels: ['1°de Secun','2°de Secun','3°de Secun','4°de Secun','5°de Secun'],
    datasets: [{
      label: 'Hombres',
      backgroundColor: 'rgba(220, 220, 220, 0.5)',
      borderColor: 'rgba(220, 220, 220, 0.8)',
      highlightFill: 'rgba(220, 220, 220, 0.75)',
      highlightStroke: 'rgba(220, 220, 220, 1)',
      data: [({{$nro_alumnoprimerosexoH}}),({{$nro_alumnosegundosexoH}}),({{$nro_alumnotercerosexoH}}),({{$nro_alumnocuartosexoH}}),({{$nro_alumnoquintosexoH}})]
    }, {
      label: 'Mujeres',
      backgroundColor: 'rgba(151, 187, 205, 0.5)',
      borderColor: 'rgba(151, 187, 205, 0.8)',
      highlightFill: 'rgba(151, 187, 205, 0.75)',
      highlightStroke: 'rgba(151, 187, 205, 1)',
      data: [({{$nro_alumnoprimerosexoM}}),({{$nro_alumnosegundosexoM}}),({{$nro_alumnotercerosexoM}}),({{$nro_alumnocuartosexoM}}),({{$nro_alumnoquintosexoM}})]
    }]
  },
  options: {
    responsive: true
  }
}); // eslint-disable-next-line no-unused-vars
</script>

<script type="text/javascript">
  var lineChart = new Chart($('#graficoasistenciatotal'), {
  type: 'line',
  data: {
    labels: [
    <?php 
          foreach ($fechas as  $fecha) { ?>
            '<?php echo $fecha->asig_nom; ?>',
          <?php } ?>
            ],
    datasets: [{
      label: 'Asistencias',
      backgroundColor: '#FF6384',
      borderColor: 'rgba(220, 220, 220, 1)',
      pointBackgroundColor: 'rgba(220, 220, 220, 1)',
      pointBorderColor: '#fff',
      data: [({{$aa_arte}}),({{$aa_cyt}}),({{$aa_cc}}),({{$aa_com}}),({{$aa_ef}}),({{$aa_in}}),({{$aa_mat}})]
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

});
</script>

@endsection
