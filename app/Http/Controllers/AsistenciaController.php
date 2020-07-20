<?php

namespace App\Http\Controllers;

use Auth;

use DB;
use App\Asistencia;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    public function index()
    {
        //
    }

    public function registrar($id)
    {
        return view('asistencia.create',['idcurso'=>$id]);
    }

    public function store(Request $request)
    {
        $arreglo = $request->all();
        foreach ($arreglo['data'] as $key => $value) {
            Asistencia::create([
                'asis_idcurso' => $arreglo['asis_idcurso'],
                'asis_idalumno' => $value['asis_idalumno'],
                'asis_fecha' => $arreglo['asis_fecha'],
                'asis_est' => $value['asis_est']
            ]);
            
            $datos = DB::table('alumno')
                    ->join('apoderado','apoderado.apod_id','alumno.alum_apod')
                    ->where('alumno.alum_id','=',$value['asis_idalumno'])->first();
            
            $datoscurso = DB::table('curso')
                        ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                        ->where('curso.curs_id','=',$arreglo['asis_idcurso'])
                        ->first();

            if($value['asis_est'] == 1){

                $alumno = $datos->alum_ape . ', ' . $datos->alum_nom;
                $apoderado = $datos->apod_ape . ', ' . $datos->apod_nom;
                $curso = $datoscurso->asig_nom;
                $fecha = date("d/m/Y", strtotime($arreglo['asis_fecha']));
                $asunto = "". $datos->alum_ape . ' ' . $datos->alum_nom . ': TARDANZA ' . $fecha;
                $msg = "Sr(a). padre de familia, se comunica que el estudiante: " . $alumno .  " tiene tardanza el día " . $fecha . " del curso: " . $curso;

                $to_name="jad";
                $to_mail= $datos->apod_email;
                $data = array("name"=>$apoderado,"body"=>$msg);
                \Mail::send('mail',$data,function($message) use ($to_name,$to_mail,$asunto){
                    $message->to($to_mail)
                    ->subject($asunto);
                });

            } elseif($value['asis_est'] == 2){

                $alumno = $datos->alum_ape . ', ' . $datos->alum_nom;
                $apoderado = $datos->apod_ape . ', ' . $datos->apod_nom;
                $curso = $datoscurso->asig_nom;
                $fecha = date("d/m/Y", strtotime($arreglo['asis_fecha']));
                $asunto = "". $datos->alum_ape . ' ' . $datos->alum_nom . ': FALTA ' . $fecha;
                $msg = "Sr(a). padre de familia, se comunica que el estudiante: " . $alumno .  " tiene falta el día " . $fecha. " del curso: " . $curso;

                $to_name="jad";
                $to_mail= $datos->apod_email;
                $data = array("name"=>$apoderado,"body"=>$msg);
                \Mail::send('mail',$data,function($message) use ($to_name,$to_mail,$asunto){
                    $message->to($to_mail)
                    ->subject($asunto);
                });

            }

        }

        return redirect()->route('asistencia.show',[$arreglo['asis_idcurso']])->with('status', 'Registro correctamente!');
    }

    public function show($id)
    {
        if(Auth::user()->hasrole('docen'))
        {

            return view('asistencia.show',['idcurso'=>$id]);

        } elseif (Auth::user()->hasrole('alum')) {
            $trab_data = DB::table('alumno')
                            ->where('alumno.alum_user','=',Auth::user()->usuario)->first();
            $asis = DB::table('asistencia')
                    ->where([['asistencia.asis_idcurso','=',$id],['asistencia.asis_idalumno','=',$trab_data->alum_id]])
                    ->orderby('asistencia.asis_fecha','asc')
                    ->get();
            return view('asistencia.alumno.show',['asis'=>$asis]);

        }
    }

    public function recibirFiltros(Request $req)
    {
        $data =$req->all();
        $alumnos = DB::table('alumno_curso')
                ->join('alumno','alumno.alum_id','alumno_curso.alumno_id')
                ->where('alumno_curso.curso_id','=',$data['idcurso'])
                ->orderby('alumno.alum_ape','asc')
                ->get();
        $fechas = DB::table('asistencia')
                    ->select('asistencia.asis_fecha')
                    ->whereBetween('asis_fecha', [$data['finicio'],$data['ffin']])
                    ->where('asistencia.asis_idcurso','=',$data['idcurso'])
                    ->distinct()
                    ->orderby('asistencia.asis_fecha','asc')
                    ->get();     
        return view('asistencia.rango',['idcurso'=>$data['idcurso'],'finicio' => $data['finicio'], 'ffin' => $data['ffin'] , 'alumnos'=>$alumnos,'fechas'=>$fechas]);
    }


    public function edit(Asistencia $asistencia)
    {
        //
    }

    public function update(Request $request)
    {
        // $trab = trabajador::find($id);
        // $request->all();
        // $trab->update($request->all());
        // return redirect()->route('administrador.index')->with('status', 'Administrador editado correctamente!');

        $data=$request->all();
        $asis = asistencia::find($data['asis_id']);
        print_r($data);
        $asis->update($request->all());
        return redirect()->route('asistencia.show',[$asis['asis_idcurso']])->with('status', 'Asistencia Editada correctamente!');

        // return redirect()->route('administrador.index')->with('status', 'Administrador editado correctamente!');
    }

    public function destroy(Asistencia $asistencia)
    {
        //
    }

    public function editarAsistencia($idcurso){
        $alumnos = DB::table('alumno_curso')
                    ->join('alumno','alumno_curso.alumno_id','alumno.alum_id')
                    ->where('alumno_curso.curso_id','=',$idcurso)
                    ->get();
        
        return view ('asistencia.editform',['idcurso'=>$idcurso, 'alumnos'=>$alumnos]);
    }
    public function recibirEditarAsis(Request $request)
    {
        $data =$request->all();
        $mostrarfecha = DB::table('asistencia')
                    ->join('alumno','alumno.alum_id','asistencia.asis_idalumno')
                    ->where('asistencia.asis_fecha','=',$data['fecha'])
                    ->where('asistencia.asis_idcurso','=',$data['idcurso'])
                    ->where('asistencia.asis_idalumno','=',$data['alumno'])
                    ->first();
        return view ('asistencia.mostrareditasis',['mostrarfecha'=>$mostrarfecha]);

    }
    
}