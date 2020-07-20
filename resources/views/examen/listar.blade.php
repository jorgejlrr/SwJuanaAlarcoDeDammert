@extends('plantilla.plantilla')
@section('contenido')
<?php  $q = DB::table('curso')
                ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                ->where('curso.curs_id','=',$idcurso)
                ->first(); ?>
<div class="row mt-4">
    <div class="col-md-6">
        @if(Auth::user()->hasRole('docen'))
            <a href="{{url('newexamen/'.$idcurso)}}" class="btn btn-primary">Subir Exámen en línea</a>
        @endif
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
    <div class="col-sm-12">
        <div class="card my-3">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Curso: {{$q->asig_nom}} / Exámenes Virtuales
                <div class="card-header-actions">
                    <a href="{{url('curso/'.$idcurso)}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-sm" id="dataTable">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Fecha</th>
                            <th>Autor</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $examen)
                        <tr>
                            <td>{{$examen->exa_titulo}}</td>
                            <td>{{$examen->exa_fecha}}</td>
                            <td>{{$examen->trab_ape . ', ' . $examen->trab_nom}}</td>
                            <td>
                                <a href="{{url('examen/'.$examen->exa_id)}}" class="btn btn-secondary btn-sm" title="ver examen"><i class="fa fa-file-text"></i></a>
                                @if(Auth::user()->hasrole('docen'))
                                <a href="{{url('examen/'.$examen->exa_id.'/edit')}}" title="Editar examen" class="btn btn-sm btn-warning" title="editar examen"><i class="fa fa-pencil"></i></a>
                                <a data-target="#modal-delete-{{$examen->exa_id}}" title="eliminar examen" data-toggle="modal" class="btn btn-sm btn-danger" title="eliminar examen"><i class="fa fa-trash"></i></a>
                                @include('examen.delete')
                                @endif              
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection