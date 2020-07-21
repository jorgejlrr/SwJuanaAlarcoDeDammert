<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Rutas del login
Auth::routes(['reset'=>false]);
Route::get('/home', 'HomeController@index')->name('home');

// Rutas de los controladores
Route::resource('administrador','AdministradorController')->middleware('auth');;
Route::resource('apoderado','ApoderadoController')->middleware('auth');;
Route::resource('alumno','AlumnoController')->middleware('auth');;
Route::resource('docente','DocenteController')->middleware('auth');;
Route::resource('secretaria','SecretariaController')->middleware('auth');;
Route::resource('curso','CursoController')->middleware('auth');;
Route::resource('ac','AlumnoCursoController')->middleware('auth');;
Route::resource('asistencia','AsistenciaController')->middleware('auth');;
Route::resource('notas','NotasController')->middleware('auth');;
Route::resource('examen','ExamenLineaController')->middleware('auth');;
Route::resource('pago','PagoController')->middleware('auth');;
Route::resource('encuesta','EncuestaController')->middleware('auth');;
Route::resource('video','VideoController')->middleware('auth');;
Route::resource('recvideo','RecVideoController')->middleware('auth');;

// Rutas del docente
Route::get('cursos/{id}','DocenteController@misCursos');

// Rutas del alumno
Route::get('miscursos/{id}','AlumnoController@misCursos');
Route::get('mispagos/{id}','AlumnoController@misPagos');
Route::get('misreportes/{id}','AlumnoController@misReportes');

// Rutas del curso
Route::get('matricula/{id}','CursoController@matricula');

// Rutas de asistencias
Route::get('asistencia/registrar/{id}','AsistenciaController@registrar');
Route::post('recibirfiltroasis','AsistenciaController@recibirFiltros');
Route::get('asistencia/editar/{idcurso}','AsistenciaController@editarAsistencia');
Route::post('recibireditarasis','AsistenciaController@recibirEditarAsis');

// Rutas de recursos
Route::get('{idcurso}/recursos','RecursoController@listarBimestres');
Route::get('recursos/{idcurso}/{nbim}','RecursoController@showBimestre')->name('recursos.show');
Route::get('file/{id}/{idcurso}/{nbim}','RecursoController@destroy');
Route::post('/upload', 'RecursoController@upload'); //Upload files
Route::post('/download','RecursoController@download'); //Download files

// Rutas para notas
Route::get('{idcurso}/notas','NotasController@listarBimestres');
Route::get('notas/{idcurso}/{nbim}','NotasController@consultaNotas')->name('notas.show');
Route::get('notas/{idcurso}/{nbim}/edit','NotasController@editarNotas');
Route::get('registronotas/{idcurso}/{nbim}','NotasController@formNotas');
Route::get('misnotas/{id}','NotasController@misnotas');

// Rutas PDF's
Route::get('pdfalumnos','AlumnoController@descargarAlumnos');
Route::get('pdfapoderados','ApoderadoController@descargarApoderados');

// Rutas de exámenes
Route::get('newexamen/{idcurso}','ExamenLineaController@crear');
Route::get('exavirtual/{idcurso}','ExamenLineaController@listarExamenesPorCurso')->name('exa.show');

// Rutas de reportes
Route::get('reportepagopdf/','PagoController@descargarPDF');
Route::get('reportepagoexcel/','PagoController@descargarEXCEL');
Route::get('reportes/{idcurso}','ReportesController@listarReportes');
Route::get('reportes/{idcurso}/lastconection','ReportesController@ultimaConexion');
Route::get('reportes/{idcurso}/asistenciadocen','ReportesController@asistenciadocen');

// Rutas de reportes - Admin
// Tasa de asistencia
Route::get('reporteasistencia/','ReportesController@showVentanaReporte');
Route::post('recebirreporteasis/','ReportesController@recibirReporteAsis');
Route::get('reporteasistenciamensual/','ReportesController@showVentanaReporteAsisMensual');
Route::post('recebirreporteasismensual/','ReportesController@recibirReporteAsisMensual');
// Tasa de aprobados
Route::get('reportebimestres/','ReportesController@showVentanaReporteAprob');
Route::post('recibirbimestres/','ReportesController@recibirReporteNotasBimestral');

// Rutas de pagos
Route::get('pagos/{id}','PagoController@resetPago');
Route::post('pagosupdate/','PagoController@actualizar');

// Route para password
Route::get('pwrd','PwrdController@mostrar')->name('newpass');
Route::post('changepass','PwrdController@procesar');

// Rutas para recursos videos
Route::get('{idcurso}/videos','RecVideoController@listar')->name('recvideos');
Route::get('{idcurso}/videos/create','RecVideoController@subir');


// Rutas gráficas
Route::get('grafico','GraficoController@showFormGraficoAsisMensual');
Route::post('datagrafico','GraficoController@recibirFormGraficoAsisMensual');
Route::get('graficonotas','GraficoController@showFormGraficoNotasMensual');
Route::post('datagraficonotas','GraficoController@recibirFormGraficoNotasMensual');
