<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function perfil()
    {
        if (auth()->user()->rol !== 'usuario') {
            return redirect()->route('admin.index');
        }
        return view('usuario.perfil');
    }
}