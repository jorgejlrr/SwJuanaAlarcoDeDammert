@extends('plantilla.plantilla')
@section('contenido')
<div class="row">
    <div class="col-sm-12">
        <div class="card my-3">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <div class="card-header-actions">
                    <a href="{{url('encuesta')}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <iframe src="{{$enc->enc_link}}" width="640" height="806" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>     
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection