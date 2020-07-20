<!DOCTYPE html>
<html>
<head>
	<title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
      <div class="header-wrapper">
      <div >
        <img src="{{asset('img/logo-jad.jpeg')}}" width="40" height="40"> 
      </div>
      </div>
</head>
<body>
	

      <div>
      	<h5>
      	<center>
      		I.E.P. “JUANA ALARCO DE DAMMERT”
      	</center>
            </h5>
      	<p><center>
      			.- Un buen colegio al alcance de usted -. <br> SAN MIGUEL- R.D.Z. Nº 06390-1977
      	</center>
      </p>
      <h5>
      	<center>
      		INFORME ANUAL DE LOGROS DEL EDUCANDO <br> Valor Institucional: LA RESPONSABILIDAD <br> AÑO ESCOLAR - 2020 <br><a style="text-decoration: underline;"> 
                        NIVEL: @if($alumno->alum_grad == 1 || $alumno->alum_grad == 2 || $alumno->alum_grad == 3 || $alumno->alum_grad == 4 || $alumno->alum_grad == 5 || $alumno->alum_grad == 6)
                                    PRIMARIA
                               @else
                                    SECUNDARIA
                               @endif
                  </a> 
      	</center>
      </h5>
      </div>

      <div>
      	Sr. Padre de Familia: <br> <b>ALUMNO(A): {{$alumno->alum_ape . ', ' . $alumno->alum_nom}} Gdo: 
                  @if($alumno->alum_grad == 7)
                        1
                  @elseif($alumno->alum_grad == 8)
                        2
                  @elseif($alumno->alum_grad == 9)
                        3
                  @elseif($alumno->alum_grad == 10)
                        4
                  @elseif($alumno->alum_grad == 11)
                        5      
                  @else
                        {{$alumno->alum_grad}}
                  @endif

                                  ° Grado Nivel:
                  @if($alumno->alum_grad == 1 || $alumno->alum_grad == 2 || $alumno->alum_grad == 3 || $alumno->alum_grad == 4 || $alumno->alum_grad == 5 || $alumno->alum_grad == 6)
                                    Primaria
                               @else
                                    Secundaria
                               @endif </b>
      </div>
      <table class="table table-hover table-bordered table-sm" id="dataTable" width="60%" cellspacing="0">
      	<thead>
	      	<tr>
	      		<th>  </th>
	      		<th><center>ÁREAS</center></th>
	      		<th><center>    I		<br>    B1		</center></th>
	      		<th><center>    II 	<br>    B1		</center></th>
	      		<th><center>    III	<br>    B1		</center></th>
	      		<th><center>    IV	<br>    B1		</center></th>
	      		<th><center>   Nota	<br>    Anu.	</center></th>
	      		<th><center>   Requ	<br>   Recu.	</center></th>
	      	</tr>
      	</thead>
      	<tbody>
				@foreach($cursos as $c)
				<tr>
					<td>{{$c->asig_id}}</td>
					<td>{{$c->asig_nom}}</td>
					<?php
						$query = DB::table('notas')
								->where('notas.not_idcurso','=',$c->curs_id)
								->where('notas.not_idalumno','=',$alumno->alum_id)
								->get();
					?>
					@foreach($query as $q)
						<td>
                                          @if ($q->not_promedio <= 10)
                                            C
                                          @elseif ($q->not_promedio <= 13)
                                            B
                                          @elseif ($q->not_promedio <= 16)
                                            A
                                          @else ($q->not_promedio <= 20)
                                            AD    
                                          @endif
                                          
                                    </td>
					@endforeach
					<td></td>
					<td></td>
				</tr>
				@endforeach

      	</tbody>
      </table>
      <p>Alumno(a) - Padres de Familia</p>
      <table class="table table-hover table-bordered table-sm" id="dataTable" width="60%" cellspacing="0">
            <thead>
                  <tr>
                        <th><center>a</center></th>
                        <th>Alno, Tardanzas.- Faltas - Suspensiones T=</th>
                        <th><center>F= </center></th>
                        <th><center>S= </center></th>
                  </tr>
            </thead>
            <tbody>
                  <tr>
                        <td><center>b</center></td>
                        <td>Padre de F.- Apoya plan lector.</td>
                        <td><center>Si</center></td>
                        <td><center>No</center></td>
                  </tr>
                  <tr>
                        <td><center>c</center></td>
                        <td>Padre de F.- Firma la agenda - Comunicados.</td>
                        <td><center>Si</center></td>
                        <td><center>No</center></td>
                  </tr>
                  <tr>
                        <td><center>d</center></td>
                        <td>Padre de F.- Responsable en sus compromisos con el colegio.</td>
                        <td><center>Si</center></td>
                        <td><center>No</center></td>
                  </tr>
                  <tr>
                        <td><center>e</center></td>
                        <td>Padre de F. - Asiste a la reuniones.</td>
                        <td><center>Si</center></td>
                        <td><center>No</center></td>
                  </tr>
                  <tr>
                        <td colspan="3" >Los Promedios = a 12 ó -s RR= REQUIEREN REFORZA.</td>
                  </tr>
            </tbody>
      </table>

                  <p>**Felicitamos a los Padres de Familia por su dedicacion en la Educacion a sus menores hijos.</p>
                  <p>*La mayor herencia que puede dejar un Padre a sus hijos, es el ejemplo de sus virtudes y de sus bellas acciones.</p>
                  <p><center>Sr. Padre de F. Si tiene alguna inquietud, no dude en acercarse a ala Direccion.</center></p><br>

            <div class="header-wrapper">
                  <div >
                    <img src="{{asset('img/logo-jad.jpeg')}}" width="40" height="40"> 
                  </div>
            </div>



            <div>
                  <h5>
                        <center>
                              I.E.P. “JUANA ALARCO DE DAMMERT”
                        </center>
                        </h5>
                        <p><center>
                                    .- Un buen colegio al alcance de usted -. <br> 
                                    <h1><p style="text-decoration: underline;"><span style="text-decoration: underline;"><strong>
                                       CUADRO DE REFERENCIAS - ANUAL - 2020   
                                    </strong></span></p></h1> 
                        </center>
                  </p>
            </div>
                  <p style="text-align: justify;">
                     Las referencias tenerlas en cuenta si el alumno tiene buenas notas,felicitaciones sigamos adelante. De lo contrario Padres de Familia, apoyemos a nuestros hijos para alcanzar mejores APRENDIZAJES. Gracias   
                  </p>
                  <p style="text-align: center;"><strong><em><u>
                  Aprueban los alumnos que cumplen con estas REFERENCIAS.
                  </u></em></strong></p>

                  <table class="table table-hover table-bordered table-sm" id="dataTable" width="60%" cellspacing="0">

                        <tbody>
                              <tr>
                                    <td>
                                          1
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                          2
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                          3
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                          4
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                          5
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                          6
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                          7
                                    </td>
                              </tr>
                              <tr>
                                    <td>
                                          8- TUTORIA: Profesor(a) Nombre:__________________
                                          <br>
                                          Recomendacion <br>
                                          ............................................................................................................................................
                                          ............................................................................................................................................
                                          ............................................................................................................................................
                                          ............................................................................................................................................
                                          <br>
                                          El alumno al regresar a casa debe de repasar (estudiar) lo aprendido en el colegio
                                    </td>
                              </tr>
                        </tbody>
                  </table>

      </body>
</html>




