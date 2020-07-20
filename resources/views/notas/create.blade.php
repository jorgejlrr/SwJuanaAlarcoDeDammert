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
                    <a href="{{url('notas/'.$idcurso.'/'.$nbim)}}" class="btn btn-block btn-outline-dark btn-sm"><i class="fa fa-mail-reply"></i></a>
                </div>
            </div>
            <form action="{{url('notas')}}" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="not_idcurso" value="{{$idcurso}}">
            <input type="hidden" name="not_bimestre" value="{{$nbim}}">
            <div class="card-body">
                <table class="table table-responsive table-sm" id="">
                    <thead>
                        <tr>
                            <th>Alumnos</th>
                            <th class="text-center">Promedio de separatas <br>( hojas de trabajo) <br> N1</th>
                            <th class="text-center">Promedio de <br>prácticas <br> N2</th>
                            <th class="text-center">Promedio de <br>participación <br> N3</th>
                            <th class="text-center">Promedio</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($alumnos as $a)
                            <tr>
                                <td>{{$a->alum_ape .', '. $a->alum_nom}}</td>
                                <input type="hidden" name="data[{{$a->alum_id}}][not_idalumno]" value="{{$a->alum_id}}">
                                <td><input type="number" min="0" max="20" name="data[{{$a->alum_id}}][not_n1]" class="form-control itemTotalNeto{{$a->alum_id}}" required></td>
                                <td><input type="number" min="0" max="20" name="data[{{$a->alum_id}}][not_n2]" class="form-control itemTotalNeto{{$a->alum_id}}" required></td>
                                <td><input type="number" min="0" max="20" name="data[{{$a->alum_id}}][not_n3]" class="form-control itemTotalNeto{{$a->alum_id}}" required></td>
                                <td><input type="hidden" id="totalGeneral{{$a->alum_id}}" required>
                                    <input type="text" name="data[{{$a->alum_id}}][not_promedio]" class="form-control" id="prom{{$a->alum_id}}" readonly required></td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary" type="submit">
                  <span class="d-none spinner-border spinner-border-sm" role="status" aria-hidden="true">                                                                            </span>
                  Registrar
                </button>
                <!-- <input type="submit" value="Registrars" class="btn btn-primary"> -->
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
    <?php foreach($alumnos as $a) { ?>
    items = document.getElementsByClassName("itemTotalNeto<?php echo $a->alum_id ?>")
    for (var i = 0; i < items.length; i++) {
        items[i].addEventListener('change', function() {
            n = document.getElementById("totalGeneral<?php echo $a->alum_id ?>");
            n.value = parseInt("0"+n.value) + parseInt("0"+this.value) - parseInt("0"+this.defaultValue) ;
            this.defaultValue = this.value ;
            console.log (n.value / 3);
            var inputNombre = document.getElementById("prom<?php echo $a->alum_id ?>");
            inputNombre.value = Math.round(n.value / 3);
        });
    };
    <?php } ?>
</script>
@endsection
