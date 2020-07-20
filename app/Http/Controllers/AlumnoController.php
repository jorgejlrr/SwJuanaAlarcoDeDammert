<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Apoderado;
use App\RoleUser;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('alumno')
                    ->join('apoderado','apoderado.apod_id','alumno.alum_apod')
                    ->get();
        return view('alumno.index',['alumnos'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumno.create');
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
            'alum_dni' => 'required|unique:alumno,alum_dni|numeric|digits:8',
            'alum_ape' => 'required',
            'alum_nom' => 'required',
            'alum_sexo' => 'required',
            'alum_grad' => 'required',
            'alum_fnac' => 'required',
            'apod_dni' => 'required',
            'apod_ape' => 'required',
            'apod_nom' => 'required',
            'apod_sexo' => 'nullable',
            'apod_tel' => 'nullable',
            'apod_email' => 'nullable'
        ]);
        $data = $request->all();
        User::create([
            'id' => $data['alum_dni'],
            'usuario' => $data['alum_dni'],
            'password' => Hash::make($data['alum_dni']),
        ]);
        $rol = RoleUser::create([
            'user_id' => $data['alum_dni'],
            'role_id' => '4'
        ]);
        if($data['rb'] == 1){
            $apoderado = DB::table('apoderado')
                            ->where('apoderado.apod_dni','=',$data['apod_dni'])
                            ->first();
            $alumno = Alumno::create([
                'alum_dni' => $data['alum_dni'],
                'alum_ape' => $data['alum_ape'],
                'alum_nom' => $data['alum_nom'],
                'alum_sexo' => $data['alum_sexo'],
                'alum_grad' => $data['alum_grad'],
                'alum_fnac' => $data['alum_fnac'],
                'alum_apod' => $apoderado->apod_id,
                'alum_user' => $data['alum_dni']
            ]); 
        } else{
            $apod = Apoderado::create([
                'apod_dni' => $data['apod_dni'],
                'apod_ape' => $data['apod_ape'],
                'apod_nom' => $data['apod_nom'],
                'apod_sexo' => $data['apod_sexo'],
                'apod_email' => $data['apod_email'],
                'apod_tel' => $data['apod_tel']
            ]);
            $alumno = Alumno::create([
                'alum_dni' => $data['alum_dni'],
                'alum_ape' => $data['alum_ape'],
                'alum_nom' => $data['alum_nom'],
                'alum_sexo' => $data['alum_sexo'],
                'alum_grad' => $data['alum_grad'],
                'alum_fnac' => $data['alum_fnac'],
                'alum_apod' => $apod->apod_id,
                'alum_user' => $data['alum_dni']
            ]); 
        }
        return redirect()->route('alumno.index')->with('status', 'Alumno agregado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $alumno = Alumno::find($id);
        if($alumno->alum_est == 1){
            $alumno->alum_est = 0;
            $alumno->save();
        } else {
            $alumno->alum_est = 1;
            $alumno->save();
        }
        return redirect()->route('alumno.index')->with('status', 'Alumno editado correctamente!');
    }

    public function misCursos($id){
        $data = DB::table('alumno_curso')
                    ->join('curso','curso.curs_id','alumno_curso.curso_id')
                    ->join('trabajador','trabajador.trab_id','curso.curs_iddocen')
                    ->join('alumno','alumno.alum_id','alumno_curso.alumno_id')
                    ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                    ->where('alumno.alum_dni','=',$id)
                    ->get();
        return view ('alumno.miscursos',['cursos'=>$data]);
    }

    public function misPagos($id)
    {
        $data = DB::table('alumno')
                    ->join('pagos','pagos.idalumno','alumno.alum_id')
                    ->where('pagos.año','=','2020')
                    ->where('alumno.alum_dni','=',$id)
                    ->get();
        return view ('alumno.mispagos',['data'=>$data]);
    }

    public function misReportes($id)
    {
        return view ('alumno.misreportes',['idalumno'=>$id]);
    }


    public function descargarAlumnos(){
        $data = DB::table('alumno')
                    ->join('apoderado','apoderado.apod_id','alumno.alum_apod')
                    ->orderBy('alum_grad','asc')
                    ->orderBy('alum_ape','asc')
                    ->get();
        $totalalum = DB::table('alumno')->where('alum_est','=','1')->count();
        $nro_alumnoprimero = DB::table('alumno')->where([['alum_grad','=','1'],['alum_est','=','1']])->count();
        $nro_alumnosegundo = DB::table('alumno')->where([['alum_grad','=','2'],['alum_est','=','1']])->count();
        $nro_alumnotercero = DB::table('alumno')->where([['alum_grad','=','3'],['alum_est','=','1']])->count();
        $nro_alumnocuarto = DB::table('alumno')->where([['alum_grad','=','4'],['alum_est','=','1']])->count(); 
        $nro_alumnoquinto = DB::table('alumno')->where([['alum_grad','=','5'],['alum_est','=','1']])->count();
        $nro_alumnosexto = DB::table('alumno')->where([['alum_grad','=','6'],['alum_est','=','1']])->count();
        $nro_alumnoprimeros = DB::table('alumno')->where([['alum_grad','=','7'],['alum_est','=','1']])->count();
        $nro_alumnosegundos = DB::table('alumno')->where([['alum_grad','=','8'],['alum_est','=','1']])->count();
        $nro_alumnoterceros = DB::table('alumno')->where([['alum_grad','=','9'],['alum_est','=','1']])->count();
        $nro_alumnocuartos = DB::table('alumno')->where([['alum_grad','=','10'],['alum_est','=','1']])->count(); 
        $nro_alumnoquintos = DB::table('alumno')->where([['alum_grad','=','11'],['alum_est','=','1']])->count();
        $pdf = PDF::loadView('pdf.alumnos',[
                                    'data'=>$data,
                                    'n1alumnos'=>$nro_alumnoprimero,
                                    'n2alumnos'=>$nro_alumnosegundo,
                                    'n3alumnos'=>$nro_alumnotercero,
                                    'n4alumnos'=>$nro_alumnocuarto,
                                    'n5alumnos'=>$nro_alumnoquinto,
                                    'n6alumnos'=>$nro_alumnosexto,
                                    'n7alumnos'=>$nro_alumnoprimeros,
                                    'n8alumnos'=>$nro_alumnosegundos,
                                    'n9alumnos'=>$nro_alumnoterceros,
                                    'n10alumnos'=>$nro_alumnocuartos,
                                    'n11alumnos'=>$nro_alumnoquintos,
                                    'totalalum'=>$totalalum
                                ]);
        // $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Alumnos - JuanaAlarcoDeDammert.pdf');
    }

}