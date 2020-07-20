<div class="modal fade" id="modal-info-{{$trab->trab_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalle del Admnistrador</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
            <div class="modal-body">
                <p>Datos personales:</p>
                <label class="form-control">DNI: {{$trab->trab_dni}}</label>
                <label class="form-control">Apellidos: {{$trab->trab_ape}}</label>
                <label class="form-control">Nombres: {{$trab->trab_nom}}</label>
                @if($trab->trab_sexo == 1)
                    <label for="" class="form-control">Sexo: Masculino</label>
                @elseif($trab->trab_sexo == 0)
                    <label for="" class="form-control">Sexo: Femenino</label>
                @endif
                <label class="form-control">Fecha de Nacimiento: {{date("d/m/Y", strtotime($trab->trab_fnac))}}</label>
                <label class="form-control">E-mail: {{$trab->trab_email}}</label>
                <label class="form-control">Teléfono: {{$trab->trab_tel}}</label>
                @if($trab->trab_est == 1)
                    <label class="form-control">Estado: <span class="badge badge-success">Activo</span></label>
                @elseif($trab->trab_est == 0)
                    <label class="form-control">Estado: <span class="badge badge-danger">Inactivo</span></label>
                @endif
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>