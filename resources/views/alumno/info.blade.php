<div class="modal fade" id="modal-info-{{$alum->alum_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalle del alumno</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
            <div class="modal-body">
                <p>Datos del Estudiante:</p>
                <label class="form-control">DNI: {{$alum->alum_dni}}</label>
                <label class="form-control">Apellidos: {{$alum->alum_ape}}</label>
                <label class="form-control">Nombres: {{$alum->alum_nom}}</label>
                @if($alum->alum_sexo == 1)
                    <label for="" class="form-control">Sexo: Masculino</label>
                @elseif($alum->alum_sexo == 0)
                    <label for="" class="form-control">Sexo: Femenino</label>
                @endif
                <label class="form-control">F. Nacimiento: {{date("d/m/Y", strtotime($alum->alum_fnac))}}</label>
                <label class="form-control">Grado: 

                @if ($alum->alum_grad <= 6)
                                    {{$alum->alum_grad . '° de primaria'}}
                                @elseif($alum->alum_grad == 7)
                                    {{'1° de secundaria'}}
                                @elseif($alum->alum_grad == 8)
                                    {{'2° de secundaria'}}          
                                @elseif($alum->alum_grad == 9)
                                    {{'3° de secundaria'}}  
                                @elseif($alum->alum_grad == 10)
                                    {{'4° de secundaria'}}  
                                @elseif($alum->alum_grad == 11)
                                    {{'5° de secundaria'}}  
                                @else
                                    {{'Egresado'}}  
                                @endif
                </label>
                @if($alum->alum_est == 1)
                    <label class="form-control">Estado: <span class="badge badge-success">Activo</span></label>
                @elseif($alum->alum_est == 0)
                    <label class="form-control">Estado: <span class="badge badge-danger">Inactivo</span></label>
                @endif
                <p>Datos del Apoderado:</p>
                <label class="form-control">Apellidos: {{$alum->apod_ape}}</label>
                <label class="form-control">Nombres: {{$alum->apod_nom}}</label>
                <label class="form-control">E-mail: {{$alum->apod_email}}</label>
                <label class="form-control">Teléfono: {{$alum->apod_tel}}</label>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>