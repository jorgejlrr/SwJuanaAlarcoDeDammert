<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recvideo;
use Auth;
use DB;

class RecVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar($idcurso)
    {
        $data = DB::table('recvideo')
                ->join('trabajador','trabajador.trab_dni','recvideo.vid_usuario')
                ->where('recvideo.vid_curso','=',$idcurso)
                ->get();
        return view ('recvideos.index',['idcurso'=>$idcurso, 'videos'=>$data]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        Recvideo::create([
            'vid_curso' => $data['vid_curso'],
            'vid_titulo' => $data['vid_titulo'],
            'vid_link' => $data['vid_link'],
            'vid_usuario' => Auth::user()->usuario
        ]);
        return redirect()->route('recvideos',['idcurso'=>$request->vid_curso])->with('status', 'Video agregado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Recvideo::find($id);
        return view ('recvideos.show',['video'=>$video]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $exa = ExamenLinea::find($id);
        // return view ('examen.edit',['examen'=>$exa]);
        $video = Recvideo::find($id);
        return view ('recvideos.edit',['video'=>$video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data = $request->all();
        // $exa = ExamenLinea::find($data['exa_id']);
        // $exa->update($request->all());
        // return redirect()->route('exa.show',array('idcurso' => $exa->exa_idcurso))->with('status', 'Exámen editado correctamente!');

        $data = $request->all();
        $video = Recvideo::find($id);
        $video->update($request->all());
        return redirect()->route('recvideos',array('idcurso' => $video->vid_curso))->with('status', 'Exámen editado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video = Recvideo::find($id);
        $idcurso = $video["vid_curso"];
        Recvideo::destroy($id);
        return redirect()->route('recvideos',['idcurso'=>$idcurso])->with('status', 'video eliminado correctamente!');
    }
}