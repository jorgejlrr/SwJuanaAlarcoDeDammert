<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <title>Alumnos</title>
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
    	<H1 class="m-0 font-weight-bold text-primary"><center>ALUMNOS</center></H1>
    </div>
    <table class="table table-hover table-bordered table-sm" id="dataTable" width="80%" cellspacing="0"  >
                  <thead>
                        <tr>
 							<th>DNI</th>
							<th>Alumno</th>
							<th>Sexo</th>
							<th>F. Nacimiento</th>
							<th>Grado</th>	
							<th>Apoderado</th>
                        </tr>
                  </thead>
                  <tbody>
                  		@foreach($data as $a)
						<tr>
							<td>{{$a->alum_dni}}</td>
							<td>{{$a->alum_ape . ', ' . $a->alum_nom}}</td>
							@if($a->alum_sexo == 1)
                   			<td>Masculino</td>
              				 @elseif($a->alum_sexo == 0)
                  		    <td>Femenino</td>
              				 @endif
                			<td>{{date("d/m/Y", strtotime($a->alum_fnac))}}</td>
							<td>
								@if ($a->alum_grad <= 6)
                                    {{$a->alum_grad . '° de primaria'}}
                                @elseif($a->alum_grad == 7)
                                    {{'1° de secundaria'}}
                                @elseif($a->alum_grad == 8)
                                    {{'2° de secundaria'}}          
                                @elseif($a->alum_grad == 9)
                                    {{'3° de secundaria'}}  
                                @elseif($a->alum_grad == 10)
                                    {{'4° de secundaria'}}  
                                @elseif($a->alum_grad == 11)
                                    {{'5° de secundaria'}}  
                                @else
                                    {{'Egresado'}}  
                                @endif
							</td>
							<td>{{$a->apod_ape . ', ' . $a->apod_nom}}</td>
						</tr>
					@endforeach
                  </tbody>
            </table>
            ----Datos adicionales---- <br>
            <p>1° de primaria: {{$n1alumnos}}<br> 
		 	   2° de primaria: {{$n2alumnos}}<br>
		 	   3° de primaria: {{$n3alumnos}}<br>
		 	   4° de primaria: {{$n4alumnos}}<br>
		 	   5° de primaria: {{$n5alumnos}}<br>
		 	   6° de primaria: {{$n6alumnos}}<br>
		 	   1° de secundaria: {{$n7alumnos}}<br>
		 	   2° de secundaria: {{$n8alumnos}}<br>
		 	   3° de secundaria: {{$n9alumnos}}<br>
		 	   4° de secundaria: {{$n10alumnos}}<br>
		 	   5° de secundaria: {{$n11alumnos}}<br>
		 	</p>
			<p>Total: {{$totalalum}}</p>
</body>
</html>

<!-- <p align="center"><strong>ALUMNOS</strong></p> <br>
<table border="1">
	<thead>
		<tr>
			<th>DNI</th>
			<th>Alumno</th>
			<th>Sexo</th>
			<th>F. Nacimiento</th>
			<th>Grado</th>	
			<th>Apoderado</th>			
		</tr>
	</thead>
	<tbody>
		@foreach($data as $a)
		<tr>
			<td>{{$a->alum_dni}}</td>
			<td>{{$a->alum_ape . ', ' . $a->alum_nom}}</td>
			@if($a->alum_sexo == 1)
                   <td>Masculino</td>
               @elseif($a->alum_sexo == 0)
                   <td>Femenino</td>
               @endif
               <td>{{date("d/m/Y", strtotime($a->alum_fnac))}}</td>
			<td>
				@if ($a->alum_grad <= 6)
                                    {{$a->alum_grad . '° de primaria'}}
                                @elseif($a->alum_grad == 7)
                                    {{'1° de secundaria'}}
                                @elseif($a->alum_grad == 8)
                                    {{'2° de secundaria'}}          
                                @elseif($a->alum_grad == 9)
                                    {{'3° de secundaria'}}  
                                @elseif($a->alum_grad == 10)
                                    {{'4° de secundaria'}}  
                                @elseif($a->alum_grad == 11)
                                    {{'5° de secundaria'}}  
                                @else
                                    {{'Egresado'}}  
                                @endif
			</td>
			<td>{{$a->apod_ape . ', ' . $a->apod_nom}}</td>
		</tr>
		@endforeach
	</tbody>
</table>
<p>1° de primaria: {{$n1alumnos}}<br> 
 	   2° de primaria: {{$n2alumnos}}<br>
 	   3° de primaria: {{$n3alumnos}}<br>
 	   4° de primaria: {{$n4alumnos}}<br>
 	   5° de primaria: {{$n5alumnos}}<br>
 	   6° de primaria: {{$n6alumnos}}<br>
 	   1° de secundaria: {{$n7alumnos}}<br>
 	   2° de secundaria: {{$n8alumnos}}<br>
 	   3° de secundaria: {{$n9alumnos}}<br>
 	   4° de secundaria: {{$n10alumnos}}<br>
 	   5° de secundaria: {{$n11alumnos}}<br>
<p>Total: {{$totalalum}}</p> -->