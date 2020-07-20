@extends('plantilla.plantilla')
@section('contenido')
<div class="row">
    <div class="col-sm-12">
        <div class="card my-3">
            <div class="card-header">
                <i class="fa fa-align-justify"></i>
                <div class="card-header-actions">
                    <a href="{{url('video')}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <div class="text-center">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="{{$video->link}}"></iframe>
                    </div>   
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection