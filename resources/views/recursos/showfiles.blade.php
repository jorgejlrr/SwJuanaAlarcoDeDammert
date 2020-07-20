@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-md-6">
        <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#uploadFile"><i class="fa fa-upload"></i> Subir recurso</button>
        @include('recursos.modal-upload')
    </div>
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
                <i class="fa fa-align-justify"></i> Curso: {{$q->asig_nom}} / {{$nbim}}° Bimestre / Recursos
                <div class="card-header-actions">
                    <a href="{{url($idcurso.'/recursos')}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-sm" id="dataTable">
                    <thead>
                        <tr>
                            <th>Archivo</th>
                            <th>Propietario</th>
                            <th>Fecha</th>
                            <th>Opcionesss</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($files as $file)
                        <tr>
                            <form action="{{url('download')}}" method="POST">
                            @csrf
                                <td>{{$file->rec_archivo}}</td>
                                <td>
                                    @if ($file->rec_rol == 3)
                                        <?php 
                                            $doc = DB::table('trabajador')
                                                    ->where('trab_dni','=',$file->rec_dni)->first();
                                        ?>
                                        {{$doc->trab_ape . ', ' . $doc->trab_nom}} 
                                    @elseif ($file->rec_rol == 4)
                                        <?php 
                                            $alum = DB::table('alumno')
                                                    ->where('alum_dni','=',$file->rec_dni)->first();
                                        ?>
                                        {{$alum->alum_ape . ', ' . $alum->alum_nom}}
                                    @endif
                                </td>
                                <td>{{$file->rec_fechahora}}</td>
                                <input type="hidden" value="{{$file->rec_archivo}}" name="filename">
                                <input type="hidden" value="{{$idcurso}}" name="idcurso">
                                <td><button type="submit" class="btn btn-success btn-sm" title="descargar recurso"><i class="fa fa-download"></i></button>
                                    @if(Auth::user()->hasrole('docen'))
                                <a data-target="#modal-delete-{{$file->rec_id}}" title="eliminar recurso" data-toggle="modal" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>    
                                 @endif 
                                </td>
                                
                                @include('recursos.delete')
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection