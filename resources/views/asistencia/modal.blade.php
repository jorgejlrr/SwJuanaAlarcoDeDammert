<div class="modal fade" id="rf" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Rango de fechas</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
        <form action="{{url('recibirfiltroasis')}}" method="POST" enctype="multipart/form-data" onsubmit="return checkSubmit();">
            <div class="modal-body">
                {{csrf_field()}}
                @method('POST')
                <label>Fecha Inicio</label>
                <input type="date" name="finicio" class="form-control">
                <label>Fecha Fin</label>
                <input type="date" name="ffin" class="form-control">
                <input type="hidden" name="idcurso" value="{{$idcurso}}">
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" type="submit">
                  <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Buscar
                </button>

            </div>
        </form>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>

@section('scripts')
<script type="text/javascript">
  $(() => {
  $('button').on('click', e => {
    let spinner = $(e.currentTarget).find('span')
    spinner.removeClass('d-none')
    setTimeout(_ => spinner.addClass('d-none'), 2000)
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
            alert("Solo se Hace un click en el boton Enviar"+" "+"Porfavor espere a que se suba el recurso que acaba de cargar.");
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
    alert( "Acaba de Subir un Recurso Academico al Sistema Web, porfavor espere a que termine de cargar el recurso correctamente y le aparesca el mensaje de confirmacion: <Recurso subido correctamente>" );
  }
});
</script>
@endsection