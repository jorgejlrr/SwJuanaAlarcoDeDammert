@extends('plantilla.plantilla')
@section('contenido')
<?php 
    $query = DB::table('notas')
                ->where('not_idcurso','=', $idcurso)
                ->where('not_bimestre','=', $nbim)
                ->get();
?>
<?php  $q = DB::table('curso')
                ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                ->where('curso.curs_id','=',$idcurso)
                ->first(); ?>
<div class="row mt-4">
    <div class="col-md-6">
        @if(count($query)==0)
            <a href="{{url('registronotas/'.$idcurso.'/'.$nbim)}}" class="btn btn-primary">Registrar notas</a>
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
    <div class="col-md-12">
        <div class="card my-3">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Curso: {{$q->asig_nom}} / {{$nbim}}° Bimestre 
                <div class="card-header-actions">
                    <a href="{{url($idcurso.'/notas')}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive" id="">
                    <thead>
                        <tr>
                            <th>Alumnos</th>
                            <th class="text-center">Promedio de separatas <br>( hojas de trabajo) <br> N1</th>
                            <th class="text-center">Promedio de <br>prácticas <br> N2</th>
                            <th class="text-center">Promedio de <br>participación <br> N3</th>
                            <th class="text-center">Promedio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($alumnos as $a)
                            <tr>
                                <td>{{$a->alum_ape .', '.$a->alum_nom}}</td>
                                <td class="text-center">{{$a->not_n1}}</td>
                                <td class="text-center">{{$a->not_n2}}</td>
                                <td class="text-center">{{$a->not_n3}}</td>
                                <td class="text-center">{{$a->not_promedio}}</td>
                                <td>
                                    <a href="{{url('notas/'.$a->not_id.'/edit')}}" class="btn btn-sm btn-warning" title="editar notas"><i class="fa fa-pencil"></i></a>
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