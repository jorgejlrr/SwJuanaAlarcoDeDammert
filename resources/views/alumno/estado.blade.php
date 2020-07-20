<div class="modal fade" id="modal-est-{{$alum->alum_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{url('alumno/'.$alum->alum_id)}}" method="post">
            @csrf()
            @method('DELETE')
            <div class="modal-body">
                @if($alum->alum_est == 1)
                    <h5>¿Deseas inactivar al alumno?</h5>
                @elseif($alum->alum_est == 0)
                    <h5>¿Deseas activar al alumno?</h5>
                @endif
            </div>
            <div class="modal-footer">
                <input type="submit" value="Enviar" class="btn btn-primary">
            </div>
        </form>
    </div>
  </div>
</div>