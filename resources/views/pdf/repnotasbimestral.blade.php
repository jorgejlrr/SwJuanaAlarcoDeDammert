<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <title>Tasa de Aprobacion</title>
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
    	<H1 class="m-0 font-weight-bold text-primary"><center>Tasa de Aprobacion del {{$nbim}} Bimestre </center></H1>
    </div>
    <table class="table table-hover table-bordered table-sm" id="dataTable" width="80%" cellspacing="0"  >
                  <thead>
                        <tr>
                        		<th>Cursos</th>
								<th>Alumnos Aprobados</th>
								<th>Total de Alumnos</th>
								<th>Fórmula</th>
								<th>AAP*0.90</th>
								<th>TA*0.90</th>
								<th>Porcentaje</th>
                        </tr>
                  </thead>
                  <tbody>
						{{$acumulador = 0}}
						@foreach($data as $q)
							<tr>
								<td>{{$q->asig_nom}}</td>
								<td>{{$q->aa}}</td>
								<td>50</td>
								<td>{{$q->aa / 50 * 100}}.00</td>
								<td>{{$q->aa * 0.90}}</td>
								<td>{{50 * 0.90}}</td>
								<td>{{$q->aa / 50 * 100}}% </td>
							</tr>
							{{$acumulador = $acumulador + ($q->aa / 50 * 100)}}
						@endforeach
						<tr>
							<td colspan="6"></td>
							<td><?php echo round($acumulador / 7, 2); ?>%</td>
						</tr>
					</tbody>
            </table>
</body>
</html>


<!-- <table border="1" >
	<thead>
		<tr>
			<th>Cursos</th>
			<th>Alumnos Aprobados</th>
			<th>Total de Alumnos</th>
			<th>Fórmula</th>
			<th>AAP*0.90</th>
			<th>TA*0.90</th>
			<th>Porcentaje</th>
		</tr>
	</thead>
		<tbody>
		{{$acumulador = 0}}
		@foreach($data as $q)
			<tr>
				<td>{{$q->asig_nom}}</td>
				<td>{{$q->aa}}</td>
				<td>50</td>
				<td>{{$q->aa / 50 * 100}}.00</td>
				<td>{{$q->aa * 0.90}}</td>
				<td>{{50 * 0.90}}</td>
				<td>{{$q->aa / 50 * 100}}% </td>
			</tr>
			{{$acumulador = $acumulador + ($q->aa / 50 * 100)}}
		@endforeach
		<tr>
			<td colspan="6"></td>
			<td><?php echo round($acumulador / 7, 2); ?>%</td>
		</tr>
	</tbody>
</table> -->