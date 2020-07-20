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
<?php  $q = DB::table('curso')
                ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                ->where('curso.curs_id','=',$idcurso)
                ->first(); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card my-3">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Curso: {{$q->asig_nom}}
                <div class="card-header-actions">
                    <a href="{{url('curso/'.$idcurso)}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>

            <div class="card-body">
                @if(Auth::user()->hasRole('docen'))
                    <a href="{{url('reportes/'.$idcurso.'/lastconection')}}" id="btn-only1click" class="btn btn-danger"><i class="fa fa-print"></i> Última Conexión de Alumnos</a><br><br>
                    <a href="{{url('reportes/'.$idcurso.'/asistenciadocen')}}" id="btn-only1click" class="btn btn-danger"><i class="fa fa-print"></i> Asistencias de los alumnos</a>
                @endif
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
    alert( "Se esta descargando la Ultima Conexión de Alumnos en PDF, espere a que termine la descarga." );
  }
});
</script>
@endsection