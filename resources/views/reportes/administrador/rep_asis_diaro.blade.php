<table>
	<thead>
		<th>DNI</th>
		<th>Alumno</th>
		<th>Estado</th>
	</thead>
	<tbody>
		@foreach($dat as $q)
			<tr>
				<td>{{$q->alum_dni}}</td>
				<td>{{$q->alum_ape . ', ' $q->alum_nom }}</td>
				<td>{{$q->asis_est}}</td>
			</tr>
		@endforeach
	</tbody>
</table>