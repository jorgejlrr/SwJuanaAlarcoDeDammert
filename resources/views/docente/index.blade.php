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
        <a href="{{url('docente/create')}}" class="btn btn-primary">Registrar docente</a>
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
                <strong>Docentes</strong>
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-hover table-sm" id="dataTable">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Sexo</th>
                            <th>Estado</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($docentes as $doc)
                        <tr>
                            <td>{{$doc->trab_dni}}</td>
                            <td>{{$doc->trab_ape}}</td>
                            <td>{{$doc->trab_nom}}</td>
                            <td>
                                @if ($doc->trab_sexo == 1)
                                    Masculino
                                @else
                                    Femenino
                                @endif
                            </td>
                            <td>
                              @if ($doc->trab_est == 1)
                                <span class="badge badge-success">Activo</span>
                              @else
                              <span class="badge badge-danger">Inactivo</span>
                              @endif
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#modal-info-{{$doc->trab_id}}" class="btn btn-sm btn-info"><i class="fa fa-search"></i></a>      
                                @include('docente.info')
                                @if ($doc->trab_est == 1)
                                    <a data-toggle="modal" data-target="#modal-est-{{$doc->trab_id}}" title="Inactivar docente" class="btn btn-sm btn-danger"><i class="fa fa-toggle-off"></i></a> 
                                @else
                                    <a data-toggle="modal" data-target="#modal-est-{{$doc->trab_id}}" title="Activar docente" class="btn btn-sm btn-success"><i class="fa fa-toggle-on"></i></a> 
                                @endif     
                                @include('docente.estado')
                                <a href="{{url('docente/'.$doc->trab_id.'/edit')}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
@else
    <div class="d-sm-flex align-items-center justify-content-between my-4">
      <h1 class="h4 mb-0 text-gray-800">No tienes acceso </h1>
    </div>
  @endif
@endif
@endsection