<?php

namespace App\Http\Controllers;

use App\Curso;
use DB;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('curso')
                    ->join('trabajador','trabajador.trab_id','curso.curs_iddocen')
                    ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                    ->get();
        return view('curso.index',['cursos'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('asignatura')->get();
        return view('curso.create',['asignaturas'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'curs_idasig' => 'required',
            'curs_iddocen' => 'required',
            'curs_grado' => 'required',
            'curs_año' => 'required'
        ]);
        $data = $request->all();
        $curso = Curso::create($data);
        return redirect()->route('curso.index')->with('status', 'Curso agregado correctamente!');        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // View para docentes
        $curso = DB::table('curso')
                    ->where('curso.curs_id','=',$id)
                    ->first();
        return view('curso.show',['curso'=>$curso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = DB::table('curso')
                    ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                    ->where('curs_id','=',$id)
                    ->first();
        $docentes = DB::table('asignatura_docente')
                    ->join('trabajador','trabajador.trab_id','asignatura_docente.trab_id')
                    ->where('asignatura_docente.asig_id','=',$curso->asig_id)->get();
        return view('curso.edit',['curso'=>$curso,'docentes'=>$docentes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->all();
        $curso = Curso::find($id);
        $curso->curs_iddocen = $request['curs_iddocen'];
        $curso->save();
        return redirect()->route('curso.index')->with('status', 'Curso editado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        //
    }

    public function matricula($id){
        $curso = Curso::find($id);

        //$data = DB::select('call matricularAlumnos(?, ?)',array($id, $curso->curs_grado));
        
        $data = DB::table('alumno')
                    ->where('alumno.alum_grad','=',$curso->curs_grado)
                    ->where('alumno.alum_est','=','1')
                    ->whereNotIn('alumno.alum_id', DB::table('alumno_curso')->select('alumno_id')->where('alumno_curso.curso_id','=',$id))
                    ->orderBy('alumno.alum_ape','asc')
                    ->get();

        return view ('curso.matricula',['alumnos'=>$data,'curso'=>$curso]);
    }

}