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
        <a href="{{url('alumno/create')}}" class="btn btn-primary">Registrar alumno</a>
        <a href="{{url('pdfalumnos')}}" class="btn btn-danger"><i class="fa fa-print"></i></a>
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
                <strong>Alumnos</strong>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-hover table-sm" id="dataTable">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Grado</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnos as $alum)
                        <tr>
                            <td>{{$alum->alum_dni}}</td>
                            <td>{{$alum->alum_ape}}</td>
                            <td>{{$alum->alum_nom}}</td>
                            <td>
                                @if ($alum->alum_grad <= 6)
                                    {{$alum->alum_grad . '° de primaria'}}
                                @elseif($alum->alum_grad == 7)
                                    {{'1° de secundaria'}}
                                @elseif($alum->alum_grad == 8)
                                    {{'2° de secundaria'}}          
                                @elseif($alum->alum_grad == 9)
                                    {{'3° de secundaria'}}  
                                @elseif($alum->alum_grad == 10)
                                    {{'4° de secundaria'}}  
                                @elseif($alum->alum_grad == 11)
                                    {{'5° de secundaria'}}  
                                @else
                                    {{'Egresado'}}  
                                @endif
                            </td>
                            <td>
                              @if ($alum->alum_est == 1)
                                <span class="badge badge-success">Activo</span>
                              @else
                              <span class="badge badge-danger">Inactivo</span>
                              @endif
                            </td>
                            <td>   
                                <a data-toggle="modal" data-target="#modal-info-{{$alum->alum_id}}" class="btn btn-sm btn-info"><i class="fa fa-search"></i></a> 
                                @include('alumno.info') 
                                @if ($alum->alum_est == 1)
                                    <a data-toggle="modal" data-target="#modal-est-{{$alum->alum_id}}" title="Inactivar alumno" class="btn btn-sm btn-danger"><i class="fa fa-toggle-off"></i></a> 
                                @else
                                    <a data-toggle="modal" data-target="#modal-est-{{$alum->alum_id}}" title="Activar alumno" class="btn btn-sm btn-success"><i class="fa fa-toggle-on"></i></a> 
                                @endif     
                                @include('alumno.estado') 
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

