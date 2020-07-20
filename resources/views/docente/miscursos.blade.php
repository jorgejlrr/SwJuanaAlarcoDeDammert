<?php 
$trab_data = DB::table('trabajador')
                  ->join('role_user','role_user.user_id','trabajador.trab_dni')
                  ->join('roles','roles.id','role_user.role_id')
                  ->where('trabajador.trab_dni','=',Auth::user()->usuario)->first();
 ?>
@extends('plantilla.plantilla')
@section('contenido')
@if(Auth::user()->hasrole('docen'))
  @if($trab_data->trab_est == 1)
<div class="container-fluid my-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                Mis cursos a cargo
                <div class="card-header-actions">
                    <a href="{{route('home')}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr class="table-info">
                            <th>Grado</th>
                            <th>Curso</th>
                            <th>Año</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mis_cursos as $mc)
                        <tr>
                            <td>
                                @if ($mc->curs_grado <= 6)
                                    {{$mc->curs_grado . '° de primaria'}}
                                @elseif($mc->curs_grado == 7)
                                    {{'1° de secundaria'}}
                                @elseif($mc->curs_grado == 8)
                                    {{'2° de secundaria'}}          
                                @elseif($mc->curs_grado == 9)
                                    {{'3° de secundaria'}}  
                                @elseif($mc->curs_grado == 10)
                                    {{'4° de secundaria'}}  
                                @elseif($mc->curs_grado == 11)
                                    {{'5° de secundaria'}}  
                                @else
                                    {{'Egresado'}}  
                                @endif
                            </td>
                            <td>{{$mc->asig_nom}}</td>
                            <td>{{$mc->curs_año}}</td>
                            <td>
                                <a class="btn btn-sm btn-light" href="{{url('curso/'.$mc->curs_id)}}"><i class="fa fa-folder-open-o"></i></a>  
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