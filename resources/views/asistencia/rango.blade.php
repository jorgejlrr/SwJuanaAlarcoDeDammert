@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">

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
                <div class="card-header-actions">
                    <a href="{{url('asistencia/'.$idcurso)}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table id="dataTable">
					<thead>
						<tr>
							<th>Alumno</th>
							@foreach($fechas as $f)
				            	<th><small>{{date("d/m/Y", strtotime($f->asis_fecha))}}</small></th>
				            @endforeach  
						</tr>
					</thead>
					<tbody>
						@foreach($alumnos as $al)
						<tr>
							<td>{{$al->alum_ape . ", " . $al->alum_nom}}</td>
							@foreach($fechas as $a)
								<?php $asis = DB::table('asistencia')
				                ->where('asis_fecha','=',$a->asis_fecha)
				                ->where('asis_idcurso','=',$idcurso)
				                ->where('asis_idalumno','=',$al->alum_id)
				                ->first(); ?>
				                <td>@if ($asis->asis_est == 0)
                                            A
                                        @elseif ($asis->asis_est == 1)
                                            T
                                        @else
                                            F
                                        @endif</td>
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