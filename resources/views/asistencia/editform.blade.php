@extends('plantilla.plantilla')
@section('contenido')
<?php  $q = DB::table('curso')
                ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                ->where('curso.curs_id','=',$idcurso)
                ->first(); ?>


<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Busqueda de Asistencia por Fecha y Alumno del Curso de: {{$q->asig_nom}} </strong>
            </div>
            <div class="card-body">
            	<form action="{{action('AsistenciaController@recibirEditarAsis')}}" method="POST">
					@method('POST')
					{{ csrf_field() }}	
					<input type="hidden" name="idcurso" value="{{$idcurso}}">
					<div class="form-group row">
                        <label class="col-md-1 col-form-label">Fecha</label>
                        <div class="col-md-3">
                            <input class="form-control" type="date" name="fecha">
                        </div>
                        <label class="col-md-2 col-form-label">Nombre del Alumno</label>
                        <div class="col-md-3">
                            <select name="alumno" class="form-control">
								@foreach($alumnos as $alum)
									<option value="{{$alum->alum_id}}">
										{{$alum->alum_nom}}
									</option>
								@endforeach
							</select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Mostrar" class="btn btn-primary">
                        <a href="{{url('asistencia/'.$idcurso)}}" class="btn btn-danger">Cancelar</a>
                    </div> 
				</form>
            </div>
        </div>
    </div>
</div>
@endsection