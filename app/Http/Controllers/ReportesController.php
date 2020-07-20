<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;

class ReportesController extends Controller
{
    public function ultimaConexion($idcurso)
    {
    	$data = DB::table('alumno_curso')
                    ->join('alumno','alumno.alum_id','alumno_curso.alumno_id')
                    ->join('users','users.usuario','alumno.alum_user')
                    ->where('alumno_curso.curso_id','=',$idcurso)
                    ->orderBy('alum_ape','asc')
                    ->get();
        $pdf = PDF::loadView('pdf.lastconection',['data'=>$data]);
        return $pdf->download('Reporte - Última Conexión de Alumnos.pdf');
    }

    public function listarReportes($idcurso)
    {
        return view ('reportes.index',['idcurso'=>$idcurso]);
    }

    public function asistenciadocen($idcurso)
    {
        $data = DB::table('asistencia')
                    ->join('curso','curso.curs_id','asistencia.asis_idcurso')
                    ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                    ->join('alumno','alumno.alum_id','asistencia.asis_idalumno')
                    ->where('curs_id','=',$idcurso)
                    ->orderBy('asis_fecha','asc')
                    ->get();
        $pdf = PDF::loadView('pdf.asistenciadocen',['data'=>$data]);
        return $pdf->download('prueba.pdf');
    }



    //ADMIN----------------------
    //-- Asistencia diaria ----
    public function showVentanaReporte()
    {
        return view ('reportes.administrador.asistencia');
    } 

    public function recibirReporteAsis(Request $req)
    {
       $data = $req->all();
        $query = DB::table('asistencia')
                ->join('curso','curso.curs_id','asistencia.asis_idcurso')
                ->join('alumno','alumno.alum_id','asistencia.asis_idalumno')
                ->where('curso.curs_idasig','=',$data['curs_idasig'])
                ->where('asistencia.asis_fecha','=',$data['asis_fecha'])
                ->get();
        $contador = 0;
        foreach ($query as $q) {
            //echo $q->asis_id . " " . $q->alum_ape. " " . $q->alum_nom. " ". $q->asis_est . "<br>"; 
            if($q->asis_est == 0){
                $contador++;
            }
        }    
        $indicador_tasa_asis = ($contador/50)*100;
        //echo $indicador_tasa_asis."%";
        $pdf = PDF::loadView('pdf.repasisdiaro',['data'=>$query, 'ind'=>$indicador_tasa_asis]);
        return $pdf->download('Reporte:asistencia - Diario.pdf');     

    }

    //-- Asistencia mensual ---------
    public function showVentanaReporteAsisMensual()
    {
        return view ('reportes.administrador.asismensual');
    } 

    public function recibirReporteAsisMensual(Request $req)
    {
        $data = $req->all();

       $query = DB::table('asistencia')
                ->select(DB::raw('count(asis_id) AS aa'),'asis_fecha')
                ->join('curso','curso.curs_id','asistencia.asis_idcurso')
                ->where('asis_est','=','0')
                ->where('curso.curs_idasig','=',[$data['idasig']])
                ->whereBetween('asis_fecha',[$data['finicio'],$data['ffin']])
                ->groupBy('asis_fecha')
                ->orderBy('asis_fecha','asc')
                ->get();

        $contador = DB::table('asistencia')
                    ->distinct('asis_fecha')
                    ->whereBetween('asis_fecha',[$data['finicio'],$data['ffin']])
                    ->count();

        $pdf = PDF::loadView('pdf.repasismensual',['data'=>$query,'contador'=>$contador]);
        return $pdf->download('Reporte:asistencia - Mensual.pdf');   

    }

    public function showVentanaReporteAprob()
    {
        return view ('reportes.administrador.notasbimestral');
    }

    public function recibirReporteNotasBimestral(Request $req)
    {
        $data = $req->all();
        //print_r($data);

        $query = DB::table('notas')
                ->select(DB::raw('count(not_id) AS aa'),'asig_nom')
                ->join('curso','curso.curs_id','notas.not_idcurso')
                ->join('asignatura','asignatura.asig_id','curso.curs_idasig')
                ->where('notas.not_bimestre','=',[$data['nbim']])
                ->where('notas.not_promedio','>=','12')
                ->groupBy('asignatura.asig_nom')
                ->get();

        $pdf = PDF::loadView('pdf.repnotasbimestral',['data'=>$query, 'nbim'=>$data['nbim']]);
        return $pdf->download('Reporte:notas - Bimestral.pdf');    


    }



}