@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Editar curso</strong>
            </div>
            <div class="card-body">
                <form action="{{url('curso/'.$curso->curs_id)}}" method="POST" class="form-horizontal"> 
                @method('PATCH')
                {{ csrf_field() }}
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <p>Corregir los siguientes campos:</p>
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Asignatura</label>
                        <div class="col-md-3">
                            <select name="curs_idasig" class="form-control" id="select-asignatura" readonly required>
                                <option value="{{$curso->asig_id}}" >{{$curso->asig_nom}}</option>
                            </select>
                        </div>
                        <label class="col-md-1 col-form-label">Docente</label>
                        <div class="col-md-4">
                            <select name="curs_iddocen" class="form-control" id="select-docente" required>
                            @foreach ($docentes as $doc)
                                @if ($curso->curs_iddocen == $doc->trab_id)
                                <option value="{{$doc->trab_id}}" selected>{{$doc->trab_ape . ', ' . $doc->trab_nom}}</option>
                                @else
                                <option value="{{$doc->trab_id}}">{{$doc->trab_ape . ', ' . $doc->trab_nom}}</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Grado</label>
                        <div class="col-md-2">
                            <select name="curs_grado" class="form-control" required readonly>
                                <option value="{{$curso->curs_grado}}" >
                                    @if ($curso->curs_grado <= 6)
                                        {{$curso->curs_grado . '° de primaria'}}
                                    @elseif($curso->curs_grado == 7)
                                        {{'1° de secundaria'}}
                                    @elseif($curso->curs_grado == 8)
                                        {{'2° de secundaria'}}          
                                    @elseif($curso->curs_grado == 9)
                                        {{'3° de secundaria'}}  
                                    @elseif($curso->curs_grado == 10)
                                        {{'4° de secundaria'}}  
                                    @elseif($curso->curs_grado == 11)
                                        {{'5° de secundaria'}}  
                                    @else
                                        {{'Egresado'}}  
                                    @endif
                                </option>
                            </select>
                        </div>
                        <label class="col-md-2 col-form-label">Año</label>
                        <div class="col-md-2">
                            <select class="form-control"  name="curs_año" size="1" readonly>
                                <option value="{{$curso->curs_año}}">{{$curso->curs_año}}</option>
                            </select>
                        </div>
                    </div> 

                    <div class="form-actions">
                        <input type="submit" value="Modificar" class="btn btn-warning">
                        <a href="{{url('curso')}}" class="btn btn-danger">Cancelar</a>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection