<div class="modal fade" id="modal-delete-{{$file->rec_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <p class="lead">¿Deseas eliminar este recurso?</p>
      </div>
      <div class="modal-footer">
        <a href="{{url('file/'.$file->rec_id.'/'.$idcurso.'/'.$nbim)}}" class="btn btn-danger">Eliminar</a>
      </div>
    </div>
  </div>
</div>