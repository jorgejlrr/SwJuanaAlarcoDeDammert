@extends('plantilla.plantilla')
@section('contenido')
<?php 
    $fechas = DB::table('asistencia')
                    ->select('asistencia.asis_fecha')
                    ->where('asistencia.asis_idcurso','=',$idcurso)
                    ->distinct()
                    ->orderby('asistencia.asis_fecha','asc')
                    ->get();
    $alumnos = DB::table('alumno_curso')
                ->join('alumno','alumno.alum_id','alumno_curso.alumno_id')
                ->where('alumno_curso.curso_id','=',$idcurso)
                ->orderby('alumno.alum_ape','asc')
                ->get();
?>
<div class="row mt-4">
    <div class="col-md-6">
        <a href="{{url('asistencia/registrar/'.$idcurso)}}" id="btn-only1click" class="btn btn-primary">Registrar asistencia</a>
    </div>
    <div class="col-md-6">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card my-3">
            <div class="card-header">
                @if(Auth::user()->hasRole('docen'))
                    <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#rf"> Rango de fechas</button>
                    <a href="{{url('asistencia/editar/'.$idcurso)}}" type="button" class="btn btn-warning">Editar Asistencia</a>
                    @include('asistencia.modal')
                @endif
                
                <div class="card-header-actions">
                    <a href="{{url('curso/'.$idcurso)}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>Alumnos</th>
                            @foreach($fechas as $f)
                            <th><small>{{date("d/m/Y", strtotime($f->asis_fecha))}}</small></th>
                            @endforeach    
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($alumnos as $a)
                            <tr>
                                <td>{{$a->alum_ape.', '.$a->alum_nom}}</td>
                                @foreach($fechas as $f)
                                <?php 
                                    $data = DB::table('asistencia')
                                                    ->where([['asistencia.asis_fecha','=',$f->asis_fecha],
                                                            ['asistencia.asis_idcurso','=',$idcurso],
                                                            ['asistencia.asis_idalumno','=',$a->alum_id]])
                                                    ->first();
                                ?>
                                    <td>
                                        @if ($data->asis_est == 0)
                                            A
                                        @elseif ($data->asis_est == 1)
                                            T
                                        @else
                                            F
                                        @endif
                                    </td>
                                @endforeach
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    // Variable global que nos dirá si hemos dado un click al botón
var clicando= false;

// Evento de click del primer botón
$("#btn-dobleclick").click(function() {
  // Mostramos el Alert
  alert( "Handler for dobleclick.click() called." );
});

// Evento del segundo boton
$("#btn-only1click").click(function() {
  // Si ha sido clicado
  if (clicando){
    // Mostramos que ya se ha clicado, y no puede clicarse de nuevo
    alert( "Que ya he realizado un click." );
  // Si no ha sido clicado
  } else {
    // Le decimos que ha sido clicado
    clicando= true;
    // Mostramos el mensaje de que ha sido clicado
    alert( "Bienvenido al registro de Asistencias " );
  }
});
</script>
@endsection