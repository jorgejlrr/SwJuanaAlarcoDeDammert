<div class="modal fade" id="modal-delete-{{$examen->exa_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <p class="lead">¿Deseas eliminar este examen?</p>
      </div>
      <div class="modal-footer">
        <form action="{{url('examen/'.$examen->exa_id)}}" method="post">
          {{csrf_field()}}
          @method('DELETE')
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button class="btn btn-danger" type="submit">
                  <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true">                                                                            </span>
                  Eliminar
                </button>
        </form>
      </div>
    </div>
  </div>
</div>
@section('scripts')
<script type="text/javascript">
  $(() => {
  $('button').on('click', e => {
    let spinner = $(e.currentTarget).find('span')
    spinner.removeClass('d-none')
    setTimeout(_ => spinner.addClass('d-none'), 20000)
  })
})
</script>
@endsection
