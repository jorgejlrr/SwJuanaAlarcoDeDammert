@extends('plantilla.plantilla')
@section('contenido')
<div class="row mt-4">
    <div class="col-md-6">
    </div>
    <div class="col-md-6">
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card my-3">
            <div class="card-header">
                <div class="card-header-actions">
                    <a href="{{url('notas/'.$a->not_idcurso.'/'.$a->not_bimestre)}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <form action="{{url('notas/'.$a->not_id)}}" method="POST">
            @method('PATCH')
            {{ csrf_field() }}
            <div class="card-body">
                <table class="table table-responsive table-sm" id="">
                    <thead>
                        <tr>
                            <th>Alumnos</th>
                            <th>N1</th>
                            <th>N2</th>
                            <th>N3</th>
                            <th>Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{$a->alum_ape .', '. $a->alum_nom}}</td>
                                <input type="hidden" name="not_id" value="{{$a->not_id}}">
                                <td><input type="number" min="0" max="20" name="not_n1" class="form-control itemTotalNeto{{$a->alum_id}}" id="n1" value="{{$a->not_n1}}" required></td>
                                <td><input type="number" min="0" max="20" name="not_n2" class="form-control itemTotalNeto{{$a->alum_id}}" id="n2" value="{{$a->not_n2}}" required></td>
                                <td><input type="number" min="0" max="20" name="not_n3" class="form-control itemTotalNeto{{$a->alum_id}}" id="n3" value="{{$a->not_n3}}" required></td>
                                <td><input type="text" name="not_promedio" class="form-control" id="prom{{$a->alum_id}}" value="{{$a->not_promedio}}" readonly required></td>
                            </tr>
                    </tbody>
                </table>
                <button class="btn btn-warning" type="submit">
                  <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true">                                                                            </span>
                  Modificar
                </button>
                <!-- <input type="submit" value="Modificar" class="btn btn-warning"> -->
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

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

<script>
    items = document.getElementsByClassName("itemTotalNeto<?php echo $a->alum_id ?>")
    for (var i = 0; i < items.length; i++) {
        items[i].addEventListener('change', function() {

            var n1 = document.getElementById("n1").value;
            var n2 = document.getElementById("n2").value;
            var n3 = document.getElementById("n3").value;

            suma = parseInt(n1) + parseInt(n2) + parseInt(n3);

            var inputNombre = document.getElementById("prom<?php echo $a->alum_id ?>");
            inputNombre.value = Math.round(suma / 3);
        });
    };
</script>
@endsection
