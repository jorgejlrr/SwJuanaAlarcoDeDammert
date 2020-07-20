<?php

namespace App\Http\Controllers;

use App\Pago;
use DB;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

use App\Exports\PagosExport;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pagos')
                    ->join('alumno','alumno.alum_id','pagos.idalumno')
                    ->orderBy('pagos.año', 'asc')
                    ->orderBy('alumno.alum_ape', 'asc')
                    ->get();
        return view ('pagos.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumnos = DB::table('alumno')
                    ->where('alumno.alum_est','=','1')
                    ->whereNotIn('alumno.alum_id',DB::table('pagos')
                                                        ->select('idalumno')
                                                        ->where('pagos.año','=','2020') )
                    ->orderBy('alumno.alum_ape','asc')                                    
                    ->get();
        
        return view ('pagos.create',['alumnos'=>$alumnos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        foreach ($data['data'] as $key => $value) {
            if(!empty($value['check'])){
                /*echo "" . $value['idalumno'] . "---------";
                echo "" . $value['anual'] . "---------";
                echo "" . $value['dscto'] . "---------";
                echo "" . $value['inicial'] . "/////////";
                $x = ($value['anual'] - $value['dscto'] - $value['inicial']);
                $y = ($x/10) * (-1);
                echo $y;
                echo "<br>"; */

                $x = ($value['anual'] - $value['dscto'] - $value['inicial']);
                $y = ($x/10) * (-1);

                Pago::create([
                    'año' => 2020,
                    'idalumno' => $value['idalumno'],
                    'montoanual' => $value['anual'],
                    'descuento' => $value['dscto'],
                    'inicial' => $value['inicial'],
                    'marzo' => $y,
                    'abril' => $y,
                    'mayo' => $y,
                    'junio' => $y,
                    'julio' => $y,
                    'agosto' => $y,
                    'setiembre' => $y,
                    'octubre' => $y,
                    'noviembre' => $y,
                    'diciembre' => $y
                ]);
            }
        }

        return redirect()->route('pago.index')->with('status', 'Pago(s) agregado(s) correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = DB::table('pagos')
                    ->join('alumno','alumno.alum_id','pagos.idalumno')
                    ->where('pagos.id','=',$id)
                    ->first();
        return view ('pagos.edit',['p'=>$pago]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pago = Pago::find($id);
        $request->all();
        $pago->update($request->all());
        return redirect()->route('pago.index')->with('status', 'Pago editado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        //
    }

    public function descargarPDF()
    {
        $data = DB::table('pagos')
                    ->join('alumno','alumno.alum_id','pagos.idalumno')
                    ->where('pagos.año','=','2020')
                    ->orderBy('alumno.alum_ape','asc')     
                    ->get();
        $pdf = PDF::loadView('pdf.pagos',['data'=>$data]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Pagos - JuanaAlarcoDeDammert.pdf');
    }

    public function descargarEXCEL()
    {
        return Excel::download(new PagosExport, 'pagos-jad.csv');
    }

    public function resetPago($id)
    {
        $pago = DB::table('pagos')
                    ->join('alumno','alumno.alum_id','pagos.idalumno')
                    ->where('pagos.id','=',$id)
                    ->first();
        return view ('pagos.reset',['p'=>$pago]);
    }

    public function actualizar(Request $request)
    {
        $data = $request->all();
        $pago = Pago::find($data['id']);
        $x = $data['montoanual'] - $data['descuento'] - $data['inicial'];
        $y = ($x/10) * (-1);

        $pago->montoanual = $data['montoanual'];
        $pago->descuento = $data['descuento'];
        $pago->inicial = $data['inicial'];
        $pago->marzo = $y;
        $pago->abril = $y;
        $pago->mayo = $y;
        $pago->junio = $y;
        $pago->julio = $y;
        $pago->agosto = $y;
        $pago->setiembre = $y;
        $pago->octubre = $y;
        $pago->noviembre = $y;
        $pago->diciembre = $y;
        
        $pago->save();
        return redirect()->route('pago.index')->with('status', 'Pago editado correctamente!');
    } 

}