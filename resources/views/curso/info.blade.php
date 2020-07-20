<div class="modal fade" id="modal-info-{{$cur->curs_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Alumnos matriculados</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
            <div class="modal-body">
                <?php $alumnos = DB::table('alumno')
                                ->join('alumno_curso','alumno_curso.alumno_id','alumno.alum_id')
                                ->where('alumno_curso.curso_id','=',$cur->curs_id)
                                ->orderBy('alumno.alum_ape','asc')
                                ->get(); ?>
                @foreach($alumnos as $alum)
                <label class="form-control">{{$alum->alum_ape . ', ' . $alum->alum_nom}}</label>
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