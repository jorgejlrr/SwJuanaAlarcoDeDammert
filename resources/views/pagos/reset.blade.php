@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Reset pagos</strong>
            </div>
            <div class="card-body">
                <form action="{{url('pagosupdate')}}" method="POST" class="form-horizontal"> 
                @method('POST')
                {{ csrf_field() }}
                    <div class="form-group row">
                        <input type="hidden" name="id" value="{{$p->id}}">
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
                            <input class="form-control" type="text" name="montoanual" value="{{$p->montoanual}}">
                        </div>
                        <label class="col-md-1 col-form-label">Dscto</label>
                        <div class="col-md-2">
                            <input class="form-control" type="text" name="descuento" value="{{$p->descuento}}">
                        </div>
                        <label class="col-md-1 col-form-label">M. Inicial</label>
                        <div class="col-md-2">
                            <input class="form-control"  type="text" name="inicial" value="{{$p->inicial}}">
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
