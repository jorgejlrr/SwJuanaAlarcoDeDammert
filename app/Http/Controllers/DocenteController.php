<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Trabajador;
use App\AsignaturaDocente;
use App\RoleUser;
use App\User;
use DB;

class DocenteController extends Controller
{
    public function index(Request $request){
        $data = DB::table('trabajador')
                ->join('role_user','role_user.user_id','trabajador.trab_user')
                ->where('role_user.role_id','=','3')
                ->get();
        return view ('docente.index',['docentes'=>$data]);
    }

    public function create(){
        $data = DB::table('asignatura')->get();
        return view ('docente.create',['asignaturas'=>$data]);
    }

    public function store(Request $request){
        $this->validate($request,[
            'trab_dni' => 'required|unique:trabajador,trab_dni|numeric|digits:8',
            'trab_ape' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
            'trab_nom' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
            'trab_sexo' => 'required',
            'trab_fnac' => 'required'
        ]);
        $data = $request->all();
        User::create([
            'id' => $data['trab_dni'],
            'usuario' => $data['trab_dni'],
            'password' => Hash::make($data['trab_dni']),
        ]);
        $rol = RoleUser::create([
            'user_id' => $data['trab_dni'],
            'role_id' => '3'
        ]); 
        $trab = Trabajador::create([
            'trab_dni' => $data['trab_dni'],
            'trab_ape' => $data['trab_ape'],
            'trab_nom' => $data['trab_nom'],
            'trab_sexo' => $data['trab_sexo'],
            'trab_fnac' => $data['trab_fnac'],
            'trab_email' => $data['trab_email'],
            'trab_tel' => $data['trab_tel'],
            'trab_user' => $data['trab_dni']
        ]); 
        foreach ($data['asignaturas'] as $key => $value) {
            $asigDoc = AsignaturaDocente::create([
                'trab_id' => $trab->trab_id,
                'asig_id' => $value
            ]);
        }
        return redirect()->route('docente.index')->with('status', 'Docente agregado correctamente!');
    }

    public function docentePorAsignatura($id){
        $data = DB::table('asignatura_docente')
                    ->join('trabajador','trabajador.trab_id','asignatura_docente.trab_id')
                    ->where('asignatura_docente.asig_id','=',$id)
                    ->get();
        return $data;
    }

    public function edit($id)
    {
        $trab = Trabajador::find($id);
        return view ('docente.edit',['trab'=>$trab]);
    }    

    public function update(Request $request, $id){

        $trab = trabajador::find($id);
        $request->all();
        $trab->update($request->all());
        return redirect()->route('docente.index')->with('status', 'Docente editado correctamente!');
    }

    public function destroy($id)
    {
        $trab = Trabajador::find($id);
        if($trab->trab_est == 1){
            $trab->trab_est = 0;
            $trab->save();
        } else {
            $trab->trab_est = 1;
            $trab->save();
        }
        return redirect()->route('docente.index')->with('status', 'Docente editado correctamente!');
    }

    public function misCursos($id){
        $data = DB::table('trabajador')
                    ->join('curso','curso.curs_iddocen','trabajador.trab_id')
                    ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                    ->where('trabajador.trab_dni','=',$id)
                    ->get();
        return view ('docente.miscursos',['mis_cursos'=>$data]);
    }    

}