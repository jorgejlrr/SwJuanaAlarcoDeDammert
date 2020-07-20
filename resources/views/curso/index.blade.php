<?php 
$trab_data = DB::table('trabajador')
                  ->join('role_user','role_user.user_id','trabajador.trab_dni')
                  ->join('roles','roles.id','role_user.role_id')
                  ->where('trabajador.trab_dni','=',Auth::user()->usuario)->first();
 ?>
@extends('plantilla.plantilla')
@section('contenido')
@if(Auth::user()->hasAnyRole(['secre','admin']))
  @if($trab_data->trab_est == 1)
<div class="row mt-4">
    <div class="col-md-6">
        <a href="{{url('curso/create')}}" class="btn btn-primary">Registrar curso</a>
    </div>
    <div class="col-md-6">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Apoderados</strong>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-hover table-sm" id="dataTable">
                    <thead>
                        <tr>
                            <th>Asignatura</th>
                            <th>Grado</th>
                            <th>Docente</th>
                            <th>N° Alumnos</th>
                            <th>Año</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cursos as $cur)
                        <tr>
                            <td>{{$cur->asig_nom}}</td>
                            <td>
                                @if ($cur->curs_grado <= 6)
                                    {{$cur->curs_grado . '° de primaria'}}
                                @elseif($cur->curs_grado == 7)
                                    {{'1° de secundaria'}}
                                @elseif($cur->curs_grado == 8)
                                    {{'2° de secundaria'}}          
                                @elseif($cur->curs_grado == 9)
                                    {{'3° de secundaria'}}  
                                @elseif($cur->curs_grado == 10)
                                    {{'4° de secundaria'}}  
                                @elseif($cur->curs_grado == 11)
                                    {{'5° de secundaria'}}  
                                @else
                                    {{'Egresado'}}  
                                @endif
                            </td>
                            <td>{{$cur->trab_ape . ', '. $cur->trab_nom}}</td>
                            <td class="text-center">
                                <?php $nalum = DB::table('alumno_curso')->where('curso_id','=',$cur->curs_id)->count(); ?>
                                {{$nalum}}
                            </td>
                            <td>{{$cur->curs_año}}</td>
                            <td>
                              @if ($cur->curs_est == 1)
                                <span class="badge badge-success">Activo</span>
                              @else
                              <span class="badge badge-danger">Inactivo</span>
                              @endif
                            </td>
                            <td>   
                                <a data-toggle="modal" data-target="#modal-info-{{$cur->curs_id}}"  class="btn btn-sm btn-info"><i class="fa fa-search"></i></a>  
                                @include('curso.info')
                                <a href="{{url('curso/'.$cur->curs_id.'/edit')}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a> 
                                <a class="btn btn-sm btn-secondary" title="Matricular alumnos" href="{{url('matricula/'.$cur->curs_id)}}"><i class="fa fa-group"></i></a>      
                            </td>
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
      <h1 class="h4 mb-0 text-gray-800">No tienes acceso </h1>
    </div>
  @endif
@endif
@endsection