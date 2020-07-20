@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-md-6">
        @if(Auth::user()->hasAnyRole(['docen','secre','admin']))
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#uploadVideo"><i class="fa fa-upload"></i> Subir video</button>
        @endif
        @include('videos.create')
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
                <i class="fa fa-align-justify"></i> 
                <div class="card-header-actions">
                    <a href="{{url('home')}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered table-sm" id="dataTable">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Alumno</th>
                            <th>Usuario</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($videos as $v)
                            <tr>
                                <td>{{$v->titulo}}</td>
                                <td>{{$v->alum_ape . ', ' . $v->alum_nom}}</td>
                                <td>{{$v->trab_ape . ', ' . $v->trab_nom}}</td>
                                <td>
                                    <a href="{{url('video/'.$v->id)}}" class="btn btn-sm btn-secondary" title="ver video"><i class="fa fa-video-camera"></i></a>
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