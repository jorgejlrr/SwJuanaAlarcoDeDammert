<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GraficoController extends Controller
{

    public function showFormGraficoAsisMensual()
    {
    	return view ('grafico.formasis');
    }

    public function recibirFormGraficoAsisMensual(Request $req)
    {
    	$data = $req->all();
    	
    	return view('grafico.graficoasis',['finicio'=>$data['finicio'], 
    										'ffin'=>$data['ffin'],
    										'asig'=>$data['asig']
    									]);
    }

    public function showFormGraficoNotasMensual()
    {
        return view ('grafico.formnotas');
    }

    public function recibirFormGraficoNotasMensual(Request $req)
    {
        $data = $req->all();
        
        return view('grafico.graficonotas',['nbim'=>$data['nbim']]);
    }

}