<!DOCTYPE html>
<html lang="en">
      <H5><center>  "Año de la Universalización de la Salud" </center> </H5>
<head>
      <meta charset="utf-8">
      <title>Pagos del Año 2020</title>
      <meta name="viewport" content="">
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">



</head>
<body>
      <div class="header-wrapper">
      <div >
        <img src="{{asset('img/logo-jad.jpeg')}}" width="60" height="60">
      </div>
    </div>
      <div >
            <H1 class="m-0 font-weight-bold text-primary" ><center>  PAGOS 2020 </center> </H1>
            <table class="table table-hover table-bordered table-sm" id="dataTable" width="80%" cellspacing="0"  >
                  <thead>
                        <tr>
                              <th><center>DNI</center></th>
                              <th><center>Alumno</center></th>
<!--                               <th ><center>M. Anual</center></th>
                              <th><center>Dscto.</center></th>
                              <th><center>M. Inicial</center></th>  -->    
                              <th><center>Marzo</center></th>          
                              <th><center>Abril</center></th>
                              <th><center>Mayo</center></th>
                              <th><center>Junio</center></th>
                              <th><center>Julio</center></th>
                              <th><center>Agosto</center></th>
                              <th><center>Setiembre</center></th>
                              <th><center>Octubre</center></th>
                              <th><center>Noviembre</center></th>
                              <th><center>Diciembre</center></th>  
                        </tr>
                  </thead>
                  <tbody>
                        @foreach($data as $a)
                        <tr>
                              <td>{{$a->alum_dni}}</td>
                              <td>{{$a->alum_ape . ', ' . $a->alum_nom}}</td>
<!--                               <td>{{'s/'.$a->montoanual}}</td>
                              <td>{{'s/'.$a->descuento}}</td>
                              <td>{{'s/'.$a->inicial}}</td> -->
                              <td>
                                    @if ($a->marzo >= 0)
                                        <span class="badge badge-success">{{'s/'.$a->marzo.' P'}}</span>
                                     @elseif($a->marzo < 0)
                                        <span class="badge badge-danger">{{'s/'.$a->marzo.' D'}}</span>
                                    @endif
                              </td>
                              <td>
                                    @if ($a->abril >= 0)
                                        <span class="badge badge-success">{{'s/'.$a->abril.' P'}}</span>
                                     @elseif($a->abril < 0)
                                        <span class="badge badge-danger">{{'s/'.$a->abril.' D'}}</span>
                                    @endif
                              </td>
                              <td>
                                    @if ($a->mayo >= 0)
                                        <span class="badge badge-success">{{'s/'.$a->mayo.' P'}}</span>
                                     @elseif($a->mayo < 0)
                                        <span class="badge badge-danger">{{'s/'.$a->mayo.' D'}}</span>
                                    @endif
                              </td>
                              <td>
                                    @if ($a->junio >= 0)
                                        <span class="badge badge-success">{{'s/'.$a->junio.' P'}}</span>
                                     @elseif($a->junio < 0)
                                        <span class="badge badge-danger">{{'s/'.$a->junio.' D'}}</span>
                                    @endif
                              </td>
                              <td>
                                    @if ($a->julio >= 0)
                                        <span class="badge badge-success">{{'s/'.$a->julio.' P'}}</span>
                                     @elseif($a->julio < 0)
                                        <span class="badge badge-danger">{{'s/'.$a->julio.' D'}}</span>
                                    @endif
                              </td>
                              <td>
                                    @if ($a->agosto >= 0)
                                        <span class="badge badge-success">{{'s/'.$a->agosto.' P'}}</span>
                                     @elseif($a->agosto < 0)
                                        <span class="badge badge-danger">{{'s/'.$a->agosto.' D'}}</span>
                                    @endif
                              </td>
                              <td>
                                    @if ($a->setiembre >= 0)
                                        <span class="badge badge-success">{{'s/'.$a->setiembre.' P'}}</span>
                                     @elseif($a->setiembre < 0)
                                        <span class="badge badge-danger">{{'s/'.$a->setiembre.' D'}}</span>
                                    @endif
                              </td>
                              <td>
                                    @if ($a->octubre >= 0)
                                        <span class="badge badge-success">{{'s/'.$a->octubre.' P'}}</span>
                                     @elseif($a->octubre < 0)
                                        <span class="badge badge-danger">{{'s/'.$a->octubre.' D'}}</span>
                                    @endif
                              </td>
                              <td>
                                    @if ($a->noviembre >= 0)
                                        <span class="badge badge-success">{{'s/'.$a->noviembre.' P'}}</span>
                                     @elseif($a->noviembre < 0)
                                        <span class="badge badge-danger">{{'s/'.$a->noviembre.' D'}}</span>
                                    @endif
                              </td>
                              <td>
                                    @if ($a->diciembre >= 0)
                                        <span class="badge badge-success">{{'s/'.$a->diciembre.' P'}}</span>
                                     @elseif($a->diciembre < 0)
                                        <span class="badge badge-danger">{{'s/'.$a->diciembre.' D'}}</span>
                                    @endif
                              </td>

                        </tr>
                        @endforeach
                  </tbody>
            </table>
      </div>
</body>
</html>
<!-- <img src="{{asset('img/logo-jad.jpeg')}}" width="40" height="40">
<p align="center"><strong>PAGOS 2020</strong></p> <br>
<table border="1">
	<thead>
		<tr>
			<th>DNI</th>
			<th>Alumno</th>
			<th>M. Anual</th>
			<th>Dscto.</th>
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
		@foreach($data as $a)
		<tr>
			<td><small>{{$a->alum_dni}}</small></td>
			<td><small>{{$a->alum_ape . ', ' . $a->alum_nom}}</small></td>
			<td><small>{{'s/'.$a->montoanual}}</small></td>
            <td><small>{{'s/'.$a->descuento}}</small></td>
            <td><small>{{'s/'.$a->inicial}}</small></td>
            <td><small>{{'s/'.$a->marzo}}</small></td>
            <td><small>{{'s/'.$a->abril}}</small></td>
            <td><small>{{'s/'.$a->mayo}}</small></td>
            <td><small>{{'s/'.$a->junio}}</small></td>
            <td><small>{{'s/'.$a->julio}}</small></td>
            <td><small>{{'s/'.$a->agosto}}</small></td>
            <td><small>{{'s/'.$a->setiembre}}</small></td>
            <td><small>{{'s/'.$a->octubre}}</small></td>
            <td><small>{{'s/'.$a->noviembre}}</small></td>
            <td><small>{{'s/'.$a->diciembre}}</small></td>
		</tr>
		@endforeach
	</tbody>
</table> -->