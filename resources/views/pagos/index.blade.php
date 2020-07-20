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
        <a href="{{url('pago/create')}}" class="btn btn-primary">Agregar alumnos</a>
        <a href="{{url('reportepagopdf/')}}" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></a>
        <a href="{{url('reportepagoexcel/')}}" class="btn btn-success"><i class="fa fa-file-excel-o"></i></a>
    </div>
    <div class="col-md-6">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Pagos - Juana Alarco de Dammert</strong>
            </div>
            <div class="card-body">
                <table class="tdisplay compact row-border hover table-responsive " id="dataTable">
                    <thead>
                        <tr>
                            <th>Año</th>
                            <th>DNI</th> 
                            <th>Alumno</th>
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
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($data as $d)
                    		<tr>
                    			<td>{{$d->año}}</td>
                                <td>{{$d->alum_dni}}</td>
                    			<td>{{$d->alum_ape . ', ' . $d->alum_nom}}</td>
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
                    			<td>
                    				<a href="{{url('pago/'.$d->id.'/edit')}}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                    <a href="{{url('pagos/'.$d->id)}}" class="btn btn-sm btn-secondary"><i class="fa fa-repeat"></i></a>
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

