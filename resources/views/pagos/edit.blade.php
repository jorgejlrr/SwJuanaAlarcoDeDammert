@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Editar pagos</strong>
            </div>
            <div class="card-body">
                <form action="{{url('pago/'.$p->id)}}" method="POST" class="form-horizontal"> 
                @method('PATCH')
                {{ csrf_field() }}
                    <div class="form-group row">
                    	<input type="hidden" name="idalumno" value="{{$p->alum_id}}">
                        <label class="col-md-1 col-form-label">DNI</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" value="{{$p->alum_dni}}" readonly >
                        </div>
                        <label class="col-md-1 col-form-label">Apellidos</label>
                        <div class="col-md-4">
                            <input class="form-control" type="text" value="{{$p->alum_ape}}" readonly >
                        </div>
                        <label class="col-md-1 col-form-label">Nombres</label>
                        <div class="col-md-3">
                            <input class="form-control"  type="text" value="{{$p->alum_nom}}" readonly >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1 col-form-label">M. Anual</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" value="{{$p->montoanual}}" readonly>
                        </div>
                        <label class="col-md-1 col-form-label">Dscto</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" value="{{$p->descuento}}" readonly>
                        </div>
                        <label class="col-md-1 col-form-label">M. Inicial</label>
                        <div class="col-md-2">
                            <input class="form-control"  type="text" value="{{$p->inicial}}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1 col-form-label">Marzo</label>
                        <div class="col-md-2">
                            <input class="form-control" name="marzo" type="text" value="{{$p->marzo}}"  >
                        </div>
                        <label class="col-md-1 col-form-label">Abril</label>
                        <div class="col-md-2">
                            <input class="form-control" name="abril" type="text" value="{{$p->abril}}"  >
                        </div>
                        <label class="col-md-1 col-form-label">Mayo</label>
                        <div class="col-md-2">
                            <input class="form-control" name="mayo" type="text" value="{{$p->mayo}}" >
                        </div>
                        <label class="col-md-1 col-form-label">Junio</label>
                        <div class="col-md-2">
                            <input class="form-control" name="junio" type="text" value="{{$p->junio}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1 col-form-label">Julio</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="julio" value="{{$p->julio}}"  >
                        </div>
                        <label class="col-md-1 col-form-label">Agosto</label>
                        <div class="col-md-2">
                            <input class="form-control" name="agosto" type="text" value="{{$p->agosto}}"  >
                        </div>
                        <label class="col-md-1 col-form-label"><small>Setiembre</small></label>
                        <div class="col-md-2">
                            <input class="form-control" name="setiembre" type="text" value="{{$p->setiembre}}" >
                        </div>
                        <label class="col-md-1 col-form-label">Octubre</label>
                        <div class="col-md-2">
                            <input class="form-control" name="octubre" type="text" value="{{$p->octubre}}" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1 col-form-label"><small>Noviembre</small></label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="noviembre" value="{{$p->noviembre}}">
                        </div>
                        <label class="col-md-1 col-form-label"><small>Diciembre</small></label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="diciembre" value="{{$p->diciembre}}">
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Modificar" class="btn btn-warning">
                        <a href="{{url('pago')}}" class="btn btn-danger">Cancelar</a>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
