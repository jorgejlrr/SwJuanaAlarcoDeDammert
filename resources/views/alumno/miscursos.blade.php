
@extends('plantilla.plantilla')
@section('contenido')

<div class="container-fluid my-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                Mis cursos
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable">
                    <thead>
                        <tr class="table-info">
                            <th>Curso</th>
                            <th>Grado</th>
                            <th>Docente</th>
                            <th>Año</th>
                            <th>Opciones</th>
                        </tr>
                        
                    </thead>
                    <tbody>
                        @foreach($cursos as $c)
                        <tr>
                            <td>{{$c->asig_nom}}</td>
                            <td>
                                @if ($c->curs_grado <= 6)
                                    {{$c->curs_grado . '° de primaria'}}
                                @elseif($c->curs_grado == 7)
                                    {{'1° de secundaria'}}
                                @elseif($c->curs_grado == 8)
                                    {{'2° de secundaria'}}          
                                @elseif($c->curs_grado == 9)
                                    {{'3° de secundaria'}}  
                                @elseif($c->curs_grado == 10)
                                    {{'4° de secundaria'}}  
                                @elseif($c->curs_grado == 11)
                                    {{'5° de secundaria'}}  
                                @else
                                    {{'Egresado'}}  
                                @endif
                            </td>
                            <td>{{$c->trab_ape.', '.$c->trab_nom}}</td>
                            <td>{{$c->curs_año}}</td>
                            <td>
                                <a class="btn btn-sm btn-light" href="{{url('curso/'.$c->curs_id)}}"><i class="fa fa-folder-open-o"></i></a>  
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