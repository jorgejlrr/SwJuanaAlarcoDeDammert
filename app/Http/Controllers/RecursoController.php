<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Recurso;
use Illuminate\Http\Request;

class RecursoController extends Controller
{
    
    public function listarBimestres($idcurso){
        return view('recursos.bimestres',['idcurso'=>$idcurso]);
    }

    public function showBimestre($idcurso, $nbim){
        $rol;
        if(Auth::user()->hasrole('docen'))
        {
            $rol = 3;
            $files = DB::table('recurso')
                    ->where('rec_curso','=',$idcurso)
                    ->where('rec_bimestre','=',$nbim)
                    ->get();
        } elseif(Auth::user()->hasrole('alum')){
            $rol = 4;
            $files = DB::table('recurso')
                    ->where('rec_curso','=',$idcurso)
                    ->where('rec_bimestre','=',$nbim)
                    ->where('rec_rol','=','3')
                    ->orWhere('rec_curso','=',$idcurso)
                    ->where('rec_bimestre','=',$nbim)
                    ->where('rec_dni','=',Auth::user()->usuario)
                    ->get();
        }
        return view ('recursos.showfiles',['idcurso'=>$idcurso,'nbim'=>$nbim,'files'=>$files]);
    }

    public function upload(Request $req){
        // Cargamos el archivo en el server
        $file = $req->file('rec_archivo');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('cursos/'.$req->rec_curso, $filename);

        // Creamos el objeto en la base de datos
        $rec_rol;
        if(Auth::user()->hasrole('docen'))
        {
            $rec_rol = 3;
        } elseif(Auth::user()->hasrole('alum')){
            $rec_rol = 4;
        }
        $data = $req->all();
        $obj = Recurso::create([
            'rec_curso' => $data['rec_curso'],
            'rec_bimestre' => $data['rec_bimestre'],
            'rec_archivo' => $filename,
            'rec_dni' => Auth::user()->usuario,
            'rec_rol' => $rec_rol
        ]);

        if(Auth::user()->hasrole('docen'))
        {
            $query = DB::table('alumno_curso')
                        ->join('alumno','alumno.alum_id','alumno_curso.alumno_id')
                        ->join('apoderado','apoderado.apod_id','alumno.alum_apod')
                        ->where('alumno_curso.curso_id','=',$data['rec_curso'])->get();

            $datoscurso = DB::table('curso')
                        ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                        ->where('curso.curs_id','=',$data['rec_curso'])
                        ->first();

            foreach($query as $datos){
                $alumno = $datos->alum_ape . ', ' . $datos->alum_nom;
                $apoderado = $datos->apod_ape . ', ' . $datos->apod_nom;
                $curso = $datoscurso->asig_nom;
                $asunto = "". $datos->alum_ape . ' ' . $datos->alum_nom . ': RECURSOS ';
                $msg = "Se comunica que se subió un recurso a la plataforma del estudiante: " . $alumno . ", correspondiente al curso de: " . $curso;

                $to_name="jad";
                $to_mail= $datos->apod_email;
                $data = array("name"=>$apoderado,"body"=>$msg);
                \Mail::send('mail',$data,function($message) use ($to_name,$to_mail,$asunto){
                    $message->to($to_mail)
                    ->subject($asunto);
                });
            }
        }

        if(Auth::user()->hasrole('alum'))
        {
            $queryDocente = DB::table('curso')
                        ->join('trabajador','trabajador.trab_id','curso.curs_iddocen')
                        ->where('curso.curs_id','=',$data['rec_curso'])->first();
                
            $datos = DB::table('alumno')
                  ->where('alumno.alum_dni','=',Auth::user()->usuario)->first();

                $alumno = $datos->alum_ape . ', ' . $datos->alum_nom;
                $docente = $queryDocente->trab_ape . ', ' . $queryDocente->trab_nom;
                $asunto = "". $alumno. ': SUBIÓ RECURSO(S) ';
                $msg = "Se comunica que el estudiante: " . $alumno . " subió un recurso(s)";

                $to_name="jad";
                $to_mail= $queryDocente->trab_email;
                $data = array("name"=>$docente,"body"=>$msg);
                \Mail::send('mail',$data,function($message) use ($to_name,$to_mail,$asunto){
                    $message->to($to_mail)
                    ->subject($asunto);
                });
            
        }


        // Redireccionamos
        return redirect()->route('recursos.show', ['idcurso' => $req->rec_curso, 'nbim' => $req->rec_bimestre])->with('status', 'Recurso subido correctamente!');
        
    }

    public function download(Request $req){
        return response()->download(storage_path("app/cursos/".$req->idcurso.'/'.$req->filename));
    }

    public function destroy($id, $idcurso, $nbim)
    {
        $rec = Recurso::find($id);
        Recurso::destroy($id);
        return redirect()->route('recursos.show', ['idcurso' => $idcurso, 'nbim' => $nbim])->with('status', 'Recurso eliminado correctamente!');
    }



}