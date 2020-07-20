@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Modificar examen</strong>
            </div>
            <div class="card-body">
                <form action="{{url('examen/'.$examen->exa_id)}}" method="POST" class="form-horizontal" onsubmit="return Comprobar();"> 
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
                        <label class="col-md-1 col-form-label">Título</label>
                        <div class="col-md-5">
                            <input class="form-control" value="{{$examen->exa_titulo}}" required type="text" name="exa_titulo" >
                        </div>
                    </div>                    
                    <div class="form-group row">
                        <label class="col-md-1 col-form-label">Link</label>
                        <div class="col-md-11">
                            <input type="hidden" name="exa_id" value="{{$examen->exa_id}}">
                            <textarea name="exa_link" required class="form-control">{{$examen->exa_link}}</textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Modificar" class="btn btn-warning">
                        <a href="{{url('exavirtual/'.$examen->exa_idcurso)}}" class="btn btn-danger">Cancelar</a>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
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
