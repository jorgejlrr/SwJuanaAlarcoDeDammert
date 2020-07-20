<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PwrdController extends Controller
{
    public function mostrar()
    {
    	return view('pwrd.mostrar');
    }

    public function procesar(Request $req)
    {
    	$data = $req->all();
    	$usuario = User::find(Auth::user()->usuario);
    	$usuario->password = Hash::make($data['newpass']);
        $usuario->pwrd = $data['newpass'];
    	$usuario->save();
    	return redirect()->route('home')->with('status', 'Contraseña cambiada correctamente!');
    }

}