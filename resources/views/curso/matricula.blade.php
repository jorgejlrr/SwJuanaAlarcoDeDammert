@extends('plantilla.plantilla')
@section('contenido')
<form action="{{url('ac')}}" method="POST" >
@method('POST')
{{ csrf_field() }}
    <div class="row mt-4">
        <div class="col-md-6">
            <input type="submit" value="Matricular estudiantes" id="btn-only1click" class="btn btn-primary">
        </div>
        <div class="col-md-6">
            <input type="hidden" value="{{$curso->curs_id}}" name="curs_id">
        </div>
    </div>
    <div class="card my-3">
        <div class="card-body">
            <table class="table table-responsive-sm table-hover table-sm">
                <thead>
                    <tr>
                        <th><input type="checkbox" onclick="marcar(this);"></th>
                        <th>Alumno</th>
                        <th>Grado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alumnos as $a)
                    <tr>
                        <td><input type="checkbox" value="{{$a->alum_id}}" name="alumnos[]"></td>
                        <td>{{$a->alum_ape . ', '. $a->alum_nom}}</td>
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
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script type="text/javascript">
	function marcar(source) 
	{
		checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
		for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
		{
			if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
			{
				checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
			}
		}
	}
</script>

<script type="text/javascript">
    // Variable global que nos dirá si hemos dado un click al botón
var clicando= false;

// Evento de click del primer botón
$("#btn-dobleclick").click(function() {
  // Mostramos el Alert
  alert( "Handler for dobleclick.click() called." );
});

// Evento del segundo boton
$("#btn-only1click").click(function() {
  // Si ha sido clicado
  if (clicando){
    // Mostramos que ya se ha clicado, y no puede clicarse de nuevo
    alert( "Que ya he realizado un click." );
  // Si no ha sido clicado
  } else {
    // Le decimos que ha sido clicado
    clicando= true;
    // Mostramos el mensaje de que ha sido clicado
    alert( "Alumnos Matriculados correctamente" );
  }
});
</script>
@endsection