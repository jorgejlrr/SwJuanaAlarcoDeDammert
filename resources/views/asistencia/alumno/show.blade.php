@extends('plantilla.plantilla')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card my-3">
            <div class="card-header">
            </div>
            <div class="card-body">
                <table class="table table-responsive-sm table-hover table-sm" id="dataTable">
                    <thead>
                        <tr>
                            <th>Fechas</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($asis as $a)
                        <tr>
                            <td>{{date("d/m/Y", strtotime($a->asis_fecha))}}</td>
                            <td>
                                @if ($a->asis_est == 0)
                                    A
                                @elseif ($a->asis_est == 1)
                                    T
                                @else
                                    F
                                @endif
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