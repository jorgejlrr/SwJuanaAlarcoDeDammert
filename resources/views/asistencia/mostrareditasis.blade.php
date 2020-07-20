@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Modificacion de la Asistencia  </strong>
                <div class="card-header-actions">
                    <a href="{{url('asistencia/editar/'.$mostrarfecha->asis_idcurso)}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            
            <div class="card-body">
            	<form action="{{url('asistencia/'.$mostrarfecha->asis_id)}}" method="POST">
					@method('PATCH')
                	{{ csrf_field() }}
                	<div class="form-group row">
                        <input type="hidden" name="asis_id" value="{{$mostrarfecha->asis_id}}">
                    	<label class="col-md-3 col-form-label">{{$mostrarfecha->alum_nom.' '.$mostrarfecha->alum_ape}}</label>
                        <div class="col-md-1" >
                            <select name="asis_est" class="form-control">
                            	@if ($mostrarfecha->asis_est == 0)
                                        <option value="0" selected>A</option>
                                        <option value="1">T</option>                                                             <option value="2">F</option>
                                @endif
                                @if ($mostrarfecha->asis_est == 1)
                                        <option value="0">A</option>
                                        <option value="1" selected>T</option>                                                    <option value="2">F</option>
                                @endif
                                @if ($mostrarfecha->asis_est == 2)
                                        <option value="0">A</option>
                                        <option value="1">T</option>                                                             <option value="2" selected>F</option>
                                @endif
							</select>
                        </div>
                    </div>

                    
                    <div class="form-actions">
                        <input type="submit" value="Editar" class="btn btn-warning">
                        <a href="{{url('home')}}" class="btn btn-danger">Cancelar</a>
                    </div> 
				</form>
            </div>
        </div>
    </div>
</div>


@endsection