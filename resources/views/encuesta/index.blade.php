@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-md-6">
        @if(Auth::user()->hasAnyRole(['admin','secre']))
        <a href="{{url('encuesta/create')}}" class="btn btn-primary">Registrar encuesta</a>
        @endif
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
                <table class="table table-responsive-sm table-hover table-sm" id="dataTable">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Fecha</th>
                            <th>Autor</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td>{{$d->enc_titulo}}</td>
                            <td>{{$d->enc_fecha}}</td>
                            <td>{{$d->trab_ape . ', ' . $d->trab_nom}}</td>
                            <td>
                                <a href="{{url('encuesta/'.$d->enc_id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-file-text"></i></a>
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