<div class="modal fade" id="modal-est-{{$trab->trab_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action="{{url('administrador/'.$trab->trab_id)}}" method="post">
            @csrf()
            @method('DELETE')
            <div class="modal-body">
                @if($trab->trab_est == 1)
                    <h5>¿Deseas inactivar al usuario?</h5>
                    <b>{{$trab->trab_nom.','.$trab->trab_ape}}</b>
                @elseif($trab->trab_est == 0)
                    <h5>¿Deseas activar al usuario?</h5>
                    <b>{{$trab->trab_nom.','.$trab->trab_ape}}</b>
                @endif
            </div>
            <div class="modal-footer">
                <input type="submit" value="SI" class="btn btn-primary">
                <a href="{{url('administrador')}}" class="btn btn-danger">NO</a>
            </div>
        </form>
    </div>
  </div>
</div>