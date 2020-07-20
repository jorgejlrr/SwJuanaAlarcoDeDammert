@extends('plantilla.plantilla')
@section('contenido')
<?php 
    $alumnos = DB::table('alumno_curso')
                ->join('alumno','alumno.alum_id','alumno_curso.alumno_id')
                ->where('alumno_curso.curso_id','=',$idcurso)
                ->orderby('alumno.alum_ape','asc')
                ->get();
?>
<div class="row">
    <div class="col-md-12">
        <div class="card my-3">
            <form action="{{url('asistencia')}}" method="POST" onsubmit="return checkSubmit();" id="elForm">
            @method('POST')
            {{ csrf_field() }}
            <div class="card-header">
                <div class="col-md-3">
                    <b>Elija La fecha de Asistencia :</b>
                    <input type="date" class="form-control" name="asis_fecha" min="2020-03-01" max="2020-12-31" id="infechaini" onChange="sinDomingos();" onblur="obtenerfechafinf1();" required>
                    <input type="hidden" class="form-control" name="asis_idcurso" value="{{$idcurso}}">
                </div>
            </div>
            <div class="card-body">
                <table class="table table-responsive" id="">
                    <thead>
                        <tr>
                            <th class="">Alumnos</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($alumnos as $a)
                            <tr>
                                <td>{{$a->alum_ape.', '.$a->alum_nom}}</td>
                                <input type="hidden" value="{{$a->alum_id}}" name="data[{{$a->alum_id}}][asis_idalumno]" class="form-control-plaintext">
                                <td>
                                    <select name="data[{{$a->alum_id}}][asis_est]" id="">
                                        <option value="0" selected>A</option>
                                        <option value="1">T</option>
                                        <option value="2">F</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary" id="elSubmit" type="submit">
                  <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Registrar
                </button>
                <!-- <input type="submit" class="btn btn-primary" id="elSubmit" value="Registrar"> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
  $(() => {
  $('button').on('click', e => {
    let spinner = $(e.currentTarget).find('span')
    spinner.removeClass('d-none')
    setTimeout(_ => spinner.addClass('d-none'), 20000)
  })
})
</script>

<script type="text/javascript">
        enviando = false; //Obligaremos a entrar el if en el primer submit
    
    function checkSubmit() {
        if (!enviando) {
            enviando= true;
            return true;
        } else {
            //Si llega hasta aca significa que pulsaron 2 veces el boton submit
            alert("Solo se Hace un click en el boton Registrar"+" "+"Porfavor espere a que se suba la Asistencia que acaba de Registrar");
            return false;
        }
    }
</script>
<script type="text/javascript">

function desactivaBoton(id) {
   document.getElementById(id).disabled=true;
}
</script>
<script type="text/javascript">
    
var elDate = document.getElementById('infechaini');
var elForm = document.getElementById('elForm');
var elSubmit = document.getElementById('elSubmit');

function sinDomingos(){
    var day = new Date(elDate.value ).getUTCDay();
    // Días 0-6, 0 es Domingo 6 es Sábado
    elDate.setCustomValidity(''); // limpiarlo para evitar pisar el fecha inválida
    if( day == 0 || day == 6 ){
       elDate.setCustomValidity('por favor seleccione otro día de Lunes a Viernes');
    } else {
       elDate.setCustomValidity('');
    }
    if(!elForm.checkValidity()) {elSubmit.click()};
}

function obtenerfechafinf1(){
    sinDomingos();
}

</script>
@endsection