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
        <a href="{{url('apoderado/create')}}" class="btn btn-primary">Registrar apoderado</a>
        <a href="{{url('pdfapoderados')}}" class="btn btn-danger"><i class="fa fa-print"></i></a>
    </div>
    <div class="col-md-6">
        @if (session('status'))
        <div class="alert alert-success" content="2">
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
                            <th>DNI</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Sexo</th>
                            <th>Teléfono</th>
                            <th>E-mail</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($apoderados as $apod)
                        <tr>
                            <td>{{$apod->apod_dni}}</td>
                            <td>{{$apod->apod_ape}}</td>
                            <td>{{$apod->apod_nom}}</td>
                            <td>
                                @if ($apod->apod_sexo == 1)
                                    Masculino
                                @else
                                    Femenino
                                @endif
                            </td>
                            <td>{{$apod->apod_tel}}</td>
                            <td>{{$apod->apod_email}}</td>
                            <td>   
                               <a href="{{url('apoderado/'.$apod->apod_id.'/edit')}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
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