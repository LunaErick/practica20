<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PerfilController extends Controller
{
    public function edit()
    {
        return view('usuario.edit_perfil');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'name'     => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
        ]);

        $user->name     = $request->name;
        $user->username = $request->username;

        if ($request->password) {
            $request->validate([
                'password' => 'min:6|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('usuario.perfil')->with('success', 'Perfil actualizado correctamente.');
    }
}