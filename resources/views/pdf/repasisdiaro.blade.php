<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <title>Tasa de asistencia Diaria</title>
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
    <div>
    	<H1 class="m-0 font-weight-bold text-primary"><center>Tasa de Asistencia Diaria</center></H1>
    </div>
    <table class="table table-hover table-bordered table-sm" id="dataTable" width="80%" cellspacing="0"  >
                  <thead>
                        <tr>
                        		<th>DNI</th>
								<th>Alumno</th>
								<th>Estado</th>	
                        </tr>
                  </thead>
                  <tbody>
                  	@foreach($data as $q)
							<tr>
								<td>{{$q->alum_dni}}</td>
								<td>{{$q->alum_ape}}</td>
								<td>
									@if ($q->asis_est == 0)
                                    A
	                                @elseif ($q->asis_est == 1)
	                                    T
	                                @else
	                                    F
	                                @endif
								</td>
							</tr>
						@endforeach
                  </tbody>
            </table>
            <p>Tasa de Asistencia: {{$ind}}%</p> 
</body>
</html>


<!-- <table>
	<thead>
		<tr>
			<th>DNI</th>
			<th>Alumno</th>
			<th>Estado</th>
		</tr>
	</thead>
		<tbody>
		@foreach($data as $q)
			<tr>
				<td>{{$q->alum_dni}}</td>
				<td>{{$q->alum_ape}}</td>
				<td>{{$q->asis_est}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
<p>Tasa de Asistencia: {{$ind}}%</p> -->
