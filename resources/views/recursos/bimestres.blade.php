@extends('plantilla.plantilla')
@section('contenido')
<?php  $q = DB::table('curso')
                ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                ->where('curso.curs_id','=',$idcurso)
                ->first(); ?>
<div class="row">
    <div class="col-sm-12">
        <div class="card my-3">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Curso: {{$q->asig_nom}} / Recursos
                <div class="card-header-actions">
                    <a href="{{url('curso/'.$idcurso)}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <a href="{{url('recursos/'.$idcurso.'/1')}}" class="btn btn-light">1° Bimestre</a>
                <a href="{{url('recursos/'.$idcurso.'/2')}}" class="btn btn-light">2° Bimestre</a>
                <a href="{{url('recursos/'.$idcurso.'/3')}}" class="btn btn-light">3° Bimestre</a>
                <a href="{{url('recursos/'.$idcurso.'/4')}}" class="btn btn-light">4° Bimestre</a>
            </div>
        </div>
    </div>
</div>
@endsection