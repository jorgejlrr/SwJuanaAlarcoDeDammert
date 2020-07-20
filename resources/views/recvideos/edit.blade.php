@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Modificar administrador</strong>
            </div>
            <div class="card-body">
                <form action="{{url('recvideo/'.$video->vid_id)}}" method="POST" enctype="multipart/form-data" onsubmit="return checkSubmit();">
                    <div class="modal-body">
                        @method('PATCH')
                        {{csrf_field()}}
                            <input type="hidden" name="vid_curso" value="{{$video->vid_curso}}">
                        <label class="">Titulo:</label>
                            <input type="text" class="form-control" name="vid_titulo" value="{{$video->vid_titulo}}" required>
                        <label class="">Link:</label>
                            <input type="text" class="form-control" name="vid_link" value="{{$video->vid_link}}" required>
                    </div>
                    <div class="modal-footer">
                        <a href="{{url($video->vid_curso.'/videos')}}" class="btn btn-danger">Cancelar</a>
                        <button class="btn btn-warning" type="submit">
                  <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                  Editar
                </button>
                        <!-- <input type="submit" value="Editarss" class="btn btn-warning"> -->
                    </div>
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
            alert("Solo se Hace un click en el boton Enviar,"+" "+"porfavor espere a que se suba el video que acaba de cargar.");
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
    alert( "Ya he realizado un click." );
  // Si no ha sido clicado
  } else {
    // Le decimos que ha sido clicado
    clicando= true;
    // Mostramos el mensaje de que ha sido clicado
    alert( "Acaba de Subir un video al Sistema Web, porfavor espere a que termine de cargar el video correctamente y le aparesca el mensaje de confirmacion" );
  }
});
</script>
@endsection

@section('scripts')
<script>
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>

<script>
function soloNumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "1234567890";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}

function limpia() {
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("miInput").value = '';
    }
}
</script>


<script >
    function el(el) {
  return document.getElementById(el);
}
el('precio').addEventListener('input',function() {
  var val = this.value;
  this.value = val.replace(/\-/,'');
}); 
///////////////////////////////////////////////////////
    function el(el) {
  return document.getElementById(el);
}
el('stock').addEventListener('input',function() {
  var val = this.value;
  this.value = val.replace(/\D|\-/,'');
}); 
//////////////////////////////////////////////////////
function el(el) {
  return document.getElementById(el);
}
//////////////////////////////////////////////////////
    function solonumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "0123456789.";
       especiales = "8-37-39-46";
       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
//////////////////////////////////////////////////////
    function letrasynumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz0123456789";
       especiales = "8-37-39-46";
       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
/////////////////////////////////////////////////////
    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";
       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
//////////////////////////////////////////////////////
function limpia() {
    var val = document.getElementById("borrado").value;
    var tam = val.length;
    for(i = 0; i < tam; i++) {
        if(!isNaN(val[i]))
            document.getElementById("borrado").value = '';
    }
}
//////////////////////////////////////////////////////
function soloNumeros(e) {
   var key = window.Event ? e.which : e.keyCode;
   return ((key >= 48 && key <= 57) ||(key==8))
 }
 
 function pierdeFoco(e){
    var valor = e.value.replace(/^0*/, '');
    e.value = valor;
 }

</script>

<script type="text/javascript">
    document.getElementById('validemail').addEventListener('input', function() {
    campo = event.target;
    valido = document.getElementById('emailOK');
        
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerText = "válido";
    } else {
      valido.innerText = "incorrecto";
    }
});
</script>
<script>
function Comprobar() {
  if (document.getElementById("telef").value=="") {
    alert("Debes rellenar el numero de Telefono"); 
    return false;
  }
  if (document.getElementById("telef").value.length<9) {
    alert("El Telefono debe tener al menos 9 caracteres númericos"); 
    return false;
  }
  return true;
}
</script>

@endsection
