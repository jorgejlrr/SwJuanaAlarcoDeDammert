@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Gráfico de notas</strong>
            </div>
            <div class="card-body">
            	<form method="post" action="{{url('datagraficonotas')}}" >
					@method('POST')
					{{ csrf_field() }}
                    <div class="form-group row">
                    	<label class="col-md-2 col-form-label">N° Bimestre</label>
                        <div class="col-md-3" >
                            <select name="nbim" class="form-control">
								<option hidden>---Seleccione---</option>
								<option value="1">1° Bimestre</option>
								<option value="2">2° Bimestre</option>
								<option value="3">3° Bimestre</option>
								<option value="4">4° Bimestre</option>
							</select>
                        </div>
                    </div>
					<div class="form-actions">
                        <input type="submit" value="Generar Gráfico" class="btn btn-primary">
                        <a href="{{url('home')}}" class="btn btn-danger">Cancelar</a>
                    </div> 
				</form>
            </div>
        </div>
    </div>
</div>
@endsection

