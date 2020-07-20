<?php

namespace App\Http\Controllers;

use App\Apoderado;
use Illuminate\Http\Request;
use DB;
use PDF;

class ApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('apoderado')->get();
        return view('apoderado.index',['apoderados'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('apoderado.create');
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
            'apod_dni' => 'required|unique:apoderado,apod_dni|numeric|digits:8',
            'apod_ape' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
            'apod_nom' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
            'apod_sexo' => 'required',
            'apod_email' => 'nullable',
            'apod_tel' => 'nullable|min:7|max:13'
        ]);
        $data = $request->all();
        $apod = Apoderado::create($data);
        return redirect()->route('apoderado.index')->with('status', 'Apoderado agregado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function show(Apoderado $apoderado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $apoderado = Apoderado::find($id);
        return view ('apoderado.edit',['apod'=>$apoderado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $apoderado = Apoderado::find($id);
        $request->all();
        $apoderado->update($request->all());
        return redirect()->route('apoderado.index')->with('status', 'Apoderado editado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $apoderado = Apoderado::destroy($id);
        return redirect()->route('apoderado.index')->with('status', 'Apoderado eliminado correctamente!');
    }

    public function consultarApod($dni){
        $apoderado = DB::table('apoderado')
                        ->where('apoderado.apod_dni','=',$dni)
                        ->get();
        return $apoderado;
    }

    public function descargarApoderados(){
        $data = DB::table('apoderado')
                    ->orderBy('apoderado.apod_ape','asc')
                    ->get();
        $pdf = PDF::loadView('pdf.apoderados',['data'=>$data]);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->download('Apoderados - JuanaAlarcoDeDammert.pdf');
    }

}