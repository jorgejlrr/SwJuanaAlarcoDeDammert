@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Registro de administradores</strong>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-2">
                        <input class="form-control" id="dni" onKeyPress="return soloNumeros(event)"  name="dnis" type="text" placeholder="Escriba el DNI" maxlength="8" minlength="8" autofocus>
                    </div>
                    <div class="col-md-2">
                        <button id="btnbuscar" class="btn btn-success form-control"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                    <div class="col-md-8">
                        <label id="mensaje" style="color: red;display: none;font-size: 12pt;">El número de DNI no es válido</label>
                    </div>
                </div>
                <form action="{{url('administrador')}}" method="POST" class="form-horizontal" onsubmit="return Comprobar();"> 
                @method('POST')
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
                            <input class="form-control" id="trab_dni" type="text" name="trab_dni" value="{{old('trab_dni')}}" readonly required>
                        </div>
                        <label class="col-md-1 col-form-label">Apellidos</label>
                        <div class="col-md-4">
                            <input class="form-control" id="trab_ape" type="text" name="trab_ape" value="{{old('trab_ape')}}" readonly required>
                        </div>
                        <label class="col-md-1 col-form-label">Nombres</label>
                        <div class="col-md-3">
                            <input class="form-control" id="trab_nom" type="text" name="trab_nom" value="{{old('trab_nom')}}" readonly required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1 col-form-label">Sexo</label>
                        <div class="col-md-2">
                            <select class="form-control" id="" name="trab_sexo" required>
                                <option value="" hidden>-- Seleccione --</option>
                                <option value="1" @if (old('trab_sexo') == "1") {{ 'selected' }} @endif>Masculino</option>
                                <option value="0" @if (old('trab_sexo') == "0") {{ 'selected' }} @endif>Femenino</option>
                            </select>
                        </div>
                        <label class="col-md-2 col-form-label">F. Nacimiento</label>
                        <div class="col-md-3">
                            <input class="form-control" type="date" name="trab_fnac" min="1900-01-01" max="2002-12-31" value="{{old('trab_fnac')}}" required>
                        </div>
                        <label class="col-md-1 col-form-label">E-mail</label>
                        <div class="col-md-3">
                            <input class="form-control" id="validemail" type="email" name="trab_email" placeholder="ejemplo@correo.com" required><span id="emailOK"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-1 col-form-label">Telefono</label>
                        <div class="col-md-3">
                            <input class="form-control" type="text" onKeyPress="return soloNumeros(event)" onKeyUp="pierdeFoco(this)" name="trab_tel" maxlength="9" id="telef" required>
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Registrar" class="btn btn-primary">
                        <a href="{{url('administrador')}}" class="btn btn-danger">Cancelar</a>
                    </div> 
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('#btnbuscar').click(function(){
            var numdni=$('#dni').val();
            if (numdni!='') {
                //AJAX
                $.get('../api/dni/'+numdni, function (data) {
                    var docente = JSON.parse(data);
                    if (docente.exito==true){
                        $('#trab_dni').val(docente.dni);            
                        $('#trab_ape').val(docente.paterno + ' ' + docente.materno);            
                        $('#trab_nom').val(docente.nombres);    
                    } else {
                        $('#trab_dni').val('');            
                        $('#trab_ape').val('');            
                        $('#trab_nom').val('');  
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
</script>












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