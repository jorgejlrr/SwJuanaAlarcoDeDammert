@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Modificar apoderado</strong>
            </div>
            <div class="card-body">
                <form action="{{url('apoderado/'.$apod->apod_id)}}" method="POST" class="form-horizontal" onsubmit="return Comprobar();"> 
                @method('PATCH')
                {{ csrf_field() }}
                    @if (count($errors)>0)
                    <div class="alert alert-danger">
                        <p>Corregir los siguientes campos:</p>
                        <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-1 col-form-label">DNI</label>
                        <div class="col-md-2">
                            <input class="form-control" id="" type="text" name="apod_dni" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$apod->apod_dni}}" required readonly>
                        </div>
                        <label class="col-md-1 col-form-label">Apellidos</label>
                        <div class="col-md-4">
                            <input class="form-control" id="" type="text" name="apod_ape" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$apod->apod_ape}}" required readonly>
                        </div>
                        <label class="col-md-1 col-form-label">Nombres</label>
                        <div class="col-md-3">
                            <input class="form-control" id="" type="text" name="apod_nom" onkeyup="javascript:this.value=this.value.toUpperCase();" value="{{$apod->apod_nom}}" required readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1 col-form-label">Sexo</label>
                            <div class="col-md-2" >
                                <select class="form-control" id="" name="apod_sexo" required readonly >
                                    <option value="" hidden>-- Seleccione --</option>
                                        @if ($apod->apod_sexo == 1)
                                    <option selected="" value="1" >Masculino</option>
                                        @else
                                    <option selected="" value="0">Femenino</option>
                                        @endif
                                </select >                       
                            </div>
                        <label class="col-md-1 col-form-label">E-mail</label>
                        <div class="col-md-3">
                            <input class="form-control" id="validemail" type="email" name="apod_email" value="{{$apod->apod_email}}" placeholder="ejemplo@correo.com" required><span id="emailOK"></span>
                        </div>
                        <label class="col-md-1 col-form-label">Teléfono</label>
                        <div class="col-md-2">
                            <input class="form-control" id="telef" type="text" name="apod_tel" value="{{$apod->apod_tel}}" onKeyPress="return soloNumeros(event)" onKeyUp="pierdeFoco(this)" maxlength="9"  required>
                        </div>
                    </div>  
                    <div class="form-actions">
                        <input type="submit" value="Editar" class="btn btn-warning">
                        <a href="{{url('apoderado')}}" class="btn btn-danger">Cancelar</a>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- <script>
    $(document).ready(function(){
        $('#btnbuscar').click(function(){
            var numdni=$('#dni').val();
            if (numdni!='') {
                //AJAX
                $.get('../api/dni/'+numdni, function (data) {
                    var apoderado = JSON.parse(data);
                    if (apoderado.exito==true){
                        $('#apod_dni').val(apoderado.dni);            
                        $('#apod_ape').val(apoderado.paterno + ' ' + apoderado.materno);            
                        $('#apod_nom').val(apoderado.nombres);    
                    } else {
                        $('#apod_dni').val('');            
                        $('#apod_ape').val('');            
                        $('#apod_nom').val('');  
                        $('#mensaje').show();
                        $('#mensaje').delay(2000).hide(2500);  
                    }    
                });
            } else{
                alert('Escribir el DNI');
                $('#dni').focus();
            }
        })
    });
</script> -->
<!-- <script type="text/javascript">
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
    alert( "Se acaba de Registrar Correctamente un Apoderado." );
  }
});
</script> -->
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