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
                ->where('curso.curs_id','=',$curso->curs_id)
                ->first(); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="card my-3">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Curso: {{$q->asig_nom}}
                <div class="card-header-actions">
                    <a href="{{url('cursos/'.Auth::user()->usuario)}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                
                <a href="{{url('asistencia/'.$curso->curs_id)}}" class="btn btn-light">Asistencias</a>
                <a href="{{url($curso->curs_id.'/notas')}}" class="btn btn-light">Notas</a>
                <a href="{{url($curso->curs_id.'/recursos')}}" class="btn btn-light">Recursos</a>
                <a href="{{url($curso->curs_id.'/videos')}}" class="btn btn-light">Videos</a>
                @if(Auth::user()->hasRole('docen'))
                    <!-- <a href="{{url('newexamen',['idcurso'=>$curso->curs_id])}}" class="btn btn-light">Subir Exámen en línea</a>-->
                    <a href="{{url('exavirtual',['idcurso'=>$curso->curs_id])}}" class="btn btn-light">Exámen en línea</a>
                    <a href="{{url('reportes/'.$curso->curs_id)}}" class="btn btn-light">Reportes</a>
                @endif
                @if(Auth::user()->hasRole('alum'))
                    <!-- <a href="{{url('exavirtual',['idcurso'=>$curso->curs_id])}}" class="btn btn-light">Ver exámen en línea</a> -->
                    <a href="{{url('exavirtual',['idcurso'=>$curso->curs_id])}}" class="btn btn-light">Ver exámen en línea</a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection