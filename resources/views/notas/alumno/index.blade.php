<?php 
  $alumnodatos = DB::table('alumno')
                  ->join('apoderado','apoderado.apod_id','alumno.alum_apod')
                  ->where('alumno.alum_dni','=',Auth::user()->usuario)->first();                          
?>
@extends('plantilla.plantilla')
@section('contenido')
@if(Auth::user()->hasrole('alum'))
  @if($alumnodatos->alum_est == 1)
<div class="row mt-4">
    <div class="col-md-6">
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
    <div class="col-md-12">
        <div class="card my-3">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Código del curso: {{$idcurso}} / {{$nbim}}° Bimestre 
                <div class="card-header-actions">
                    <a href="{{url($idcurso.'/notas')}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive" id="">
                    <thead>
                        <tr>
                            <th>Alumnos</th>
                            <th class="text-center">N1</th>
                            <th class="text-center">N2</th>
                            <th class="text-center">N3</th>
                            <th class="text-center">Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($data as $a)
                            <tr>
                                <td>{{$a->alum_ape .', '.$a->alum_nom}}</td>
                                <td class="text-center">{{$a->not_n1}}</td>
                                <td class="text-center">{{$a->not_n2}}</td>
                                <td class="text-center">{{$a->not_n3}}</td>
                                <td class="text-center">{{$a->not_promedio}}</td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@else
  <div class="d-sm-flex align-items-center justify-content-between my-4">
    <h1 class="h4 mb-0 text-gray-800">No tienes acceso</h1> 
  </div>
  @endif
@endif
@endsection