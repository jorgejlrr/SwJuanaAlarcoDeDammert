<p align="center"><strong>Reporte: Última Conexión</strong></p> <br>
<div >
	<table align="center" border="1">
		<thead>
			<tr>
				<th>Codigo Curso</th>
				<th>Nombres y Apellidos</th>
				<th>Asignatura</th>
				<th>Fecha</th>
				<th>Estado</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $a)
			<tr>
				<td>{{$a->curs_id}}</td>
				<td>{{$a->alum_nom.','.$a->alum_ape}}</td>
				<td>{{$a->asig_nom}}</td>
				<td>{{$a->asis_fecha}}</td>				
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