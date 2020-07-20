<div class="modal fade" id="modal-info-{{$doc->trab_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Detalle del docente</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
            <div class="modal-body">
                <p>Datos personales:</p>
                <label class="form-control">DNI: {{$doc->trab_dni}}</label>
                <label class="form-control">Apellidos: {{$doc->trab_ape}}</label>
                <label class="form-control">Nombres: {{$doc->trab_nom}}</label>
                @if($doc->trab_sexo == 1)
                    <label for="" class="form-control">Sexo: Masculino</label>
                @elseif($doc->trab_sexo == 0)
                    <label for="" class="form-control">Sexo: Femenino</label>
                @endif
                <label class="form-control">Fecha de Nacimiento: {{date("d/m/Y", strtotime($doc->trab_fnac))}}</label>
                <label class="form-control">E-mail: {{$doc->trab_email}}</label>
                <label class="form-control">Teléfono: {{$doc->trab_tel}}</label>
                @if($doc->trab_est == 1)
                    <label class="form-control">Estado: <span class="badge badge-success">Activo</span></label>
                @elseif($doc->trab_est == 0)
                    <label class="form-control">Estado: <span class="badge badge-danger">Inactivo</span></label>
                @endif
                <?php 
                $asignaturas = DB::table('asignatura_docente')
                                ->join('asignatura','asignatura.asig_id','asignatura_docente.asig_id')
                                ->where('trab_id','=',$doc->trab_id)
                                ->get();
                ?>
                <p>Asignaturas:</p>
                @foreach($asignaturas as $a)
                    <label class="form-control">{{$a->asig_nom}}</label>
                @endforeach
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
            </div>
    </div>
    <!-- /.modal-content-->
  </div>
  <!-- /.modal-dialog-->
</div>