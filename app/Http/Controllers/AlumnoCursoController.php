<?php

namespace App\Http\Controllers;

use DB;
use App\AlumnoCurso;
use Illuminate\Http\Request;

class AlumnoCursoController extends Controller
{
    public function store(Request $request){
        $data = $request->all();
        foreach ($data['alumnos'] as $key => $value) {
            $alumCurso = AlumnoCurso::create([
                'curso_id' => $data['curs_id'],
                'alumno_id' => $value
            ]);
        }
        return redirect()->route('curso.index')->with('status', 'Alumnos matriculados correctamente!');
    }

}