<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <title>Apoderados</title>
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
    	<H1 class="m-0 font-weight-bold text-primary"><center>APODERADOS</center></H1>
    </div>
    <table class="table table-hover table-bordered table-sm" id="dataTable" width="80%" cellspacing="0"  >
                  <thead>
                        <tr>
                        		<th>DNI</th>
								<th>Apoderado</th>
								<th>E-mail</th>
								<th>Teléfono</th>	
                        </tr>
                  </thead>
                  <tbody>
                  	@foreach($data as $a)
							<tr>
								<td class="text-sm-left">{{$a->apod_dni}}</td>
								<td class="text-sm-left">{{$a->apod_ape . ', ' . $a->apod_nom}}</td>
								<td class="text-sm-left">{{$a->apod_email}}</td>
								<td class="text-sm-left">{{$a->apod_tel}}</td>
							</tr>
							@endforeach
                  </tbody>
            </table>
</body>
</html>


<!-- <p align="center"><strong>APODERADOS</strong></p> <br>
<table border="1">
		<thead>
			<tr>
				<th>DNI</th>
				<th>Apoderado</th>
				<th>E-mail</th>
				<th>Teléfono</th>			
			</tr>
		</thead>
		<tbody>
			@foreach($data as $a)
			<tr>
				<td class="text-sm-left">{{$a->apod_dni}}</td>
				<td class="text-sm-left">{{$a->apod_ape . ', ' . $a->apod_nom}}</td>
				<td class="text-sm-left">{{$a->apod_email}}</td>
				<td class="text-sm-left">{{$a->apod_tel}}</td>
			</tr>
			@endforeach
		</tbody>
	</table> -->