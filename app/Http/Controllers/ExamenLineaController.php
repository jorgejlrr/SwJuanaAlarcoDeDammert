<?php

namespace App\Http\Controllers;


use App\ExamenLinea;
use Illuminate\Http\Request;
use Auth;
use DB;

class ExamenLineaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listarExamenesPorCurso($idcurso)
    {
        $data = DB::table('examen_linea')
                    ->join('trabajador','trabajador.trab_dni','examen_linea.exa_iddocen')
                    ->where('exa_idcurso','=',$idcurso)
                    ->get();
        return view('examen.listar',['idcurso'=>$idcurso,'data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear($idcurso)
    {
        return view('examen.create',['idcurso'=>$idcurso]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = $request->all();
        ExamenLinea::create([
            'exa_idcurso' => $obj['exa_idcurso'],
            'exa_titulo' => $obj['exa_titulo'],
            'exa_link' => $obj['exa_link'],
            'exa_iddocen' => Auth::user()->usuario
        ]);

        $query = DB::table('alumno_curso')
                        ->join('alumno','alumno.alum_id','alumno_curso.alumno_id')
                        ->join('apoderado','apoderado.apod_id','alumno.alum_apod')
                        ->where('alumno_curso.curso_id','=', $obj['exa_idcurso'])->get();

        $datoscurso = DB::table('curso')
                        ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                        ->where('curso.curs_id','=',$obj['exa_idcurso'])
                        ->first();

            foreach($query as $datos){
                $alumno = $datos->alum_ape . ', ' . $datos->alum_nom;
                $apoderado = $datos->apod_ape . ', ' . $datos->apod_nom;
                $curso = ''.$datoscurso->asig_nom;
                $asunto = "". $datos->alum_ape . ' ' . $datos->alum_nom . ': EXAMEN VIRTUAL ';
                $msg = "Se comunica que se subió un exámen virtual a la plataforma del estudiante: " . $alumno .  ", correspondiente al curso de: " . $curso;

                $to_name="jad";
                $to_mail= $datos->apod_email;
                $data = array("name"=>$apoderado,"body"=>$msg);
                \Mail::send('mail',$data,function($message) use ($to_name,$to_mail,$asunto){
                    $message->to($to_mail)
                    ->subject($asunto);
                });
            }

        return redirect()->route('exa.show',array('idcurso' => $obj['exa_idcurso']))->with('status', 'Exámen agregado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExamenLinea  $examenLinea
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $exa = ExamenLinea::find($id);
        return view('examen.show',['exa'=>$exa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExamenLinea  $examenLinea
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exa = ExamenLinea::find($id);
        return view ('examen.edit',['examen'=>$exa]);
    }


    public function update(Request $request)
    {
        $data = $request->all();
        $exa = ExamenLinea::find($data['exa_id']);
        $exa->update($request->all());
        return redirect()->route('exa.show',array('idcurso' => $exa->exa_idcurso))->with('status', 'Exámen editado correctamente!');
    }

    public function destroy($id)
    {
        $exa = ExamenLinea::find($id);
        ExamenLinea::destroy($id);
        return redirect()->route('exa.show',array('idcurso' => $exa->exa_idcurso))->with('status', 'Exámen eliminado correctamente!');

    }
}