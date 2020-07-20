<div class="modal fade" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Subir recurso</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
        <form action="{{url('upload')}}" method="POST" enctype="multipart/form-data" onsubmit="return checkSubmit();">
            <div class="modal-body">
                {{csrf_field()}}
                <input type="file" name="rec_archivo" required>
                <input type="hidden" name="rec_curso" value="{{$idcurso}}">
                <input type="hidden" name="rec_bimestre" value="{{$nbim}}"><br>
                <b>Nota1: Se recomienda subir archivos comprimidos</b><br>
                <b>Nota2: Subir como maximo archivos de 3Mb</b>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <button class="btn btn-primary" type="submit">
                  <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true">                                                                            </span>
                  Enviar
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