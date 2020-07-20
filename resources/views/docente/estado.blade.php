<div class="modal fade" id="modal-est-{{$doc->trab_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{url('docente/'.$doc->trab_id)}}" method="post">
            @csrf()
            @method('DELETE')
            <div class="modal-body">
                @if($doc->trab_est == 1)
                    <h5>¿Deseas inactivar al docente?</h5>
                @elseif($doc->trab_est == 0)
                    <h5>¿Deseas activar al docente?</h5>
                @endif
            </div>
            <div class="modal-footer">
                <input type="submit" value="Aceptar" class="btn btn-primary">
            </div>
        </form>
    </div>
  </div>
</div>