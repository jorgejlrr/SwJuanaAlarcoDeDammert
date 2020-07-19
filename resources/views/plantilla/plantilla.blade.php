<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sistema Web - Control Académico</title>
    <!-- Icons-->
    <link href="{{asset('plantilla/node_modules/@coreui/icons/css/coreui-icons.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla/node_modules/flag-icon-css/css/flag-icon.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla/node_modules/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla/node_modules/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="{{asset('plantilla/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('plantilla/vendors/pace-progress/css/pace.min.css')}}" rel="stylesheet">
    <!-- DataTable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      // Shared ID
      gtag('config', 'UA-118965717-3');
      // Bootstrap ID
      gtag('config', 'UA-118965717-5');
    </script>
  </head>
  <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show" onload="mueveReloj()">
    <header class="app-header navbar">
      <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="{{url('home')}}">
        <img class="navbar-brand-full" src="{{asset('img/logo-jad.jpeg')}}" width="40" height="40" alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="{{asset('img/logo-jad.jpeg')}}" width="30" height="30" alt="CoreUI Logo">
      </a>
      <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
        <span class="navbar-toggler-icon"></span>
      </button>
      <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            <img class="img-avatar" src="{{asset('plantilla/img/avatars/6.jpg')}}" alt="admin@bootstrapmaster.com">
          </a>  
          <div class="dropdown-menu dropdown-menu-right">
            
            <div class="dropdown-header text-center">
              <strong>Cuenta</strong>
            </div>
            <a class="dropdown-item" href="{{url('pwrd')}}">
              <i class="fa fa-wrench"></i> Password</a>
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();"><i class="fa fa-lock"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      </ul>
    </header>

    <div class="app-body">
      <div class="sidebar">
        <nav class="sidebar-nav">
          <ul class="nav">
            <li class="nav-title">Opciones</li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('home')}}">
                <i class="nav-icon icon-home"></i> Inicio</a>
            </li>
            @if(Auth::user()->hasAnyRole(['admin','secre']))
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" href="#">
                <i class="nav-icon fa fa-users"></i> Personal</a>
              <ul class="nav-dropdown-items">
                @if(Auth::user()->hasrole('admin'))
                <li class="nav-item">
                  <a class="nav-link" href="{{url('administrador')}}">
                    <i class="nav-icon fa fa-user-circle-o"></i> Administradores</a>
                </li>
                @endif
                <li class="nav-item">
                  <a class="nav-link" href="{{url('secretaria')}}">
                    <i class="nav-icon fa fa-fax"></i> Secretarias</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('docente')}}">
                    <i class="nav-icon cui-monitor"></i> Docentes</a>
                </li>
              </ul>
            </li>   
            <li class="nav-item">
              <a class="nav-link" href="{{url('alumno')}}">
                <i class="nav-icon icon-user"></i> Alumnos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('apoderado')}}">
                <i class="nav-icon cui-people"></i> Apoderados</a>
            </li>            
            <li class="nav-item">
              <a class="nav-link" href="{{url('curso')}}">
                <i class="nav-icon icon-notebook"></i> Cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('pago')}}">
                <i class="nav-icon fa fa-dollar"></i> Pagos</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{url('encuesta')}}">
                <i class="nav-icon fa fa-file-text-o"></i> Encuestas</a>
            </li>     
            <li class="nav-item">
              <a class="nav-link" href="{{url('video')}}">
                <i class="nav-icon fa fa-video-camera"></i> Videos</a>
            </li>
              @if(Auth::user()->hasrole('admin'))
              <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                  <i class="nav-icon fa icon-chart"></i> Reportes</a>
                <ul class="nav-dropdown-items">
                  <li class="nav-title">Tasa de Asistencia</li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('reporteasistencia')}}">
                      <small>R. de Asistencia - Diario</small></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('reporteasistenciamensual')}}">
                      <small>R. de Asistencia - Mensual</small></a>
                  </li>
                  <li class="nav-title">Tasa de Aprobación</li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('reportebimestres')}}">
                      <small>R. de Aprobación - Bimestral</small></a>
                  </li>
                </ul>
              </li> 
              <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                  <i class="nav-icon fa fa-line-chart"></i> Gráficos</a>
                <ul class="nav-dropdown-items">
                  <li class="nav-title">Tasa de Asistencia</li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('grafico')}}">
                      <small>G. de Asistencia - Mensual</small></a>
                  </li>
                  <li class="nav-title">Tasa de Aprobación</li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{url('graficonotas')}}">
                      <small>G. de Aprobación - Bimestral</small></a>
                  </li>
                </ul>
              </li>
              @endif       
            @endif
            @if(Auth::user()->hasrole('docen'))
            <li class="nav-item">
              <a class="nav-link" href="{{url('cursos/'.Auth::user()->usuario)}}">
                <i class="nav-icon icon-notebook"></i> Mis cursos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('video')}}">
                <i class="nav-icon fa fa-video-camera"></i> Videos</a>
            </li>   
            @endif
            @if(Auth::user()->hasrole('alum'))
            <li class="nav-item">
              <a class="nav-link" href="{{url('miscursos/'.Auth::user()->usuario)}}">
                <i class="nav-icon icon-notebook"></i> Mis asignaturas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('mispagos/'.Auth::user()->usuario)}}">
                <i class="nav-icon fa fa-dollar"></i> Mis pagos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('misreportes/'.Auth::user()->usuario)}}">
                <i class="nav-icon fa fa-database"></i> Mis reportes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('encuesta')}}">
                <i class="nav-icon fa fa-file-text-o"></i> Encuestas</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="{{url('video')}}">
                <i class="nav-icon fa fa-video-camera"></i> Videos</a>
            </li>          
            @endif
          </ul>
        </nav>
        <button class="sidebar-minimizer brand-minimizer" type="button"></button>
      </div>
      <main class="main">
        <div class="container-fluid">
          <div class="animated fadeIn">
          <!-- Contenido dinámico-->
          @yield('contenido')
          </div>
        </div>
      </main>
    </div>
    <footer class="app-footer">
      <div class="ml-auto">
        <span><a href="https://www.facebook.com/innovasystec" target="_blank">Innovasystec</a> - Copyright &copy; 2020.</span>
      </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="{{asset('plantilla/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('plantilla/node_modules/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('plantilla/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plantilla/node_modules/pace-progress/pace.min.js')}}"></script>
    <script src="{{asset('plantilla/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('plantilla/node_modules/@coreui/coreui/dist/js/coreui.min.js')}}"></script>
    
    <!-- DataTable-->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>


    <script>
      $(document).ready( function () {
          $('#dataTable').DataTable();
      } );
      var table = $('#dataTable').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
            "infoEmpty": "Mostrando 0 to 0 of 0 registros",
            "infoFiltered": "(Filtrado de _MAX_ total registros)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        }
      });
    </script>

    @yield('scripts')

  </body>
</html>
