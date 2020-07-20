@extends('plantilla.plantilla')
@section('contenido')
<div class="container-fluid my-3">
    <div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                Mis pagos
            </div>
            <div class="card-body">
                <table class="row-border hover table-responsive" id="dataTable">
                    <thead>
                        <tr class="table-info">
                            <th>M. Anual</th>
                            <th>Dscto</th>
                            <th>M. Inicial</th>
                            <th>Marzo</th>
                            <th>Abril</th>
                            <th>Mayo</th>
                            <th>Junio</th>
                            <th>Julio</th>
                            <th>Agosto</th>
                            <th>Setiembre</th>
                            <th>Octubre</th>
                            <th>Noviembre</th>
                            <th>Diciembre</th>
                        </tr>
                    </thead>
                    <tbody> 
                            <?php $deuda = 0; ?>
                            @foreach($data as $d)
                                <td>{{'s/'.$d->montoanual}}</td>
                    			<td>{{'s/'.$d->descuento}}</td>
                                <td>{{'s/'.$d->inicial}}</td>
                    			<td>
                                    @if ($d->marzo >= 0)
                                        <span class="badge badge-success">{{'s/'.$d->marzo.' P'}}</span>
                                     @elseif($d->marzo < 0)
                                        <span class="badge badge-danger">{{'s/'.$d->marzo.' D'}}</span>
                                    @endif        
                                </td>
                    			<td>
                                    @if ($d->abril >= 0)
                                        <span class="badge badge-success">{{'s/'.$d->abril.' P'}}</span>
                                     @elseif($d->abril < 0)
                                        <span class="badge badge-danger">{{'s/'.$d->abril.' D'}}</span>
                                    @endif                                     
                                </td>
                    			<td>
                                    @if ($d->mayo >= 0)
                                        <span class="badge badge-success">{{'s/'.$d->mayo.' P'}}</span>
                                     @elseif($d->mayo < 0)
                                        <span class="badge badge-danger">{{'s/'.$d->mayo.' D'}}</span>
                                    @endif 
                                </td>
                    			<td>
                                    @if ($d->junio >= 0)
                                        <span class="badge badge-success">{{'s/'.$d->junio.' P'}}</span>
                                     @elseif($d->junio < 0)
                                        <span class="badge badge-danger">{{'s/'.$d->junio.' D'}}</span>
                                    @endif          
                                </td>
                    			<td>
                                    @if ($d->julio >= 0)
                                        <span class="badge badge-success">{{'s/'.$d->julio.' P'}}</span>
                                     @elseif($d->julio < 0)
                                        <span class="badge badge-danger">{{'s/'.$d->julio.' D'}}</span>
                                    @endif          
                                </td>
                    			<td>
                                    @if ($d->agosto >= 0)
                                        <span class="badge badge-success">{{'s/'.$d->agosto.' P'}}</span>
                                     @elseif($d->agosto < 0)
                                        <span class="badge badge-danger">{{'s/'.$d->agosto.' D'}}</span>
                                    @endif          
                                </td>
                    			<td>
                                    @if ($d->setiembre >= 0)
                                        <span class="badge badge-success">{{'s/'.$d->setiembre.' P'}}</span>
                                     @elseif($d->setiembre < 0)
                                        <span class="badge badge-danger">{{'s/'.$d->setiembre.' D'}}</span>
                                    @endif          
                                </td>
                    			<td>
                                    @if ($d->octubre >= 0)
                                        <span class="badge badge-success">{{'s/'.$d->octubre.' P'}}</span>
                                     @elseif($d->octubre < 0)
                                        <span class="badge badge-danger">{{'s/'.$d->octubre.' D'}}</span>
                                    @endif          
                                </td>
                    			<td>
                                    @if ($d->noviembre >= 0)
                                        <span class="badge badge-success">{{'s/'.$d->noviembre.' P'}}</span>
                                     @elseif($d->noviembre < 0)
                                        <span class="badge badge-danger">{{'s/'.$d->noviembre.' D'}}</span>
                                    @endif          
                                </td>
                    			<td>
                                    @if ($d->diciembre >= 0)
                                        <span class="badge badge-success">{{'s/'.$d->diciembre.' P'}}</span>
                                     @elseif($d->diciembre < 0)
                                        <span class="badge badge-danger">{{'s/'.$d->diciembre.' D'}}</span>
                                    @endif          
                                </td>

                                <?php 
                                    $deuda =  $d->marzo + 
                                              $d->abril +
                                              $d->mayo +
                                              $d->junio +
                                              $d->julio +
                                              $d->agosto +
                                              $d->setiembre +
                                              $d->octubre +
                                              $d->noviembre +
                                              $d->diciembre;   
                                ?>

                            @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <p> <strong>Deuda total: S/. {{$deuda}}</strong></p>
            </div>
        </div>
    </div>
</div>
@endsection